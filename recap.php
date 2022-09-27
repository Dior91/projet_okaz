<?php
require_once './includes/phpheaders.php';
isLogged();

require_once './src/CartModel.php';
require_once "./src/UserModel.php";
require_once './src/OrderModel.php';
$userModel = new UserModel();
$cm = new CartModel();
$ordermodel = new OrderModel();
$user = $userModel->getUser();
$cart = $cm->getCart();
// if (!$cart) {
//     redirection("recap.php");
// }
$orderInfo = $ordermodel->getOrderInfo();
$data = $ordermodel->getOrderInfoByCart();

require_once './includes/header.php';
$title = 'Je passe commande';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<section class="mb-auto container mx-auto px-8 py-10 md:px-14 md:py-16 lg:px-20 lg:py-24 xl:py-36 xl:px-44">

    <!-- Progress bar  -->
    <div class="flex mb-14 lg:mb-20 xl:mb-28">

        <div class="flex-1 content-center">
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-grey border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg font-semibold flex items-center mb-2">
                <span class="text-center w-full">1</span>
            </div>
            <p class="text-xs md:text-sm xl:text-base text-center">Panier</p>
        </div>


        <div class="hidden w-1/6 align-center items-center align-middle content-center md:flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-grey border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg  font-semibold flex items-center mb-2">
                <span class="text-center w-full">2</span>
            </div>
            <p class="text-xs md:text-sm xl:text-base text-center">Livraison</p>
        </div>

        <div class="hidden w-1/6 align-center items-center align-middle content-center md:flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>

        <div class="flex-1">
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-grey border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg  font-semibold flex items-center mb-2">
                <span class="text-center w-full">3</span>
            </div>
            <p class="text-xs md:text-sm xl:text-base text-center">Paiement</p>
        </div>


        <div class="hidden w-1/6 align-center items-center align-middle content-center md:flex">
            <div class="w-full bg-grey-light rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-orange border-darkgrey mx-auto rounded-full text-sm md:text-base font-semibold flex items-center mb-2">
                <span class="text-center w-full">4</span>
            </div>
            <p class="text-xs md:text-sm xl:text-base text-center">Récapitulatif</p>
        </div>

    </div>
    <!-- END OF PROGRESS BAR  -->
    <hr class="block mx-auto w-2/3 border-darkgrey border-t-0 border-b-2 mb-14 lg:mb-20 xl:mb-28" />
    <div class="container mx-auto bg-eggshell px-6 py-10 md:py-14 md:px-5 lg:px-8 lg:py-20 xl:py-28 xl:px-24">
        <p class="text-center font-semibold text-xl md:text-2xl lg:text-3xl uppercase mb-10 md:mb-14 lg:mb-24 text-darkblue">Récapitulatif de votre commande</p>

        <div class="bg-white py-5 px-2 md:py-10 md:px-6 lg:py-12 lg:px-8">
            <?php foreach ($cart as $product) { ?>
                <div class="flex flex-col md:flex-row justify-center items-center md:justify-start md:items-start space-y-4 md:space-y-0 md:space-x-6 mb-5 lg:mb-8 md:px-5">
                    <img class="h-[120px] w-[150px] lg:h-[170px] lg:w-[200px]" src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                    <div class="flex flex-col justify-center items-center md:justify-start md:items-start space-y-1">
                        <h3 class="text-lg lg:text-xl xl:text-2xl leading-tight font-semibold text-center md:text-left"><?= $product->getName() ?></h3>
                        <h3 class="font-normal text-base lg:text-lg xl:text-xl"><?= $product->getDimensions() ?></h3>
                        <h3 class="text-lg lg:text-xl xl:text-2xl"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€ TTC</h3>
                    </div>
                </div>
                <hr class="block mx-auto w-2/3 border-darkgrey border-t-0 border-b-2 m-6 lg:mb-20 xl:mb-28 md:hidden" />
            <?php } ?>

            <div class=" grid p-5 gap-10">
                <h4 class="text-lg md:text-xl lg:text-2xl md:text-right "> <span class="font-bold">Total : </span> <?= number_format($orderInfo["payment_amount"], 2, ',', ' ') ?>€ TTC</h4>
                <h4 class="text-base md:text-lg text-left"> <span class="text-lg md:text-xl font-bold">Moyen de paiement : </span> <br />
                    Carte N° <?= $data["payment_type"] ?>
                </h4>
                <div class="grid gap-y-1">
                    <h4 class="text-lg md:text-xl text-left"> <span class="font-bold">Livraison à domicile : </span> </h4>
                    <p class="text-base md:text-lg"> <span class="font-bold">Adresse : </span><?= $user["address"] . ", " . $user["postal_code"] . " " . $user["city"] ?></p>
                </div>
            </div>
            <p class="text-center text-lg md:text-xl lg:text-2xl xl:text-3xl uppercase mt-14 text-darkblue">Merci pour votre commande</p>
        </div>
    </div>


</section>
<?php
$ordermodel->transferCartToOrder();
require_once './includes/footer.php'; ?>