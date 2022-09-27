<?php
require_once './includes/phpheaders.php';

require_once './includes/header.php';
$title = 'Foire aux questions';
$subTitle = '';
require_once './includes/title.php';
?>
 
<!-- Contenu de la page -->
<section class="mb-auto container px-6 py-10 md:px-20 lg:px-40 md:py-20">
    <h2 class="text-center text-darkblue text-2xl lg:text-3xl font-semibold mb-10 lg:mb-20 ">Retrouvez les réponses aux questions les plus fréquemment posées</h2>
    <div class="flex flex-col space-y-16">
    <div class="w-full xl:w-2/3">
        <h3 class="font-semibold text-xl lg:text-2xl mb-5 text-orange">Comment vendre sur OKAZ ?</h3>
        <p class="text-lg lg:text-xl "> Il est possible de nous proposer vos meubles à la vente. Nos experts se chargent d'estimer leur valeurs. 
            Pour cela, il vous suffit de vous rendre en magasin. Retrouvez plus d'informations sur le processus de vente sur la page <a class = "underline text-blue-600 hover:text-blue-800" href="sell.php">Vendre chez OKAZ</a>.
        </p>
    </div>
    <div class="w-full xl:w-2/3">
        <h3 class="font-semibold text-2xl mb-5 text-blue">Puis-je acheter des meubles disponibles dans différents magasins?</h3>
        <p class="text-lg lg:text-xl "> Sur chaque page produit, il est indiqué le magasin dans lequel le produit est disponible. Vous avez alors la possibilité d'aller acheter le produit directement en magasin.
            Si vous commandez en ligne, vous pouvez ajouter à votre panier des produits disponibles dans différents magasins. Chaque magasin se chargera d'expédier le produit demandé. 
        </p>
    </div>
    <div class="w-full xl:w-2/3">
        <h3 class="font-semibold text-2xl mb-5 text-orange">Comment retourner un article ?</h3>
        <p class="text-lg lg:text-xl "> Vous pouvez retourner tout article acheté en ligne dans le délai légal de 14 jours. Pour cela, il suffit de nous contacter par mail 
            et nous vous enverrons le bon de retour qui vous permettra de nous renvoyer votre colis. 
            <br/> Vous pouvez également retourner votre article dans le magasin OKAZ le plus proche de chez vous.
        </p>
    </div>
    <div class="w-full xl:w-2/3">
        <h3 class="font-semibold text-2xl mb-5 text-blue">Quels sont les délais d'expédition ?</h3>
        <p class="text-lg lg:text-xl ">Dès lors que votre commande est validée, nos équipes se chargent de la préparer dans les plus brefs délais
            Habituellement, les délais d'expédition sont de 3 jours ouvrés. Vous serez informés par mail de l'expédition de votre commande.
        </p>
    </div>
    <div class="w-full xl:w-2/3">
        <h3 class="font-semibold text-2xl mb-5 text-orange">A combien s'élèvent les frais de livraison ?</h3>
        <p class="text-lg lg:text-xl ">Les frais de livraison de votre commande dépendent du poids de votre commande, du transporteur et de votre localité.
        </p>
    </div>
    </div>
</section>

<?php require_once './includes/footer.php'; ?>
