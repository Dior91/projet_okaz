<?php require_once "./header_backoffice.php";
require_once dirname(__DIR__) . "/src/CategoryModel.php";
$categorymodel = new CategoryModel();
$data = $categorymodel->modifyCategory();
$category = $categorymodel->getOneCategory();

// dump($category);
?>
<section class="page_main">
    <h2>Modifier une catégorie</h2>
    <?php if (isset($data) && !empty($data["successfulModification"])) { ?>
        <p id="message"><?php echo ($data["successfulModification"])  ?></p>
    <?php } ?>
    <form class="form_post" method="POST">
        <div class="mb-4" method="POST">
            <label for="category_name" class="form-label">Nom de la catégorie<span> *</span></label>
            <input value="<?= $category->getName_category(); ?>" type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <div class="mb-4">
            <label for="category_image" class="form-label">Image de la catégorie<span> *</span></label>
            <div id="imageHelp" class="form-text">Veuillez entrer l'URL de l'image</div>
            <input value="<?= $category->getImage_category(); ?>" type="text" class="form-control" id="category_image" name="category_image" aria-describedby="imageHelp" required>
            <?php if (isset($data) && !empty($data["errorImage"])) { ?>
                <p id="message"><?php echo ($data["errorImage"])  ?></p>
            <?php } ?>
            <div id="" class="form-text">Image actuelle</div>
            <img class="category_image" src="<?= $category->getImage_category(); ?>" alt="<?= $category->getName_category(); ?>">
        </div>
        <div class="mb-4">
            <label for="category_description" class="form-label">Description de la catégorie<span> *</span></label>
            <textarea maxlength="100" rows="4" type="text" class="form-control" id="category_description" name="category_description" aria-describedby="descriptionHelp" required><?= $category->getDescription_category(); ?></textarea>
            <div id="descriptionHelp" class="form-text">100 caractères maximum</div>
        </div>
        <p id="mandatory"><span> *</span> : Champs obligatoires</p>
        <button type="submit" class="form_btn btn btn-primary">Modifier</button>
    </form>

</section>
<?php require_once "./footer_backoffice.php"; ?>