<?php
require_once './includes/phpheaders.php';
isLogged();
require_once "./src/UserModel.php";
$userModel = new UserModel();
$user = $userModel->getUser(); 

require_once './includes/header.php';
$title = 'Mon compte';
$subTitle = '';
require_once './includes/title.php';

?>

<!-- FIN SECTION TITRE -->

<!-- ---- SECTION MON COMPTE --------- -->
<section class="mb-auto py-10 px-2 sm:py-10 sm:px-10 md:py-10 md:px-20 2xl:py-20 2xl:px-40">

        <?php require_once './components/account_sidebar.php'; ?> 
        <!-- -------- message --------------- -->
        <div class="w-3/5 lg:w-3/4 p-3 sm:p-5 md:p-10 lg:px-20 lg:py-20 flex flex-col ">
            <h2 class="text-lg sm:text-xl font-bold mb-10"> Bonjour, <?= $user["firstname"]?> :)</h2>
            <p class="text-sm sm:text-base xl:text-xl mb-10">
                Bienvenue sur votre espace client OKAZ.com </br>
                Ici, vous pouvez gérer vos commandes, ainsi que vos informations personnelles.
            </p>
            <div class="block m-auto">
                <a href="shop.php" class="py-2 px-2 sm:px-4 lg:py-3 lg:px-8 rounded-lg bg-orange hover-bg-darkgrey text-white font-semibold text-xs sm:text-base lg:text-lg uppercase">
                    Continuer mes achats
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ---- SECTION MON COMPTE --------- -->

<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>