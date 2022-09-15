<?php
require_once './includes/header.php';
isLogged();
require_once './src/CartModel.php';
$cm = new CartModel();

$cart = $cm->getCart();
$productNumber = $cm->getProductNumberByCart();
$total = $cm->getFullPrice($cart);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cm->removeFromCart($_GET['product_id']);
}

$title = 'Je passe commande';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<section class="container mx-auto py-32 px-48">

    <!-- Progress bar  -->
    <div class="flex mb-32">

        <div class="flex-1 content-center">
            <div class="w-10 h-10 bg-orange border-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
                <span class="text-center w-full">1</span>
            </div>
            <p class="text-sm text-center">Panier</p>
        </div>


        <div class="w-1/6 align-center items-center align-middle content-center flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <div class="w-10 h-10 bg-grey border-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
                <span class="text-center w-full">2</span>
            </div>
            <p class="text-sm text-center">Livraison</p>
        </div>

        <div class="w-1/6 align-center items-center align-middle content-center flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>

        <div class="flex-1">
            <div class="w-10 h-10 bg-grey border-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
                <span class="text-center w-full">3</span>
            </div>
            <p class="text-sm text-center">Paiement</p>
        </div>


        <div class="w-1/6 align-center items-center align-middle content-center flex">
            <div class="w-full bg-grey-light rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <div class="w-10 h-10 bg-grey border-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
                <span class="text-center w-full">4</span>
            </div>
            <p class="text-sm text-center">Récapitulatif</p>
        </div>

    </div>
    <!-- END OF PROGRESS BAR  -->
    <hr class="block mx-auto w-2/3 border-darkgrey border-t-0 border-b-2 mb-32" />
    <div class="container mx-auto bg-eggshell px-16 py-20">
        <?php if (empty($cart) || !empty($productNumber["errorNoCart"])) { ?>
            <div class="flex flex-col justify-center">
                <p class="text-center font-semibold text-3xl uppercase mb-20 text-darkblue">Votre panier est vide</p>
                <div class="block m-auto">
                    <a href="shop.php" class="py-3 px-8 rounded-lg bg-orange hover-bg-darkgrey text-white font-semibold text-lg uppercase">
                        Commencer mes achats <i class="fas fa-regular fa-cart-plus text-white ml-2 fa-xl"></i>
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <?php if ($productNumber["product_number"] === "1") { ?>
            <p class="text-center font-semibold text-3xl uppercase mb-20 text-darkblue">Votre panier a <?= $productNumber["product_number"] ?> article</p>
            <?php } else { ?>
            <p class="text-center font-semibold text-3xl uppercase mb-20 text-darkblue">Votre panier a <?= $productNumber["product_number"] ?> articles</p>
            <?php } ?>
            <?php foreach ($cart as $product) { ?>
                <div class="flex space-x-10 bg-white p-5">
                    <a href="product_page.php?id=<?= $product->getId() ?>">
                        <img class=" h-[170px] w-[200px]" src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                    </a>
                    <div class="flex flex-col space-y-3">
                        <a href="product_page.php?id=<?= $product->getId() ?>">
                            <h3 class="text-2xl font-semibold"><?= $product->getName() ?></h3>
                        </a>
                        <h3 class="font-normal text-xl"><?= $product->getDimensions() ?></h3>
                        <h3 class="text-xl"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€ TTC</h3>
                        <form action="cart.php?product_id=<?= $product->getId() ?>" method="POST">
                            <button class="hover-text-orange underline">Retirer du panier</button>
                        </form>
                    </div>
                </div>
            <?php } ?>

            <div class="flex flex-col justify-end space-y-6 mt-10">
                <h4 class="text-2xl uppercase text-center"> <span class="font-bold">Total : </span> <?= $total ?>€ TTC</h4>
                <a href="shop.php" class="text-center uppercase text-xl font-semibold tracking-wider hover-text-orange">Continuer mes achats</a>
                <div class=" bg-orange hover-bg-darkgrey w-fit rounded-full py-2 px-8 block m-auto">
                    <a href="delivery.php" class="text-white text-lg font-semibold tracking-wider">Valider le panier</a>
                </div>
            </div>
        <?php } ?>
    </div>

</section>

<?php require_once './includes/footer.php'; ?>