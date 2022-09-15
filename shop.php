<?php
require_once './includes/header.php';
// dump($_POST);
$title = 'Boutique';
$subTitle = 'Ceci est la page boutique';
require_once './includes/title.php';
// Include des classes
require_once './src/CategoryModel.php';
require_once './src/ProductModel.php';

// Instanciation
$categorymodel = new CategoryModel();
$productmodel = new ProductModel();
$categories = $categorymodel->getAllCategories();
$results = $productmodel->getProductsByKeyword();
// dd($results);
?>

<!-- Contenu de la page -->
<section class="p-20">
    <div class="container p-10">
        <h2 class="text-4xl font-semibold mb-16 uppercase text-darkblue text-center "> Rechercher un produit</h2>
        <div class="flex space-x-10">
            <form action="" class="flex justify-start space-x-6" method="POST">
                <div class="">
                    <input value="" class="border rounded-lg border-darkgrey py-2 px-4 w-full outline-orange shadow-lg" placeholder="Rechercher par mot-clé" type="text" name="keyword" id="keyword" required>
                </div>
                <input type="submit" name="keyword_form" value="Rechercher" class="font-semibold text-base uppercase tracking-wider hover-text-orange">
                </input>
            </form>
            <p class="font-semibold text-2xl text-orange">ou</p>
            <form action="" class="flex justify-start space-x-6" method="POST">
                <div class="">
                    <select value="" class="border rounded-lg border-darkgrey py-2 px-4 w-full outline-orange shadow-lg bg-white" name="searchByStore" id="searchByStore" onchange="this.form.submit()" required>
                        <option class="" value="">-- Sélectionner un magasin --</option>
                        <option class="" value="1">Okaz - Villeneuve-le-Roi</option>
                        <option class="" value="2">Okaz - Evry</option>
                        <option class="" value="3">Okaz - Coignières</option>
                        <option class="" value="4">Okaz - Orléans</option>
                        <option class="" value="5">Okaz - Bordeaux</option>
                        <option class="" value="6">Okaz - Dunkerque</option>
                        <option class="" value="7">Okaz - Strasbourg</option>
                        <option class="" value="8">Okaz - Nantes</option>
                        <option class="" value="9">Okaz - Aix-en-Provence</option>
                    </select>
                </div>
                </button>
            </form>
        </div>

        <p class="font-semibold text-xl mt-10">Filtrer par prix</p>
        <form action="" class="flex justify-start space-x-6 mt-6" method="POST">
            <div class="">
                <input value="" class="border rounded-lg border-darkgrey py-2 px-4 outline-orange shadow-lg" placeholder="Prix MIN" type="text" name="min_price" id="min_price" required>
            </div>
            <div class="">
                <input value="" class="border rounded-lg border-darkgrey py-2 px-4 outline-orange shadow-lg" placeholder="Prix MAX" type="text" name="max_price" id="max_price" required>
            </div>
            <input type="submit" name="price_form" value="Filtrer" class="font-semibold text-base uppercase tracking-wider hover-text-orange">
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
    <!-- </section> -->

    <!-- <section class="p-20"> -->
    <?php if ($_SERVER['REQUEST_METHOD'] === "POST") { ?>
        <?php if (!$results && empty($results["errorPriceMin"]) && empty($results["errorPriceMax"])) { ?>
            <!-- <div class="container mx-auto mt-16"> -->
            <h2 class="uppercase text-darkblue font-semibold text-4xl text-center my-16">Résultats de la recherche</h2>
            <h2 class="font-semibold text-3xl text-center">Votre recherche n'a retourné aucun résultat.</h2>
        <?php } else if ($results && empty($results["errorPriceMin"]) && empty($results["errorPriceMax"])) { ?>
            <h2 class="uppercase text-darkblue font-semibold text-4xl text-center my-16">Résultats de la recherche</h2>
            <main class="mb-20">
                <section class="container mx-auto px-10">
                    <div class=" grid grid-cols-4 gap-x-10 gap-y-16">
                        <?php foreach ($results as $product) { ?>
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
            <!-- </div> -->
        <?php } ?>
    <?php } else { ?>
        <div class="container mx-auto mt-16">
            <h2 class="uppercase text-darkblue font-semibold text-4xl text-center mb-10">Découvrez nos produits classés par catégories</h2>
            <div class="container mx-auto p-28 grid grid-cols-2 gap-12">
                <?php foreach ($categories as $category) { ?>
                    <div class="flex space-x-10">
                        <img class="h-[170px] min-w-[200px] w-[200px]" src="<?= $category->getImage_category() ?>" alt="<?= $category->getName_category() ?>">
                        <div class="flex flex-col space-y-3">
                            <a href="categories.php?id=<?= $category->getId() ?>" class="text-2xl uppercase text-orange font-semibold"><?= $category->getName_category() ?></a>
                            <hr class="border-darkgrey border-t-0 border-b-2 mb-32" />
                            <p class=""><?= $category->getDescription_category() ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</section>
<?php require_once './includes/footer.php'; ?>