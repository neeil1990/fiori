<?php /* Smarty version Smarty-3.1.18, created on 2017-12-13 18:44:48
         compiled from "simpla/design/html/menu_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10272084435a314af06f8df5-73537496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71800702abe690625cac7ebc7c9ac1a224792436' => 
    array (
      0 => 'simpla/design/html/menu_group.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10272084435a314af06f8df5-73537496',
  'function' => 
  array (
    'dmenu_select' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
    'categories_tree' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'menu_group' => 0,
    'message_success' => 0,
    'dmenu' => 0,
    'cats' => 0,
    'cat' => 0,
    'level' => 0,
    'categories' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a314af07d6664_83510573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a314af07d6664_83510573')) {function content_5a314af07d6664_83510573($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
    <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DmenusGroupsAdmin'),$_smarty_tpl);?>
">Группы меню</a></li>
	<li class="active"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DmenusGroupAdmin','menu_group_id'=>$_smarty_tpl->tpl_vars['menu_group']->value->id,'id'=>null),$_smarty_tpl);?>
">Меню <?php echo $_smarty_tpl->tpl_vars['menu_group']->value->name;?>
</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Меню ".((string)$_smarty_tpl->tpl_vars['menu_group']->value->name), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<h1>Меню <?php echo $_smarty_tpl->tpl_vars['menu_group']->value->name;?>
</h1>
	<a class="add" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DmenusAdmin','menu_group_id'=>$_smarty_tpl->tpl_vars['menu_group']->value->id,'id'=>null),$_smarty_tpl);?>
">Добавить пункт меню</a>
</div>	
<!-- Заголовок (The End) -->



<!-- Основная форма -->
<form method=post action="<?php echo $_SERVER['REQUEST_URI'];?>
" id="additeam" class="ajax-comment-form" enctype="multipart/form-data">
<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Пункт меню добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Пункт меню обновлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></span>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input type=hidden name="group_id" value="<?php echo $_smarty_tpl->tpl_vars['menu_group']->value->id;?>
">
	
	<span>
		<label>Название</label>
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
	</span>
	
	<span>
		<label>URL</label>
		<input class="name" name=url type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->url, ENT_QUOTES, 'UTF-8', true);?>
"/> 
	</span>
	
	<span>
		<label>CSS класс</label>
		<input class="name" name=style type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->style, ENT_QUOTES, 'UTF-8', true);?>
"/> 
	</span>
	
	<span>
		<label>Скрипт onclick</label>
		<input class="name" name=onclick type="text" value="<?php echo $_smarty_tpl->tpl_vars['dmenu']->value->onclick;?>
"/> 
	</span>
	
	<span>
		<label>Родительский пункт</label>
		<select name="parent_id">
			<option value='0'>Корневой пункт меню</option>
			<?php if (!function_exists('smarty_template_function_dmenu_select')) {
    function smarty_template_function_dmenu_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['dmenu_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
				<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['dmenu']->value->id!=$_smarty_tpl->tpl_vars['cat']->value->id) {?>
						<option value='<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['dmenu']->value->parent_id==$_smarty_tpl->tpl_vars['cat']->value->id) {?>selected<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
</option>
						<?php smarty_template_function_dmenu_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['cat']->value->submenus,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

					<?php }?>
				<?php } ?>
			<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

			<?php smarty_template_function_dmenu_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['categories']->value));?>

		</select>
	</span>
	
	<span>
		<button class="button_green button_save" type="submit" name="" value="">Добавить</button>
	</span>
 
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<div class="checkbox" style="display: none;">
			<input name=visible value='1' type="checkbox" id="active_checkbox" checked /> <label for="active_checkbox">Активна</label>
		</div>


	
</form>
<!-- Основная форма (The End) -->





<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
<div id="main_list" class="categories">

	<form id="list_form" method="post" class="ajax-content">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
		<input type="text" name="group_name" value="<?php echo $_smarty_tpl->tpl_vars['menu_group']->value->name;?>
" style="width:200px;margin-right:20px;">
		<br>
		<br>
		<?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
			<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
			<div id="list" class="sortable">
			
				<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
				<div class="<?php if (!$_smarty_tpl->tpl_vars['category']->value->visible) {?>invisible<?php }?> row">		
					<div class="tree_row">
						<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->position;?>
">
						<div class="move cell" style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*20;?>
px"><div class="move_zone"></div></div>
						<div class="checkbox cell">
							<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" />				
						</div>
						<div class="cell">
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'DmenusAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a> 	
							<span class="urllink"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->url, ENT_QUOTES, 'UTF-8', true);?>
</span>
						</div>
						<div class="icons cell">
							<a class="preview" title="Предпросмотр в новом окне" href="../catalog/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
" target="_blank"></a>				
							<a class="enable" title="Активна" href="#"></a>
							<a class="delete" title="Удалить" href="#"></a>
						</div>
						<div class="clear"></div>
					</div>
					<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->submenus,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

				</div>
				<?php } ?>
		
			</div>
			<?php }?>
		<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

		<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value));?>

		
		<div id="action">
		<label id="check_all" class="dash_link">Выбрать все</label>
		
		<span id="select">
		<select name="action">
			<option value="enable">Сделать видимыми</option>
			<option value="disable">Сделать невидимыми</option>
			<option value="delete">Удалить</option>
		</select>
		</span>
		
		<input id="apply_action" class="button_green" type="submit" value="Применить">
		
		</div>
	
	</form>
</div>
<?php } else { ?>
Нет категорий
<?php }?>



<script>
$(function() {
	$(document).on('submit', '#additeam', function(e){
		e.preventDefault();
			 
		var s_data=$(this).serialize();
		$.ajax({
			type: 'POST',
			url: "ajax/add_menu.php",
			data: s_data,
			success: function(data){
				if(data){
					location.reload();
					//$('#additeam').html(data.additeam);
				}
			}
		});
	

	});
});


//асинхронная загрузка контента
$(function() {


	// Сортировка списка
	$(".sortable").sortable({
		items:".row",
		handle: ".move_zone",
		tolerance:"pointer",
		scrollSensitivity:40,
		opacity:0.7, 
		axis: "y",
		update:function()
		{
			$("#list_form input[name*='check']").attr('checked', false);
			$("#list_form").ajaxSubmit();
		}
	});
 
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]:not(:disabled)').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:disabled):not(:checked)').length>0);
	});	

	// Показать категорию
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest(".row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'dmenu', 'id': id, 'values': {'visible': state}, 'session_id': '<?php echo $_SESSION['id'];?>
'},
			success: function(data){
				icon.removeClass('loading_icon');
				if(state)
					line.removeClass('invisible');
				else
					line.addClass('invisible');				
			},
			dataType: 'json'
		});	
		return false;	
	});

	// Удалить 
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]:first').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});

	
	// Подтвердить удаление
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});

});
</script>
<?php }} ?>
