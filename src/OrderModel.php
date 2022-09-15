<?php
require_once 'MainModel.php';
require_once 'ProductModel.php';
require_once 'UserModel.php';
require_once 'CartModel.php';
require_once 'Order.php';


class OrderModel extends MainModel
{
    /**
     * Méthode pour récupérer les élements du panier au moment de la validation
     */

    public function insertOrderInfo()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $error = [
                "errorCardNumber" => "",
                "errorExpirationDate" => "",
                "errorCVV" => ""
            ];

            $card = $_POST["card_number"];
            $expiration_month = $_POST["expiration_month"];
            $expiration_year = $_POST["expiration_year"];
            $cvv_code = $_POST["cvv_code"];

            // gestion des erreurs dans le formulaire de paiement
            // on compare le mois et l'année entrés au mois et à l'année actuelle
            if ($expiration_year === date('y')) {
                if ($expiration_month < date('m')) {
                    $error["errorExpirationDate"] =  "Merci de rentrer une date ultérieure à la date du jour";
                }
            }

            if (!filter_var($card, FILTER_VALIDATE_FLOAT)) {
                $error["errorCardNumber"] = "Merci de remplir un numéro de carte bancaire valide";
            }

            if (!filter_var($cvv_code, FILTER_VALIDATE_FLOAT)) {
                $error["errorCVV"] = "Merci de remplir un code CVV valide";
            }


            if (!empty($error["errorCardNumber"]) || !empty($error["errorExpirationDate"]) || !empty($error["errorCVV"])) {
                return $error;
            }

            // redirige l'utilisateur vers le panier s'il est vide (empêche l'insertion d'une ligne dans la table commande sans article) 
            $cartmodel = new CartModel();
            $cart = $cartmodel->getCartById();
            if (!$cart) {
                $this->redirect("cart.php");
            }

            // insertion des données du panier, de livraison et de paiement dans la BDD

            $card_last_numbers = substr($card, -4);
            $card_number = "XXXX XXXX XXXX " . $card_last_numbers;

            $usermodel = new UserModel();
            $user = $usermodel->getUser();
            $userAddress =  $user["address"] . ", " . $user["postal_code"] . " " . $user["city"];

            $cart = $cartmodel->getCart();
            $payment = $cartmodel->getFullPrice($cart);
            $payment_amount = str_replace(' ', '', $payment);
            $payment_amount = str_replace(',', '.', $payment);
            $cart_id = $cartmodel->getCartById();


            $query = $this->pdo->prepare("INSERT INTO dda_order (payment_amount, payment_type, delivery_address, cart_id, id_dda_users) 
            VALUES (:payment_amount, :payment_type, :delivery_address, :cart_id, :id_user)");
            $query->execute([
                ":payment_amount" => $payment_amount,
                ":payment_type" => $card_number,
                ":delivery_address" => $userAddress,
                ":cart_id" => $cart_id["id"],
                ":id_user" => $user["id"]
            ]);

            $this->redirect("recap.php");
        }
        // else {
        //     dump("Erreur de logique");
        // }
    }
    public function getOrderInfoByCart()
    {

        $cartmodel = new CartModel();
        $cart_id = $cartmodel->getCartById();
        $query = $this->pdo->query("SELECT * FROM dda_order WHERE cart_id =" . $cart_id["id"]);
        $orderInfo = $query->fetch(PDO::FETCH_ASSOC);

        return $orderInfo;
    }

    /**
     * Méthode pour retourner notre commande
     */
    public function getOrder()
    {

        // retourne les infos de la table order
        $user = getLoggedUser();
        $userId = $user["id"];
        $query = $this->pdo->query("SELECT * FROM dda_order WHERE id_dda_users = $userId");
        $order = $query->fetchAll(PDO::FETCH_CLASS, "Order");
        return $order;
    }

    /**
     * Méthode pour retourner les produits de la commande 
     * */
    public function getOrderProducts()
    {

        // $orders = $this->getOrder();
        // $bm = new ProductModel();
        $user = getLoggedUser();
        $userId = $user["id"];

        // $formatedOrder = [];
        $query = $this->pdo->query(
            "SELECT `order_id`, `product_id`,  `name`, `price`, `image`, `dimensions` 
                 FROM `dda_order`
                 JOIN `dda_order_products` ON `dda_order_products`.`order_id` = `dda_order`.`id`
                 JOIN `dda_product` ON `dda_product`.`id` = `dda_order_products`.`product_id`
                WHERE `id_dda_users` = '$userId'"
        );
        // $orders = $query->fetchAll(PDO::FETCH_GROUP);
        $orders = $query->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
        // dump ($orders);
        return $orders;
    }
 

    public function getOrderInfo()
    {

        $cartmodel = new CartModel();
        $cart_id = $cartmodel->getCartById();
        if (!$cart_id) $this->redirect("cart.php"); // si le panier est vide redirige vers le panier
        $query = $this->pdo->query("SELECT * FROM dda_order WHERE cart_id =" . $cart_id["id"]);
        $orderInfo = $query->fetch(PDO::FETCH_ASSOC);
        return $orderInfo;
    }

    public function transferCartToOrder()
    {

        $orderInfo = $this->getOrderInfoByCart();
        $orderId = $orderInfo["id"];

        $cartmodel = new CartModel();
        $cart_id = $cartmodel->getCartById();
        // dd($cart_id);

        $query = $this->pdo->query("SELECT * FROM dda_cart_products WHERE cart_id =" . $cart_id["id"]);
        $cart = $query->fetchAll(PDO::FETCH_ASSOC);

        // dd($cart);
        // $products_id = [];
        foreach ($cart as $product) {
            $query = $this->pdo->prepare("INSERT INTO dda_order_products (order_id, product_id) VALUES (:order_id, :product_id)");
            $query->execute([":order_id" => $orderId, "product_id" => $product["product_id"]]);
            // $products_id[] = $product["product_id"];
        }
        // On supprime les articles du panier et le panier ainsi que le produit (unique) dans la table produits
        $availability = 0;
        foreach ($cart as $product) {
            $query = $this->pdo->prepare("UPDATE dda_product SET availability = :availability WHERE id = " . $product["product_id"]);
            $query = $this->pdo->query("DELETE FROM dda_cart_products WHERE product_id = " . $product["product_id"]);
            $query->execute([":availability" => $availability]);
        }
        $query = $this->pdo->query("DELETE FROM dda_cart WHERE id =" . $cart_id["id"]);
    }
}
