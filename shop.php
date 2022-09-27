<?php
// dump($_POST);
require_once './includes/phpheaders.php';
$title = 'Boutique';
$subTitle = 'Ceci est la page boutique';
// Include des classes
require_once './src/CategoryModel.php';
require_once './src/ProductModel.php';
require_once './src/StoreModel.php';

// Instanciation
$categorymodel = new CategoryModel();
$productmodel = new ProductModel();
$storemodel = new StoreModel();
$categories = $categorymodel->getAllCategories();
$results = $productmodel->getProductsBySearch();
$stores = $storemodel->getAllStores();
require_once './includes/header.php';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<section class="mb-auto px-8 py-10 lg:p-20">
    <div class="container mx-auto">
        <h2 class="text-xl sm:text-2xl font-semibold mb-10 uppercase text-darkblue text-center lg:text-left "> Rechercher un produit</h2>
        <div class="flex flex-col lg:flex-row space-y-3  lg:space-y-0 lg:space-x-10 justify-center items-center lg:justify-start">
            <form action="" class="flex flex-col lg:flex-row space-y-2 lg:space-x-6" method="POST">
                <div class="">
                    <input value="" class="border rounded-lg border-darkgrey py-2 px-4 outline-orange shadow-lg text-sm sm:text-base" placeholder="Rechercher par mot-clé" type="text" name="keyword" id="keyword" required>
                </div>
                <input type="submit" name="keyword_form" value="Rechercher" class="font-semibold text-sm sm:text-base uppercase tracking-wider hover-text-orange ">
                </input>
            </form>
            <p class="font-semibold text-xl sm:text-2xl text-orange text-center">OU</p>
            <form action="" class="" method="POST">
                <div class="">
                    <select value="" class="text-sm sm:text-base border rounded-lg border-darkgrey py-2 px-4  outline-orange shadow-lg bg-white" name="searchByStore" id="searchByStore" onchange="this.form.submit()" required>
                        <option class="" value="">-- Sélectionner un magasin --</option>
                        <?php foreach ($stores as $one_store) { ?>
                            <option class="capitalize" value="<?= $one_store->getId(); ?>"><?= $one_store->getStore_Name(); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </form>
        </div>

        <p class="font-semibold text-center lg:text-left text-xl mt-10 mb-5">Filtrer par prix</p>
        <form action="" class="flex flex-col lg:flex-row justify-center items-center lg:justify-start space-y-4 lg:space-y-0 lg:space-x-6 lg:mt-6" method="POST">
            <div class="">
                <input value="" class="text-sm sm:text-base border rounded-lg border-darkgrey py-2 px-4 outline-orange shadow-lg" placeholder="Prix MIN (en €)" type="text" name="min_price" id="min_price" required>
            </div>
            <div class="">
                <input value="" class="text-sm sm:text-base border rounded-lg border-darkgrey py-2 px-4 outline-orange shadow-lg" placeholder="Prix MAX (en €)" type="text" name="max_price" id="max_price" required>
            </div>
            <input type="submit" name="price_form" value="Filtrer" class="font-semibold text-sm sm:text-base uppercase tracking-wider hover-text-orange">
            </input>
        </form>
        <?php if (isset($results) && !empty($results["errorPriceMin"])) { ?>
            <p class="text-red-500 text-sm mt-2"><?php echo ($results["errorPriceMin"])  ?></p>
        <?php } ?>
        <?php if (isset($results) && !empty($results["errorPriceMax"])) { ?>
            <p class="text-red-500 text-sm mt-2"><?php echo ($results["errorPriceMax"])  ?></p>
        <?php } ?>
    </div>
    <hr class="block mx-auto  border-darkgrey border-t-0 border-b-2 mt-10" />
</section>
<!-- </section> -->

<!-- <section class="p-20"> -->
<section class="mb-auto px-5 py-14 sm:px-20 lg:px-14">
    <div class="container mx-auto">
        <?php if ($_SERVER['REQUEST_METHOD'] === "POST") { ?>
            <?php if (!$results && empty($results["errorPriceMin"]) && empty($results["errorPriceMax"])) { ?>
                <!-- <div class="container mx-auto mt-16"> -->
                <h2 class="uppercase text-darkblue font-semibold text-xl sm:text-2xl lg:text-3xl xl:text-4xl text-center mb-16">Résultats de la recherche</h2>
                <h2 class="font-semibold text-xl sm:text-2xl lg:text-2xl xl:text-3xl text-center">Votre recherche n'a retourné aucun résultat.</h2>
            <?php } else if ($results && empty($results["errorPriceMin"]) && empty($results["errorPriceMax"])) { ?>
                <h2 class="uppercase text-darkblue font-semibold text-xl sm:text-2xl lg:text-3xl xl:text-4xl text-center mb-16">Résultats de la recherche</h2>
                <main class="mb-20 px-10 sm:px-5 md:px-10 xl:px-14">
                    <!-- <div class="container mx-auto px-10"> -->
                    <div class=" grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 sm:gap-x-10 md:gap-x-16 lg:gap-x-10 lg:gap-y-16 xl:gap-x-8">
                        <?php foreach ($results as $product) { ?>
                            <article class="py-4 px-1 lg:px-4 xl:py-6 flex flex-col items-center bg-eggshell rounded-xl">
                                <figure class="flex flex-col items-center mb-4 space-y-6">
                                    <img class="h-[150px] w-[180px] lg:h-[200px] lg:w-[250px] " src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                                    <figcaption class="block w-[200px] sm:w-[180px] md:w-[200px]">
                                        <h3 class="text-center text-base lg:text-lg xl:text-xl font-semibold truncate"><?= $product->getName() ?></h3>
                                        <p class="text-center text-lg lg:text-xl xl:text-2xl font-bold"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€</p>
                                    </figcaption>
                                </figure>
                                <div class="py-1 px-3 rounded-full bg-orange hover-bg-blue">
                                    <a href="product_page.php?id=<?= $product->getId() ?>" class="text-center text-white font-semibold text-sm lg:text-base xl:text-lg">
                                        <i class="fas fa-regular fa-eye mr-2 text-sm lg:text-base xl:text-lg"></i>Voir le produit
                                    </a>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                    <!-- </div> -->
                </main>
                <!-- </div> -->
            <?php } ?>
        <?php } else { ?>
            <!-- <div class="container mx-auto mt-16"> -->
            <h2 class="uppercase text-darkblue font-semibold text-xl sm:text-2xl lg:text-3xl text-center mb-14 ">Découvrez nos produits classés par catégories</h2>
            <div class="container mx-auto md:px-14 lg:px-0 lg:py-10 xl:py-20 xl:px-32 grid grid-cols-1 lg:grid-cols-2 gap-10 sm:gap-14 xl:gap-16">
                <?php foreach ($categories as $category) { ?>
                    <div class="flex space-x-5 xl:space-x-10">
                        <img class="h-[100px] min-w-[130px] w-[130px] md:h-[130px] md:min-w-[160px] md:w-[160px] xl:h-[150px] xl:min-w-[200px] xl:w-[200px]" src="<?= $category->getImage_category() ?>" alt="<?= $category->getName_category() ?>">
                        <div class="flex flex-col space-y-3">
                            <a href="categories.php?id=<?= $category->getId() ?>" class="text-lg md:text-xl xl:text-2xl uppercase text-orange font-semibold"><?= $category->getName_category() ?></a>
                            <hr class="border-darkgrey border-t-0 border-b-2 mb-32" />
                            <p class="text-sm md:text-base xl:text-lg"><?= $category->getDescription_category() ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
    </div>
</section>
<?php require_once './includes/footer.php'; ?>