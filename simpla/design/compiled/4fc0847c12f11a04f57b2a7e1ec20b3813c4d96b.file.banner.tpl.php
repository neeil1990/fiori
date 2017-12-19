<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:40:32
         compiled from "simpla/design/html/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12636090825a2d7fa0e0cfe4-94203854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fc0847c12f11a04f57b2a7e1ec20b3813c4d96b' => 
    array (
      0 => 'simpla/design/html/banner.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12636090825a2d7fa0e0cfe4-94203854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'elements' => 0,
    'el' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7fa0ea1a66_52566359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7fa0ea1a66_52566359')) {function content_5a2d7fa0ea1a66_52566359($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
<li><a href="index.php?module=BannersAdmin">Категории баннеров</a></li>
<li class="active"><a href="javascript:location.reload(true)" ><?php if (!$_smarty_tpl->tpl_vars['category']->value->id) {?>Новая категория<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Баннеры", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<h1><?php if (!$_smarty_tpl->tpl_vars['category']->value->id) {?>Добавить категорию<?php } else { ?>Управление баннерами<?php }?></h1>
</div>

<link href="design/css/banners.css" rel="stylesheet" type="text/css" />

<form method="post" id="product" enctype="multipart/form-data">
	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<div id="name">
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Название категории" />
		<div class="checkbox">
			<label><input type="checkbox" name="enabled" value="1"<?php if ($_smarty_tpl->tpl_vars['category']->value->enabled) {?> checked<?php }?> /> Активен</label>
		</div>
		<input name=category_id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
	</div>

	<div class="block layer">
		<h2>Параметры</h2>
		<ul>
			<li><label class=property>Псевдо имя<br>для вызова в ф-ии</label>
				<input class="name" name=mnemonic type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->mnemonic, ENT_QUOTES, 'UTF-8', true);?>
" />
			</li>
			<li><label class=property>Сортировка</label>
				<select name="sorted">
					<option value="RND"<?php if ($_smarty_tpl->tpl_vars['category']->value->sorted=='RND') {?> selected<?php }?>>Рандом</option>
					<option value="ASC"<?php if ($_smarty_tpl->tpl_vars['category']->value->sorted=='ASC') {?> selected<?php }?>>По возрастанию</option>
					<option value="DESC"<?php if ($_smarty_tpl->tpl_vars['category']->value->sorted=='DESC') {?> selected<?php }?>>По убыванию</option>
				</select>
			</li>
			<li><label class=property>Ограничение<br><i>0 - выкл</i></label><input class="name" name="limited" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->limited, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
		</ul>
	</div>



	<div id="elements_block" style="display: nosne;">
	
		<span class="add"><span class="addphoto adds">Добавить элемент</span></span>
		
		<div class="clr"></div>
		
		<div id="elements">
			<?php  $_smarty_tpl->tpl_vars['el'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['el']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['el']->key => $_smarty_tpl->tpl_vars['el']->value) {
$_smarty_tpl->tpl_vars['el']->_loop = true;
?>
			<ul>
				<div class="td1">
					<li class="element_show_image">
						<?php if ($_smarty_tpl->tpl_vars['el']->value->image) {?>
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['el']->value->image,80,0);?>
" />
						<?php }?>
					</li>
				
					<li class="element_move">
						<div class="move_zone"></div>
					</li>
					
					<li class="element_enabled">
						<select name="elements[enabled][]">
							<option value="1"<?php if ($_smarty_tpl->tpl_vars['el']->value->enabled) {?> selected<?php }?>>Вкл</option>
							<option value="0"<?php if (!$_smarty_tpl->tpl_vars['el']->value->enabled) {?> selected<?php }?>>Выкл</option>
						</select>
					</li>
					
					<li>
						<a class="del_element" href="javascript:{}"></a>
					</li>
				</div>
				
				<div class="td2">
					<li class="element_name">
						<input name="elements[id][]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['el']->value->id;?>
" />
						<input class="impt" name="elements[name][]" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['el']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Название, title" /><br/>
						<textarea class="tarea" name="elements[opis][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['el']->value->opis, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Описание"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['el']->value->opis, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
					</li>
					
					<li class="element_url">
						<input class="impt" name="elements[url][]" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['el']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Ссылка" />
					</li>
					
					<li class="element_url">
						<input class="impt" name="elements[linktext][]" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['el']->value->linktext, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Текст на ссылке" />
					</li>
					
					<li class="element_image" style="margin-top: 7px;">
						<a href="javascript:{}" class="add_image">
							<span class="addphoto">
								<span><?php if ($_smarty_tpl->tpl_vars['el']->value->image) {?>Обновить<?php } else { ?>Загрузить<?php }?> изображение</span>
							</span>
						</a>
						<div class="browse_image" style="display:none;">
							<input type=file name=image[]>
							<input type=hidden name=delete_image[]>
						</div>
					</li>
				</div>
			</ul>

			<?php } ?>
		</div>
	</div>

	<ul id="new_element" style='display:none;'>
	
		<div class="td1">
			<li class="element_move">
				<div class="move_zone"></div>
			</li>
			
			<li class="element_enabled">
				<select name="elements[enabled][]">
					<option value="1">Вкл</option>
					<option value="0">Выкл</option>
				</select>
			</li>
			
			<li>
				<a class="del_element" href="javascript:{}"></a>
			</li>
		</div>
		

		
		<div class="td2">
			<li class="element_name">
				<input name="elements[id][]" type="hidden" value="" />
				<input class="impt" name="elements[name][]" type="text" value="" placeholder="Название, title" /><br/>
				<textarea class="tarea" name="elements[opis][]" value="" placeholder="Описание"></textarea>
			</li>
			
			<li class="element_url">
				<input class="impt" name="elements[url][]" type="text" value="" placeholder="Ссылка" />
			</li>
			
			<li class="element_url">
				<input class="impt" name="elements[linktext][]" type="text" value="" placeholder="Текст на ссылке" />
			</li>
			
			<li class="element_image" style="margin-top: 7px;">
				<a href="javascript:{}" class="add_image"><span class="addphoto"><span>Загрузить файл</span></span></a>
				<div class="browse_image" style="display:none;">
					<input type=file name=image[]>
					<input type=hidden name=delete_image[]>
				</div>
			</li>
			
		</div>
	

	</ul>

	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
</form>

<script type="text/javascript">
	$(function() {

		var element = $('#new_element').clone(true);
		$('#new_element').remove().removeAttr('id');
		$('body').on('click', '#elements_block span.add', function() {
			$(element).remove()
				.clone(true)
				.appendTo('#elements')
				.fadeIn('slow')
				.find("input[name*=element][name*=name]")
				.focus()
		});

		$('body').on('click', '#elements_block a.del_element', function(){
			$(this).closest('ul')
				.fadeOut(200, function() { $(this).remove() })
		});

		$('body').on('click', '#elements_block a.add_image', function() {
			$(this).hide();
			$(this).closest('li')
				.find('div.browse_image')
				.show('fast');
			$(this).closest('li')
				.find('input[name*=image]')
				.attr('disabled', false);
		});

		$("#elements_block").sortable({ items: '#elements ul' , axis: 'x,y',  handle: '.move_zone' });

	});
</script><?php }} ?>
