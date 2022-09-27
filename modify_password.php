<?php
require_once './includes/phpheaders.php';
isLogged();
require_once "./src/UserModel.php";
$userModel = new UserModel();
$error = $userModel->modifyPassword();

require_once "./includes/header.php";
$title = 'Mon profil';
$subTitle = '';
require_once './includes/title.php';

?>
<section class="mb-auto py-10 px-2 xl:py-20 xl:px-20 2xl:px-40">
    <div class="container mx-auto flex justify-start ">
        <?php require_once './components/account_sidebar.php'; ?>

        <!-- ------- formulaire------- -->

        <!-- <div class=" h-full w-full p-20"> -->
        <form class=" top-20 w-1/2 mx-auto border-rounded px-4 py-4 lg:py-8 lg:px-6 2xl:px-10" method="POST">

            <h1 class="text-lg sm:text-xl xl:text-3xl text-darkblue font-semibold text-center mb-16 uppercase tracking-wide">MODIFIER MON MOT DE PASSE </h1>

            <div class="w-full mb-4">
                <label class="block mb-2 text-xs sm:text-base" for="current">Mot de passe actuel <span class='text-red-600'> *</span> </label>
                <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg text-xs sm:text-base" placeholder="Mot de passe" type="password" name="current" id="current" required>
                <?php if (isset($error) && !empty($error["errorPassword"])) : ?>
                    <p class="text-red-400 text-sm"><?= $error["errorPassword"] ?></p>
                <?php endif ?>
            </div>

            <div class="w-full mb-4">
                <label class="text-xs sm:text-base block mb-2" for="newPassword">Nouveau mot de passe <span class='text-red-600'> *</span></label>
                <input class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Confirmation" type="password" name="newPassword" id="newPassword" required>
            </div>
            <div class="w-full mb-4">
                <label class="text-xs sm:text-base block mb-2" for="confirm">Confirmation du mot de passe <span class='text-red-600'> *</span></label>
                <input class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Confirmation" type="password" name="confirm" id="confirm" required>
                <?php if (isset($error) && !empty($error["errorConfirm"])) : ?>
                    <p class="text-red-400 text-sm"><?= $error["errorConfirm"] ?></p>
                <?php endif ?>
            </div>

            <div class="flex justify-center mt-6">
                <button class="shadow-lg rounded-full py-2 px-5 sm:px-10 bg-orange hover-bg-darkgrey text-white text-xs sm:text-base font-semibold uppercase tracking-wider">Modifier
                </button>
            </div>
        </form>
    </div>
</section>


<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>