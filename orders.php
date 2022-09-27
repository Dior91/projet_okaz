<?php
ini_set('display_errors', 'on');
require_once './includes/phpheaders.php';
isLogged();
require_once './src/OrderModel.php';
$ordermodel = new OrderModel();
$orders = $ordermodel->getOrder();
$orderproducts = $ordermodel->getOrderProducts();
require_once './includes/header.php';
$title = 'Mes commandes';
$subTitle = '';
require_once './includes/title.php';
// dump($_SESSION["okaz_logged_user"]);
?>

<!-- FIN SECTION TITRE -->

<!-- ---- SECTION MON COMPTE --------- -->

<section class="mb-auto py-10 px-2 xl:py-20 xl:px-20 2xl:px-40">
    <div class="container mx-auto flex justify-start ">
        <?php require_once './components/account_sidebar.php'; ?>

        <!-- -------- MES INFOS --------------- -->

        <div class="container mx-auto w-3/4 pl-2 md:pl-10 pb-10 flex flex-col space-y-4">
            <?php if (!$orders) { ?>
                <div class="flex flex-col justify-center space-y-10">
                    <p class="text-2xl font-semibold text-center text-darkblue">Vous n'avez aucune commande pour le moment</p>
                    <div class="block mx-auto">
                        <a href="shop.php" class="py-3 px-8 rounded-lg bg-orange hover-bg-darkgrey text-white font-semibold text-lg uppercase">
                            Commencer mes achats <i class="fas fa-regular fa-cart-plus text-white ml-2 fa-xl"></i>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="accordion" id="accordionExample">
                    <?php foreach ($orders as $order) { ?>
                        <div class="accordion-item bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0" id="heading_<?= $order->getId() ?>">
                                <button class="
        accordion-button
        relative
        flex
        items-center
        w-full
        py-4
        px-5
        text-sm md:text-xl text-darkblue font-semibold text-left
        bg-white
        border-1
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?= $order->getId() ?>" aria-expanded="false" aria-controls="collapse_<?= $order->getId() ?>">
                                    Commande du <?= date('j/m/Y', strtotime($order->getOrder_date())) ?> </button>
                            </h2>
                            <div id="collapse_<?= $order->getId() ?>" class="accordion-collapse collapse" aria-labelledby="heading_<?= $order->getId() ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body py-4  flex flex-col space-y-5 px-4 lg:px-10">
                                    <div class="flex flex-col space-y-2 md:flex-row md:space-x-8 lg:space-x-16">
                                        <ul class="">
                                            <li class="font-bold text-sm sm:test-base md:text-lg lg:text-xl">
                                                <h2>Numéro de commande </h2>
                                            </li>
                                            <li class="text-sm md:text-base">
                                                <p><?= $order->getId() ?></p>
                                            </li>
                                        </ul>
                                        <ul class="">
                                            <li class="font-bold text-sm sm:test-base md:text-lg lg:text-xl">
                                                <h2> Total </h2>
                                            </li>
                                            <li class="text-sm md:text-base">
                                                <p class=""><?= $order->getPayment_amount() ?>€</p>
                                            </li>
                                        </ul>
                                        <ul class="">
                                            <li class="font-bold text-sm sm:test-base md:text-lg lg:text-xl">
                                                <h2>Adresse de livraison </h2>
                                            </li>
                                            <li class="text-sm md:text-base">
                                                <p><?= $order->getDelivery_address() ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="font-bold text-sm sm:test-base md:text-lg lg:text-xl">Contenu de la commande : </h3>
                                    <?php foreach ($orderproducts[$order->getId()] as $product) { ?>
                                        <div class="flex flex-col items-center justify-center text-center md:flex-row space-y-3 md:space-x-10 bg-white p-0 md:p-5 md:items-start md:justify-start">
                                            <img class="  h-[120px] w-[150px] lg:h-[170px] lg:w-[200px]" src="<?= $product["image"]; ?>" alt="<?= $product["name"]; ?>">
                                            <div class="flex flex-col lg:space-y-3 justify-center items-center md:justify-start lg:items-start space-y-1">
                                                <h3 class="text-base text-center lg:text-left sm:text-lg md:text-xl xl:text-2xl font-semibold "> <?= $product["name"]; ?></h3>
                                                <h3 class="font-normal text-center lg:text-left text-sm sm:text-base lg:text-lg xl:text-xl"><?= $product["dimensions"]; ?></h3>
                                                <h3 class="text-sm sm:text-base md:text-xl text-center lg:text-left"><?= number_format($product["price"], 2, ',', ' '); ?>€ TTC</h3>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php }  ?>
                </div>
        </div>
    </div>
</section>



<!-- ---- SECTION MON PROFIL--------- -->


<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>