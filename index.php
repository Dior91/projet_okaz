<?php
require_once './includes/phpheaders.php';
require_once './src/ProductModel.php';

$productmodel = new ProductModel();
$products = $productmodel->getFiveLastsProducts();
$maxId = $productmodel->getMaxId($products);
require_once './includes/header.php';
?>

<!-- SECTION BANNIERE -->
<section class=" bg-black bg-opacity-40 bg-blend-darken bg-hero beg-no-repeat bg-cover bg-center bg-fixed py-10 px-5 sm:py-16 sm:px-10 md:py-24 md:px-20 lg:py-32 lg:px-50 xl:py-44 xl:px-80">
    <div class="container mx-auto flex-col items-center ">
        <h1 class="text-xl sm:text-3xl md:text-4xl text-center text-white font-semibold uppercase tracking-wider  mb-8 leading-snug">OKAZ, ACHAT ET VENTE DE MEUBLES D'OCCASION EN LIGNE ET EN MAGASIN </h1>
        <div class="flex justify-center gap-5">
            <div class=" bg-orange hover-bg-darkgrey rounded-full flex py-1 px-3 sm:py-1 sm:px-4 md:py-1 md:px-5 lg:py-2 lg:px-8">
                <a href="shop.php" class="text-white text-sm sm:text-base md:text-lg font-semibold tracking-wider">J'achète</a>
            </div>
            <div class=" bg-blue hover-bg-darkgrey rounded-full flex py-1 px-3 sm:py-1 sm:px-4 md:py-1 md:px-5 lg:py-2 lg:px-8">
                <a href="sell.php" class="text-white text-sm sm:text-base md:text-lg font-semibold tracking-wider">Je vends</a>
            </div>
        </div>
    </div>
</section>


<!-- FIN SECTION BANNIERE -->

<!-- SECTION NOS DERNIERS MEUBLES -->
<section class="bg-white shadow-slate-400 shadow-md py-7 px-5 sm:py-14 sm:px-10 md:py-20 md:px-12 lg:py-20 lg:px-40 xl:py-20 xl:px-60 ">
    <div class="container mx-auto flex-col items-center justify-center">

        <h1 class="text-xl sm:text-3xl md:text-4xl text-center text-darkblue font-semibold uppercase mb-8 sm:mb-14 sm:leading-snug ">Nos derniers meubles d'occasions</h1>

        <div class=" flex  justify-between mx-auto items-center space-x-3 sm:space-x-6"> 

            <!-- Previous button -->
             <a onclick="plusSlides(-1)">
                <div class="rounded-full bg-orange hover-bg-darkgrey px-2 py-0 sm:px-4 sm:py-2 md:px-5 md:py-3">
                    <i class="fas fa-regular fa-angle-left text-base sm:text-xl md:text-3xl"></i>
                </div>
            </a>
            <?php foreach($products as $product){ 
            ?>
            <div class="slide md:w-[500px] sm:w-[400px] w-[220px]">
                <img class="w-full md:h-[350px] sm:h-[250px] h-[120px]" src="<?php echo $product->getImage()
                                                                                ?>">
                <a href="product_page.php?id=<?php  echo $product->getId() 
                                                ?>">
                    <div class="text-xs sm:text-base w-full py-2 px-3 sm:px-5 sm:py-3 bg-zinc-600 hover:bg-zinc-800 text-center text-white"><?= $product->getName() ?></div>
                </a>
            </div>
            <?php } 
            ?>
             <!-- Next button  -->
            <a onclick="plusSlides(1)">
                <div class="rounded-full bg-blue hover-bg-darkgrey px-2 py-0 sm:px-4 sm:py-2 md:px-5 md:py-3">
                    <i class="fas fa-regular fa-angle-right text-base sm:text-xl md:text-3xl"></i>
                </div>
            </a>
        </div>

        <br>

         <!-- The dots  -->
        <div class="flex justify-center items-center space-x-5">
            <div class="dot w-3 h-3 md:w-4 md:h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
            <div class="dot w-3 h-3 md:w-4 md:h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
            <div class="dot w-3 h-3 md:w-4 md:h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
            <div class="dot w-3 h-3 md:w-4 md:h-4 rounded-full cursor-pointer" onclick="currentSlide(4)"></div>
            <div class="dot w-3 h-3 md:w-4 md:h-4 rounded-full cursor-pointer" onclick="currentSlide(5)"></div>
        </div>
    </div>
</section>

<!-- FIN SECTION NOS DERNIERS MEUBLES -->

<!-- SECTION QUI SOMMES-NOUS-->

<section id="quiSommeNous" class="px-7 py-9 sm:px-10 sm:py-14 md:px-20 md:py-20 lg:py-20 lg:px-28 xl:py-20 xl:px-36 bg-orange">
    <div class="container mx-auto text-white flex flex-col space-y-6 sm:space-y-8 md:space-y-10 lg:flex-row lg:space-y-0 justify-between ">
        <div class="lg:w-3/4 md:w-full flex-col xl:px-16">
            <h1 class="text-2xl sm:text-3xl md:text-4xl text-justify font-bold uppercase mb-5 md:mb-10"> Qui sommes-nous ? </h1>
            <p class="sm:text-lg md:text-xl tracking-wider mb-6 md:mb-10">
                OKAZ est une entreprise créée en 2012, qui remet en circulation des articles d'ameublement. Un dépôt-vente dans lequel on peut acheter et vendre des meubles d'occasion.
                </br>
                </br>
                Nous proposons un large choix de mobiliers : chaises, tables, lits, luminaires...
                </br>Vous pouvez acheter nos meubles d'occasion directement en ligne ou vous rendre dans l'un de nos nombreux magasins répartis sur toute la France.
            </p>

            <div>
                <a href="about.php" class="py-1 px-3 sm:py-1 sm:px-4 md:py-2 md:px-6 lg:py-3 lg:px-8 rounded-full bg-blue hover-bg-darkgrey text-white font-semibold text-sm sm:text-base md:text-lg">
                    <i class="fas fa-regular fa-eye mr-2 text-sm sm:text-base"></i>En savoir plus
                </a>
            </div>
        </div>

        <div class="lg:w-1/4 w-full">
            <figure class="flex lg:flex-col items-center mt-10 flex-row space-x-6">
                <img src="./images/istockphoto-1194667952-612x612.jpg" alt="pdg_de_okaz" class="rounded-full w-32 sm:w-40 lg:w-60 mb-4">
                <figcaption class="text-center font-semibold sm:text-lg md:text-xl tracking-wider ">
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