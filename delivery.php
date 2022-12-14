<?php
require_once './includes/phpheaders.php';
require_once "./src/UserModel.php";
require_once './src/CartModel.php';
isLogged();
$cm = new CartModel();
$cart = $cm->getCart();
if (!$cart) {
    redirection("cart.php");
    exit; // 26/09
}
$userModel = new UserModel();
$user = $userModel->getUser();

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
            <a href="cart.php">
                <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-grey border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg font-semibold flex items-center mb-2">
                    <span class="text-center w-full">1</span>
                </div>
            </a>
            <p href="cart.php" class="text-xs md:text-sm xl:text-base text-center">Panier</p>
        </div>


        <div class="hidden w-1/6 align-center items-center align-middle content-center md:flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-orange border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg  font-semibold flex items-center mb-2">
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
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-grey border-darkgrey mx-auto rounded-full text-sm md:text-base font-semibold flex items-center mb-2">
                <span class="text-center w-full">4</span>
            </div>
            <p class="text-xs md:text-sm xl:text-base text-center">R??capitulatif</p>
        </div>

    </div>
    <!-- END OF PROGRESS BAR  -->
    <hr class="block mx-auto w-2/3 border-darkgrey border-t-0 border-b-2 mb-14 lg:mb-20 xl:mb-28" />
    <div class="container mx-auto bg-eggshell px-7 py-10 md:py-14 md:px-10 lg:px-12 lg:py-20 xl:py-28 xl:px-24">
        <p class="text-center font-semibold text-lg md:text-xl lg:text-2xl xl:text-3xl uppercase mb-10 md:mb-14 lg:mb-16 xl:mb-20 text-darkblue">Confirmez votre adresse de livraison</p>
        <div class="flex space-x-6">
            <div class="container  mx-auto w-[500px] bg-white py-5 px-3 xl:py-7 flex flex-col content-center items-center space-y-3">
                <p class="text-base md:text-lg xl:text-xl text-center">Livraison ?? votre domicile au :</p>
                <p class="text-sm md:text-base xl:text-lg font-bold"><?= $user["address"]. ", " . $user["postal_code"] . " " . $user["city"] ?></p>
                <a href="modify_profile.php?id=fromdelivery" class="hover-text-orange  underline text-md tracking-wide">
                    <p class="text-sm md:text-base xl:text-lg text-center">Modifier l'adresse</p>
                </a>
            </div>
        </div>
        <div class=" bg-orange hover-bg-darkgrey w-fit rounded-full py-1 px-4 xl:py-2 xl:px-6 block m-auto shadow-lg mt-14">
            <a href="payment.php" class="font-semibold text-white text-base md:text-lg lg:text-xl tracking-wide">Valider</a>
        </div>
    </div>

</section>


<?php require_once './includes/footer.php'; ?>