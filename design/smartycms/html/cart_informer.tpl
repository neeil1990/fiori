{if $cart->total_products>0}
	<span class="cionecitwo">
		<span class="cione">{$cart->total_products}</span>
		<span class="citwo">{$cart->total_price|convert} {$currency->sign|escape}</span>
	</span>
	
	{if $module !=='CartView'}
	<span class="opencartmodal" onclick="$('.minicart').fadeIn(300); $('.minicart').removeClass('hides'); return false;"></span>
	<div class="minicart hides">
		<div class="minctitle">
			<span class="mctnam">{if $cart->purchases}В корзине {$cart->total_products} {$cart->total_products|plural:'позиция':'позиций':'позиции'}{else}Корзина пуста{/if}</span>
			<span class="mcclose" onclick="$('.minicart').fadeOut(300); $('.minicart').addClass('hides'); return false;"></span>
		</div>
		<div class="podtablescroll">
			<div class="mctable">
				{foreach $cart->purchases as $purchase}
				<div class="mcitem item_cart_{$purchase->new_variant_id}">
					{$image = $purchase->product->images|first}
					{if $image}
					<div class="mcimg">
						<a href="products/{$purchase->product->url}"><img src="{$image->filename|resize:50:50}" alt="{$purchase->product->name|escape}"></a>
					</div>
					{/if}
					
					<div class="mcname">
						<a href="products/{$purchase->product->url}">{$purchase->product->name|escape}{if $purchase->variant->name} <span>{$purchase->variant->name|escape}</span>{/if}</a>
						{if $purchase->properties}
						{foreach $purchase->properties as $property}
						<div class="carproper">
							<div>{$property['name']} (+{$property['price']|convert} {$currency->sign|escape})</div>
						</div>
						{/foreach}
						{/if}
						{if $purchase->variant->compare_price}
						<div class="carskidka">
						Скидка {floor(abs(100-{$purchase->variant->price}/($purchase->variant->compare_price)*100))} %
						</div>
						{/if}
					</div>
					
					<div class="mcamount">
						<div class="amountposit">
							<div class="amount">
								<input class="add_input" name="amounts{$purchase->new_variant_id}" onchange="update_minicart('{$purchase->new_variant_id}',$(this).val());" type="text" value="{$purchase->amount}" min="1" max="10" data-variant="{$purchase->new_variant_id}" autocomplete="off" role="spinbutton">
								<span class="minus mcartminus">-</span>
								<span class="plus mcartplus">+</span>
							</div>
						</div>

					</div>
					
					<div class="mcprice total_mcprice_{$purchase->new_variant_id}">
						{if $purchase->variant->compare_price}
						<span class="cpcar">{($purchase->variant->compare_price*$purchase->amount)|convert} {$currency->sign}</span>
						<br/>
						{/if}
						{($purchase->variant->price*$purchase->amount)|convert} {$currency->sign}
					</div>
					
					<div class="mcardel">
						<a href="#" class="cartdelete mcardel" onclick="remove_item_minicart('{$purchase->new_variant_id}'); return false"></a>
					</div>
					
				</div>
				{/foreach}
			</div>
		</div>
		<div class="mcitogo">
			<span class="mcit">
				Итого {$cart->total_price|convert} {$currency->sign}
			</span>
			<div class="butki">
				<a class="knop" href="#" onclick="$('.minicart').fadeOut(300); $('.minicart').addClass('hides'); return false;">&laquo; Продолжить покупки</a>
				<a class="knop next" href="/cart/">Оформить заказ &raquo;</a>
			</div>
		</div>
	</div>
	{literal}
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
	{/literal}
	{/if}
{else}
	<span class="pusto">Корзина пуста</span>
{/if}
