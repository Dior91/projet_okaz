<?php
require_once './includes/header.php';
if ($_SESSION['okaz_logged_user']["orderComplete"] == 'yes') {
    $_SESSION['okaz_logged_user']["orderComplete"] = '';
    header("Location: orders.php");
    exit;
}
require_once './src/CartModel.php';
require_once "./src/UserModel.php";
require_once './src/OrderModel.php';
isLogged();
$userModel = new UserModel();
$cm = new CartModel();
$ordermodel = new OrderModel();
$user = $userModel->getUser();
$cart = $cm->getCart();
// dd($order);
$orderInfo = $ordermodel->getOrderInfo();
$data = $ordermodel->getOrderInfoByCart();

$title = 'Je passe commande';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<section class="container mx-auto py-32 px-48">

    <!-- Progress bar  -->
    <div class="flex mb-32">

        <div class="flex-1 content-center">
            <div class="w-10 h-10 bg-grey border-darkgrey mx-auto rounded-full text-lg font-semibold flex place-items-center mb-2">
                <!-- <i class="fas fa-regular fa-check"></i> -->
                <span class="text-center w-full">1</span>
            </div>
            <p class="text-sm text-center">Panier</p>
        </div>


        <div class="w-1/6 align-center items-center align-middle content-center flex">
            <div class="w-full bg-grey rounded items-center align-middle align-center flex-1">
                <div class="bg-orange text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
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
                <div class="bg-orange text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
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
                <div class="bg-orange text-xs leading-none py-1 text-center text-grey-darkest rounded " style="width: 100%"></div>
            </div>
        </div>


        <div class="flex-1">
            <div class="w-10 h-10 bg-orange border-darkgrey mx-auto rounded-full text-lg font-semibold flex items-center mb-2">
                <span class="text-center w-full">4</span>
            </div>
            <p class="text-sm text-center">Récapitulatif</p>
        </div>

    </div>
    <!-- END OF PROGRESS BAR  -->
    <hr class="block mx-auto w-2/3 border-darkgrey border-t-0 border-b-2 mb-32" />
    <div class="container mx-auto bg-eggshell px-16 py-20">
        <p class="text-center text-3xl uppercase mb-20 text-darkblue font-semibold">Récapitulatif de votre commande</p>

        <div class="bg-white p-10">
            <?php foreach ($cart as $product) { ?>
                <div class="flex space-x-10 bg-white p-5">
                    <img class=" h-[170px] w-[200px]" src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                    <div class="flex flex-col space-y-3">
                        <h3 class="text-2xl font-semibold"><?= $product->getName() ?></h3>
                        <h3 class="font-normal text-xl"><?= $product->getDimensions() ?></h3>
                        <h3 class="text-xl"><?= number_format($product->getPrice(), 2, ',', ' '); ?>€ TTC</h3>
                    </div>
                </div>
            <?php } ?>

            <div class=" grid p-5 gap-10">
                <h4 class="text-2xl text-right"> <span class="font-bold">Total : </span> <?= number_format($orderInfo["payment_amount"],2,',',' ');?>€ TTC</h4>
                <h4 class="text-xl text-left"> <span class="font-bold">Moyen de paiement : </span> <br />
                    Carte N° <?= $data["payment_type"] ?>
                </h4>
                <div class="grid gap-y-1">
                    <h4 class="text-xl text-left"> <span class="font-bold">Livraison à domicile : </span> </h4>
                    <p class="text-lg"> <span class="font-bold">Adresse : </span><?= $user["address"] . ", " . $user["postal_code"] . " " . $user["city"] ?></p>
                </div>
            </div>
            <p class="text-center text-3xl uppercase mt-14 text-darkblue">Merci pour votre commande</p>
        </div>
    </div>


</section>
<?php
$_SESSION['okaz_logged_user']["orderComplete"] = 'yes';
$ordermodel->transferCartToOrder();
require_once './includes/footer.php'; ?>