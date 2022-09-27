<?php
require_once './includes/phpheaders.php';
require_once './includes/header.php';

$title = 'A propos';
$subTitle = "Apprenez-en plus au sujet d'OKAZ";
require_once './includes/title.php';
?>

<!-- Contenu de la page -->



<section id="mb-auto quiSommeNous" class="px-7 py-14 sm:px-10 sm:py-14 md:px-20 md:py-20 lg:py-16 lg:px-28 xl:px-36">
    <div class="container mx-auto flex flex-col space-y-4 sm:space-y-8 md:space-y-10 lg:space-x-10 lg:flex-row justify-between ">
        <div class="lg:w-3/4 md:w-full flex-col xl:px-16">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl text-justify font-bold uppercase mb-5 md:mb-10"> NOTRE HISTOIRE</h1>
            <p class="sm:text-lg  tracking-wider mb-6 md:mb-10 text-justify">
                Notre histoire débute en 2012 avec la création de notre tout premier magasin OKAZ à Villeneuve-le-Roi en Île-de-France.
                Très vite, l'activité se développe grâce à l'intérêt grandissant du grand public pour le marché de l'occasion. Huit années plus tard, nous possédons 9 magasins OKAZ réparties sur toute la France.
                <br />
                <br />
                Nous décidons, en 2022, de développer notre activité en ligne avec la création de notre site internet OKAZ.
            </p>
        </div>
        <div class="w-1/4 mt-10 block m-auto">
            <img src="https://media.istockphoto.com/photos/multi-ethnic-guys-and-girls-taking-selfie-outdoors-with-backlight-picture-id1368965646?b=1&k=20&m=1368965646&s=170667a&w=0&h=9DO-7OKgwO8q7pzwNIb3aq2urlw3DNTmpKQyvvNDWgY=" alt="pdg_de_okaz" class="w-[100px] h-[100px] md:w-[200px] md:h-[200px] rounded-full mb-4">
        </div>
    </div>
</section>
<!-- finsection a propos -->

<section class="mb-auto py-20 px-3 md:px-16 lg:py-32 xl:px-32 bg-grey">
    <h2 class="text-center mb-14 lg:mb-20 xl:mb-28 text-2xl md:text-3xl lg:text-4xl  font-bold text-darkblue uppercase">Nos garanties</h2>
    <div class="grid md:grid-cols-2 gap-y-8 lg:gap-y-20 content-center">
        <div class="container mx-auto p-3 lg:p-5 w-[200px] h-[250px] lg:w-[300px] lg:h-[320px] xl:h-[350px] bg-white flex flex-col space-y-2 lg:space-y-6 border border-orange">
            <h4 class="text-center text-darkblue text-lg lg:text-2xl font-bold uppercase">Qualité</h4>
            <i class="text-center text-orange fa-solid fa-star text-2xl lg:text-3xl xl:text-4xl"></i>
            <p class="text-center text-sm lg:text-base">
                Tous nos produits d'occasion sont contrôlés, vérifiés et leur état est certifié avant la mise en vente en ligne ou dans nos magasins.
            </p>
        </div>
        <div class="container mx-auto p-3 lg:p-5 w-[200px] h-[250px] lg:w-[300px] lg:h-[320px] xl:h-[350px] bg-white flex flex-col space-y-2 lg:space-y-6 border border-orange">
            <h4 class="text-center text-darkblue text-lg lg:text-2xl  font-bold uppercase">Fiabilité</h4>
            <i class="text-center text-orange fa-solid fa-handshake text-2xl lg:text-3xl xl:text-4xl"></i>
            <p class="text-center text-sm lg:text-base">
                Nos équipes sont disponibles et demeurent à votre écoute pour toute question concernant les produits ou les services que ce soit avant ou après la vente.
            </p>
        </div>
        <div class="container mx-auto p-3 lg:p-5 w-[200px] h-[250px] lg:w-[300px] lg:h-[320px] xl:h-[350px] bg-white flex flex-col space-y-2 lg:space-y-6 border border-orange">
            <h4 class="text-center text-darkblue text-lg lg:text-2xl font-bold uppercase">Economies</h4>
            <i class="text-center text-orange fa-solid fa-sack-dollar text-2xl lg:text-3xl xl:text-4xl"></i>
            <p class="text-center text-sm lg:text-base">
                Réalisez des économies en achetant des meubles d'occasions haute-gamme et en proposant vos propres meubles à la vente dans nos magasins.
            </p>
        </div>

        <div class="container mx-auto p-3 lg:p-5 w-[200px] h-[250px] lg:w-[300px] lg:h-[320px] xl:h-[350px] bg-white flex flex-col space-y-2 lg:space-y-6 border border-orange">
            <h4 class="text-center text-darkblue text-lg lg:text-2xl font-bold uppercase">Respect de l'environnement</h4>
            <i class="text-center text-orange fa-solid fa-earth-americas text-2xl lg:text-3xl xl:text-4xl"></i>
            <p class="text-center text-sm lg:text-base">
                Ne jetez plus vos anciens meubles ! Recyclez-les en les proposant à la vente. Nos équipes se chargent d'estimer votre bien au prix le plus juste.
            </p>
        </div>
    </div>
</section>


<?php require_once './includes/footer.php'; ?>