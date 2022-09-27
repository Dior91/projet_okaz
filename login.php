<?php
require_once './includes/phpheaders.php';
ini_set('display_errors', 'on');
require_once "./src/UserModel.php";
$userModel = new UserModel();
$error = $userModel->loginUser();
// Informe l'utilisateur que l'inscription vient d'être réussi et lui demande de se connecter
if (isset($_GET['register']) && $_GET['register'] == 'successful') {
    $subLogin = "Votre inscription a bien été enregistrée. <br /> Veuillez vous connecter";
} else {
    $subLogin = "Déja inscrit ? <br /> Merci de vous identifier";
}

require_once './includes/header.php';
?>
<!-- Déja inscrit ? <br />Merci de vous identifier -->
<!-- Contenu de la page -->
<section class="mb-auto py-10 lg:py-20">
    <form class=" container w-5/6 md:w-2/3 xl:w-1/2 mx-auto border-rounded px-6 py-10 md:p-10 lg:p-14 shadow-xl" method="POST">

        <div class="flex flex-col">
            <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-center lg:mb-8 mb-6 uppercase text-darkgrey tracking-wide">Connexion</h1>
            <p class="text-center text-base md:text-lg lg:text-xl mb-10 lg:mb-12"> <?= $subLogin ?> </p>
        </div>

        <?php if (isset($error)) : ?>
            <p class="text-red-400 text-center"><?= $error ?></p>
        <?php endif ?>

        <div class="mb-4 lg:mb-6">
            <label class="text-sm lg:text-lg block mb-2" for="email_login">Email<span class='text-red-600'> *</span></label>
            <input value="" class="text-xs md:text-sm border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Email" type="email" name="email_login" id="email_login" required>
        </div>

        <div class="mb-4 lg:mb-6">
            <label class="text-sm lg:text-lg block mb-2" for="password_login">Mot de passe<span class='text-red-600'> *</span></label>
            <input class="text-xs md:text-sm border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Mot de passe" type="password" name="password_login" id="password_login" required>
        </div>
        <p class='mt-6 lg:mt-10'><span class='text-sm lg:text-base text-red-600'>* </span> Champs obligatoires</p>
        <div class="flex justify-center mt-10">
            <button class="text-sm lg:text-base shadow-md rounded-full px-7 py-2 lg:px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">Se connecter
            </button>
        </div>
    </form>
</section>

<?php require_once './includes/footer.php'; ?>