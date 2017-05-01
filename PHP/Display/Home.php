<?php
/**
 * Created by IntelliJ IDEA.
 * User: flori
 * Date: 20-04-17
 * Time: 12:22
 */

require_once("../Class/User.php");
require_once("../Class/DBConnect.php");
require_once("../Class/OperationUser.php");

session_start();

//Connexion à la BDD
$dbConnect = new DBConnect();
$dbConnect = $dbConnect->getDBConnection();

$operationUser = new OperationUser($dbConnect);

//Construction d'un objet user grâce à son adresse mail
$operationUser->constructUserFromDB($_SESSION['Email']);


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Inscription à OnlineWallet">
    <meta name="keywords"
          content="Banque en ligne, argent, Wallet, argent en ligne, portefeuille en ligne, portefeuille, EWallet, OnlineWallet, OnlineBank">
    <meta name="robots" content="index, follow">
    <meta name="geo.placename" content="Manage, Hainaut">
    <meta name="geo.region" content="BE-WHT">
    <meta name="author" lang="fr" content="Florian Di Vrusa">
    <meta name="generator" content="Intellij IDEA 2017.1">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../../CSS/StyleHome.css">
</head>

<body>
<div>
    <h5></h5>
</div>
<a href="Logout.php">Logout</a>
</body>
</html>


