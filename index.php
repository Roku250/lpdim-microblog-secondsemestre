        <?php

        // Create the session cookie
        session_start();

        // Include some PHP files

        require "includes/functions.php";
        require "smarty/Smarty.class.php";

        // Connect to database with PDO
        $db = connexion();
        $auth = verrifconnect();
        $session = null;
        if (array_key_exists("session", $_SESSION)) {
            $session = $_SESSION["session"];
            unset($_SESSION["session"]);
        }

        // Include the website header
        require "includes/header.inc.php";

        // Number of messages per page
        $limitPerPage = 5;

        // Numbers of messages in the database
        $nbMessages = $db->query("SELECT COUNT(id) as n FROM messages");
        $nbMessages = $nbMessages->fetch()['n'];

        // Numbers of pages
        $nbPages = ceil($nbMessages / $limitPerPage);

        // Current page (where is the user)
        $currentPage = (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPages) ? $_GET['p'] : 1;

        // First message of the page
        $begin = ($currentPage - 1) * $limitPerPage;

        // Previous page
        $prev = $currentPage - 1;
        $next = $currentPage + 1;
        ?><!--
        <br><br>
        <div class="row">            
            <form method="post" action="process/add.php" enctype="multipart/form-data">
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                </div>
            </form>
        </div>-->

        <?php

        // Get messages from the database (only for one page)
        $req = $db->prepare("SELECT m.id, content, created_at, likes, username FROM messages as m INNER JOIN users as u ON u.id = user_id ORDER BY created_at DESC LIMIT $begin,$limitPerPage");
        $req->execute();
        $messages = $req->fetchAll();

        for ($i = 0; $i < sizeof($messages); $i++) {
            $messages[$i]["content"] = preg_replace_callback("#(http(s|):\/\/([a-zA-Z0-9.-]{3,60})(\/|)([a-zA-Z0-9-._\/]+|))#", function ($matches) {
                return "<a href='{$matches[1]}' target='_blank'>{$matches[1]}</a>";
            }, $messages[$i]["content"]);
            $messages[$i]["content"] = preg_replace_callback("#@([a-zA-Z0-9-_]{2,60})#", function ($matches) {
                return "<a href='https://twitter.com/{$matches[1]}' target='_blank'>{$matches[0]}</a>";
            }, $messages[$i]["content"]);
        }
        $previousLink = ($prev <= 1) ? 'disabled' : '';
        $nextLink = ($next >= $nbPages) ? 'disabled' : '';

        // Flash, Auth, Messages, Prev, Next, PreviousLink, NextLink, CurrentPage, NbPages

        $smarty = new Smarty;
        $smarty->assign([
            "session" => $session,
            "auth" => $auth,
            "posts" => $messages,
            "prev" => $prev,
            "next" => $next,
            "prevLink" => $previousLink,
            "nextLink" => $nextLink,
            "current" => $currentPage,
            "pages" => $nbPages
        ]);
        $smarty->display("templates/index.tpl");

        // Include the website footer
        require "includes/footer.inc.php";

        ?> 