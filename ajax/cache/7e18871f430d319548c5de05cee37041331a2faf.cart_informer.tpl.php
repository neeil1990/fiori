<?php /*%%SmartyHeaderCode:17458843755a5de38da375e9-26994766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '17458843755a5de38da375e9-26994766',
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a5df245d6e5d2_32594644',
  'has_nocache_code' => false,
  'cache_lifetime' => '0',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5df245d6e5d2_32594644')) {function content_5a5df245d6e5d2_32594644($_smarty_tpl) {?><span class="cionecitwo"> <span class="cione">1</span> <span class="citwo">2 580 Р</span> </span> <span class="opencartmodal" onclick="$('.minicart').fadeIn(300); $('.minicart').removeClass('hides'); return false;"></span> <div class="minicart hides"> <div class="minctitle"> <span class="mctnam">В корзине 1 позиция</span> <span class="mcclose" onclick="$('.minicart').fadeOut(300); $('.minicart').addClass('hides'); return false;"></span> </div> <div class="podtablescroll"> <div class="mctable"> <div class="mcitem item_cart_564"> <div class="mcimg"> <a href="products/la-paloma"><img src="http://fiori.su/files/products/la-paloma_b.50x50.jpg?dc53d563b7f95b11a780a18a20b75dab" alt="La paloma"></a> </div> <div class="mcname"> <a href="products/la-paloma">La paloma <span>Малый (15-20см)</span></a> </div> <div class="mcamount"> <div class="amountposit"> <div class="amount"> <input class="add_input" name="amounts564" onchange="update_minicart('564',$(this).val());" type="text" value="1" min="1" max="10" data-variant="564" autocomplete="off" role="spinbutton"> <span class="minus mcartminus">-</span> <span class="plus mcartplus">+</span> </div> </div> </div> <div class="mcprice total_mcprice_564">
												2 580 Р
					</div> <div class="mcardel"> <a href="#" class="cartdelete mcardel" onclick="remove_item_minicart('564'); return false"></a> </div> </div> </div> </div> <div class="mcitogo"> <span class="mcit">
				Итого 2 580 Р
			</span> <div class="butki"> <a class="knop" href="#" onclick="$('.minicart').fadeOut(300); $('.minicart').addClass('hides'); return false;">&laquo; Продолжить покупки</a> <a class="knop next" href="/cart/">Оформить заказ &raquo;</a> </div> </div> </div> <script>
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
	
	

<?php }} ?>
