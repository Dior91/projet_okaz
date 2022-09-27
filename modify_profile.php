<?php
require_once './includes/phpheaders.php';
isLogged();
require_once "./src/UserModel.php";
$userModel = new UserModel();
$user = $userModel->getUser();
$errors = $userModel->updateUser();

require_once './includes/header.php';
$title = 'Mon profil';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- ------ formulaire------- -->

<section class="mb-auto py-10 px-2 xl:py-20 xl:px-20 2xl:px-40">
    <div class="container mx-auto flex justify-start ">
        <?php require_once './components/account_sidebar.php'; ?>

        <form action="" class="top-20 w-4/5 xl:w-3/5 mx-auto border-rounded px-4 py-4 lg:py-8 lg:px-6 2xl:px-10" method="POST">

            <h1 class=" text-lg sm:text-xl xl:text-3xl text-darkblue font-semibold text-center mb-8 uppercase tracking-wide">MODIFIER MON PROFIL</h1>
            <?php if (isset($errors) && !empty($errors["errorEmptyField"])) : ?>
                <p class="text-red-400 text-xs sm:text-base mb-14 text-center"><?= $errors["errorEmptyField"] ?></p>
            <?php endif ?>
            <div class="flex flex-col md:flex-row gap-2 mb-2 lg:gap-6 lg:mb-4">
                <div class="w-full md:w-1/2">
                    <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="firstname">Prénom</label>
                    <input value="<?= isset($user) ? $user["firstname"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-1 xl:py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Prénom" type="text" name="firstname" id="firstname">

                </div>
                <div class="w-full md:w-1/2">
                    <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="lastname">Nom</label>
                    <input value="<?= isset($user) ? $user["lastname"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Nom" type="text" name="lastname" id="lastname">

                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-2 mb-2 lg:gap-6 xl:mb-4">
                <div class="w-full md:w-1/2">
                    <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="email">Email</label>
                    <input value="<?= isset($user) ? $user["email"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Email" type="email" name="email" id="email" disabled>
                </div>
                <div class="w-full md:w-1/2">
                    <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="telephone">Numéro de télephone</label>
                    <input value="<?= isset($user) ? $user["telephone"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Numéro de télephone" type="text" name="telephone" id="telephone" maxlength="10">
                    <?php if (isset($errors) && !empty($errors["errorTelephone"]) && empty($errors["errorTelephoneEmpty"])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors["errorTelephone"] ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="w-full mb-2 xl:mb-4">
                <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="address">Adresse</label>
                <input value="<?= isset($user) ? $user["address"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Adresse" type="text" name="address" id="address">

            </div>

            <div class="flex flex-col md:flex-row gap-2 mb-2 lg:gap-6 lg:mb-4">
                <div class="w-full md:w-1/2">
                    <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="postal_code">Code postal</label>
                    <input value="<?= isset($user) ? $user["postal_code"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Code postal" type="text" name="postal_code" id="postal_code" maxlength="5">
                    <?php if (isset($errors) && !empty($errors["errorPostal_code"]) && empty($errors["errorPostal_codeEmpty"])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors["errorPostal_code"] ?></p>
                    <?php endif ?>
                </div>
                <div class="w-full md:w-1/2 ">
                    <label class="block mb-1 lg:mb-2 text-xs sm:text-base" for="city">Ville</label>
                    <input value="<?= isset($user) ? $user["city"] : "" ?>" class="text-xs sm:text-base border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Ville" type="text" name="city" id="city">

                </div>
            </div>

            <div class="flex justify-center mt-10">
                <button class="shadow-lg rounded-full px-6 py-2 sm:px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider text-xs sm:text-base">Modifier
                </button>
            </div>
        </form>
    </div>
</section>

<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>