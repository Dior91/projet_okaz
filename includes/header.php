<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./CSS/font-awesome.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/colors.css">
    <title>OKAZ</title>
</head>

<body class= "flex flex-col h-screen">
    <div class="">
        <header class="py-2 px-4 sm:px-10 md:py-3 md:px-20 bg-darkblue">
            <div class="container flex mx-auto justify-between items-center">
                <div class="flex place-items-center gap-3">
                    <i class="fa-brands fa-facebook-f text-base sm:text-xl md:text-2xl" style="--fa-primary-color: white"></i>
                    <i class="fa-brands fa-instagram text-base sm:text-xl md:text-2xl"></i>
                    <i class="fa-brands fa-twitter text-base sm:text-xl md:text-2xl"></i>
                </div>
                <?php if ($user) { ?>
                    <div class="flex justify-between items-center space-x-6 md:space-x-14">
                        <div class="flex items-center md:space-x-5 space-x-2">
                            <?php if ($_SESSION["okaz_logged_user"]["role"] == "admin") { ?>
                                <a class="text-sm sm:text-base md:text-lg text-white hover-text-orange uppercase md:mr-5" href="./Backoffice/back_office.php">Back-Office</a>
                            <?php } ?>
                            <a href="myaccount.php">
                                <div class=" md:bg-orange-500 sm:py-0 sm:px-2 md:px-3 md:hover:bg-blue-500 rounded-2xl flex gap-3 place-items-center ">
                                    <i class="fa-solid fa-circle-user text-white text-base sm:text-xl md:text-2xl"></i>
                                    <p class="sm:text-base md:text-lg text-white font-semibold hidden md:block">Mon compte</p>
                                </div>
                            </a>
                            <a href="cart.php"> <i class="place-self-center text-white hover:text-gray-300 fa-solid fa-cart-arrow-down text-base sm:text-xl md:text-2xl"></i></a>
                        </div>
                        <form action="logout.php" class="md:ml-6" method="post">
                            <button class="text-white hover:text-gray-300">
                                <i class="place-self-center fa-solid fa-power-off text-base sm:text-xl md:text-2xl"></i>
                            </button>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="flex justify-between items-center gap-5">
                        <ul class="list-none flex gap-6 justify-between items-center">
                            <li>
                                <a class="sm:text-base md:text-lg text-white hover-text-orange" href="login.php">
                                    <i class="fa-solid fa-arrow-right-to-bracket mr-3 text-base sm:text-xl md:text-2xl"></i>Connexion</a>
                            </li>
                            <li>
                                <a class="sm:text-base md:text-lg text-white hover-text-orange" href="signup.php">
                                    <i class="fa-solid fa-inbox mr-3 text-base sm:text-xl md:text-2xl"></i>Inscription</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </header>
        <nav class="py-3 px-4 sm:py-4  sm:px-10 md:py-4 md:px-20 border-b-slate-400 border-2 bg-white ">
            <div class="container mx-auto flex justify-between items-center">
                <a href="index.php">
                    <img class="w-14 sm:w-16 md:w-20" src="./images/logo_okaz.png" alt="logo_okaz">
                </a>
                <ul class="list-none flex space-x-3 sm:space-x-6 justify-between items-center">
                    <li>
                        <a class="text-sm sm:text-lg md:text-xl text-darkgrey hover-text-orange active-text-orange" href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a class="text-sm sm:text-lg md:text-xl text-darkgrey hover-text-orange active:text-orange" href="about.php">A propos</a>
                    </li>
                    <li>
                        <a class="text-sm sm:text-lg md:text-xl text-darkgrey hover-text-orange active-text-orange" href="shop.php">Boutique</a>
                    </li>
                    <li>
                        <a class="text-sm sm:text-lg md:text-xl text-darkgrey hover-text-orange active-text-orange" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>