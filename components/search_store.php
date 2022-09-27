<?php
require_once dirname(__DIR__) . "/src/StoreModel.php";
$storemodel = new StoreModel();
$store = $storemodel->getStore();
$stores = $storemodel->getAllStores();
// dump($store);

?>
<section id="" class="py-7 px-4 sm:py-10 sm:px-16 md:py-14 md:px-20 lg:py-28 lg:px-36 bg-eggshell ">
    <div class="flex flex-col items-center">
        <h1 class="text-xl sm:text-2xl md:text-4xl sm:leading-normal md:leading-snug font-semibold uppercase font-sans mb-8 md:mb-14 text-center " id="searchTitle"> Trouvez un magasin Okaz près de chez vous <i id="searchIcon" class="ml-4 fas fa-regular fa-magnifying-glass-location md:text-4xl"></i></h1>
        <form id="searchStoreForm" action="" method="POST" class="rounded-full w-2/3 border-2 border-orange px-1 py-1 sm:px-2 sm:py-1 md:px-3 md:py-2 lg:px-4 lg:py-3 bg-white" data-bs-toggle="modal">
            <select value="" class="select_store bg-white w-full text-sm sm:text-base md:text-lg outline-none" name="select_store" id="select_store" onchange="this.form.submit()">
                <option value="">-- Sélectionnez un magasin --</option>
                <?php foreach ($stores as $one_store) { ?>
                    <option class="capitalize" value="<?= $one_store->getId(); ?>"><?= $one_store->getStore_Name() ; ?></option>
                <?php } ?>
            </select>
        </form>
    </div>
</section>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST["select_store"])) { ?>
    <section id="store_searchModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative container mx-auto top-28 w-3/4 lg:w-2/3 xl:w-1/2 p-5  md:p-8 xl:p-10 bg-white">
            <button class="rounded py-0 px-1 md:px-2 bg-blue hover-bg-darkgrey float-right">
                <i id="closeStore_searchModal" class="fa-solid fa-xmark text-lg lg:text-xl xl:text-2xl"></i>
            </button>
            <h3 class="text-orange text-center text-xl md:text-2xl lg:text-3xl font-semibold uppercase mb-6 md:mb-10 lg:mb-12"><?= $store->getStore_name(); ?></h3>
            <div class="flex flex-col gap-y-4">
                <p class="text-sm md:text-base lg:text-lg"> <span class="font-bold">Adresse : </span><?= $store->getStore_address() . ', ' . $store->getStore_postal_code() . ' ' . $store->getStore_city() ?></p>
                <p class="text-sm md:text-base lg:text-lg"> <span class="font-bold">Téléphone : </span><?= $store->getStore_telephone(); ?></p>
                <p class="text-sm md:text-base lg:text-lg"> <span class="font-bold">Horaires d'ouverture : </span>
                    <br />Du Lundi au Vendredi : de 10h à 18h
                    <br />Samedi : de 9h30 à 19h
                    <br />Dimanche : Fermé
                </p>
            </div>
            <!-- </div> -->
        </div>
    </section>
<?php } ?>

<script src="./JS/search_store.js"></script>