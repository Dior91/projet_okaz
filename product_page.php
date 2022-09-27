<?php
require_once './includes/phpheaders.php';
require_once './src/ProductModel.php';
require_once './src/StoreModel.php';
require_once './src/CartModel.php';
$productmodel = new ProductModel();
$cartmodel = new CartModel();
$product = $productmodel->getOneProduct();
$storemodel = new StoreModel();
$store = $storemodel->getStoreByProduct();
$error = $cartmodel->addToCart($product->getId());
$sameCategoryProducts = $productmodel->getProductsOfSameCategory();
require_once './includes/header.php';
?>

<!-- Contenu de la page -->
<section class="mb-auto container mx-auto py-10 px-8 md:p-16 lg:p-20 xl:py-26 xl:px-48">

    <!-- Présentation produit -->
    <div class="lg:mb-10">
        <div class="flex flex-col justify-center space-y-10 mb-10 md:mb-16">
            <h2 class="text-center text-xl md:text-2xl md:leading-snug lg:text-3xl text-darkblue font-semibold uppercase"><?= $product->getName() ?></h2>
            <?php if (isset($error) && !empty($error["errorProduct_exist"])) { ?>
                <p class="text-red-500 text-center text-xl"><?= $error["errorProduct_exist"] ?></p>
            <?php }  ?>
        </div>
        <img class="h-[200px] w-[350px] md:h-[250px] md:w-[400px] xl:h-[300px] xl:w-[450px] block m-auto" src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
        <hr class="block mx-auto border-darkgrey border-t-0 border-b-2 my-14" />
        <!-- Description produit -->
        <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 justify-between mb-16">
            <div class="flex flex-col items-start lg:w-2/3">
                <!-- Description -->
                <p class="mb-10 text-base md:text-lg"><span class="font-bold text-lg md:text-xl mb-2">Description : </span><br /><?= $product->getDescription() ?></p>
                <p class="text-base md:text-lg"> <span class="font-bold">Etat : </span><?= $product->getProduct_condition() ?></p>
                <p class="text-base md:text-lg"> <span class="font-bold">Dimensions : </span><?= $product->getDimensions() ?></p>
                <p class="text-base md:text-lg"> <span class="font-bold">Couleur : </span><?= $product->getColor() ?></p>
            </div>
            <p class="text-left text-orange text-2xl md:text-3xl font-bold"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€</p>
        </div>

        <div class="flex flex-col lg:flex-row space-y-0 lg:space-x-10 justify-center ">
            <form action="" method="POST">
                <div class=" bg-orange hover-bg-darkgrey w-fit rounded-full py-2 px-6 mb-6 block m-auto">
                    <button class="text-white text-center text-lg font-semibold tracking-wide">Ajouter au panier</button>
                </div>
            </form>
            <a id="storeLink" href="#" data-bs-toggle="modal">
                <div class=" bg-blue hover-bg-darkgrey w-fit rounded-full py-2 px-4 mb-14 block m-auto">
                    <button href="#" class="text-white text-center text-lg font-semibold tracking-wide">Acheter en magasin</button>
                </div>
            </a>
        </div>
        <hr class="block mx-auto border-darkgrey border-t-0 border-b-2 mb-10" />
    </div>

    <?php if ($sameCategoryProducts) { ?>
        <h3 class="text-xl md:text-2xl lg:text-3xl font-semibold text-darkblue mb-10 text-center uppercase">Dans la même catégorie</h3>
        <div class="container mx-auto flex flex-col items-center space-y-6">
            <div class="flex  justify-between mx-auto items-center space-x-6 lg:space-x-10 xl:space-x-14">

                <button id="buttonprev" onclick="moveSlide(-1)" class="">
                    <i class="fas fa-regular fa-angle-left text-orange hover-text-darkgrey text-3xl md:text-4xl lg:text-5xl xl:text-6xl"></i>
                </button>

                <!-- <div class="flex space-x-3 mx-auto items-center w-[220px]"> -->
                <?php foreach ($sameCategoryProducts as $sameProduct) { ?>
                    <div class="slide w-[220px] md:w-[250px] lg:w-[280px] xl:w-[300px]">
                        <img class="w-full h-[150px] md:h-[180px] lg:h-[210px] xl:h-[230px]" src="<?= $sameProduct->getImage() ?>">
                        <a class="" href="product_page.php?id=<?= $sameProduct->getId() ?>">
                            <div class="w-full px-5 py-3 bg-eggshell hover-bg-grey">
                                <p class=" font-semibold truncate text-center lg:text-lg"><?= $sameProduct->getName() ?></p>
                                <p class=" font-semibold text-center lg:text-lg"><?= number_format($sameProduct->getPrice(), 2, ',', ' '); ?>€</p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <!-- </div> -->

                <button id="buttonnext" onclick="moveSlide(1)" class="">
                    <i class="fas fa-regular fa-angle-right text-orange hover-text-darkgrey text-3xl md:text-4xl lg:text-5xl xl:text-6xl"></i>
                </button>
            </div>
            <!-- The dots -->
            <div class="flex justify-center items-center space-x-5">
                <?php for ($i = 0; $i < count($sameCategoryProducts); $i++) {
                ?>
                    <div class="dot w-3 h-3 md:w-4 md:h-4 rounded-full cursor-pointer" onclick="currentSlide(<?= $i + 1 ?>)"></div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</section>


<!-- Modale produit disponible dans magasin -->
<section id="storeModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative container mx-auto top-28 w-3/4 lg:w-2/3 xl:w-1/2 p-5 lg:p-8 xl:p-10 bg-white">
        <button class="rounded py-0 px-1 md:px-2 bg-blue hover-bg-darkgrey float-right">
            <i id="closeStoreModal" class="fa-solid fa-xmark text-lg lg:text-xl xl:text-2xl"></i>
        </button>
        <h3 class="text-darkblue text-base md:text-lg lg:text-xl xl:text-2xl text-center mb-10"> Votre produit : <span class="font-semibold">"<?= $store["name"] ?>"</span> <br /> est disponible dans votre magasin :</h3>
        <div class="flex flex-col gap-y-4">
            <h3 class="text-orange text-lg md:text-xl lg:text-2xl font-semibold uppercase"><?= $store["store_name"] ?></h3>
            <p class="text-sm lg:text-base xl:text-lg"> <span class="font-bold">Adresse : </span><?= $store["store_address"] . ", " . $store["store_postal_code"] . " " . $store["store_city"] ?></p>
            <p class="text-sm lg:text-base xl:text-lg"> <span class="font-bold">Téléphone : </span><?= $store["store_telephone"] ?></p>
            <p class="text-sm lg:text-base xl:text-lg"> <span class="font-bold">Horaires d'ouverture : </span>
                <br />Du Lundi au Vendredi : de 10h à 18h
                <br />Samedi : de 9h30 à 19h
                <br />Dimanche : Fermé
            </p>
        </div>
        <!-- </div> -->
    </div>
</section>
<script src="./JS/product_page.js"></script>

<?php require_once './includes/footer.php'; ?>