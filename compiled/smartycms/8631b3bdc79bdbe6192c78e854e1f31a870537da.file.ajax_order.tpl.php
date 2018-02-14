<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:33
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/ajax_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3125303855a7d7f510ecc29-21237315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8631b3bdc79bdbe6192c78e854e1f31a870537da' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/ajax_order.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3125303855a7d7f510ecc29-21237315',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dabla' => 0,
    'order' => 0,
    'dabl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f51110d25_63498896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f51110d25_63498896')) {function content_5a7d7f51110d25_63498896($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['dabla']->value) {?>
<?php  $_smarty_tpl->tpl_vars['dabl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dabl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dabla']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dabl']->key => $_smarty_tpl->tpl_vars['dabl']->value) {
$_smarty_tpl->tpl_vars['dabl']->_loop = true;
?>
<div class="dabl mar-b-15">
Cтатус заказа - <?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>принят<?php }?><?php if ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?><?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>, оплачен<?php } else { ?>, не оплачен<?php }?>
</div>
<a href="/order/<?php echo $_smarty_tpl->tpl_vars['dabl']->value->url;?>
" class="knop">Перейти на страницу заказа</a>
<?php } ?>
<?php } else { ?>
	<div class="message_error" style="display:none"></div>
	<form method="post" class="order_form">
		<ul class="export">
			<li>
				<label>Код заказа</label>
				<input type="text" name="ourl" required value="" maxlength="8" />
			</li>
			<li>
				<button type="submit" name="ourls" value="" class="but loginclick">Проверить</button>
			</li>
		</ul>
	</form>
<?php }?><?php }} ?>
