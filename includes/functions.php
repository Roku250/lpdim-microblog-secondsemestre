<?php



    function connexion()
    {
    $serv="localhost";
    $user="root";
    $pass="";
    $bdd= "microblog";

    $pdo = new PDO("mysql:host=$serv;dbname=$bdd", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db=$pdo;
        return $db;
    }

    function verrifconnect()
    {
        if (isset($_COOKIE['id'])) {
            $db=connexion(); 
            $req = $db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
            $req->execute([
                "id" => $_COOKIE['id']
            ]);
            if ($req->rowCount() > 0) {
                return true;
            }
        }
        return false;
    }
