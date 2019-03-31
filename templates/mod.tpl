<section>
            <div class="container">
                <div class="row">
                    {if isset($session)}
                        <div class="alert alert-{$session[0]}">
                            <span class="text-muted">{$session[1]}</span>
                        </div>
                    {/if}
                    <form method="post" action="process/modifier.php">
                        <div class="col-sm-10">  
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="Message">{$content}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" name="id" value="{$id}">
                            <button type="submit" class="btn btn-success btn-lg">Modifier</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </section>