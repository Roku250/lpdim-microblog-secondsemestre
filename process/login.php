<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    
    require "../includes/functions.php";
    $db=connexion();

    // Connect to database with PDO
    

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $req = $db->prepare("SELECT id FROM users WHERE email = :email and password = :pass");
        $req->bindValue(':email', $_POST['email']);   
        $req->bindValue(':pass',$_POST['password']) ;
        $req->execute();
        

        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $sid = $result[0]['id'];

                $timestamp = date("H:i:s");
                $req = $db->prepare("UPDATE users SET sid = '$sid' WHERE email = '$email'");
                $req->execute();
                setcookie('id', $sid, time() + 86400 * 30, '/');
                $_SESSION['session'] = ["success", "Bonjour !"];
                header("Location: ../index.php");
                exit();

            

    }
