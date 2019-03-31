<?php

require_once('includes/functions.php');

require "smarty/Smarty.class.php";
session_start();
$db = connexion();
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];

if (array_key_exists("session", $_SESSION)) {
    $session = $_SESSION["session"];
    unset($_SESSION["session"]);
}

// Include the website header
require "includes/header.inc.php";

$req = $db->prepare("SELECT content FROM messages WHERE id = '$id'");
$req->execute();

$message = $req->fetch();


$smarty = new Smarty();
$smarty->assign([
    "session" => $session,
    "id" => $id
]);
$smarty->display("templates/del.tpl");

// Include the website footer
require "includes/footer.inc.php";

