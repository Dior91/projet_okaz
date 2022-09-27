<?php require_once "./header_backoffice.php";
require_once dirname(__DIR__) . "/src/ProductModel.php";
$productmodel = new ProductModel();
$products = $productmodel->getAllProducts();

?>
<section class="page_main">
    <h2>Modifier un produit</h2>
    <div class="products">
        <?php foreach ($products as $product) { ?>
            <article class="card" style="width: 18rem;">
                <img src="<?= $product->getImage(); ?>" class="card-img-top" alt="<?= $product->getName(); ?>">
                <div class="card-body">
                    <h5 class="card-title-first"><?= $product->getName(); ?></h5>
                    <a href="modify_product_form.php?id=<?= $product->getId(); ?>" class="modify_btn btn btn-primary">Modifier</a>
                </div>
            </article>
        <?php } ?>
    </div>
</section>
<?php require_once "./footer_backoffice.php"; ?>