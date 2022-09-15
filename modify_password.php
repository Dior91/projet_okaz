<?php
require_once "./src/UserModel.php";
require_once "./includes/header.php";
isLogged();

$userModel = new UserModel();
$error = $userModel->modifyPassword();

?>

<!-- SECTION TITRE -->
<?php
$title = 'Mon profil';
$subTitle = '';
require_once './includes/title.php';

?>
<section class="py-20 px-40">
    <div class="container mx-auto flex justify-start ">
        <?php require_once './components/account_sidebar.php'; ?>

        <!-- ------- formulaire------- -->

        <!-- <div class=" h-full w-full p-20"> -->
        <form class=" top-20 w-1/2 mx-auto border-rounded py-8 px-10" method="POST">

            <h1 class="text-3xl text-darkblue font-semibold text-center mb-16 uppercase tracking-wide">MODIFIER MON MOT DE PASSE </h1>

            <div class="w-full mb-4">
                <label class="block mb-2" for="current">Mot de passe actuel <span class='text-red-600'> *</span> </label>
                <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Mot de passe" type="password" name="current" id="current" required>
                <?php if (isset($error) && !empty($error["errorPassword"])) : ?>
                    <p class="text-red-400 text-sm"><?= $error["errorPassword"] ?></p>
                <?php endif ?>
            </div>

            <div class="w-full mb-4">
                <label class="block mb-2" for="newPassword">Nouveau mot de passe <span class='text-red-600'> *</span></label>
                <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Confirmation" type="password" name="newPassword" id="newPassword" required>
            </div>
            <div class="w-full mb-4">
                <label class="block mb-2" for="confirm">Confirmation du mot de passe <span class='text-red-600'> *</span></label>
                <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Confirmation" type="password" name="confirm" id="confirm" required>
                <?php if (isset($error) && !empty($error["errorConfirm"])) : ?>
                    <p class="text-red-400 text-sm"><?= $error["errorConfirm"] ?></p>
                <?php endif ?>
            </div>

            <div class="flex justify-center mt-6">
                <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">Modifier
                    <!-- <i class="fa-solid fa-paper-plane mr-2"></i> -->
                </button>
            </div>
        </form>
        <!-- </div> -->

    </div>
</section>


<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>