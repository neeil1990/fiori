<?php /* Smarty version Smarty-3.1.18, created on 2018-10-03 08:36:41
         compiled from "simpla/design/html/callbacks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7777402515a2d7f0e1c5f35-61310430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdd31f01d6b3b53eb7dca465f377f109eb69e107' => 
    array (
      0 => 'simpla/design/html/callbacks.tpl',
      1 => 1520943343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7777402515a2d7f0e1c5f35-61310430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7f0e239b37_25734920',
  'variables' => 
  array (
    'manager' => 0,
    'callbacks_count' => 0,
    'callbacks' => 0,
    'callback' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7f0e239b37_25734920')) {function content_5a2d7f0e239b37_25734920($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
		<?php if (in_array('comments',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=CommentsAdmin">Комментарии</a></li><?php }?>
		<?php if (in_array('feedbacks',$_smarty_tpl->tpl_vars['manager']->value->permissions)) {?><li><a href="index.php?module=FeedbacksAdmin">Обратная связь</a></li><?php }?>
		<li class="active"><a href="index.php?module=CallbacksAdmin">E-mail подписчики</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('E-mail подписчики', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<?php if ($_smarty_tpl->tpl_vars['callbacks_count']->value) {?>
	<h1>
		<?php echo $_smarty_tpl->tpl_vars['callbacks_count']->value;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['callbacks_count']->value,'подписчик','подписчика','подписчиков');?>

	</h1> 
	<?php } else { ?>
	<h1>Нет подписчиков</h1> 
	<?php }?>
</div>	

<div id="main_list">
	
	<!-- Листалка страниц -->
	<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
	<!-- Листалка страниц (The End) -->

	<?php if ($_smarty_tpl->tpl_vars['callbacks']->value) {?>
		<span class="button_green" onclick="$('.maillist').slideToggle(300); return false;" style="display: inline-block; margin: 0px 0px 15px 0px; height: 26px; line-height: 28px;">Открыть email адреса списком</span>
		
		<div class="maillist" style="display: none;">
			<div>
				<ol type="1" class="mlist">
				<?php  $_smarty_tpl->tpl_vars['callback'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['callback']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['callbacks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['callback']->key => $_smarty_tpl->tpl_vars['callback']->value) {
$_smarty_tpl->tpl_vars['callback']->_loop = true;
?>
					<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->email, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
				<?php } ?>
				</ol>
			</div>
		</div>
		<br/>
		<form id="list_form" method="post">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
			<div id="list" style="width:100%;">
				
				<?php  $_smarty_tpl->tpl_vars['callback'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['callback']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['callbacks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['callback']->key => $_smarty_tpl->tpl_vars['callback']->value) {
$_smarty_tpl->tpl_vars['callback']->_loop = true;
?>
				<div class="row">
			 		<div class="checkbox cell">
						<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['callback']->value->id;?>
" />				
					</div>
					<div class="name cell">
						<div class='comment_text'>
						E-mail: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->email, ENT_QUOTES, 'UTF-8', true);?>

						</div>
						<div class='comment_info'>
						Подписался <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['callback']->value->date);?>
 в <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['callback']->value->date);?>

						</div>
					</div>
					<div class="icons cell">
						<a href='#' title='Удалить' class="delete"></a>
					</div>
					<div class="clear"></div>
				</div>
				<?php } ?>
			</div>
		
			<div id="action">
			<label id='check_all' class='dash_link'>Выбрать все</label>
		
			<span id=select>
			<select name="action">
				<option value="delete">Удалить</option>
			</select>
			</span>
		
			<input id='apply_action' class="button_green" type=submit value="Применить">
		</div>
		</form>
		
	<?php } else { ?>
	Нет сообщений
	<?php }?>
		
	<!-- Листалка страниц -->
	<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
	<!-- Листалка страниц (The End) -->
			
</div>

<!-- Меню -->
<div id="right_menu">
	
</div>
<!-- Меню  (The End) -->


<style>

.maillist {
    display: block;
    position: relative;
    background: #fff;
    border-radius: 5px;
    box-shadow: inset 0px 0px 0px 2px rgba(0, 0, 0, 0.12);
}

.maillist> div {
	display: block;
	padding: 20px;
}

ol.mlist {
    list-style: initial;
    list-style-type: decimal;
    font-size: 13px;
    padding: 0px 0px 0px 15px;
}

ol.mlist> li {
    padding: 3px 0px;
}

ol.mlist> li> span {
    padding: 3px 7px;
    background: #ecf1e3;
    border-radius: 5px;
    font-size: 13px;
    color: #000;
}
</style>



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
		$(this).closest(".row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Подтверждение удаления
	$("form#list_form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});

});

</script>

<?php }} ?>
