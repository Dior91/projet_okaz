<?php
require_once './includes/header.php';
require_once './src/ProductModel.php';
$productmodel = new ProductModel();
$products = $productmodel->getFiveLastsProducts();
// dd($_SESSION);
?>

<!-- SECTION BANNIERE -->
<section class="bg-black bg-opacity-40 bg-blend-darken bg-hero bg-no-repeat bg-cover bg-center bg-fixed py-40 px-80">
    <div class="container mx-auto flex-col items-center ">
        <h1 class="text-4xl text-center text-white font-semibold uppercase tracking-wider leading-10 mb-8">OKAZ, ACHAT ET VENTE DE MEUBLES D'OCCASION EN LIGNE ET EN MAGASIN </h1>
        <div class="flex justify-center gap-5">
            <div class=" bg-orange hover-bg-darkgrey rounded-full flex py-2 px-8">
                <a href="shop.php" class="text-white text-lg font-semibold tracking-wider">J'achète</a>
            </div>
            <div class=" bg-blue hover-bg-darkgrey rounded-full flex py-2 px-8">
                <a href="sell.php" class="text-white text-lg font-semibold tracking-wider">Je vends</a>
            </div>
        </div>
    </div>
</section>


<!-- FIN SECTION BANNIERE -->

<!-- SECTION NOS DERNIERS MEUBLES -->
<section class="bg-white shadow-slate-400 shadow-md py-24 px-60">
    <div class="container mx-auto flex-col items-center ">

        <h1 class="text-4xl text-center text-darkblue font-semibold uppercase mb-14 ">Nos derniers meubles d'occasions</h1>

        <!-- Implement the carousel -->
        <div class=" flex  justify-between mx-auto items-center">

        <!-- Previous button -->
            <a onclick="moveSlide(-1)">
                <div class="rounded-full bg-orange hover-bg-darkgrey py-3 px-5">
                    <i class="fas fa-regular fa-angle-left fa-2x"></i>
                </div>
            </a>
            <?php foreach($products as $product){ ?>
            <div class="slide w-[550px]">
                <img class="w-full h-[400px]" src="<?= $product->getImage()?>">
                <a href="product_page.php?id=<?= $product->getId() ?>">
                    <div class="w-full px-5 py-3 bg-zinc-600 hover:bg-zinc-800 text-center text-white"><?= $product->getName()?></div>
                </a>
            </div>
            <?php } ?>
            <!-- Next button -->
            <a onclick="moveSlide(1)">
                <div class="rounded-full bg-blue hover-bg-darkgrey py-3 px-5">
                    <i class="fas fa-regular fa-angle-right fa-2x"></i>
                </div>
            </a>
        </div>

        <br>

        <!-- The dots -->
        <div class="flex justify-center items-center space-x-5">
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(4)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(5)"></div>
        </div>
    </div>
</section>

<!-- FIN SECTION NOS DERNIERS MEUBLES -->

<!-- SECTION QUI SOMMES-NOUS-->

<section id="quiSommeNous" class="py-20 px-36 bg-orange">
    <div class="container mx-auto text-white flex justify-between">
        <div class="w-3/4 flex-col px-16">
            <h1 class="text-4xl text-justify font-bold uppercase  mb-10"> Qui sommes-nous ? </h1>
            <p class="text-xl tracking-wider mb-10">
            OKAZ est une entreprise créée en 2012, qui remet en circulation des articles d'ameublement. Un dépôt-vente dans lequel on peut acheter et vendre des meubles d'occasion.                
        </br>
        </br>
        Nous proposons un large choix de mobiliers : chaises, tables, lits, luminaires...
        </br>Vous pouvez acheter nos meubles d'occasion directement en ligne ou vous rendre dans l'un de nos nombreux magasins répartis sur toute la France.
            </p>

            <div>
                <a href="about.php" class="py-3 px-8 rounded-full bg-blue hover-bg-darkgrey text-white font-semibold text-lg">
                <i class="fas fa-regular fa-eye mr-2"></i>En savoir plus
                </a>
            </div>
        </div>

        <div class="w-1/4">
            <figure class="flex flex-col items-center mt-10">
                <img src="./images/istockphoto-1194667952-612x612.jpg" alt="pdg_de_okaz" class="rounded-full w-60 mb-4">
                <figcaption class="text-center font-semibold text-xl tracking-wider ">
                    Ahmed Diarra </br> PDG de OKAZ
                </figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- FIN SECTION QUI SOMMES-NOUS-->

<!-- SECTION RECHERCHE MAGASIN -->

<?php require_once './components/search_store.php'; ?>
<script src="./JS/index.js"></script>

<?php require_once './includes/footer.php'; ?>