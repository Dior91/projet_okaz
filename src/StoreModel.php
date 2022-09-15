<?php
require_once "MainModel.php";
require_once "Product.php";
require_once "Store.php";
require_once dirname(__DIR__) . "/utils/utils.php";

class StoreModel extends MainModel {

    public function getStoreByProduct(){
        $ProductId = checkQueryId();
        $query = $this->pdo->query(
            "SELECT  `store_name`, `store_address`, `store_city`, `store_postal_code`,`store_telephone`, `name` 
            FROM `dda_product` 
            JOIN `dda_stores` ON `dda_stores`.`id` = `dda_product`.`id_dda_stores` 
            WHERE `dda_product`.`id` = $ProductId");
        $store = $query->fetch(PDO::FETCH_ASSOC);

        if (!$store) {
            redirect();
        } 
        return $store;
    }

    public function getStore() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["select_store"])){
            $storeId = $_POST["select_store"];
            $query = $this->pdo->query("SELECT * FROM dda_stores WHERE id = $storeId");
            $query->setFetchMode(PDO::FETCH_CLASS, "Store");
            $store = $query->fetch();
            return $store;
        }
    }

    public function getAllStores() {

            $query = $this->pdo->query("SELECT * FROM dda_stores");
            $stores = $query->fetchAll(PDO::FETCH_CLASS, "Store");
            return $stores;       
    }
}