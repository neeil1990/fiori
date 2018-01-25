{if $cart->purchases}
		<div class="pad-b-30 pad-t-30">
			<div class="kupname">Варианты доставки</div>
		
			<div class="podul">
				<ul class="deliveryblock cpa" id="deliveries">
					{foreach $deliveries as $delivery}
					<li>
						<label class="andru and1" for="deliveries_{$delivery->id}">
						
							<input {if $delivery@first}class="first"{/if} onclick="change_payment_method({$delivery->id})" type="radio" name="delivery_id" value="{$delivery->id}" {if $delivery_id==$delivery->id}checked{elseif $delivery@first}checked{/if} id="deliveries_{$delivery->id}">
							
							<span>
								<span>
									{if $delivery->image}<img src="../{$config->delivery_images_dir}{$delivery->image}" alt="{$delivery->name}" />{/if}
									<b>
									{$delivery->name}
									</b>
									{if $cart->total_price < $delivery->free_from && $delivery->price>0}
										<span>{$delivery->price|convert}&nbsp;{$currency->sign}</span>
									{elseif $cart->total_price >= $delivery->free_from}
										<span>бесплатно</span>
									{/if}
								</span>
							</span>
							
							{if $delivery->description}<div class="delivery_info din1">{$delivery->description}</div>{/if}
							
						</label>
					</li>
					{/foreach}
				</ul>
				<div class="dp_info dpi1">
					<span>
					{foreach $deliveries as $delivery}
					{if $delivery@first}
					{$delivery->description}
					{/if}
					{/foreach}
					</span>
				</div>
			</div>
		</div>
		
		<div class="pad-b-30" style="text-align: left;">
			<div class="kupname">Варианты оплаты</div>
			{* Оплата *}
			{if $deliveries}
				<div class="podul">
				{foreach $deliveries as $delivery}
					{if $delivery->payment_methods} 
						<div class="delivery_payment {if $delivery@first}first{/if}" id="delivery_payment_{$delivery->id}" {if $delivery@first}{else}style="display:none"{/if}  >
							<ul class="cpa">
								{foreach  $delivery->payment_methods as $payment_method}
								<li>
									<label class="andru and2" for=payment_{$delivery->id}{$payment_method->id}>
									
										<input class="{if $payment_method@first}payment_first{/if}" type=radio name=payment_method_id value='{$payment_method->id}' {if $payment_method@first}checked{/if} id=payment_{$delivery->id}{$payment_method->id}>
										
										<span>
											<span>
												{if $payment_method->image}<img src="../{$config->payment_method_images_dir}{$payment_method->image}" alt="{$payment_method->name}" />{/if}
												
												{if $payment_method->image}{else}
												<b>
												{$payment_method->name}
												</b>
												{/if}
												{$total_price_with_delivery = $cart->total_price}
												{if !$delivery->separate_payment}
												{$total_price_with_delivery = $cart->total_price + $delivery->price}
												{/if}
												<span>к оплате {$total_price_with_delivery|convert:$payment_method->currency_id}&nbsp;{$all_currencies[$payment_method->currency_id]->sign}</span>
											</span>
										</span>
										
										{if $payment_method->description}<div class="delivery_info din2">{$payment_method->description}</div>{/if}
										
									</label>
								</li>
								{/foreach}
							</ul>
							
							<div class="dp_info dpi2">
								<span>
								{foreach  $delivery->payment_methods as $payment_method}
								{if $payment_method@first}
								{$payment_method->description}
								{/if}
								{/foreach}
								</span>
							</div>
							
						</div>
					{/if}
				{/foreach}
				</div>
			{/if}
		</div>
<script type="text/javascript">
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
{else}
<meta http-equiv="refresh" content="0; url="">
{/if}