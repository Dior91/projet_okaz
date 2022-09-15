<?php
require_once "MainModel.php";
require_once "Product.php";
require_once dirname(__DIR__) . "/utils/utils.php";

class ProductModel extends MainModel
{
    public function getProducts(){
        $query = $this->pdo->query("SELECT * FROM `dda_product` ORDER BY `id` LIMIT 21");
        return $query->fetchAll(PDO::FETCH_CLASS, "Product");
    }

    public function getProductsByCategory()
    {
        $CategoryId = checkQueryId();
        $availability = 1;
        $query = $this->pdo->query("SELECT * FROM `dda_product` WHERE (`id_dda_product_category` = $CategoryId AND `availability`= $availability )");
        $products = $query->fetchAll(PDO::FETCH_CLASS, "Product");

        if (!$products) {
            redirect();
        }
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

    public function getOneProduct(){

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
    public function getProductsByKeyword(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["keyword_form"])){
            
            $keyword = $_POST["keyword"];
            $keyword = htmlspecialchars($keyword);
            $query = $this->pdo->query("SELECT * FROM dda_product WHERE ((description LIKE '%".$keyword."%') OR (name LIKE '%".$keyword."%'))");
            $search_results = $query->fetchAll(PDO::FETCH_CLASS, "Product");
            return($search_results);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["searchByStore"])){
            
            $storeId = $_POST["searchByStore"];
            $query = $this->pdo->query("SELECT * FROM dda_product WHERE id_dda_stores = $storeId");
            return $query->fetchAll(PDO::FETCH_CLASS, "Product");
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["price_form"])){

            $error = [
                "errorPriceMin" => "",
                "errorPriceMax" => ""
            ];

            $min_price = $_POST["min_price"];
            $max_price = $_POST["max_price"];
            $price_min = str_replace(',', '.',$min_price);
            $price_max = str_replace(',', '.',$max_price);

            if(!filter_var($price_min, FILTER_VALIDATE_FLOAT)){
                $error["errorPriceMin"] = "Merci de rentrer un prix minimum valide";
            }
            if(!filter_var($price_max, FILTER_VALIDATE_FLOAT)){
                $error["errorPriceMax"] = "Merci de rentrer un prix maximum valide";
            }
            
            if(!empty($error["errorPriceMin"]) || !empty($error["errorPriceMax"])) {
                return $error;
            }

            $price_min = filter_var($price_min, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $price_max = filter_var($price_max, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        

            $query = $this->pdo->query("SELECT * FROM dda_product WHERE (price >= $price_min AND price <= $price_max)");
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
    
}


