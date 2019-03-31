<section>
            <div class="container">
                <div class="row">
                    {if isset($session)}
                        <div class="alert alert-{$session[0]}">
                            <span class="text-muted">{$session[1]}</span>
                        </div>
                    {/if}
                    <form method="post" action="process/supprimer.php">
                        <div class="alert alert-warning">
                            <span class="text-muted">Êtes-vous sûr de supprimer ce message (ID={$id}) ?</span>
                        </div>
                        <div class="d-inline">
                            <input type="hidden" name="id" value="{$id}">
                            <a href="index.php" class="btn btn-primary btn-lg">Non, conserver</a>
                            <button type="submit" class="btn btn-success btn-lg">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>