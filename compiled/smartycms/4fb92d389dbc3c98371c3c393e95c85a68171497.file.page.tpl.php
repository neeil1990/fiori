<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:01:50
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16511001175a2d768eea4964-46497000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fb92d389dbc3c98371c3c393e95c85a68171497' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/page.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16511001175a2d768eea4964-46497000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d768eef6b36_67891441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d768eef6b36_67891441')) {function content_5a2d768eef6b36_67891441($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>


<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
</ul>


<h1 class="phead" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>


<?php if ($_smarty_tpl->tpl_vars['page']->value->url=='reviews') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('reviews.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } elseif ($_smarty_tpl->tpl_vars['page']->value->url=='wishlist') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('products_session_wishlist.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?><?php }} ?>
