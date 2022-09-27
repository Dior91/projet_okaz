<?php
require_once './includes/phpheaders.php';
require_once './src/CategoryModel.php';
require_once './src/ProductModel.php';
$categorymodel = new CategoryModel();
$productmodel = new ProductModel();
$categoryInfo = $categorymodel->getOneCategory();
$title = $categoryInfo->getName_category();
$subTitle = $categoryInfo->getDescription_category();
require_once './includes/header.php';
require_once './includes/title.php';

$products = $productmodel->getProductsByCategory();
?>

<!-- FIN SECTION TITRE -->

<!-- ------- SECTION PRODUITS --------------- -->
<section class="mb-auto px-16 py-20 md:px-28 md:py-28 lg:px-20 xl:px-24 container mx-auto ">
    <?php if (!$products) { ?>
        <p class="text-darkblue font-semibold text-xl sm:text-2xl lg:text-2xl xl:text-3xl text-center">Cette catégorie ne contient aucun produit pour le moment.</p>
    <?php } else { ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 sm:gap-x-10 md:gap-x-16 lg:gap-x-10 lg:gap-y-16 xl:gap-x-8">
            <?php foreach ($products as $product) { ?>
                <article class="py-4 px-1 lg:px-4 xl:py-6 flex flex-col items-center bg-eggshell rounded-xl">
                    <figure class="flex flex-col items-center mb-4 space-y-6">
                        <img class="h-[150px] w-[180px] lg:h-[200px] lg:w-[250px] " src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                        <figcaption class="block w-[200px] sm:w-[180px] md:w-[200px]">
                            <h3 class="text-center text-base lg:text-lg xl:text-xl font-semibold truncate"><?= $product->getName() ?></h3>
                            <p class="text-center text-lg lg:text-xl xl:text-2xl font-bold"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€</p>
                        </figcaption>
                    </figure>
                    <div class="py-1 px-4 rounded-full bg-orange hover-bg-blue">
                        <a href="product_page.php?id=<?= $product->getId() ?>" class="text-center text-white font-semibold text-sm lg:text-base xl:text-lg">
                            <i class="fas fa-regular fa-eye mr-2 text-sm lg:text-base xl:text-lg"></i>Voir le produit
                        </a>
                    </div>
                </article>
            <?php } ?>
        </div>
    <?php } ?>
</section>
<!-- <script>
    let products=<?php // echo json_encode($products);?>
</script> -->
<!-- ----- footer ----- -->
<?php require_once './includes/footer.php'; ?>