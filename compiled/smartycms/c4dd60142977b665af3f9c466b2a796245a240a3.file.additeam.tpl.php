<?php /* Smarty version Smarty-3.1.18, created on 2017-12-14 11:12:28
         compiled from "../design/html/additeam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2400686945a32326ccadf26-82358022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4dd60142977b665af3f9c466b2a796245a240a3' => 
    array (
      0 => '../design/html/additeam.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2400686945a32326ccadf26-82358022',
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
  ),
  'variables' => 
  array (
    'message_success' => 0,
    'menu_group' => 0,
    'dmenu' => 0,
    'cats' => 0,
    'cat' => 0,
    'level' => 0,
    'dmenus' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a32326cd30a07_65512180',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a32326cd30a07_65512180')) {function content_5a32326cd30a07_65512180($_smarty_tpl) {?><!-- Основная форма -->
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
	<div id="name">
		Название<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		URL<input class="name" name=url type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->url, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dmenu']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" <?php if ($_smarty_tpl->tpl_vars['dmenu']->value->visible) {?>checked<?php }?>/> <label for="active_checkbox">Активна</label>
		</div>
	</div> 

	<div id="product_categories">
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

			<?php smarty_template_function_dmenu_select($_smarty_tpl,array('cats'=>$_smarty_tpl->tpl_vars['dmenus']->value));?>

		</select>
	</div>
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) --><?php }} ?>
