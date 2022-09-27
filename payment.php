<?php
require_once './includes/phpheaders.php';
isLogged();
require_once './src/CartModel.php';
require_once './src/OrderModel.php';
$cm = new CartModel();
$cart = $cm->getCart();
if (!$cart) {
    redirection("cart.php");
}
$ordermodel = new OrderModel();
$error = $ordermodel->insertOrderInfo();

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
            <p class="text-xs md:text-sm xl:text-base text-center">Panier</p>
        </div>


        <div class="hidden w-1/6 align-center items-center align-middle content-center md:flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <a href="delivery.php">
                <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-grey border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg  font-semibold flex items-center mb-2">
                    <span class="text-center w-full">2</span>
                </div>
            </a>

            <p class="text-xs md:text-sm xl:text-base text-center">Livraison</p>
        </div>

        <div class="hidden w-1/6 align-center items-center align-middle content-center md:flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-grey text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>

        <div class="flex-1">
            <div class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 bg-orange border-darkgrey mx-auto rounded-full text-sm md:text-base lg:text-lg  font-semibold flex items-center mb-2">
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
            <p class="text-xs md:text-sm xl:text-base text-center">Récapitulatif</p>
        </div>

    </div>
    <!-- END OF PROGRESS BAR  -->
    <hr class="block mx-auto w-2/3 border-darkgrey border-t-0 border-b-2 mb-14 lg:mb-20 xl:mb-28" />
    <div class="container mx-auto bg-eggshell px-10 py-10 md:py-14 md:px-24 lg:px-36 lg:py-20 xl:py-28 xl:px-48">
        <p class="text-center font-semibold text-xl md:text-2xl lg:text-3xl uppercase mb-10 md:mb-14 lg:mb-24 text-darkblue">Paiement de votre commande</p>

        <form action="" class="" method="POST">
            <div class="mb-4 lg:mb-8">
                <label class="block mb-2 text-base lg:text-lg" for="card_number">N° de carte bancaire</label>
                <input value="" minlength="16" maxlength="16" class="text-sm lg:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="N° de carte bancaire" type="text" name="card_number" id="card_number" required>
                <?php if (isset($error) && !empty($error["errorCardNumber"])) { ?>
                    <p class="text-red-400"><?= $error["errorCardNumber"] ?></p>
                <?php } ?>
            </div>

            <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 md:space-x-16">
                <div class="">
                    <label class="block mb-2 text-base lg:text-lg" for="expiration_date">Date d'expiration</label>
                    <div class="flex justify-center items-center space-x-2">
                        <select class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg text-sm" name="expiration_month" id="expiration_month" required>
                            <option value="">--MM--</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <p class="text-lg">/</p>
                        <select class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg text-sm" name="expiration_year" id="expiration_year" required>
                            <option value="">--AA--</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <!-- <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="MM/AA" type="text" name="expiration_date" id="expiration_date" required> -->
                    <?php if (isset($error) && !empty($error["errorExpirationDate"])) { ?>
                        <p class="text-red-400 text-center"><?= $error["errorExpirationDate"] ?></p>
                    <?php } ?>
                </div>
                <div class="">
                    <label class="block mb-2 text-base lg:text-lg" for="cvv_code">Code CVV</label>
                    <input minlength="3" maxlength="3" class="text-sm lg:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Code CVV" type="text" name="cvv_code" id="cvv_code" required>
                    <?php if (isset($error) && !empty($error["errorCVV"])) { ?>
                        <p class="text-red-400 text-center"><?= $error["errorCVV"] ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="flex justify-center mt-14 md:mt-20">
                <button class="text-sm lg:text-base  xl:text-lg shadow-lg rounded-full py-2 px-6 xl:px-8 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wide">Valider
                </button>
            </div>
        </form>
    </div>


</section>

<?php require_once './includes/footer.php'; ?>