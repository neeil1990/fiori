{$meta_title = "Корзина - {$settings->site_name}" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>Корзина покупок</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">
{if $cart->purchases}В корзине {$cart->total_products} {$cart->total_products|plural:'товар':'товаров':'товара'}
{else}Корзина пуста{/if}
</h1>

{if $cart->purchases}
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
	
	{foreach $cart->purchases as $purchase}
	<div class="cartable" id="item_cart_{$purchase->new_variant_id}">
		{$image = $purchase->product->images|first}
		{if $image}
		<div class="cartd carimage">
			<a href="products/{$purchase->product->url}"><img src="{$image->filename|resize:70:70}" alt="{$purchase->product->name|escape}"></a>
		</div>
		{/if}
		
		<div class="cartd carname">
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
			<div class="cartmobile">
				<div class="amountposit">
					<div class="amount">
						<input class="add_input" name="amounts{$purchase->new_variant_id}" onchange="update_cart('{$purchase->new_variant_id}',$(this).val());" type="text" value="{$purchase->amount}" min="1" max="10" data-variant="{$purchase->new_variant_id}" autocomplete="off" role="spinbutton">
						<span class="minus cartminus">-</span>
						<span class="plus cartplus">+</span>
					</div>
				</div>
				<div class="carmobitog">
					{($purchase->variant->price*$purchase->amount)|convert} {$currency->sign}
				</div>
			</div>
		</div>
		
		<div class="cartd carprice">
			{if $purchase->variant->compare_price}
			<span class="cpcar">{$purchase->variant->compare_price|convert} {$currency->sign}</span>
			<br/>
			{/if}
			{($purchase->variant->price)|convert} {$currency->sign}
		</div>
		
		<div class="cartd carkolvo">
			<div class="amountposit">
				<div class="amount">
					<input class="add_input" name="amounts{$purchase->new_variant_id}" onchange="update_cart('{$purchase->new_variant_id}',$(this).val());" type="text" value="{$purchase->amount}" min="1" max="10" data-variant="{$purchase->new_variant_id}" autocomplete="off" role="spinbutton">
					<span class="minus cartminus">-</span>
					<span class="plus cartplus">+</span>
				</div>
			</div>
			<select style="display: none" name="amounts[{$purchase->new_variant_id}]" onchange="document.cart.submit();">
				{section name=amounts start=1 loop=$purchase->variant->stock+1 step=1}
				<option value="{$smarty.section.amounts.index}" {if $purchase->amount==$smarty.section.amounts.index}selected{/if}>{$smarty.section.amounts.index} {$settings->units}</option>
				{/section}
			</select>
		</div>
		
		
		<div class="cartd carsumm" id="total_cost_{$purchase->new_variant_id}">
			{if $purchase->variant->compare_price}
			<span class="cpcar">{($purchase->variant->compare_price*$purchase->amount)|convert} {$currency->sign}</span>
			<br/>
			{/if}
			{($purchase->variant->price*$purchase->amount)|convert} {$currency->sign}
		</div>
		
		<a href="#" class="cartdelete" onclick="remove_item_cart('{$purchase->new_variant_id}'); return false"></a>
	</div>
	{/foreach}
	
	
	<div class="carforms">
		<div class="pad-t-30 pad-b-30">
		{if $coupon_request}
			<div class="kupname">Есть скидочный купон?</div>
			<div class="formkup">
				<input type="text" name="coupon_code" value="{$cart->coupon->code|escape}" class="coupon_code" />
				<input type="button" name="apply_coupon" class="coupon_button" value="Применить купон" onclick="document.cart.submit();" />
			</div>
			{if $coupon_error}
			<div class="formkup_error mar-t-15">
				{if $coupon_error == 'invalid'}Купон недействителен{/if}
			</div>
			{/if}
			{if $cart->coupon->min_order_price>0 && !$cart->coupon_discount>0}
			<div class="formkup_error mar-t-15">
			Купон {$cart->coupon->code|escape} действует для заказов от {$cart->coupon->min_order_price|convert} {$currency->sign}
			</div>
			{/if}
			{if $cart->coupon_discount>0}
			<div class="formkup_error no mar-t-15">
			Купон принят! <span>Скидка {$cart->coupon_discount|convert} {$currency->sign}</span>
			</div>
			{/if}
			{literal}
			<script>
			$("input[name='coupon_code']").keypress(function(event){
				if(event.keyCode == 13){
					$("input[name='name']").attr('data-format', '');
					$("input[name='email']").attr('data-format', '');
					document.cart.submit();
				}
			});
			</script>
			{/literal}
		{/if}
		</div>
		
		<div class="pad-t-30 pad-b-30">
			<div class="carinfo">
				<div>
					<b>Скидка по купону</b> <span id="cup">{if $cart->coupon_discount>0}{$cart->coupon_discount|convert} {$currency->sign}{else}0 {$currency->sign}{/if}</span>
				</div>
				
				<div id="skidka">
					 <b>Персональная скидка</b> <span>{if $user->discount}{$user->discount} %{else}0 {$currency->sign}{/if}</span>
				</div>
				
				<div id="summ_skidka">
					 <b>Скидка от суммы заказа</b> <span>{if $cart->summ_discount}{$cart->summ_discount|convert} {$currency->sign}{else}Действует от 3 000 {$currency->sign}{/if}</span>
				</div>
				
				<div class="itog">
					<b>Итого</b> <span>{$cart->total_price|convert} {$currency->sign}</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="carforms2">
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
									{if $cart->total_price < $delivery->free_from && $delivery->price>0}
										<span class="mobpricedel">{$delivery->price|convert}&nbsp;{$currency->sign}</span>
									{elseif $cart->total_price >= $delivery->free_from}
										<span class="mobpricedel">бесплатно</span>
									{/if}
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
						<div class="delivery_payment {if $delivery@first}first{/if}" id="delivery_payment_{$delivery->id}" style="display:none"  >
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
	</div>
	
	
	<div class="podsendcart mar-t-30 mar-b-50">
		<div class="sendcart">
			<div class="scitem">
				<ul class="export">
					<li>
						<label>Ваше ФИО <span>*</span></label>
						<input name="name" type="text" value="{$name|escape}" placeholder="Сергеев Сергей Сергеевич" required />
					</li>
					<li>
						<label>Ваш e-mail <span>*</span></label>
						<input name="email" type="email" value="{$email|escape}" placeholder="Для уведомлений о заказе" required />
					</li>
				</ul>
			</div>
			<div class="scitem">
				<ul class="export">
					<li>
						<label>Ваш телефон <span>*</span></label>
						<input id="phonecart" name="phone" type="text" value="{$phone|escape}" placeholder="+7 (900) 900-90-90" required />
					</li>
					<li>
						<label>Адрес доставки</label>
						<input name="address" type="text" value="{$address|escape}" placeholder="Г. Санкт-Петербург, ул. Тверская д.15 кв.1" />
					</li>
				</ul>
			</div>
			<div class="scitem">
				<ul class="export">
					<li>
						<label>Желаемая дата доставки</label>
						<input name="zedate" class="zedate" data-large-mode="true" data-theme="my-style" data-lang="ru" data-min-year="2017" data-max-year="2017" type="text" value="{$zedate}" placeholder="Например: 01/01/2020" />
					</li>
					<li>
						<label>Желаемое время доставки</label>
						<input name="zetime" class="zetime" type="text" value="{$zetime}" placeholder="Например: 15 часов 00 минут" />
					</li>
				</ul>
			</div>
		</div>
		<div class="zcfullink"><span onclick="$('.zecartcom').slideToggle(300); return false;">Добавить комментарий к заказу</span></div>
		<div class="zecartcom">
			<ul class="export">
				<li>
					<textarea name="comment" placeholder="Укажите пожелания к заказу">{$comment|escape}</textarea>
				</li>
			</ul>
		</div>
		<div class="sendcart">
			<div class="zcfullink">
				<ul class="export">
					<li>
						<br>
						<input type="checkbox" name="rule" checked required>
						Нажимая на эту кнопку, я даю свое согласие на
						<a href="/files/uploads/compliance.pdf" target="_blank">обработку персональных данных</a> и соглашаюсь с условиями
						<a href="/files/uploads/politics.pdf" target="_blank">политики конфиденциальности</a>.
					</li>
				</ul>
			</div>
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

{literal}
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
	var lastpage ={/literal}{if $last_page}'{$last_page}'{else}''{/if}{literal}
	
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
{/literal}





</form>
{else}
В корзине нет товаров
{/if}
