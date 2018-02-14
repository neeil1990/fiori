<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:36
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5980144885a7d7f54759878-32633441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '5980144885a7d7f54759878-32633441',
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
  'unifunc' => 'content_5a7d7f54778b32_68779596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f54778b32_68779596')) {function content_5a7d7f54778b32_68779596($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
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
