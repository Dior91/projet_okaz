<?php
require_once './includes/header.php';
// dd($_SESSION);
if ($_SESSION['okaz_logged_user']["orderComplete"] == 'yes') {
    $_SESSION['okaz_logged_user']["orderComplete"] = '';
    header("Location: index.php");
    exit;
}
isLogged();
require_once './src/OrderModel.php';
$ordermodel = new OrderModel();
$error = $ordermodel->insertOrderInfo();

$title = 'Je passe commande';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<section class="container mx-auto py-32 px-48">

    <!-- Progress bar  -->
    <div class="flex mb-32">

        <div class="flex-1 content-center">
            <a href="cart.php">
                <div class="w-10 h-10 bg-grey border-darkgrey mx-auto rounded-full text-lg font-semibold flex place-items-center mb-2">
                    <span class="text-center w-full">1</span>
                </div>
            </a>
            <p class="text-sm text-center">Panier</p>
        </div>


        <div class="w-1/6 align-center items-center align-middle content-center flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-orange text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <a href="delivery.php">
                <div class="w-10 h-10 bg-grey borde-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
                    <span class="text-center w-full">2</span>
                </div>
            </a>
            <p class="text-sm text-center">Livraison</p>
        </div>

        <div class="w-1/6 align-center items-center align-middle content-center flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-orange text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>

        <div class="flex-1">
            <div class="w-10 h-10 bg-orange border-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
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
        <p class="text-center text-3xl uppercase mb-20 text-darkblue font-semibold">Paiement de votre commande</p>

        <form action="" class="px-20" method="POST">
            <div class="mb-4">
                <label class="block mb-2 text-lg" for="card_number">N° de carte bancaire</label>
                <input value="" minlength="16" maxlength="16" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="N° de carte bancaire" type="text" name="card_number" id="card_number" required>
                <?php if (isset($error) && !empty($error["errorCardNumber"])) { ?>
                    <p class="text-red-400"><?= $error["errorCardNumber"] ?></p>
                <?php } ?>
            </div>

            <div class="flex space-x-10">
                <div class="">
                    <label class="block mb-2 text-lg" for="expiration_date">Date d'expiration</label>
                    <div class="flex justify-center items-center space-x-2">
                        <select class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" name="expiration_month" id="expiration_month" required>
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
                        <p class="text-xl">/</p>
                        <select class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" name="expiration_year" id="expiration_year" required>
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
                    <label class="block mb-2 text-lg" for="cvv_code">Code CVV</label>
                    <input minlength="3" maxlength="3" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Code CVV" type="text" name="cvv_code" id="cvv_code" required>
                    <?php if (isset($error) && !empty($error["errorCVV"])) { ?>
                        <p class="text-red-400 text-center"><?= $error["errorCVV"] ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="flex justify-center mt-14">
                <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">Valider
                </button>
            </div>
        </form>

        <!-- <div class=" bg-orange hover-bg-darkgrey w-fit rounded-full py-2 px-8 block m-auto mt-10 ">
            <a href="#" class="text-white text-lg font-semibold tracking-wider">Valider</a>
        </div> -->
    </div>


</section>

<?php require_once './includes/footer.php'; ?>