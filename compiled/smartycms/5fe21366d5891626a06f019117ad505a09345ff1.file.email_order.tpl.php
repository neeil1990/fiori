<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:24:28
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/email_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4811238825a2d7bdc945309-90927401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fe21366d5891626a06f019117ad505a09345ff1' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/email_order.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4811238825a2d7bdc945309-90927401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'config' => 0,
    'currency' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'settings' => 0,
    'delivery' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7bdca38db7_82867730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7bdca38db7_82867730')) {function content_5a2d7bdca38db7_82867730($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<h1 style="font-weight:normal;font-family:arial;">
	<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
">Ваш заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a>
	на сумму <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['currency']->value->id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

	<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>оплачен<?php } else { ?>еще не оплачен<?php }?>,
	<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>ждет обработки<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==3) {?>отменен<?php }?>
</h1>
<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Статус
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>
				ждет обработки      
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>
				в обработке
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>
				выполнен
			<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==3) {?>
				отменен
			<?php }?>
		</td>
	</tr>
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Оплата
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>
			<font color="green">оплачен</font>
			<?php } else { ?>
			не оплачен
			<?php }?>
		</td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->name) {?>
	<tr>
		<td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Имя, фамилия
		</td>
		<td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Email
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Телефон
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->address) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Адрес доставки
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->comment) {?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Комментарий
		</td>
		<td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->comment, ENT_QUOTES, 'UTF-8', true));?>

		</td>
	</tr>
	<?php }?>
	<tr>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Дата
		</td>
		<td style="padding:6px; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>

		</td>
	</tr>
</table>

<h1 style="font-weight:normal;font-family:arial;">Вы заказали:</h1>

<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">

	<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
	<tr>
		<td align="center" style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['purchase']->value->product->images[0], null, 0);?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img border="0" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,50,50);?>
"></a>
		</td>
		<td style="padding:6px; width:250; padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><?php echo $_smarty_tpl->tpl_vars['purchase']->value->product_name;?>
</a>
			<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant_name;?>

			<?php if ($_smarty_tpl->tpl_vars['order']->value->paid&&$_smarty_tpl->tpl_vars['purchase']->value->variant->attachment) {?>
			<br>
			<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->attachment;?>
"><font color="green">Скачать <?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->attachment;?>
</font></a>
			<?php }?>
		</td>
		<td align=right style="padding:6px; text-align:right; width:150; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
 &times; <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['purchase']->value->price,$_smarty_tpl->tpl_vars['currency']->value->id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</td>
	</tr>
	<?php } ?>
	
	<?php if ($_smarty_tpl->tpl_vars['order']->value->discount) {?>
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Скидка
		</td>
		<td align=right style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->tpl_vars['order']->value->discount;?>
&nbsp;%
		</td>
	</tr>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['order']->value->coupon_discount>0) {?>
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			Купон <?php echo $_smarty_tpl->tpl_vars['order']->value->coupon_code;?>

		</td>
		<td align=right style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			&minus;<?php echo $_smarty_tpl->tpl_vars['order']->value->coupon_discount;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</td>
	</tr>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['delivery']->value&&!$_smarty_tpl->tpl_vars['order']->value->separate_delivery) {?>
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->tpl_vars['delivery']->value->name;?>

		</td>
		<td align="right" style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->delivery_price,$_smarty_tpl->tpl_vars['currency']->value->id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</td>
	</tr>
	<?php }?>
	
	<tr>
		<td style="padding:6px; width:100; padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;"></td>
		<td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			Итого
		</td>
		<td align="right" style="padding:6px; text-align:right; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;font-weight:bold;">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['currency']->value->id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</td>
	</tr>
</table>

<br>
Вы всегда можете проверить состояние заказа по ссылке:<br>
<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
</a>
<br><?php }} ?>
