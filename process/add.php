<?php

    // Create the session cookie
    session_start();

    // Include some PHP files
    
    require "../includes/functions.php";
$db = connexion();


    // Connect to database with PDO
    

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
        echo($_COOKIE['id']);
        $filename = uniqid() . "." . explode('/', $_FILES['image']['type'])[1];
        move_uploaded_file($_FILES["image"]["tmp_name"], ROOT."/uploads / images/$filename");
        $query="INSERT INTO   messages(content,created_at,user_id,image) VALUES(:content,:created,:user,:img)";
        $prep=$db->prepare($query);
        $prep->bindValue(':content', $_POST['message']);
        $prep->bindValue(':created',time());
        $prep->bindValue(':user',$_COOKIE['id']);
        $prep->bindValue(':img',$filename);
        $prep->execute();

        header("Location: ../index.php");
        exit();

    }
