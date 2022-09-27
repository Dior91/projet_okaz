<?php
// Fonction pour récupérer l'utilisateur connecté
function getLoggedUser()
{
  if (isset($_SESSION["okaz_logged_user"])) return $_SESSION["okaz_logged_user"];
  else return false;
}

function redirect()
{
    // On redirige vers la page d'accueil
    if(isset($_SERVER['HTTP_REFERER'])){
    header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: index.php");
    }
    exit;
}

function redirection($page)
{
    header("Location:". $page);
    exit;
}

// Cette fonction vérifie l'ID en query string et nous retourne cet ID
function checkQueryId()
{
    // Nous vérifions si notre query ID existe bien, et a une valeur numéric
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        redirect();
    }
    return (int)$_GET["id"];
}

function isLogged()
{
  if (!getLoggedUser()) redirect();
}
