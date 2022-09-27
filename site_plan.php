<?php
require_once './includes/phpheaders.php';

$title = 'Plan du site';
$subTitle = '';
require_once './includes/header.php';
require_once './includes/title.php';
?>

<!-- Contenu de la page -->
<section class="mb-auto container py-14 px-10 md:p-20 lg:p-28 flex flex-col space-y-10">
    <div class="">
        <h2 class="font-semibold text-darkblue text-2xl lg:text-3xl mb-5 ">OKAZ</h2>
        <ul class="text-lg lg:text-xl pl-10 list-disc flex flex-col space-y-2">
            <li class=""><a href="index.php">Accueil</a></li>
            <li class=""><a href="about.php">A propos</a></li>
            <li class=""><a href="shop.php">Boutique</a></li>
            <li class=""><a href="contact.php">Contact</a></li>
            <li class=""><a href="sell.php">Vendre chez OKAZ</a></li>
            <li class=""><a href="faq.php">Foire aux questions</a></li>
        </ul>
    </div>
    <div>
        <h2 class="font-semibold text-darkblue text-2xl lg:text-3xl mb-5 ">Boutique</h2>
        <ul class="text-lg lg:text-xl pl-10 list-disc flex flex-col space-y-2">
            <li><a href="http://localhost/okaz/categories.php?id=1">Tables</a></li>
            <li><a href="http://localhost/okaz/categories.php?id=2">Chaises et fauteuils</a></li>
            <li><a href="http://localhost/okaz/categories.php?id=3">Canapés</a></li>
            <li><a href="http://localhost/okaz/categories.php?id=4">Meubles de rangement</a></li>
            <li><a href="http://localhost/okaz/categories.php?id=5">Lits</a></li>
            <li><a href="http://localhost/okaz/categories.php?id=6">Luminaires</a></li>
        </ul>
    </div>
    <div class="">
        <h2 class="font-semibold text-darkblue text-2xl lg:text-3xl mb-5 ">Magasins</h2>
        <ul class="text-lg lg:text-xl pl-10 list-disc flex flex-col space-y-2">
            <li class=""><a href="stores.php#1">Okaz - Villeneuve-le-Roi</a></li>
            <li class=""><a href="stores.php#2">Okaz - Evry</a></li>
            <li class=""><a href="stores.php#3">Okaz - Coignières</a></li>
            <li class=""><a href="stores.php#4">Okaz - Orléans</a></li>
            <li class=""><a href="stores.php#5">Okaz - Bordeaux</a></li>
            <li class=""><a href="stores.php#6">Okaz - Dunkerque</a></li>
            <li class=""><a href="stores.php#7">Okaz - Strasbourg</a></li>
            <li class=""><a href="stores.php#8">Okaz - Nantes</a></li>
            <li class=""><a href="stores.php#9">Okaz - Aix-en-Provence</a></li>
        </ul>
    </div>
</section>

<?php require_once './includes/footer.php'; ?>