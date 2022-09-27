<?php
ini_set('display_errors', 'on');
require_once './includes/phpheaders.php';
require_once './src/UserModel.php';
$usermodel = new UserModel();
$data = $usermodel->signupUser();
require_once './includes/header.php';
?>

<!-- Contenu de la page -->
<section class="mb-auto py-10 lg:py-20">
    <!-- <div id="signupModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> -->
    <form class=" container w-5/6 md:w-2/3 xl:w-1/2 mx-auto border-rounded px-6 py-10 md:p-10 lg:p-14 shadow-xl" method="POST">
        <div class="flex flex-col">
            <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-center lg:mb-8 mb-6 uppercase text-darkgrey tracking-wide">Inscription</h1>
            <p class="text-center text-base md:text-lg lg:text-xl mb-10 lg:mb-12">Nouveau ? <br />Créez votre compte</p>
        </div>


        <div class="flex flex-col md:flex-row md:space-y-0 md:space-x-6 lg:space-x-8 space-y-4 mb-4 lg:mb-6 ">
            <div class="md:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="firstname">Prénom<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) ? $data["firstname"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Prénom" type="text" name="firstname" id="firstname" required>
            </div>
            <div class="md:w-1/2">
                <label class="text-sm lg:text-lg block mb-2"" for="lastname">Nom<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) ? $data["lastname"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Nom" type="text" name="lastname" id="lastname" required>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:space-y-0 md:space-x-6 lg:space-x-8 space-y-4 mb-4 lg:mb-6">
            <div class="md:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="email_signup">Email<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) && empty($data["errorEmail"]) && empty($data["errorEmail_exist"]) ? $data["email"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Email" type="email" name="email_signup" id="email_signup" required>
                <?php if (isset($data) && !empty($data["errorEmail"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorEmail"] ?></p>
                <?php endif ?>
                <?php if (isset($data) && !empty($data["errorEmail_exist"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorEmail_exist"] ?></p>
                <?php endif ?>
            </div>
            <div class="md:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="telephone">Numéro de télephone</label>
                <input value="<?= isset($data) && empty($data["errorTelephone"]) ? $data["telephone"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Numéro de télephone" type="text" name="telephone" id="telephone" maxlength="10">
                <?php if (isset($data) && !empty($data["errorTelephone"]) && !empty($data["telephone"])) { ?>
                    <p class="text-red-400 text-sm mt-2"><?php echo ($data["errorTelephone"])  ?></p>
                <?php } ?>
            </div>
        </div>

        <div class="mb-4 lg:mb-6">
            <label class="text-sm lg:text-lg block mb-2" for="address">Adresse<span class='text-red-600'> *</span></label>
            <input value="<?= isset($data) ? $data["address"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Adresse" type="text" name="address" id="address" required>
        </div>

        <div class="flex flex-col md:flex-row md:space-y-0 md:space-x-6 lg:space-x-8 space-y-4 mb-4 lg:mb-6">
            <div class="md:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="postal_code">Code postal<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) && empty($data["errorPostal_code"]) ? $data["postal_code"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Code postal" type="text" name="postal_code" id="postal_code" maxlength="5" required>
                <?php if (isset($data) && !empty($data["errorPostal_code"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorPostal_code"] ?></p>
                <?php endif ?>

            </div>
            <div class="md:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="city">Ville<span class='text-red-600'> *</span></label>
                <input value="<?= isset($data) ? $data["city"] : "" ?>" class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Ville" type="text" name="city" id="city" required>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-6  mb-4 lg:mb-6">
            <div class="lg:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="password_signup">Mot de passe<span class='text-red-600'> *</span></label>
                <input class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Mot de passe" type="password" name="password_signup" id="password_signup" required>
            </div>
            <div class="lg:w-1/2">
                <label class="text-sm lg:text-lg block mb-2" for="confirm">Confirmation du mot de passe<span class='text-red-600'> *</span></label>
                <input class="text-xs md:text-sm border-rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-md" placeholder="Confirmation" type="password" name="confirm" id="confirm" required>
                <?php if (isset($data) && !empty($data["errorConfirm"])) : ?>
                    <p class="text-red-400 text-sm mt-2"><?= $data["errorConfirm"] ?></p>
                <?php endif ?>
            </div>
        </div>
        <p class='mt-6 lg:mt-10'><span class='text-sm lg:text-base text-red-600'>* </span> Champs obligatoires</p>
        <div class="flex justify-center mt-10">
            <button class="text-sm lg:text-base shadow-md rounded-full px-7 py-2 lg:px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">S'inscrire
            </button>
        </div>
    </form>
</section>

<?php require_once './includes/footer.php'; ?>