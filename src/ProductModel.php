<?php
require_once "MainModel.php";
require_once "Product.php";
require_once dirname(__DIR__) . "/utils/utils.php";

class ProductModel extends MainModel
{
    public function getAllProducts()
    {
        $query = $this->pdo->query("SELECT * FROM `dda_product`");
        return $query->fetchAll(PDO::FETCH_CLASS, "Product");
    }

    public function getProductsByCategory()
    {
        $CategoryId = checkQueryId();
        $availability = 1;
        $query = $this->pdo->query("SELECT * FROM `dda_product` WHERE (`id_dda_product_category` = $CategoryId AND `availability`= $availability )");
        $products = $query->fetchAll(PDO::FETCH_CLASS, "Product");
        // $products = $query->fetchAll(PDO::FETCH_ASSOC);

        // if (!$products) {
        //     redirect();
        // }
        return $products;
    }

    public function getProductsOfSameCategory()
    {
        $productId = checkQueryId();
        $query = $this->pdo->query("SELECT * FROM `dda_product` WHERE `id`= $productId");
        $query->setFetchMode(PDO::FETCH_CLASS, "Product");
        $product = $query->fetch();

        $availability = 1;
        $categoryId = $product->getId_dda_product_category();
        $query = $this->pdo->query("SELECT * FROM `dda_product` WHERE (`id_dda_product_category` = $categoryId AND `availability`= $availability AND `id` != $productId)");
        $products = $query->fetchAll(PDO::FETCH_CLASS, "Product");

        // if (!$products) {
        //     redirect();
        // }
        return $products;
    }

    public function getOneProduct()
    {

        $ProductId = checkQueryId();
        $query = $this->pdo->query("SELECT * FROM `dda_product` WHERE `id` = $ProductId");
        $query->setFetchMode(PDO::FETCH_CLASS, "Product");
        $product = $query->fetch();

        if (!$product) {
            redirect();
        }
        return $product;
    }

    public function getOneProductById($id)
    {
        // On effectue notre query SQL pour retourner une donnée unique
        $query = $this->pdo->query("SELECT * FROM dda_product WHERE id = $id");
        $query->setFetchMode(PDO::FETCH_CLASS, "Product");
        $product = $query->fetch();
        return $product;
    }
    /**
     * méthode pour rechercher par mots clés dans les catégories
     */
    public function getProductsBySearch()
    {

        $availability = 1;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["keyword_form"])) {

            $keyword = $_POST["keyword"];
            $keyword = htmlspecialchars($keyword);
            $query = $this->pdo->query("SELECT * FROM dda_product WHERE (availability = $availability AND ((description LIKE '%" . $keyword . "%') OR (name LIKE '%" . $keyword . "%')))");
            $search_results = $query->fetchAll(PDO::FETCH_CLASS, "Product");
            return ($search_results);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["searchByStore"])) {

            $storeId = $_POST["searchByStore"];
            $query = $this->pdo->query("SELECT * FROM dda_product WHERE (id_dda_stores = $storeId AND availability = $availability)");
            return $query->fetchAll(PDO::FETCH_CLASS, "Product");
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["price_form"])) {

            $error = [
                "errorPriceMin" => "",
                "errorPriceMax" => ""
            ];

            $min_price = $_POST["min_price"];
            $max_price = $_POST["max_price"];
            $min_price = str_replace(',', '.', $min_price);
            $max_price = str_replace(',', '.', $max_price);
            $price_min = str_replace(' ', '', $min_price);
            $price_max = str_replace(' ', '', $max_price);

            if (!filter_var($price_min, FILTER_VALIDATE_FLOAT)) {
                $error["errorPriceMin"] = "Merci de rentrer un prix minimum valide";
            }
            if (!filter_var($price_max, FILTER_VALIDATE_FLOAT)) {
                $error["errorPriceMax"] = "Merci de rentrer un prix maximum valide";
            }
            if (!empty($error["errorPriceMin"]) || !empty($error["errorPriceMax"])) {
                return $error;
            }

            $price_min = filter_var($price_min, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $price_max = filter_var($price_max, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


            $query = $this->pdo->query("SELECT * FROM dda_product WHERE (availability = $availability AND price >= $price_min AND price <= $price_max)");
            $price_results = $query->fetchAll(PDO::FETCH_CLASS, "Product");
            return $price_results;
        }
    }

    public function getFiveLastsProducts()
    {
        // On effectue notre query SQL pour retourner une donnée unique
        $query = $this->pdo->query("SELECT * FROM `dda_product` ORDER BY `id` DESC LIMIT 5");
        $products = $query->fetchAll(PDO::FETCH_CLASS, "Product");
        return $products;
    }

    public function getMaxId(array $array) : string
    {
        $Id = [];
        foreach ($array as $product) {
            $Id[] = $product->getId();
        }
        return max($Id);
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $data = [
                "errorImage" => "",
                "errorPrice" => "",
                "successfulAdd" => ""
            ];

            $product_name = $_POST["product_name"];
            $product_image = $_POST["product_image"];
            $product_description = $_POST["product_description"];
            $product_condition = $_POST["product_condition"];
            $product_dimensions = $_POST["product_dimensions"];
            $product_color = $_POST["product_color"];
            $product_price = $_POST["product_price"];
            $product_category = $_POST["product_category"];
            $product_store = $_POST["product_store"];

            $price_reformated = str_replace(',', '.', $product_price);
            $price_product = str_replace(' ', '', $price_reformated);


            if (!filter_var($price_product, FILTER_VALIDATE_FLOAT)) {
                $data["errorPrice"] = "Merci de rentrer un prix valide";
            }
            if (!filter_var($product_image, FILTER_VALIDATE_URL)) {
                $data["errorImage"] = "Merci de rentrer une URL valide";
            }

            if (!empty($data["errorImage"]) || !empty($data["errorPrice"])) {
                return $data;
            }

            $product_name = htmlspecialchars($product_name);
            $product_image = filter_var($product_image, FILTER_SANITIZE_URL);
            $product_description = htmlspecialchars($product_description);
            $product_condition = htmlspecialchars($product_condition);
            $product_dimensions = htmlspecialchars($product_dimensions);
            $product_color = htmlspecialchars($product_color);
            $price_product = filter_var($price_product, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $product_category = htmlspecialchars($product_category);
            $product_store = htmlspecialchars($product_store);


            $query = $this->pdo->prepare("
            INSERT INTO dda_product 
            (name, image, description, product_condition, dimensions, color, price, id_dda_product_category, id_dda_stores) 
            VALUES (:name, :image, :description, :product_condition, :dimensions, :color, :price, :id_dda_product_category, :id_dda_stores)");

            $success = $query->execute([
                ":name" => $product_name,
                ":image" => $product_image,
                ":description" => $product_description,
                ":product_condition" => $product_condition,
                ":dimensions" => $product_dimensions,
                ":color" => $product_color,
                ":price" => $price_product,
                ":id_dda_product_category" => $product_category,
                ":id_dda_stores" => $product_store
            ]);

            if ($success) {
                $data["successfulAdd"] = "Le produit a bien été ajouté";
                return $data;
            }
        }
    }

    public function updateProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $data = [
                "errorImage" => "",
                "errorPrice" => "",
                "successfulAdd" => ""
            ];

            $product_name = $_POST["product_name"];
            $product_image = $_POST["product_image"];
            $product_description = $_POST["product_description"];
            $product_condition = $_POST["product_condition"];
            $product_dimensions = $_POST["product_dimensions"];
            $product_color = $_POST["product_color"];
            $product_price = $_POST["product_price"];
            $product_availability = $_POST["product_availability"];
            $product_category = $_POST["product_category"];
            $product_store = $_POST["product_store"];

            $price_reformated = str_replace(',', '.', $product_price);
            $price_product = str_replace(' ', '', $price_reformated);


            if (!filter_var($price_product, FILTER_VALIDATE_FLOAT)) {
                $data["errorPrice"] = "Merci de rentrer un prix valide";
            }
            if (!filter_var($product_image, FILTER_VALIDATE_URL)) {
                $data["errorImage"] = "Merci de rentrer une URL valide";
            }

            if (!empty($data["errorImage"]) || !empty($data["errorPrice"])) {
                return $data;
            }

            $product_name = htmlspecialchars($product_name);
            $product_image = filter_var($product_image, FILTER_SANITIZE_URL);
            $product_description = htmlspecialchars($product_description);
            $product_condition = htmlspecialchars($product_condition);
            $product_dimensions = htmlspecialchars($product_dimensions);
            $product_color = htmlspecialchars($product_color);
            $price_product = filter_var($price_product, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $product_category = htmlspecialchars($product_category);
            $product_store = htmlspecialchars($product_store);
            $product_availability = filter_var($product_availability, FILTER_SANITIZE_NUMBER_INT);

            $productId = checkQueryId();

            $query = $this->pdo->prepare("
                UPDATE dda_product 
                SET name = :name,
                    image = :image,
                    description = :description,
                    product_condition = :product_condition,
                    dimensions = :dimensions,
                    color = :color,
                    price = :price,
                    availability = :availability,
                    id_dda_product_category = :id_dda_product_category,
                    id_dda_stores = :id_dda_stores
                WHERE id = :id
            ");


            $success = $query->execute([
                ":name" => $product_name,
                ":image" => $product_image,
                ":description" => $product_description,
                ":product_condition" => $product_condition,
                ":dimensions" => $product_dimensions,
                ":color" => $product_color,
                ":price" => $price_product,
                ":availability" => $product_availability,
                ":id_dda_product_category" => $product_category,
                ":id_dda_stores" => $product_store,
                ":id" => $productId
            ]);

            if ($success) {
                $data["successfulAdd"] = "Le produit a bien été modifié";
                return $data;
            }
        }
    }
}
