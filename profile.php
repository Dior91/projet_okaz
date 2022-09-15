<?php
require_once "./src/UserModel.php";
require_once './includes/header.php';
isLogged();
$userModel = new UserModel();
$user = $userModel->getUser(); 
?>

<!-- SECTION TITRE -->
<?php
$title = 'Mon profil';
$subTitle = '';
require_once './includes/title.php';

?>

<!-- FIN SECTION TITRE -->

<!-- ---- SECTION MON PROFIL --------- -->

<!-- --- nav bar------------ -->
<section class="py-20 px-40">
    <div class="container mx-auto flex justify-start ">
    <?php require_once './components/account_sidebar.php'; ?> 


<!-- -------- MES INFOS --------------- -->

        <div class ="container mx-auto w-3/4 pl-10 py-10 flex flex-col justify-items justify-center" >
            <div class= "flex justify-start gap-32"  >
                <div>
                    <ul class="mb-10">
                        <li class="font-bold text-xl"><h2 >Nom </h2></li>
                        <li class=""><p><?= $user["lastname"]?></p></li>          
                    </ul>
                    <ul class="mb-10">
                        <li class="font-bold text-xl"><h2>Prénom </h2></li>
                        <li class="mb-5"><p><?= $user["firstname"]?></p></li>       
                    </ul>
                </div>
                <div>
                    <ul class="mb-10">
                        <li class="font-bold text-xl"><h2> N° de téléphone </h2></li>
                        <li class=""><p><?= $user["telephone"]?></p></li>          
                    </ul>
                    <ul class="">
                        <li class="font-bold text-xl"><h2>Adresse </h2></li>
                        <li class=""><p><?= $user["address"] . ", " . $user["postal_code"] . " " . $user["city"]?></p></li> 
                    </ul>
                </div>
                <div>
                    <ul class="mb-16">
                        <li class="font-bold text-xl"><h2>Votre adresse e-mail </h2></li>
                        <li class=""><p><?= $user["email"]?></p></li>          
                    </ul>
                    <a href="modify_profile.php" class="py-2 px-8 border-[1px] border-black font-semibold text-lg ">
                      <i class="fas fa-light fa-pencil mr-2"></i>Modifier
                    </a>
                </div>

            </div>
            <hr class="border-b-[1px] border-black">
            <div class="flex space-x-72">
                
                <ul class="my-10">
                        <li class="font-bold text-xl"><h2 ><i class="fas fa-regular fa-lock fa-xl pr-5"></i>Votre mot de passe </h2></li>
                        <li class="pl-12"><p>********</p></li>          
                </ul>
                <div class="my-10">
                    <a href="modify_password.php" class="py-2 px-8 border-[1px] border-black font-semibold text-lg">
                    <i class="fas fa-light fa-pencil mr-2"></i>Modifier
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