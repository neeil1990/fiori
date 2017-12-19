<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:23:49
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:886920585a2d7bb52e7348-41856075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e894abd11c3b6e51467e4b0820ba7848d71ef9' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/cart.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '886920585a2d7bb52e7348-41856075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'cart' => 0,
    'purchase' => 0,
    'image' => 0,
    'property' => 0,
    'currency' => 0,
    'coupon_request' => 0,
    'coupon_error' => 0,
    'user' => 0,
    'deliveries' => 0,
    'delivery' => 0,
    'delivery_id' => 0,
    'config' => 0,
    'payment_method' => 0,
    'total_price_with_delivery' => 0,
    'all_currencies' => 0,
    'name' => 0,
    'email' => 0,
    'phone' => 0,
    'address' => 0,
    'zedate' => 0,
    'zetime' => 0,
    'comment' => 0,
    'last_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7bb54db446_17864494',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7bb54db446_17864494')) {function content_5a2d7bb54db446_17864494($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Корзина - ".((string)$_smarty_tpl->tpl_vars['settings']->value->site_name), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><span>Корзина покупок</span></li>
</ul>


<h1 class="phead">
<?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>В корзине <?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['cart']->value->total_products,'товар','товаров','товара');?>

<?php } else { ?>Корзина пуста<?php }?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>
<form method="post" name="cart">

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
 $_from = $_smarty_tpl->tpl_vars['cart']->value->purchases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
		</div>
		<?php }?>
		
		<div class="cartd carname">
			<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->name) {?> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->variant->name, ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?></a>
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->properties) {?>
			<?php  $_smarty_tpl->tpl_vars['property'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['property']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchase']->value->properties; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['property']->key => $_smarty_tpl->tpl_vars['property']->value) {
$_smarty_tpl->tpl_vars['property']->_loop = true;
?>
			<div class="carproper">
				<div><?php echo $_smarty_tpl->tpl_vars['property']->value['name'];?>
 (+<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['property']->value['price']);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
)</div>
			</div>
			<?php } ?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price) {?>
			<div class="carskidka">
			Скидка <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->price;?>
<?php $_tmp1=ob_get_clean();?><?php echo floor(abs(100-$_tmp1/($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price)*100));?>
 %
			</div>
			<?php }?>
			<div class="cartmobile">
				<div class="amountposit">
					<div class="amount">
						<input class="add_input" name="amounts<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
" onchange="update_cart('<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
',$(this).val());" type="text" value="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
" min="1" max="10" data-variant="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
" autocomplete="off" role="spinbutton">
						<span class="minus cartminus">-</span>
						<span class="plus cartplus">+</span>
					</div>
				</div>
				<div class="carmobitog">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

				</div>
			</div>
		</div>
		
		<div class="cartd carprice">
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price) {?>
			<span class="cpcar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
			<br/>
			<?php }?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</div>
		
		<div class="cartd carkolvo">
			<div class="amountposit">
				<div class="amount">
					<input class="add_input" name="amounts<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
" onchange="update_cart('<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
',$(this).val());" type="text" value="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
" min="1" max="10" data-variant="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
" autocomplete="off" role="spinbutton">
					<span class="minus cartminus">-</span>
					<span class="plus cartplus">+</span>
				</div>
			</div>
			<select style="display: none" name="amounts[<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
]" onchange="document.cart.submit();">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['name'] = 'amounts';
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['purchase']->value->variant->stock+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['amounts']['total']);
?>
				<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index'];?>
" <?php if ($_smarty_tpl->tpl_vars['purchase']->value->amount==$_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index']) {?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['amounts']['index'];?>
 <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
</option>
				<?php endfor; endif; ?>
			</select>
		</div>
		
		
		<div class="cartd carsumm" id="total_cost_<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
">
			<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price) {?>
			<span class="cpcar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
			<br/>
			<?php }?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

		</div>
		
		<a href="#" class="cartdelete" onclick="remove_item_cart('<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
'); return false"></a>
	</div>
	<?php } ?>
	
	
	<div class="carforms">
		<div class="pad-t-30 pad-b-30">
		<?php if ($_smarty_tpl->tpl_vars['coupon_request']->value) {?>
			<div class="kupname">Есть скидочный купон?</div>
			<div class="formkup">
				<input type="text" name="coupon_code" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value->coupon->code, ENT_QUOTES, 'UTF-8', true);?>
" class="coupon_code" />
				<input type="button" name="apply_coupon" class="coupon_button" value="Применить купон" onclick="document.cart.submit();" />
			</div>
			<?php if ($_smarty_tpl->tpl_vars['coupon_error']->value) {?>
			<div class="formkup_error mar-t-15">
				<?php if ($_smarty_tpl->tpl_vars['coupon_error']->value=='invalid') {?>Купон недействителен<?php }?>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['cart']->value->coupon->min_order_price>0&&!$_smarty_tpl->tpl_vars['cart']->value->coupon_discount>0) {?>
			<div class="formkup_error mar-t-15">
			Купон <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value->coupon->code, ENT_QUOTES, 'UTF-8', true);?>
 действует для заказов от <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->coupon->min_order_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['cart']->value->coupon_discount>0) {?>
			<div class="formkup_error no mar-t-15">
			Купон принят! <span>Скидка <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->coupon_discount);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
			</div>
			<?php }?>
			
			<script>
			$("input[name='coupon_code']").keypress(function(event){
				if(event.keyCode == 13){
					$("input[name='name']").attr('data-format', '');
					$("input[name='email']").attr('data-format', '');
					document.cart.submit();
				}
			});
			</script>
			
		<?php }?>
		</div>
		
		<div class="pad-t-30 pad-b-30">
			<div class="carinfo">
				<div>
					<b>Скидка по купону</b> <span id="cup"><?php if ($_smarty_tpl->tpl_vars['cart']->value->coupon_discount>0) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->coupon_discount);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php } else { ?>0 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }?></span>
				</div>
				
				<div id="skidka">
					 <b>Персональная скидка</b> <span><?php if ($_smarty_tpl->tpl_vars['user']->value->discount) {?><?php echo $_smarty_tpl->tpl_vars['user']->value->discount;?>
 %<?php } else { ?>0 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }?></span>
				</div>
				
				<div id="summ_skidka">
					 <b>Скидка от суммы заказа</b> <span><?php if ($_smarty_tpl->tpl_vars['cart']->value->summ_discount) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->summ_discount);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php } else { ?>Действует от 3 000 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }?></span>
				</div>
				
				<div class="itog">
					<b>Итого</b> <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="carforms2">
		<div class="pad-b-30 pad-t-30">
			<div class="kupname">Варианты доставки</div>
		
			<div class="podul">
				<ul class="deliveryblock cpa" id="deliveries">
					<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['delivery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
 $_smarty_tpl->tpl_vars['delivery']->index++;
 $_smarty_tpl->tpl_vars['delivery']->first = $_smarty_tpl->tpl_vars['delivery']->index === 0;
?>
					<li>
						<label class="andru and1" for="deliveries_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
">
						
							<input <?php if ($_smarty_tpl->tpl_vars['delivery']->first) {?>class="first"<?php }?> onclick="change_payment_method(<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
)" type="radio" name="delivery_id" value="<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['delivery_id']->value==$_smarty_tpl->tpl_vars['delivery']->value->id) {?>checked<?php } elseif ($_smarty_tpl->tpl_vars['delivery']->first) {?>checked<?php }?> id="deliveries_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
">
							
							<span>
								<span>
									<?php if ($_smarty_tpl->tpl_vars['delivery']->value->image) {?><img src="../<?php echo $_smarty_tpl->tpl_vars['config']->value->delivery_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['delivery']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['delivery']->value->name;?>
" /><?php }?>
									<b>
									<?php echo $_smarty_tpl->tpl_vars['delivery']->value->name;?>

									<?php if ($_smarty_tpl->tpl_vars['cart']->value->total_price<$_smarty_tpl->tpl_vars['delivery']->value->free_from&&$_smarty_tpl->tpl_vars['delivery']->value->price>0) {?>
										<span class="mobpricedel"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['delivery']->value->price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['cart']->value->total_price>=$_smarty_tpl->tpl_vars['delivery']->value->free_from) {?>
										<span class="mobpricedel">бесплатно</span>
									<?php }?>
									</b>
									<?php if ($_smarty_tpl->tpl_vars['cart']->value->total_price<$_smarty_tpl->tpl_vars['delivery']->value->free_from&&$_smarty_tpl->tpl_vars['delivery']->value->price>0) {?>
										<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['delivery']->value->price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['cart']->value->total_price>=$_smarty_tpl->tpl_vars['delivery']->value->free_from) {?>
										<span>бесплатно</span>
									<?php }?>
								</span>
							</span>
							
							<?php if ($_smarty_tpl->tpl_vars['delivery']->value->description) {?><div class="delivery_info din1"><?php echo $_smarty_tpl->tpl_vars['delivery']->value->description;?>
</div><?php }?>
							
						</label>
					</li>
					<?php } ?>
				</ul>
				<div class="dp_info dpi1">
					<span>
					<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['delivery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
 $_smarty_tpl->tpl_vars['delivery']->index++;
 $_smarty_tpl->tpl_vars['delivery']->first = $_smarty_tpl->tpl_vars['delivery']->index === 0;
?>
					<?php if ($_smarty_tpl->tpl_vars['delivery']->first) {?>
					<?php echo $_smarty_tpl->tpl_vars['delivery']->value->description;?>

					<?php }?>
					<?php } ?>
					</span>
				</div>
			</div>
		</div>
		
		<div class="pad-b-30" style="text-align: left;">
			<div class="kupname">Варианты оплаты</div>
			
			<?php if ($_smarty_tpl->tpl_vars['deliveries']->value) {?>
				<div class="podul">
				<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['delivery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
 $_smarty_tpl->tpl_vars['delivery']->index++;
 $_smarty_tpl->tpl_vars['delivery']->first = $_smarty_tpl->tpl_vars['delivery']->index === 0;
?>
					<?php if ($_smarty_tpl->tpl_vars['delivery']->value->payment_methods) {?> 
						<div class="delivery_payment <?php if ($_smarty_tpl->tpl_vars['delivery']->first) {?>first<?php }?>" id="delivery_payment_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
" style="display:none"  >
							<ul class="cpa">
								<?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['delivery']->value->payment_methods; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['payment_method']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
 $_smarty_tpl->tpl_vars['payment_method']->index++;
 $_smarty_tpl->tpl_vars['payment_method']->first = $_smarty_tpl->tpl_vars['payment_method']->index === 0;
?>
								<li>
									<label class="andru and2" for=payment_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
>
									
										<input class="<?php if ($_smarty_tpl->tpl_vars['payment_method']->first) {?>payment_first<?php }?>" type=radio name=payment_method_id value='<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['payment_method']->first) {?>checked<?php }?> id=payment_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
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
												<?php $_smarty_tpl->tpl_vars['total_price_with_delivery'] = new Smarty_variable($_smarty_tpl->tpl_vars['cart']->value->total_price, null, 0);?>
												<?php if (!$_smarty_tpl->tpl_vars['delivery']->value->separate_payment) {?>
												<?php $_smarty_tpl->tpl_vars['total_price_with_delivery'] = new Smarty_variable($_smarty_tpl->tpl_vars['cart']->value->total_price+$_smarty_tpl->tpl_vars['delivery']->value->price, null, 0);?>
												<?php }?>
												<span>к оплате <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['total_price_with_delivery']->value,$_smarty_tpl->tpl_vars['payment_method']->value->currency_id);?>
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
 $_from = $_smarty_tpl->tpl_vars['delivery']->value->payment_methods; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							
						</div>
					<?php }?>
				<?php } ?>
				</div>
			<?php }?>
		</div>
	</div>
	
	
	<div class="podsendcart mar-t-30 mar-b-50">
		<div class="sendcart">
			<div class="scitem">
				<ul class="export">
					<li>
						<label>Ваше ФИО <span>*</span></label>
						<input name="name" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Сергеев Сергей Сергеевич" required />
					</li>
					<li>
						<label>Ваш e-mail <span>*</span></label>
						<input name="email" type="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Для уведомлений о заказе" required />
					</li>
				</ul>
			</div>
			<div class="scitem">
				<ul class="export">
					<li>
						<label>Ваш телефон <span>*</span></label>
						<input id="phonecart" name="phone" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="+7 (900) 900-90-90" required />
					</li>
					<li>
						<label>Адрес доставки</label>
						<input name="address" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Г. Санкт-Петербург, ул. Тверская д.15 кв.1" />
					</li>
				</ul>
			</div>
			<div class="scitem">
				<ul class="export">
					<li>
						<label>Желаемая дата доставки</label>
						<input name="zedate" class="zedate" data-large-mode="true" data-theme="my-style" data-lang="ru" data-min-year="2017" data-max-year="2017" type="text" value="<?php echo $_smarty_tpl->tpl_vars['zedate']->value;?>
" placeholder="Например: 01/01/2020" />
					</li>
					<li>
						<label>Желаемое время доставки</label>
						<input name="zetime" class="zetime" type="text" value="<?php echo $_smarty_tpl->tpl_vars['zetime']->value;?>
" placeholder="Например: 15 часов 00 минут" />
					</li>
				</ul>
			</div>
		</div>
		<div class="zcfullink"><span onclick="$('.zecartcom').slideToggle(300); return false;">Добавить комментарий к заказу</span></div>
		<div class="zecartcom">
			<ul class="export">
				<li>
					<textarea name="comment" placeholder="Укажите пожелания к заказу"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
				</li>
			</ul>
		</div>
	</div>
	
	
	
	
	<div class="carforms mobs">
		<div class="pad-b-30">
			<a class="knop" href="#" onclick="javascript:history.back()">&laquo; Вернуться к покупкам</a>
		</div>
		
		<div class="pad-b-30">
			<input type="submit" name="checkout" class="knop next" value="Оформить заказ &raquo;" />
		</div>
	</div>
	
</div>



<script type="text/javascript">
$("#deliveries .first").click();

function change_payment_method($id) {
	$("#delivery_payment_"+$id+" .payment_first").attr('checked','checked');   
	$(".delivery_payment").slideUp(370);
	$("#delivery_payment_"+$id).slideDown(500);
}
$(function(){
	$('label.and1').click(
		function() {
			$('.dpi1>span').html($(this).closest('li').find('.delivery_info.din1').html());
		}
	);
	$('label.and2').click(
		function() {
			$('.dpi2>span').html($(this).closest('.and2').find('.din2').html());
		}
	);
});
</script>


<script type="text/javascript">
function update_cart(new_variant_id,amount)
{
	$.ajax({
		url: "ajax/cart_update.php",
		data: {'new_variant_id':new_variant_id,'amount':amount},
		success: function(data){
		if(data){
			$('#cart_informer').html(data.informer);
			$('.phead').html(data.total_products);
			$('.carforms2').html(data.delivery);
			$('.itog').html(data.total_price);
			$('#total_cost_'+new_variant_id).html(data.total_cost);
			$('#cup').html(data.cup);
			$('#skidka').html(data.skidka);
			$('#summ_skidka').html(data.summ_skidka);
			$('.carmobitog').html(data.carmobitog);
        }
		}
	});

}

function remove_item_cart(remove_id)
{
	var lastpage =<?php if ($_smarty_tpl->tpl_vars['last_page']->value) {?>'<?php echo $_smarty_tpl->tpl_vars['last_page']->value;?>
'<?php } else { ?>''<?php }?>
	
	$.ajax({
		url: "ajax/cart_update.php",
		data: {'remove_id':remove_id},
		success: function(data){
			if(data){
				if(data.total == 0){
					if(lastpage){ 
						location.href=lastpage;
					}
					else{
						location.reload();
					}
				}
				$('#cart_informer').html(data.informer);
				$('.phead').html(data.total_products);
				$('.carforms2').html(data.delivery); 
				$('.itog').html(data.total_price);
				$('#item_cart_'+remove_id).slideUp(300);
				$('#cup').html(data.cup);
				$('#skidka').html(data.skidka);
				$('#summ_skidka').html(data.summ_skidka);
			}
		} 
	});
}

$(document).ready(function() {
	$('.cartminus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.cartplus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) + 1;
		count = count > 1000 ? 1000 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$( ".zetime" ).timeDropper({
		format: 'HH:mm a',
		init_animation: "fadein",
		primaryColor: "#C92D8C",
		borderColor: "#C92D8C",
		backgroundColor: "#FFF",
		textColor: '#555'
	});
	$('.zedate').dateDropper();
});
</script>






</form>
<?php } else { ?>
В корзине нет товаров
<?php }?>
<?php }} ?>
