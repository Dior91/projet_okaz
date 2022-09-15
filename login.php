<?php
ini_set('display_errors', 'on');
require_once "./src/UserModel.php";
require_once './includes/header.php';
$userModel = new UserModel();
$error = $userModel->loginUser();
// Informe l'utilisateur que l'inscription vient d'être réussi et lui demande de se connecter
if (isset($_GET['register']) && $_GET['register'] == 'successful') {
    $subLogin = "Votre inscription a bien été enregistrée. <br /> Veuillez vous connecter";
} else {
    $subLogin = "Déja inscrit ? <br /> Merci de vous identifier";
}
// var_dump($_SESSION["okaz_logged_user"]);
?>
<!-- Déja inscrit ? <br />Merci de vous identifier -->
<!-- Contenu de la page -->
<div class="container py-28">
    <!-- <div id="signupModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> -->
    <form class=" container w-1/2 mx-auto border-rounded p-10 shadow-xl" method="POST">

        <div class="flex flex-col">
            <h1 class="text-5xl text-center mb-10 uppercase text-darkgrey tracking-wide">Connexion</h1>
            <p class="text-center text-lg mb-8"> <?= $subLogin ?> </p>
        </div>

        <?php if (isset($error)) : ?>
            <p class="text-red-400 text-center"><?= $error ?></p>
        <?php endif ?>

        <div class="mb-4">
            <label class="block mb-2" for="email_login">Email<span class='text-red-600'> *</span></label>
            <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Email" type="email" name="email_login" id="email_login" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2" for="password_login">Mot de passe<span class='text-red-600'> *</span></label>
            <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Mot de passe" type="password" name="password_login" id="password_login" required>
        </div>
        <p class='mt-6'><span class='text-red-600'>* </span> Champs obligatoires</p>
        <div class="flex justify-center mt-10">
            <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">Se connecter
            </button>
        </div>
    </form>
    <!-- </div> -->
</div>

<?php require_once './includes/footer.php'; ?>