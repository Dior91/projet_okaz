<?php require_once "./header_backoffice.php";
require_once dirname(__DIR__) . "/src/CategoryModel.php";
$categorymodel = new CategoryModel();
$category = $categorymodel->getOneCategory();
$data = $categorymodel->deleteCategory();

?>
<section class="page_main">
    <h2>Supprimer la catégorie</h2>
    <?php if (isset($data) && !empty($data["successfulDelete"])) { ?>
        <p id="message"><?php echo ($data["successfulDelete"])  ?></p>
    <?php } ?>
    <div id="delete_card" class="card mb-3" style="max-width: 1000px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img id="img_delete" src="<?= $category->getImage_category(); ?>" class="img-fluid rounded-start" alt="<?= $category->getName_category(); ?>">
            </div>
            <div id="card_content" class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $category->getName_category(); ?></h5>
                    <p class="card-text">Description : <?= $category->getDescription_category(); ?></p>
                    <p class="warning_text"><i class="fas fa-regular fa-triangle-exclamation"></i>Si vous supprimer cette catégorie, tous les produits associés n'apparaîtront plus dans la boutique.</p>
                    <form method="POST">
                        <button class="delete_btn btn btn-primary">Confirmer la suppression
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "./footer_backoffice.php"; ?>