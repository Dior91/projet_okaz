<?php
require_once './includes/header.php';
require_once './src/CategoryModel.php';
require_once './src/ProductModel.php';
$categorymodel = new CategoryModel();
$productmodel = new ProductModel();
$categoryInfo = $categorymodel->getOneCategory();
$title = $categoryInfo->getName_category();
$subTitle = $categoryInfo->getDescription_category();
require_once './includes/title.php';

$products = $productmodel->getProductsByCategory();
?>

<!-- FIN SECTION TITRE -->

<!-- ------- SECTION PRODUITS --------------- -->
<main class="p-20 my-20">
    <section class="container mx-auto px-10">
        <div class=" grid grid-cols-4 gap-x-10 gap-y-16">
            <?php foreach ($products as $product) { ?>
                <article class="py-6 px-4 flex flex-col items-center bg-eggshell rounded-xl">
                    <figure class="flex flex-col items-center mb-4 space-y-6">
                        <img class="h-[200px] w-[250px]" src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                        <figcaption class="block w-[250px]">
                            <h3 class="text-center text-xl font-semibold truncate"><?= $product->getName() ?></h3>
                            <p class="text-center text-2xl font-bold"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€</p>
                        </figcaption>
                    </figure>
                    <div class="py-1 px-4 rounded-full bg-orange hover-bg-blue">
                        <a href="product_page.php?id=<?= $product->getId() ?>" class="text-center text-white font-semibold text-lg">
                            <i class="fas fa-regular fa-eye mr-2"></i>Voir le produit
                        </a>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>
</main>

<!-- ----- footer ----- -->
<?php require_once './includes/footer.php'; ?>