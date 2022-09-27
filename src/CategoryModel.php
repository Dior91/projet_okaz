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

    public function addCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $data = [
                "errorImage" => "",
                "successfulAdd" => ""
            ];

            $category_name = $_POST["category_name"];
            $category_image = $_POST["category_image"];
            $category_description = $_POST["category_description"];

            if (!filter_var($category_image, FILTER_VALIDATE_URL)) {
                $data["errorImage"] = "Merci de rentrer une URL valide";
                return $data;
            }

            $category_name = htmlspecialchars($category_name);
            $category_description = htmlspecialchars($category_description);
            $category_image = filter_var($category_image, FILTER_SANITIZE_URL);

            $query = $this->pdo->prepare("INSERT INTO dda_product_category (name_category, image_category, description_category) 
            VALUES (:name_category, :image_category, :description_category)");

            $success = $query->execute([
                ":name_category" => $category_name,
                ":image_category" => $category_image,
                ":description_category" => $category_description
            ]);

            if ($success) {
                $data["successfulAdd"] = "La catégorie a bien été ajoutée";
                return $data;
            }
        }
    }
    public function modifyCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $data = [
                "errorImage" => "",
                "successfulModification" => ""
            ];

            $category_name = $_POST["category_name"];
            $category_image = $_POST["category_image"];
            $category_description = $_POST["category_description"];

            if (!filter_var($category_image, FILTER_VALIDATE_URL)) {
                $data["errorImage"] = "Merci de rentrer une URL valide";
                return $data;
            }

            $category_name = htmlspecialchars($category_name);
            $category_description = htmlspecialchars($category_description);
            $category_image = filter_var($category_image, FILTER_SANITIZE_URL);

            $categoryId = checkQueryId();
            $query = $this->pdo->prepare("
            UPDATE dda_product_category SET 
            name_category = :name_category,
            image_category = :image_category,
            description_category = :description_category
            WHERE id = :id
            ");

            $success = $query->execute([
                ":name_category" => $category_name,
                ":image_category" => $category_image,
                ":description_category" => $category_description,
                ":id" => $categoryId
            ]);

            if ($success) {
                $data["successfulModification"] = "La catégorie a bien été modifiée";
                return $data;
            }
        }
    }

    public function deleteCategory()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $data = [
                "successfulDelete" => ""
            ];

            $categoryId = checkQueryId();
            $query = $this->pdo->prepare("DELETE FROM dda_product_category WHERE id = :id");
            $success = $query->execute([":id" => $categoryId]);

            if ($success) {
                $this->redirect("delete_category.php");
            }

            if (!$success) {
                $data["successfulDelete"] = "Impossible de supprimer la catégorie";
                return $data;
            }
        }
    }
}
