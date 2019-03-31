        <?php

        session_start();

        require "smarty/Smarty.class.php";
        require "includes/functions.php";
        $db=connexion();


        echo($_COOKIE['id']);

        $sid = $_COOKIE['id'];
        $sidreq = $db->prepare("UPDATE users SET sid = '' WHERE id = '$sid'");
        $sidreq->execute();

        setcookie('id', '', time()-1,'/');

        $_SESSION['session'] = ["success", "Vous avez bien été déconnecté !"];
        header('Location: index.php');
        exit();
        