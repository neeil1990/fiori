<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:24:29
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9683483945a2d7bdd3ece59-11449197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bed2951a2365118c29b6a949d3d45551e0cecf64' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/order.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9683483945a2d7bdd3ece59-11449197',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'settings' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'product' => 0,
    'result' => 0,
    'r' => 0,
    'currency' => 0,
    'delivery' => 0,
    'payment_methods' => 0,
    'payment_method' => 0,
    'config' => 0,
    'all_currencies' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7bdd579361_61998968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7bdd579361_61998968')) {function content_5a2d7bdd579361_61998968($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Ваш заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><span>Заказ оформлен!</span></li>
</ul>


<h1 class="phead">
Ваш заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
 
<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>принят<?php }?>
<?php if ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?>
<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>, оплачен<?php } else { ?><?php }?>
</h1>

<div class="podcart">

	<div class="cartable carheader">
		<div class="cartd carimage">
			Фото
		</div>
		
		<div class="cartd carname">
			Товар
		</div>
		
		<div class="cartd carprice">
			Цена за ед
		</div>
		
		<div class="cartd carkolvo">
			Кол-во
		</div>
		
		<div class="cartd carsumm">
			Сумма
		</div>
	</div>
	
	<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
	<div class="cartable" id="item_cart_<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
">
		<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
		<div class="cartd carimage">
			<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,70,70);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
		</div>
		<?php }?>
		
		<div class="cartd carname">
			<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->name) {?> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->variant->name, ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?></a>
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->properties) {?>
			<?php $_smarty_tpl->tpl_vars["result"] = new Smarty_variable(explode("|||",$_smarty_tpl->tpl_vars['purchase']->value->properties), null, 0);?>
			<?php if (strlen($_smarty_tpl->tpl_vars['purchase']->value->properties)>0) {?>
			<div style="font-size: 13px;">
			<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
				+ <?php echo $_smarty_tpl->tpl_vars['r']->value;?>
<br>
			<?php } ?>
			</div>
			<?php }?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price) {?>
			<div class="carskidka">
			Скидка <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->price;?>
<?php $_tmp1=ob_get_clean();?><?php echo floor(abs(100-$_tmp1/($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price)*100));?>
 %
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['order']->value->paid&&$_smarty_tpl->tpl_vars['purchase']->value->variant->attachment) {?>
				<br/><br/><a class="download_attachment" href="order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->attachment;?>
">скачать файл</a>
			<?php }?>
			
			<div class="cartmobile">
				<div class="carmobsht">
					<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
 &nbsp; - &nbsp;
				</div>
				<div class="carmobitog">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

				</div>
			</div>
			
		</div>
		
		<div class="cartd carprice">
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->compare_price) {?>
			<span class="cpcar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['purchase']->value->compare_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
			<br/>
			<?php }?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->price));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</div>
		
		<div class="cartd carkolvo">
			<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>

		</div>
		
		
		<div class="cartd carsumm" id="total_cost_<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
">
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->compare_price) {?>
			<span class="cpcar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->compare_price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
			<br/>
			<?php }?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</div>
		
	</div>
	<?php } ?>
	
	
	<div class="carforms order">
		<div class="pad-t-30 pad-b-30">
			<div class="carinfo" style="float: left;">
				<div>
					<b>Дата заказа</b> <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 в <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
</span>
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->name) {?>
				<div>
					<b>Имя</b> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>
				<div>
					<b>E-mail</b> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>
				<div>
					<b>Телефон</b> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->address) {?>
				<div>
					<b>Адрес доставки</b> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->comment) {?>
				<div>
					<b>Комментарий</b> <span><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->comment, ENT_QUOTES, 'UTF-8', true));?>
</span>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->zedate) {?>
				<div>
					<b>Дата доставки</b> <span><?php echo $_smarty_tpl->tpl_vars['order']->value->zedate;?>
</span>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->zetime) {?>
				<div>
					<b>Время доставки</b> <span><?php echo $_smarty_tpl->tpl_vars['order']->value->zetime;?>
</span>
				</div>
				<?php }?>
				
			</div>
		</div>
		
		<div class="pad-t-30 pad-b-30">
			<div class="carinfo">
				<div class="notc">
					<b>Скидка</b> <span id="cup"><?php if ($_smarty_tpl->tpl_vars['order']->value->discount>0) {?><?php echo $_smarty_tpl->tpl_vars['order']->value->discount;?>
 %<?php } else { ?>0 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }?></span>
				</div>
				
				<div class="notc">
					 <b>Скидка по купону</b> <span><?php if ($_smarty_tpl->tpl_vars['order']->value->coupon_discount>0) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->coupon_discount);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php } else { ?>0 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }?></span>
				</div>
				
				<div class="notc">
					 <b>Скидка от суммы</b> <span><?php if ($_smarty_tpl->tpl_vars['order']->value->summ_discount) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->summ_discount);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php } else { ?>0 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }?></span>
				</div>
				
				<?php if (!$_smarty_tpl->tpl_vars['order']->value->separate_delivery&&$_smarty_tpl->tpl_vars['order']->value->delivery_price>0) {?>
				<div class="notc">
					 <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b> <span>+ <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->delivery_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
				</div>
				<?php }?>
				
				<div class="itog notc">
					<b>Итого</b> <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
				</div>
				
				<?php if ($_smarty_tpl->tpl_vars['order']->value->separate_delivery) {?>
				<div class="itog notc">
					<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<br/><span style="font-size: 12px;">(оплачивается отдельно)</span></b> <span>+ <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->delivery_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 </span>
				</div>
				<?php }?>
				
			</div>
		</div>
	</div>
	
	
	<div class="codestatus">
		<b>Ваш код для проверки статуса заказа</b> <span><?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
</span>
	</div>
	
	
<?php if (!$_smarty_tpl->tpl_vars['order']->value->paid) {?>

<?php if ($_smarty_tpl->tpl_vars['payment_methods']->value&&!$_smarty_tpl->tpl_vars['payment_method']->value&&$_smarty_tpl->tpl_vars['order']->value->total_price>0) {?>
<div class="opay">
<form method="post">

<ul class="cpa">
	<?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['payment_method']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
 $_smarty_tpl->tpl_vars['payment_method']->index++;
 $_smarty_tpl->tpl_vars['payment_method']->first = $_smarty_tpl->tpl_vars['payment_method']->index === 0;
?>
	<li>
		<label class="andru and2" for=payment_<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
>
		
			<input type=radio name=payment_method_id value='<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['payment_method']->first) {?>checked<?php }?> id=payment_<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
>
										
			<span>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['payment_method']->value->image) {?><img src="../<?php echo $_smarty_tpl->tpl_vars['config']->value->payment_method_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->name;?>
" /><?php }?>
												
					<?php if ($_smarty_tpl->tpl_vars['payment_method']->value->image) {?><?php } else { ?>
					<b>
					<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->name;?>

					</b>
					<?php }?>
					<span>к оплате <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['payment_method']->value->currency_id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['all_currencies']->value[$_smarty_tpl->tpl_vars['payment_method']->value->currency_id]->sign;?>
</span>
				</span>
			</span>
										
			<?php if ($_smarty_tpl->tpl_vars['payment_method']->value->description) {?><div class="delivery_info din2"><?php echo $_smarty_tpl->tpl_vars['payment_method']->value->description;?>
</div><?php }?>
			
		</label>
	</li>
	<?php } ?>
</ul>

							<div class="dp_info dpi2">
								<span>
								<?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['payment_method']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
 $_smarty_tpl->tpl_vars['payment_method']->index++;
 $_smarty_tpl->tpl_vars['payment_method']->first = $_smarty_tpl->tpl_vars['payment_method']->index === 0;
?>
								<?php if ($_smarty_tpl->tpl_vars['payment_method']->first) {?>
								<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->description;?>

								<?php }?>
								<?php } ?>
								</span>
							</div>

<div style="text-align: center;" class="pad-t-30">
	<input type='submit' class="knop next" value='Закончить заказ &raquo;'>
</div>


<script>

	$('label.and2').click(
		function() {
			$('.dpi2>span').html($(this).closest('.and2').find('.din2').html());
		}
	);

</script>


</form>
</div>


<?php } elseif ($_smarty_tpl->tpl_vars['payment_method']->value) {?>
<div class="opay">
<h2>Способ оплаты &mdash; <?php echo $_smarty_tpl->tpl_vars['payment_method']->value->name;?>
</h2>
<form method=post><input type=submit name='reset_payment_method' value='Выбрать другой способ оплаты'></form>	

<p>
<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->description;?>

</p>
<h2>
К оплате <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['payment_method']->value->currency_id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['all_currencies']->value[$_smarty_tpl->tpl_vars['payment_method']->value->currency_id]->sign;?>

</h2>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['checkout_form'][0][0]->checkout_form(array('order_id'=>$_smarty_tpl->tpl_vars['order']->value->id,'module'=>$_smarty_tpl->tpl_vars['payment_method']->value->module),$_smarty_tpl);?>

</div>


<?php }?>
<?php }?>
	
	
	
	
	

</div>







<?php }} ?>
