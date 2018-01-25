<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:06:51
         compiled from "simpla/design/html/events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1060337955a2d77bba9e1d9-96110848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66daa70584f8cb45b8ce9ecb4a0d75611cd1b27a' => 
    array (
      0 => 'simpla/design/html/events.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1060337955a2d77bba9e1d9-96110848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manager' => 0,
    'events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d77bbb15653_00512282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d77bbb15653_00512282')) {function content_5a2d77bbb15653_00512282($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<?php if (in_array('products',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=ProductsAdmin">Товары</a></li><?php }?>
	<?php if (in_array('categories',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=CategoriesAdmin">Категории</a></li><?php }?>
	<?php if (in_array('brands',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=BrandsAdmin">Цветок</a></li><?php }?>
	<?php if (in_array('whoms',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=WhomsAdmin">Кому</a></li><?php }?>
	<li class="active"><a href="index.php?module=EventsAdmin">Событие</a></li>
	<?php if (in_array('features',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=FeaturesAdmin">Свойства (фильтр)</a></li><?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('События', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<h1>События</h1> 
	<a class="add" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'EventAdmin','return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
">Добавить событие</a>
</div>	

<?php if ($_smarty_tpl->tpl_vars['events']->value) {?>
<div id="main_list" class="events">

	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div id="list" class="events">	
			<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
			<div class="row">
		 		<div class="checkbox cell">
					<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['event']->value->id;?>
" />				
				</div>
				<div class="cell">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'EventAdmin','id'=>$_smarty_tpl->tpl_vars['event']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['event']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a> 	 			
				</div>
				<div class="icons cell">
					<a class="preview" title="Предпросмотр в новом окне" href="../events/<?php echo $_smarty_tpl->tpl_vars['event']->value->url;?>
" target="_blank"></a>				
					<a class="delete"  title="Удалить" href="#"></a>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		</div>
		
		<div id="action">
			<label id="check_all" class="dash_link">Выбрать все</label>
			
			<span id="select">
			<select name="action">
				<option value="delete">Удалить</option>
			</select>
			</span>
			<input id="apply_action" class="button_green" type="submit" value="Применить">
		</div>
		
	</form>
</div>
<?php } else { ?>
Нет событий
<?php }?>


<script>
$(function() {

	// Раскраска строк
	function colorize()
	{
		$("#list div.row:even").addClass('even');
		$("#list div.row:odd").removeClass('even');
	}
	// Раскрасить строки сразу
	colorize();	
	
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:checked)').length>0);
	});	

	// Удалить
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Подтверждение удаления
	$("form").submit(function() {
		if($('#list input[type="checkbox"][name*="check"]:checked').length>0)
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
	});
 	
});
</script>
<?php }} ?>
