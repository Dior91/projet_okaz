<?php require_once "./header_backoffice.php";
require_once dirname(__DIR__) . "/src/CategoryModel.php";
$categorymodel = new CategoryModel();
$categories = $categorymodel->getAllCategories();

?>
<section class="page_main">
    <h2>Modifier une catégorie</h2>
    <div class="categories">
        <?php foreach ($categories as $category) { ?>
            <article class="card" style="width: 18rem;">
                <img src="<?= $category->getImage_category(); ?>" class="card-img-top" alt="<?= $category->getName_category(); ?>">
                <div class="card-body">
                    <h5 class="card-title-first"><?= $category->getName_category(); ?></h5>
                    <a href="modify_category_form.php?id=<?= $category->getId(); ?>" class="modify_btn btn btn-primary">Modifier</a>
                </div>
            </article>
        <?php } ?>
    </div>
</section>
<?php require_once "./footer_backoffice.php"; ?>