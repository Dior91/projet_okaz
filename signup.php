<?php
ini_set('display_errors', 'on');
require_once './src/UserModel.php';
require_once './includes/header.php';
$usermodel = new UserModel();
$data = $usermodel->setupUser();
?>

<!-- Contenu de la page -->
<div class="container py-28">
    <!-- <div id="signupModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> -->
    <form class=" container w-1/2 mx-auto border-rounded p-10 shadow-xl" method="POST">

        <div class="flex flex-col">
            <h1 class="text-5xl text-center mb-10 uppercase text-darkgrey tracking-wide">Inscription</h1>
            <p class="text-center text-lg mb-10">Nouveau ? <br />Créez votre compte</p>
        </div>


        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="firstname">Prénom<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) ? $data["firstname"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Prénom" type="text" name="firstname" id="firstname" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="lastname">Nom<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) ? $data["lastname"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Nom" type="text" name="lastname" id="lastname" required>
            </div>
        </div>

        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="email_signup">Email<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) && empty($data["errorEmail"]) && empty($data["errorEmail_exist"]) ? $data["email"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Email" type="email" name="email_signup" id="email_signup" required>
                <?php if (isset($data) && !empty($data["errorEmail"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorEmail"] ?></p>
                <?php endif ?>
                <?php if (isset($data) && !empty($data["errorEmail_exist"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorEmail_exist"] ?></p>
                <?php endif ?>
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="telephone">Numéro de télephone</label>
                <input value="<?= isset($data) && empty($data["errorTelephone"]) ? $data["telephone"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Numéro de télephone" type="text" name="telephone" id="telephone" maxlength="10">
                <?php if (isset($data) && !empty($data["errorTelephone"]) && !empty($data["telephone"])) { ?>
                    <p class="text-red-400 text-sm mt-2"><?php echo ($data["errorTelephone"])  ?></p>
                <?php } ?>
            </div>
        </div>

        <div class="mb-4">
            <label class="block mb-2" for="address">Adresse<span class='text-red-600'> *</span></label>
            <input value="<?= isset($data) ? $data["address"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Adresse" type="text" name="address" id="address" required>
        </div>

        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="postal_code">Code postal<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) && empty($data["errorPostal_code"]) ? $data["postal_code"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Code postal" type="text" name="postal_code" id="postal_code" maxlength="5" required>
                <?php if (isset($data) && !empty($data["errorPostal_code"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorPostal_code"] ?></p>
                <?php endif ?>
                
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="city">Ville<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) ? $data["city"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Ville" type="text" name="city" id="city" required>
            </div>
        </div>

        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="password_signup">Mot de passe<span class='text-red-600'> *</span></label>
                <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Mot de passe" type="password" name="password_signup" id="password_signup" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="confirm">Confirmation du mot de passe<span class='text-red-600'> *</span></label>
                <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Confirmation" type="password" name="confirm" id="confirm" required>
                <?php if (isset($data) && !empty($data["errorConfirm"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorConfirm"] ?></p>
                <?php endif ?>
            </div>
        </div>
        <p class='mt-6'><span class='text-red-600'>* </span> Champs obligatoires</p>
        <div class="flex justify-center mt-10">
            <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">S'inscrire
                <!-- <i class="fa-solid fa-paper-plane mr-2"></i> -->
            </button>
        </div>
    </form>
    <!-- </div> -->
</div>

<?php require_once './includes/footer.php'; ?>