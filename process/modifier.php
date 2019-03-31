<?php

    session_start();
    require "../includes/functions.php";
    $db=connexion();
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $content = $_POST['message'];
        $id = $_POST['id'];

        if (!empty($content) && strlen($content) <= 280) {

            $req = $db->prepare("UPDATE messages SEt content = \"$content\" WHERE id = $id");
            $req->execute();

            $_SESSION['session'] = ["success", "Votre message a bien été modifié."];
            header("Location: ../index.php");
            exit();

        }
        header("Location: ../modifier.php?id=$id");
        exit();

    }
