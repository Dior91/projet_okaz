<?php
require_once './includes/phpheaders.php';
require_once './src/UserModel.php';

$usermodel = new UserModel();
$data = $usermodel->registerContactForm();

require_once './includes/header.php';
$title = 'contact';
$subTitle = '';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<div class="mb-auto container px-6 py-10 md:px-20 lg:px-40 md:py-20 mx-auto block">
    <div class="p-5 space-x-5 ">
        <?php if (isset($data) && !empty($data["successfulRegister"])) { ?>
            <p class="text-red-500 text-lg mb-10 text-center"><?php echo ($data["successfulRegister"])  ?></p>
        <?php } ?>
        <h1 class="text-2xl md:text-3xl lg:text-4xl text-center uppercase text-darkblue font-semibold">Envoyer une demande</h1>
        <p class="text-center text-lg md:text-xl lg:text-2xl mt-10 gap-y-3">Vous avez une question? <br />Laissez-nous un message, nous nous ferons un plaisir de vous répondre.</p>


        <form class="grid gap-y-6 px-2 py-8 md:p-10 lg:p-16" method="POST">
            <div class="flex flex-col md:flex-row gap-4 md:gap-6 ">
                <div class="w-full md:w-1/2  ">
                    <label class="block mb-2" for="name"><i class="fa-regular fa-user mr-2"></i>Nom et Prénom</label>
                    <input value="" class="bg-eggshell border rounded border-darkgrey py-2 px-4 w-full outline-slate-800 shadow-lg bg-eggshell" type="text" name="name" id="name">
                </div>
                <div class="w-full md:w-1/2">
                    <label class="block mb-2" for="email"><i class="fa-regular fa-envelope mr-2"></i>Email<span class='text-red-600'> *</span></label>
                    <input value="" class="  bg-eggshell border rounded border-darkgrey py-2 px-4 w-full outline-slate-800 shadow-lg" type="email" name="email" id="email" required>
                    <?php if (isset($data) && !empty($data["errorEmail"])) { ?>
                        <p class="text-red-500 text-sm mt-2"><?php echo ($data["errorEmail"])  ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="">
                <label class="block mb-2" for="subject"><i class="fa-solid fa-question mr-2"></i>Ma demande concerne<span class='text-red-600'> *</span></label>
                <select value="" class=" bg-eggshell border rounded border-darkgrey py-2 px-4 w-full outline-slate-800 shadow-lg" type="text" name="subject" id="subject" required>
                    <option value="">-- Sélectionnez une option --</option>
                    <option class="" value="Une demande d'information">Une demande d'information</option>
                    <option value="Un problème technique">Un problème technique</option>
                    <option value="Une question à propos de ma commande">Une question à propos de ma commande</option>
                    <option value="Vendre chez Okaz">Vendre chez Okaz</option>
                    <option value="Un témoignage">Un témoignage</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="">
                <label class="block mb-2" for="message"><i class="fas fa-thin fa-file-pen mr-2"></i> Message<span class='text-red-600'>*</span></label>
                <textarea name="message" id="message" cols="10" rows="5" class=" bg-eggshell border rounded border-darkgrey py-2 px-4 w-full outline-slate-800 shadow-lg" maxlength="600" required></textarea>
            </div>

            <div class="flex justify-center">
                <input type="submit" value="ENVOYER" class="focus:outline-none mt-5 bg-orange-500 hover-bg-darkgrey px-6 py-2 text-white font-semibold rounded-full flex justify-center">
            </div>
        </form>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>