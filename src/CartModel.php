<?php
require_once 'MainModel.php';
require_once 'Product.php';
require_once 'ProductModel.php';

class CartModel extends MainModel
{

    /**
     * Méthode pour retourner notre panier
     */
    public function getCart()
    {
        $bm = new ProductModel();
        $user = getLoggedUser();
        $userId = $user["id"];
        $query = $this->pdo->query("
        SELECT `id_dda_users`, `product_id`, `cart_id` FROM `dda_cart`
        JOIN `dda_cart_products` ON `dda_cart_products`.`cart_id` = `dda_cart`.`id`
        WHERE `id_dda_users` = '$userId'
      ");
        $formatedCart = [];
        $cart = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cart as $product) {
            $newProduct = $bm->getOneProductById($product["product_id"]);
            $formatedCart[] = $newProduct;
        }
        return $formatedCart;
        // voir le panier même si aucun livre n'a été ajouté.
    }

    public function getCartById(){
        $user = getLoggedUser();
        $userId = $user["id"];
        $query = $this->pdo->query("SELECT * FROM `dda_cart` WHERE id_dda_users = $userId");
        $cart = $query->fetch(PDO::FETCH_ASSOC);
        // dd($cart);
        return $cart;
    }

    public function getProductNumberByCart()
    {
        $data = [
            "errorNoCart" => ""
        ];

        $user = getLoggedUser();
        $query = $this->pdo->query("SELECT * FROM dda_cart WHERE id_dda_users = " . $user['id']);
        $cartId = $query->fetch(PDO::FETCH_ASSOC);
        if (!$cartId) {
            $data["errorNoCart"] =  "Le panier est vide";
            return $data;
        }


        $query = $this->pdo->query("SELECT COUNT(`product_id`) as `product_number` FROM `dda_cart_products` 
        WHERE `cart_id` = " . $cartId["id"]);
        $productNumber = $query->fetch(PDO::FETCH_ASSOC);
        return $productNumber;
    }

    /**
     * Méthode pour calculer le prix du panier
     */
    public function getFullPrice($cart)
    {
        $total = 0;
        foreach ($cart as $product) {
            $total = $total + $product->getPrice();
        }
        return number_format($total, 2, ',', ' ');
    }

    /**
     * Méthode pour ajouter un livre à notre panier
     */
    public function addToCart($productId)
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // 1ère étape: vérifier si le panier existe ou pas
            $data = [
                "errorProduct_exist" => ""
            ];

            $user = getLoggedUser();
            if(!$user) $this->redirect("login.php"); // si l'utilisateur n'est pas connecté 
            $query = $this->pdo->query("SELECT * FROM dda_cart WHERE id_dda_users = " . $user["id"]);
            $cart = $query->fetch(PDO::FETCH_ASSOC);

            if (!$cart) {
                $query = $this->pdo->prepare("INSERT INTO dda_cart (id_dda_users) VALUES (:id_user)");
                $query->execute([":id_user" => $user["id"]]);
                // On récupère l'id du panier

                $query = $this->pdo->query("SELECT * FROM dda_cart WHERE id_dda_users = " .  $user["id"]);
                $cartId = $query->fetch(PDO::FETCH_ASSOC);
                // $cartId["id"]
                // $basketId = $this->pdo->lastInsertId(); //fonction native php, récupère le dernier id inséré dans la table

                $query = $this->pdo->prepare("INSERT INTO dda_cart_products (cart_id, product_id) VALUES (:cart_id, :product_id)");
                $query->execute([":cart_id" => $cartId["id"], ":product_id" => $productId]);
            } else {
                $query = $this->pdo->query("SELECT * FROM `dda_cart_products` WHERE product_id = $productId");
                $productExist = $query->fetch(PDO::FETCH_ASSOC);
    
                if ($productExist) {
                    $data["errorProduct_exist"] = "Nos produits sont uniques. Vous, ou un autre client avez déja ajouté ce produit à votre panier.";
                    return $data;
                }

                $query = $this->pdo->prepare("INSERT INTO dda_cart_products (cart_id, product_id) VALUES (:cart_id, :product_id)");
                $query->execute([":cart_id" => $cart["id"], ":product_id" => $productId]);

            }

            $this->redirect("cart.php");
        }
    }

    /**
     * Méthode pour supprimer un livre du panier
     */
    public function removeFromCart($productId)
    {
        // 1ère étape: récupérer le panier
            $user = getLoggedUser();
            $query = $this->pdo->query("SELECT * FROM dda_cart WHERE id_dda_users = " . $user["id"]);
            $cart = $query->fetch(PDO::FETCH_ASSOC);

            $query = $this->pdo->prepare("
        DELETE FROM dda_cart_products WHERE product_id = :product_id AND cart_id = :cart_id");
            $query->execute([":product_id" => $productId, ":cart_id" => $cart["id"]]);
            $this->redirect("cart.php");
        }
}
