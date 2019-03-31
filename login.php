        <?php

        // Create the session cookie
        session_start();

        require "smarty/Smarty.class.php";

        // Include some PHP files

        require "includes/functions.php";

        // Connect to database with PDO
        $session = null;
        if (array_key_exists("session", $_SESSION)) {
            $session = $_SESSION["session"];
            unset($_SESSION["session"]);
        }

        // Include the website header
        require "includes/header.inc.php";


        $smarty = new Smarty();
        $smarty->assign([
            "session" => $session
        ]);
        $smarty->display("templates/login.tpl");

        // Include the website footer
        require "includes/footer.inc.php";

        ?> 