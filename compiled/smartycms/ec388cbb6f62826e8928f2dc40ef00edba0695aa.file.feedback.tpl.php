<?php /* Smarty version Smarty-3.1.18, created on 2017-12-11 01:30:05
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14042498015a2db56d5c36d6-72530713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec388cbb6f62826e8928f2dc40ef00edba0695aa' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/feedback.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14042498015a2db56d5c36d6-72530713',
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
  'unifunc' => 'content_5a2db56d60ac90_61570767',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2db56d60ac90_61570767')) {function content_5a2db56d60ac90_61570767($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
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
<?php }} ?>
