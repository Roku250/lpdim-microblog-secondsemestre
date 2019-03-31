        <?php
            
            if (array_key_exists("session", $_SESSION)) {

                ?>

                    <div class="alert alert-<?= $_SESSION['session'][0] ?>">
                        <span class="text-muted"><?= $_SESSION['session'][1] ?></span>
                    </div>
                
                <?php

                unset($_SESSION['session']);

            }

        ?>
