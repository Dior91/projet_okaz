<?php
require_once "./src/UserModel.php";
require_once './includes/header.php';
isLogged();
$userModel = new UserModel();
$errors = $userModel->updateUser();
$user = $userModel->getUser();

$title = 'Mon profil';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- ------ formulaire------- -->

<section class="py-20 px-40">
    <div class="container mx-auto flex justify-start ">
        <?php require_once './components/account_sidebar.php'; ?>

        <form action="" class="top-20 w-3/5 mx-auto border-rounded py-8 px-10" method="POST">

            <h1 class="text-3xl text-darkblue font-semibold text-center mb-8 uppercase tracking-wide">MODIFIER MON PROFIL</h1>
            <?php if (isset($errors) && !empty($errors["errorEmptyField"])) : ?>
                <p class="text-red-400 text-base mb-14 text-center"><?= $errors["errorEmptyField"] ?></p>
            <?php endif ?>
            <div class="flex gap-6 mb-4">
                <div class="w-1/2">
                    <label class="block mb-2" for="firstname">Prénom</label>
                    <input value="<?= isset($user) ? $user["firstname"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Prénom" type="text" name="firstname" id="firstname">

                </div>
                <div class="w-1/2">
                    <label class="block mb-2" for="lastname">Nom</label>
                    <input value="<?= isset($user) ? $user["lastname"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Nom" type="text" name="lastname" id="lastname">

                </div>
            </div>

            <div class="flex gap-6 mb-4">
                <div class="w-1/2">
                    <label class="block mb-2" for="email">Email</label>
                    <input value="<?= isset($user) ? $user["email"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Email" type="email" name="email" id="email" disabled>
                </div>
                <div class="w-1/2">
                    <label class="block mb-2" for="telephone">Numéro de télephone</label>
                    <input value="<?= isset($user) ? $user["telephone"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Numéro de télephone" type="text" name="telephone" id="telephone" maxlength="10">
                    <?php if (isset($errors) && !empty($errors["errorTelephone"]) && empty($errors["errorTelephoneEmpty"])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors["errorTelephone"] ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2" for="address">Adresse</label>
                <input value="<?= isset($user) ? $user["address"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Adresse" type="text" name="address" id="address">

            </div>

            <div class="flex gap-6 mb-4">
                <div class="w-1/2">
                    <label class="block mb-2" for="postal_code">Code postal</label>
                    <input value="<?= isset($user) ? $user["postal_code"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Code postal" type="text" name="postal_code" id="postal_code" maxlength="5">
                    <?php if (isset($errors) && !empty($errors["errorPostal_code"]) && empty($errors["errorPostal_codeEmpty"])) : ?>
                        <p class="text-red-400 text-sm"><?= $errors["errorPostal_code"] ?></p>
                    <?php endif ?>
                </div>
                <div class="w-1/2 ">
                    <label class="block mb-2" for="city">Ville</label>
                    <input value="<?= isset($user) ? $user["city"] : "" ?>" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Ville" type="text" name="city" id="city">

                </div>
            </div>

            <div class="flex justify-center mt-10">
                <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">Modifier
                </button>
            </div>
        </form>
    </div>
</section>


<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>