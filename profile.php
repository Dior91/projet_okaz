<?php
require_once './includes/phpheaders.php';
isLogged();
require_once "./src/UserModel.php";
$userModel = new UserModel();
$user = $userModel->getUser(); 
?>

<!-- SECTION TITRE -->
<?php
require_once './includes/header.php';
$title = 'Mon profil';
$subTitle = '';
require_once './includes/title.php';

?>

<!-- FIN SECTION TITRE -->

<!-- ---- SECTION MON PROFIL --------- -->

<!-- --- nav bar------------ -->
<section class="mb-auto py-10 px-2 sm:py-10 sm:px-10 md:py-10 md:px-20 2xl:py-20 2xl:px-40">
    <div class="container mx-auto flex justify-start ">
    <?php require_once './components/account_sidebar.php'; ?> 


<!-- -------- MES INFOS --------------- -->

        <div class ="container mx-auto w-3/4 pl-5 md:pl-10 py-10 flex flex-col justify-items justify-center" >
            <div class= "flex flex-col lg:flex-row lg:justify-start lg:gap-16 mb-5"  >
                <div>
                    <ul class="mb-2 lg:mb-10">
                        <li class="font-bold text-sm sm:text-base xl:text-lg"><h2 >Nom </h2></li>
                        <li class="text-sm sm:text-base xl:text-lg"><p><?= $user["lastname"]?></p></li>          
                    </ul>
                    <ul class="mb-2 lg:mb-0">
                        <li class="font-bold text-sm sm:text-base xl:text-lg"><h2>Prénom </h2></li>
                        <li class="text-sm sm:text-base xl:text-lg"><p><?= $user["firstname"]?></p></li>       
                    </ul>
                </div>
                <div>
                    <ul class="mb-2 lg:mb-10">
                        <li class="font-bold text-sm sm:text-base xl:text-lg"><h2> N° de téléphone </h2></li>
                        <li class="text-sm sm:text-base xl:text-lg"><p><?= $user["telephone"]?></p></li>          
                    </ul>
                    <ul class="mb-2 lg:mb-0">
                        <li class="font-bold text-sm sm:text-base xl:text-lg"><h2>Adresse </h2></li>
                        <li class="text-sm sm:text-base xl:text-lg"><p><?= $user["address"] . ", " . $user["postal_code"] . " " . $user["city"]?></p></li> 
                    </ul>
                </div>
                <div class="mb-2 md:mb-5 lg:mb-10">
                    <ul class=" mb-6 md:mb-8 lg:mb-16">
                        <li class="font-bold text-sm sm:text-base xl:text-lg"><h2>Votre adresse e-mail </h2></li>
                        <li class="text-sm sm:text-base xl:text-lg"><p><?= $user["email"]?></p></li>          
                    </ul>
                    <div class="mb-2">
                        <a href="modify_profile.php" class=" py-1 px-1 md:py-2 md:px-8 border-[1px] border-black font-semibold text-sm  sm:text-base xl:text-lg">
                        <i class="fas fa-light text-sm xl:text-lg fa-pencil mr-1 md:mr-2"></i>Modifier
                        </a>
                   </div>
                    
                </div>

            </div>
            <hr class="border-b-[1px] border-black">
            <div class="flex flex-col lg:flex-row  lg:space-x-60 xl:space-x-72 py-2 mb-2">
                
                <ul class="my-5 lg:my-10">
                        <li class="font-bold text-sm sm:text-base xl:text-lg mb-2"><h2 ><i class="fas fa-regular fa-lock fa-lg lg:pr-4 pr-2"></i>Votre mot de passe </h2></li>
                        <li class="pl-6 lg:pl-12 text-sm xl:text-lg sm:mb-4 odd:"><p>********</p></li>          
                </ul>
                <div class="mb-3 block mx-auto lg:my-10">
                    <a href="modify_password.php" class=" py-1 px-1 md:py-2 md:px-8 border-[1px] border-black font-semibold text-sm sm:text-base xl:text-lg">
                    <i class="fas fa-light text-sm xl:text-lg fa-pencil mr-1 md:mr-2"></i>Modifier
                    </a>
                </div>
            </div>
            <hr class="border-b-[1px] border-black"> 
        </div>
    </div>    
</section>
     

<!-- ---- SECTION MON PROFIL--------- -->


<!-- ------- footer -------- -->
<?php require_once './includes/footer.php'; ?>