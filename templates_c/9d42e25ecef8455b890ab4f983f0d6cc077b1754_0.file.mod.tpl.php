<?php
/* Smarty version 3.1.33, created on 2019-03-31 13:17:26
  from 'D:\wamp64\www\microblog-master\templates\mod.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca0bde67b3c17_36250781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d42e25ecef8455b890ab4f983f0d6cc077b1754' => 
    array (
      0 => 'D:\\wamp64\\www\\microblog-master\\templates\\mod.tpl',
      1 => 1554038150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca0bde67b3c17_36250781 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <form method="post" action="process/modifier.php">
                        <div class="col-sm-10">  
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control" placeholder="Message"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</textarea>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <button type="submit" class="btn btn-success btn-lg">Modifier</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </section><?php }
}
