<?php
session_start();
require_once dirname(__DIR__) . "/utils/utils.php";
require_once './vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$user = getLoggedUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./CSS/font-awesome.css">
    <link rel="stylesheet" href="./CSS/colors.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>OKAZ</title>
</head>

<body>
    <div class="">
        <header class="py-3 px-20 bg-darkblue">
            <div class="container flex mx-auto justify-between items-center">
                <div class="flex place-items-center gap-3">
                    <i class="fa-brands fa-facebook-f fa-xl" style="--fa-primary-color: white"></i>
                    <i class="fa-brands fa-instagram fa-xl"></i>
                    <i class="fa-brands fa-twitter fa-xl"></i>
                </div>
                <?php if($user) {?>
                <div class="flex justify-between items-center space-x-14">
                    <div class="flex items-center space-x-5">
                        <a href="myaccount.php">
                            <div class=" bg-orange py-1 px-3 hover-bg-blue rounded-2xl flex gap-3 place-items-center">
                                <i class="fa-solid fa-circle-user text-white  fa-xl"></i>
                                <p class="text-lg text-white font-semibold">Mon compte</p>
                            </div>
                        </a>
                        <a href="cart.php"> <i class="place-self-center text-white hover:text-gray-300 fa-solid fa-cart-arrow-down fa-xl"></i></a>
                    </div>
                    <form action="logout.php" class="ml-6" method="post">
                        <button class="text-white hover:text-gray-300">
                            <i class="place-self-center fa-solid fa-power-off fa-xl"></i>
                        </button>
                    </form>
                    <!-- <a href="logout.php.php"> <i class="place-self-center text-white hover:text-gray-300 fa-solid fa-power-off fa-xl"></i></a> -->
                </div>
                <?php }else{ ?>
                <div class="flex justify-between items-center gap-5">
                    <ul class="list-none flex gap-6 justify-between items-center">
                        <li>
                            <a class="text-lg text-white hover-text-orange" href="login.php">
                                <i class="fa-solid fa-arrow-right-to-bracket mr-3"></i>Connexion</a>
                        </li>
                        <li>
                            <a class="text-lg text-white hover-text-orange" href="signup.php">
                                <i class="fa-solid fa-inbox mr-3"></i>Inscription</a>
                        </li>
                    </ul>
                </div> 
                <?php } ?>
            </div>
        </header>

        <nav class="py-4 px-20 border-b-slate-400 border-2 bg-white ">
            <div class="container mx-auto flex justify-between items-center">
                <a href="index.php">
                    <img class="w-20" src="./images/logo_okaz.png" alt="logo_okaz">
                </a>
                <ul class="list-none flex gap-6 justify-between items-center">
                    <li>
                        <a class="text-xl  text-darkgrey hover-text-orange active-text-orange" href="index.php">Acceuil</a>
                    </li>
                    <li>
                        <a class="text-xl text-darkgrey hover-text-orange active:text-orange" href="about.php">A propos</a>
                    </li>
                    <li>
                        <a class="text-xl text-darkgrey hover-text-orange active-text-orange" href="shop.php">Boutique</a>
                    </li>
                    <li>
                        <a class="text-xl text-darkgrey hover-text-orange active-text-orange" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>