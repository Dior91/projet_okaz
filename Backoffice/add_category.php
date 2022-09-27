<?php require_once "./header_backoffice.php";
require_once dirname(__DIR__) . "/src/CategoryModel.php";
$categorymodel = new CategoryModel();
$data = $categorymodel->addCategory();

?>
<section class="page_main">
    <h2>Ajouter une catégorie</h2>
    <?php if (isset($data) && !empty($data["successfulAdd"])) { ?>
        <p id="message"><?php echo ($data["successfulAdd"])  ?></p>
    <?php } ?>
    <form class="form_post" method="POST">
        <div class="mb-4">
            <label for="category_name" class="form-label">Nom de la catégorie<span> *</span></label>
            <input value="" type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <div class="mb-4">
            <label for="category_image" class="form-label">Image de la catégorie<span> *</span></label>
            <input value="" type="text" class="form-control" id="category_image" name="category_image" aria-describedby="imageHelp" required>
            <div id="imageHelp" class="form-text">Veuillez entrer l'URL de l'image</div>
            <?php if (isset($data) && !empty($data["errorImage"])) { ?>
                <p id="message"><?php echo ($data["errorImage"])  ?></p>
            <?php } ?>
        </div>
        <div class="mb-4">
            <label for="category_description" class="form-label">Description de la catégorie<span> *</span></label>
            <textarea maxlength="100" rows="4" value="" type="text" class="form-control" id="category_description" name="category_description" aria-describedby="descriptionHelp" required></textarea>
            <div id="descriptionHelp" class="form-text">100 caractères maximum</div>
        </div>
        <p id="mandatory"><span> *</span> : Champs obligatoires</p>
        <button type="submit" class="form_btn btn btn-primary">Ajouter</button>
    </form>

</section>
<?php require_once "./footer_backoffice.php"; ?>