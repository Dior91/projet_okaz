<?php
?>
<div id="signupModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <form class=" relative top-20 w-1/2 mx-auto bg-eggshell border-rounded py-8 shadow-md px-10" method="POST">

        <button class="rounded p-2 bg-red-600 hover:bg-red-700 float-right">
            <i id="closeSignupModal" class="fa-solid fa-xmark fa-xl"></i>
        </button>

        <div class="flex flex-col">
            <h1 class="text-4xl text-center mb-6 uppercase text-darkblue tracking-wide">Inscription</h1>
            <p class="text-center text-lg mb-10">Nouveau ? <br />Créez votre compte</p>
        </div>


        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="firstname">Prénom<span class='text-red-600'> *</span></label>
                <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Prénom" type="text" name="firstname" id="firstname" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="lastname">Nom<span class='text-red-600'> *</span></label>
                <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Nom" type="text" name="lastname" id="lastname" required>
            </div>
        </div>

        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="email_signup">Email<span class='text-red-600'> *</span></label>
                <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Email" type="email" name="email_signup" id="email_signup" required>
                <?php if (isset($data) && !empty($data["errorEmail"])) : ?>
                    <p class="text-red-400 text-sm"><?= $data["errorEmail"] ?></p>
                <?php endif ?>
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="telephone">Numéro de télephone</label>
                <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Numéro de télephone" type="tel" name="telephone" id="telephone" maxlength="10">
                <?php if (isset($data) && !empty($data["errorTelephont"])) : ?>
                    <p class="text-red-400 text-sm"><?= $data["errorTelephone"] ?></p>
                <?php endif ?>
            </div>
        </div>

        <div class="mb-4">
            <label class="block mb-2" for="address">Adresse<span class='text-red-600'> *</span></label>
            <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Adresse" type="text" name="address" id="address" required>
        </div>

        <div class="flex gap-6 mb-4">
            <div class="w-1/2">
                <label class="block mb-2" for="postal_code">Code postal<span class='text-red-600'> *</span></label>
                <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Code postal" type="text" name="postal_code" id="postal_code" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-2" for="city">Ville<span class='text-red-600'> *</span></label>
                <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Ville" type="text" name="city" id="city" required>
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
            </div>
            <?php if (isset($data) && !empty($data["errorConfirm"])) : ?>
                <p class="text-red-400 text-sm"><?= $data["error"] ?></p>
            <?php endif ?>
        </div>
        <p class='mt-6'><span class='text-red-600'>* </span> Champs obligatoires</p>
        <div class="flex justify-start mt-6">
            <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">S'inscrire
                <!-- <i class="fa-solid fa-paper-plane mr-2"></i> -->
            </button>
        </div>
    </form>
</div>