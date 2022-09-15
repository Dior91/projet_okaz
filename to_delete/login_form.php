<div id="loginModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <form class=" relative top-20 w-1/2 mx-auto bg-eggshell border-rounded py-8 shadow-md px-10">

        <button class="rounded p-2 bg-red-600 hover:bg-red-700 float-right">
            <i id="closeLoginModal" class="fa-solid fa-xmark fa-xl"></i>
        </button>

        <div class="flex flex-col">
            <h1 class="text-4xl text-center mb-6 uppercase text-darkblue tracking-wide">Connexion</h1>
            <p class="text-center text-lg mb-8">Déja inscrit ? <br />Merci de vous identifier</p>
        </div>


        <div class="mb-4">
            <label class="block mb-2" for="email">Email<span class='text-red-600'> *</span></label>
            <input value="" class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Email" type="email" name="email" id="email" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2" for="password">Mot de passe<span class='text-red-600'> *</span></label>
            <input class="border rounded border-gray-200 py-2 px-4 w-full outline-slate-800 shadow-lg" placeholder="Mot de passe" type="password" name="password" id="password" required>
        </div>

        <p class='mt-6'><span class='text-red-600'>* </span> Champs obligatoires</p>
        <div class="flex justify-start mt-6">
            <button class="shadow-lg rounded-full py-2 px-10 bg-orange hover-bg-darkgrey text-white font-semibold uppercase tracking-wider">Se connecter
            </button>
        </div>
    </form>
</div>