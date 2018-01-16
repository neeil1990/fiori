<?php /* Smarty version Smarty-3.1.18, created on 2017-12-28 16:17:15
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10765248675a2d768f10cde9-89730979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e18871f430d319548c5de05cee37041331a2faf' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/cart_informer.tpl',
      1 => 1514467025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10765248675a2d768f10cde9-89730979',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d768f190fe6_29646051',
  'variables' => 
  array (
    'cart' => 0,
    'currency' => 0,
    'module' => 0,
    'purchase' => 0,
    'image' => 0,
    'property' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d768f190fe6_29646051')) {function content_5a2d768f190fe6_29646051($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['cart']->value->total_products>0) {?>
	<span class="cionecitwo">
		<span class="cione"><?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
</span>
		<span class="citwo"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>
	</span>
	
	<?php if ($_smarty_tpl->tpl_vars['module']->value!=='CartView') {?>
	<span class="opencartmodal" onclick="$('.minicart').fadeIn(300); $('.minicart').removeClass('hides'); return false;"></span>
	<div class="minicart hides">
		<div class="minctitle">
			<span class="mctnam"><?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>В корзине <?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['cart']->value->total_products,'позиция','позиций','позиции');?>
<?php } else { ?>Корзина пуста<?php }?></span>
			<span class="mcclose" onclick="$('.minicart').fadeOut(300); $('.minicart').addClass('hides'); return false;"></span>
		</div>
		<div class="podtablescroll">
			<div class="mctable">
				<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->purchases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
				<div class="mcitem item_cart_<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
">
					<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
					<div class="mcimg">
						<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,50,50);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
					</div>
					<?php }?>
					
					<div class="mcname">
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
<?php $_tmp4=ob_get_clean();?><?php echo floor(abs(100-$_tmp4/($_smarty_tpl->tpl_vars['purchase']->value->variant->compare_price)*100));?>
 %
						</div>
						<?php }?>
					</div>

					
					<div class="mcamount">
						<div class="amountposit">
							<div class="amount">
								<input class="add_input" name="amounts<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
" onchange="update_minicart('<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
',$(this).val());" type="text" value="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
" min="1" max="10" data-variant="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
" autocomplete="off" role="spinbutton">
								<span class="minus mcartminus">-</span>
								<span class="plus mcartplus">+</span>
							</div>
						</div>

					</div>
					
					<div class="mcprice total_mcprice_<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
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
					
					<div class="mcardel">
						<a href="#" class="cartdelete mcardel" onclick="remove_item_minicart('<?php echo $_smarty_tpl->tpl_vars['purchase']->value->new_variant_id;?>
'); return false"></a>
					</div>
					
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="mcitogo">
			<span class="mcit">
				Итого <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

			</span>
			<div class="butki">
				<a class="knop" href="#" onclick="$('.minicart').fadeOut(300); $('.minicart').addClass('hides'); return false;">&laquo; Продолжить покупки</a>
				<a class="knop next" href="/cart/">Оформить заказ &raquo;</a>
			</div>
		</div>
	</div>
	
	<script>
	function update_minicart(new_variant_id,amount)
	{
		$.ajax({
			url: "ajax/minicart.php",
			data: {'new_variant_id':new_variant_id,'amount':amount},
			success: function(data){
				if(data){
					$('.mctnam').html(data.mctnam);
					$('.total_mcprice_'+new_variant_id).html(data.total_mcprice);
					$('.mcitogo').html(data.mcitogo);
					$('.cione').html(data.cione);
					$('.citwo').html(data.citwo);
				}
			}
		});

	}

	function remove_item_minicart(remove_id)
	{
		$.ajax({
			url: "ajax/minicart.php",
			data: {'remove_id':remove_id},
			success: function(data){
				if(data){
					$('.mctnam').html(data.mctnam);
					$('.mcitogo').html(data.mcitogo);
					$('.item_cart_'+remove_id).slideUp(300);
					$('.cione').html(data.cione);
					$('.citwo').html(data.citwo);
				}
			} 
		});
	}

	$(document).ready(function() {
		$('.mcartminus').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
		$('.mcartplus').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) + 1;
			count = count > 1000 ? 1000 : count;
			$input.val(count);
			$input.change();
			return false;
		});

	});


	</script>
	
	<?php }?>
<?php } else { ?>
	<span class="pusto">Корзина пуста</span>
<?php }?>


<?php }} ?>
