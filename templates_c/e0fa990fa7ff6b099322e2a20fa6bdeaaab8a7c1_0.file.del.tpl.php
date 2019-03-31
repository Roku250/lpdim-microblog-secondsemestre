<?php
/* Smarty version 3.1.33, created on 2019-03-31 13:15:56
  from 'D:\wamp64\www\microblog-master\templates\del.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca0bd8cb67920_04761044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0fa990fa7ff6b099322e2a20fa6bdeaaab8a7c1' => 
    array (
      0 => 'D:\\wamp64\\www\\microblog-master\\templates\\del.tpl',
      1 => 1554038150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca0bd8cb67920_04761044 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
            <div class="container">
                <div class="row">
                    <?php if (isset($_smarty_tpl->tpl_vars['session']->value)) {?>
                        <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['session']->value[0];?>
">
                            <span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['session']->value[1];?>
</span>
                        </div>
                    <?php }?>
                    <form method="post" action="process/supprimer.php">
                        <div class="alert alert-warning">
                            <span class="text-muted">Êtes-vous sûr de supprimer ce message (ID=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
) ?</span>
                        </div>
                        <div class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <a href="index.php" class="btn btn-primary btn-lg">Non, conserver</a>
                            <button type="submit" class="btn btn-success btn-lg">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section><?php }
}
