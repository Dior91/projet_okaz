<?php
require_once "MainModel.php";
require_once "Category.php";
require_once dirname(__DIR__) . "/utils/utils.php";


class CategoryModel extends MainModel
{
    public function getAllCategories()
    {
        $stmt = $this->pdo->query("SELECT * FROM `dda_product_category`");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Category");
    }

    
    public function getOneCategory()
    {
        $id = checkQueryId();
        $query = $this->pdo->query("SELECT * FROM `dda_product_category` WHERE `id` = $id");
        $query->setFetchMode(PDO::FETCH_CLASS, "Category");
        $category = $query->fetch();

        if (!$category) {
            redirect();
        }
        return $category;
    }
}
