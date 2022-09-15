<?php
require_once './src/UserModel.php';
require_once "./includes/header.php";
$um = new UserModel();
$um->logoutUser();
require_once "./includes/footer.php";