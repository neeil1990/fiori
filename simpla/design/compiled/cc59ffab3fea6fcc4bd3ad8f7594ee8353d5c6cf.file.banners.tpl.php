<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:08:33
         compiled from "simpla/design/html/banners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8431829835a2d78217cc533-14929843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc59ffab3fea6fcc4bd3ad8f7594ee8353d5c6cf' => 
    array (
      0 => 'simpla/design/html/banners.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8431829835a2d78217cc533-14929843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7821829907_95111363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7821829907_95111363')) {function content_5a2d7821829907_95111363($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
<li class="active"><a href="index.php?module=BannersAdmin">Категории баннеров</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Баннеры", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<h1>Баннеры</h1>
	<a class="add" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'BannerAdmin','return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
">Добавить категорию</a>
</div>

<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
<div id="main_list" class="categories">

	<form id="list_form" method="post">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">

		<div id="list" class="brands">
			<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
			<div class="row">
				<div class="cell">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'BannerAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
				</div>
				<div class="icons cell">
					<a class="delete"  title="Удалить" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'BannersAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'mode'=>'delete','return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"></a>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		</div>
	</form>
</div>
<?php } else { ?>
Нет баннеров
<?php }?><?php }} ?>
