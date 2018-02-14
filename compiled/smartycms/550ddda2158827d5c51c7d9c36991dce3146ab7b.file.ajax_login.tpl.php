<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:33
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/ajax_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9342106725a7d7f510b6b84-87411806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '550ddda2158827d5c51c7d9c36991dce3146ab7b' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/ajax_login.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9342106725a7d7f510b6b84-87411806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'group' => 0,
    'uorders' => 0,
    'order' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f510e72e3_61120780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f510e72e3_61120780')) {function content_5a7d7f510e72e3_61120780($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
<ul class="hidus">
	<li><a class="profile" href="user">Мой профиль</a></li>
	<li><a class="discount" href="user">Моя скидка - <?php if ($_smarty_tpl->tpl_vars['group']->value->discount) {?><?php echo $_smarty_tpl->tpl_vars['group']->value->discount;?>
<?php } else { ?>0<?php }?>%</a></li>
	<li><a class="logout" href="user/logout">Выйти</a></li>
</ul>
<?php if ($_smarty_tpl->tpl_vars['uorders']->value) {?>
<ul class="uorders">
<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['uorders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
	<li>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 <a href='order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
'>Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>оплачен,<?php }?> 
	<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>ждет обработки<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?>
	</li>
<?php } ?>
</ul>
<?php }?>
<?php } else { ?>

<div id="slog">
	<div class="message_error" style="display:none"></div>
	
	<form method="post" class="login_form">
		<ul class="export">
			<li>
				<label>Ваш e-mail</label>
				<input id="login_email" class="on1" type="text" name="email" required placeholder="smartycms@yandex.ru" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="255" />
			</li>
			<li>
				<label>Пароль <a href="/user/password_remind">Забыли?</a></label>
				<input id="login_password" class="on2" type="password" placeholder="password" required name="password" value="" />
			</li>
			<li>
				<button id="check_login" type="submit" name="login" value="" class="but loginclick">Авторизоваться</button>
				<a href="/user/register" class="modalreglink">Регистрация</a>
			</li>
		</ul>
	</form>
</div>

<?php }?><?php }} ?>
