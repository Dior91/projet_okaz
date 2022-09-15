<?php
ini_set('display_errors', 'on');
require_once './includes/header.php';
isLogged();
require_once './src/OrderModel.php';
$ordermodel = new OrderModel();
$orders = $ordermodel->getOrder();
$orderproducts = $ordermodel->getOrderProducts();
?>

<!-- SECTION TITRE -->
<?php
$title = 'Mes commandes';
$subTitle = '';
require_once './includes/title.php';

?>

<!-- FIN SECTION TITRE -->

<!-- ---- SECTION MON COMPTE --------- -->

<section class="py-20 px-40">
    <div class="container mx-auto flex justify-start ">
        <?php require_once './components/account_sidebar.php'; ?>

        <!-- -------- MES INFOS --------------- -->

        <div class="container mx-auto w-3/4 pl-10 py-10 flex flex-col space-y-4">
            <?php foreach ($orders as $order) { ?>
                <h2 class="text-2xl font-semibold text-orange">Commande du <?= date('j/m/Y', strtotime($order->getOrder_date())) ?> </h2>
                <div class="flex space-x-16">
                    <ul class="">
                        <li class="font-bold text-xl">
                            <h2>Numéro de commande </h2>
                        </li>
                        <li class="">
                            <p><?= $order->getId() ?></p>
                        </li>
                    </ul>
                    <ul class="">
                        <li class="font-bold text-xl">
                            <h2> Total </h2>
                        </li>
                        <li class="">
                            <p><?= $order->getPayment_amount() ?>€</p>
                        </li>
                    </ul>
                    <ul class="">
                        <li class="font-bold text-xl">
                            <h2>Adresse de livraison </h2>
                        </li>
                        <li class="">
                            <p><?= $order->getDelivery_address() ?></p>
                        </li>
                    </ul>
                </div>
                <h3 class="font-bold text-xl">Contenu de la commande : </h3>
                <?php foreach ($orderproducts[$order->getId()] as $product) { ?>
                    <div class="flex space-x-10 bg-white p-5">
                        <img class=" h-[170px] w-[200px]" src="<?= $product["image"]; ?>" alt="<?= $product["name"]; ?>">
                        <div class="flex flex-col space-y-3">
                            <h3 class="text-2xl font-semibold"> <?= $product["name"]; ?></h3>
                            <h3 class="font-normal text-xl"><?= $product["dimensions"]; ?></h3>
                            <h3 class="text-xl"><?= number_format($product["price"], 2, ',', ' '); ?>€ TTC</h3>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>



<!-- ---- SECTION MON PROFIL--------- -->


<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>