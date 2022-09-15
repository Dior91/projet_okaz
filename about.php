<?php
require_once './includes/header.php';



$title = 'A propos';
$subTitle = "Apprenez-en plus au sujet d'OKAZ";
require_once './includes/title.php';
?>

<!-- Contenu de la page -->


<section id="quiSommeNous" class="py-14 px-36 bg-white">
    <div class="container mx-auto  flex justify-between">
        <div class="w-3/4 gap-y-4">
            <h1 class="text-4xl text-justify font-bold uppercase  mb-10"> NOTRE HISTOIRE </h1>
            <p class="text-xl tracking-wider  mb-10 text-justify">
                Notre histoire débute en 2012 avec la création de notre tout premier magasin OKAZ à Villeneuve-le-Roi en Île-de-France.
                Très vite, l'activité se développe grâce à l'intérêt grandissant du grand public pour le marché de l'occasion. Huit années plus tard, nous possédons 9 magasins OKAZ réparties sur toute la France.
                <br />
                <br />
                Nous décidons, en 2022, de développer notre activité en ligne avec la création de notre site internet OKAZ.
            </p>
        </div>
        <div class="w-1/4">
            <figure class="flex flex-col items-center mt-10">
                <img src="https://media.istockphoto.com/photos/multi-ethnic-guys-and-girls-taking-selfie-outdoors-with-backlight-picture-id1368965646?b=1&k=20&m=1368965646&s=170667a&w=0&h=9DO-7OKgwO8q7pzwNIb3aq2urlw3DNTmpKQyvvNDWgY=" alt="pdg_de_okaz" class="w-[200px] h-[200px] rounded-full mb-4">
            </figure>
        </div>
    </div>
</section>
<!-- finsection a propos -->

<section id="quiSommeNous" class="py-20 px-3 bg-grey">
    <div class="container mx-auto ">
        <h2 class="text-center mb-10 text-4xl font-bold text-darkblue uppercase">Nos garanties</h2>

        <div class="grid grid-cols-2 gap-y-20 px-52 py-32 content-center">
            <div class="container mx-auto p-5 w-[300px] h-[350px] bg-white grid gap-y-2 border border-orange">
                <h4 class="text-center text-darkblue text-2xl font-bold uppercase">Qualité</h4>
                <i class="text-center text-orange fa-solid fa-star fa-3x"></i>
                <p class="text-center ">
                    Tous nos produits d'occasion sont contrôlés, vérifiés et leur état est certifié avant la mise en vente en ligne ou dans nos magasins.
                </p>
            </div>
            <div class="container mx-auto p-5 w-[300px] h-[350px] bg-white grid gap-y-2 border border-orange">
                <h4 class="text-center text-darkblue text-2xl font-bold uppercase">Fiabilité</h4>
                <i class="text-center text-orange fa-solid fa-handshake fa-3x"></i>
                <p class="text-center ">
                Nos équipes sont disponibles et demeurent à votre écoute pour toute question concernant les produits ou les services que ce soit avant ou après la vente.
            </p>
            </div>
            <div class="container mx-auto p-5 w-[300px] h-[350px] bg-white grid gap-y-2 border border-orange">
                <h4 class="text-center text-darkblue text-2xl font-bold uppercase">Economies</h4>
                <i class="text-center text-orange fa-solid fa-sack-dollar fa-3x"></i>
                <p class="text-center ">
                    Réalisez des économies en achetant des meubles d'occasions haute-gamme et en proposant vos propres meubles à la vente dans nos magasins.
                </p>
            </div>

            <div class="container mx-auto p-5 w-[300px] h-[350px] bg-white grid gap-y-2 border border-orange">
                <h4 class="text-center text-darkblue text-2xl font-bold uppercase">Respect de l'environnement</h4>
                <i class="text-center text-orange fa-solid fa-earth-americas fa-3x"></i>
                <p class="text-center ">
                    Ne jetez plus vos anciens meubles ! Recyclez-les en les proposant à la vente. Nos équipes se chargent d'estimer votre bien au prix le plus juste.
                </p>
            </div>
        </div>
    </div>
</section>


<?php require_once './includes/footer.php'; ?>