        <?php

        // Create the session cookie
        session_start();
        require "smarty/Smarty.class.php";
        require "includes/functions.php";
        $db = connexion();
        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit();
        }
        $id = $_GET['id'];
        $session = null;
        if (array_key_exists("session", $_SESSION)) {
            $session = $_SESSION["session"];
            unset($_SESSION["session"]);
        }

        require "includes/header.inc.php";

        $req = $db->prepare("SELECT content FROM messages WHERE id = '$id'");
        $req->execute();

        $message = $req->fetch();


        $smarty = new Smarty();
        $smarty->assign([
            "session" => $session,
            "id" => $id,
            "content" => $message['content']
        ]);
        $smarty->display("templates/mod.tpl");

        // Include the website footer
        require "includes/footer.inc.php";

        ?> 