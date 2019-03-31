<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    
    require "../includes/functions.php";
$db = connexion();


    // Connect to database with PDO
    

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $id = $_POST['id'];
        
        $req = $db->prepare("DELETE FROM messages WHERE id = $id");
        $req->execute();

        $_SESSION['session'] = ["success", "Votre message a bien été supprimé."];
        header("Location: ../index.php");
        exit();

    }
