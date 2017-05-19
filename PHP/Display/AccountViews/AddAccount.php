<?php
/**
 * Created by IntelliJ IDEA.
 * User: flori
 * Date: 12-05-17
 * Time: 14:10
 */

include_once("../UserPages/Header.php");
require_once ("../../Class/OperationAccount.php");
require_once ("../../Class/DBConnect.php");

$dbConnect = new DBConnect();
$dbConnect = $dbConnect->getDBConnection();

$operationAddAccount = new OperationAccount($dbConnect);


if ($_SESSION['UserRight'] >= 1) {

    //Vérification
    if (isset($_POST['AccountName']) && isset($_POST['Type']) && isset($_POST['Motto']) && isset($_POST['Balance']) &&
        !empty($_POST['AccountName']) && !empty($_POST['Type']) && !empty($_POST['Motto']) && !empty($_POST['Balance'])) {

        $operationAddAccount->addAccount($_SESSION['Email'], $_POST['AccountName'], $_POST['Type'], $_POST['Motto'], $_POST['Balance']);

    } else {

        ?>

        <head>
            <link rel="stylesheet" type="text/css" href="../../../CSS/StyleAccountAdd.css">
        </head>

        <form method="POST" action="AddAccount.php">

            <div id="addAccount">

                <h3 id="formTitle">Add Account</h3>

                <input pattern="[A-Za-z0-9 -]{2,40}" title="Only letters or numbers. Make sure that name is not too long (40 characters max)" class="field" type="text"
                       name="AccountName" placeholder="Account Name"><br>

                <select class="field" name="Type">
                    <option value="Current Account">Current Account</option>
                    <option value="Savings Account">Savings Account</option>
                    <option value="Pension Plan">Pension Plan</option>
                </select>

                <select class="field" name="Motto">
                    <option value="Euro €">Euro €</option>
                    <option value="Dollar $">Dollar $</option>
                    <option value="Pound £">Pound £</option>
                    <option value="Yen ¥ ">Yen ¥</option>
                    <option value="Yuan Ұ ">Yuan Ұ</option>
                    <option value="Won ₩">Won ₩</option>
                    <option value="Rouble руб">Rouble руб</option>
                </select>

                <input class="field" type="number" max = "1 000  000" min="0" name="Balance" placeholder="Balance"><br>

                <input id="button" type="submit" value="Add Account" title="Add Account">

            </div>

        </form>

        <?php

    }

} else {

    header("Location: ../Login_SignUp/Login.php");
}