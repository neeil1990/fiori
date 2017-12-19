{* Страница заказа *}

{$meta_title = "Ваш заказ №`$order->id`" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>Заказ оформлен!</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">
Ваш заказ №{$order->id} 
{if $order->status == 0}принят{/if}
{if $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
{if $order->paid == 1}, оплачен{else}{/if}
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
	
	{foreach $purchases as $purchase}
	<div class="cartable" id="item_cart_{$purchase->new_variant_id}">
		{$image = $purchase->product->images|first}
		{if $image}
		<div class="cartd carimage">
			<a href="products/{$purchase->product->url}"><img src="{$image->filename|resize:70:70}" alt="{$product->name|escape}"></a>
		</div>
		{/if}
		
		<div class="cartd carname">
			<a href="products/{$purchase->product->url}">{$purchase->product->name|escape}{if $purchase->variant->name} <span>{$purchase->variant->name|escape}</span>{/if}</a>
			{if $purchase->properties}
			{assign var="result" value="|||"|explode:$purchase->properties}
			{if $purchase->properties|strlen >0}
			<div style="font-size: 13px;">
			{foreach $result as $r}
				+ {$r}<br>
			{/foreach}
			</div>
			{/if}
			{/if}
			{if $purchase->variant->compare_price}
			<div class="carskidka">
			Скидка {floor(abs(100-{$purchase->variant->price}/($purchase->variant->compare_price)*100))} %
			</div>
			{/if}
			{if $order->paid && $purchase->variant->attachment}
				<br/><br/><a class="download_attachment" href="order/{$order->url}/{$purchase->variant->attachment}">скачать файл</a>
			{/if}
			
			<div class="cartmobile">
				<div class="carmobsht">
					{$purchase->amount} {$settings->units} &nbsp; - &nbsp;
				</div>
				<div class="carmobitog">
					{($purchase->price*$purchase->amount)|convert} {$currency->sign}
				</div>
			</div>
			
		</div>
		
		<div class="cartd carprice">
			{if $purchase->compare_price}
			<span class="cpcar">{$purchase->compare_price|convert} {$currency->sign}</span>
			<br/>
			{/if}
			{($purchase->price)|convert} {$currency->sign}
		</div>
		
		<div class="cartd carkolvo">
			{$purchase->amount} {$settings->units}
		</div>
		
		
		<div class="cartd carsumm" id="total_cost_{$purchase->new_variant_id}">
			{if $purchase->compare_price}
			<span class="cpcar">{($purchase->compare_price*$purchase->amount)|convert} {$currency->sign}</span>
			<br/>
			{/if}
			{($purchase->price*$purchase->amount)|convert} {$currency->sign}
		</div>
		
	</div>
	{/foreach}
	
	
	<div class="carforms order">
		<div class="pad-t-30 pad-b-30">
			<div class="carinfo" style="float: left;">
				<div>
					<b>Дата заказа</b> <span>{$order->date|date} в {$order->date|time}</span>
				</div>
				
				{if $order->name}
				<div>
					<b>Имя</b> <span>{$order->name|escape}</span>
				</div>
				{/if}
				
				{if $order->email}
				<div>
					<b>E-mail</b> <span>{$order->email|escape}</span>
				</div>
				{/if}
				
				{if $order->phone}
				<div>
					<b>Телефон</b> <span>{$order->phone|escape}</span>
				</div>
				{/if}
				
				{if $order->address}
				<div>
					<b>Адрес доставки</b> <span>{$order->address|escape}</span>
				</div>
				{/if}
				
				{if $order->comment}
				<div>
					<b>Комментарий</b> <span>{$order->comment|escape|nl2br}</span>
				</div>
				{/if}
				
				{if $order->zedate}
				<div>
					<b>Дата доставки</b> <span>{$order->zedate}</span>
				</div>
				{/if}
				
				{if $order->zetime}
				<div>
					<b>Время доставки</b> <span>{$order->zetime}</span>
				</div>
				{/if}
				
			</div>
		</div>
		
		<div class="pad-t-30 pad-b-30">
			<div class="carinfo">
				<div class="notc">
					<b>Скидка</b> <span id="cup">{if $order->discount > 0}{$order->discount} %{else}0 {$currency->sign}{/if}</span>
				</div>
				
				<div class="notc">
					 <b>Скидка по купону</b> <span>{if $order->coupon_discount > 0}{$order->coupon_discount|convert} {$currency->sign}{else}0 {$currency->sign}{/if}</span>
				</div>
				
				<div class="notc">
					 <b>Скидка от суммы</b> <span>{if $order->summ_discount}{$order->summ_discount|convert} {$currency->sign}{else}0 {$currency->sign}{/if}</span>
				</div>
				
				{if !$order->separate_delivery && $order->delivery_price>0}
				<div class="notc">
					 <b>{$delivery->name|escape}</b> <span>+ {$order->delivery_price|convert} {$currency->sign}</span>
				</div>
				{/if}
				
				<div class="itog notc">
					<b>Итого</b> <span>{$order->total_price|convert} {$currency->sign}</span>
				</div>
				
				{if $order->separate_delivery}
				<div class="itog notc">
					<b>{$delivery->name|escape}<br/><span style="font-size: 12px;">(оплачивается отдельно)</span></b> <span>+ {$order->delivery_price|convert} {$currency->sign} </span>
				</div>
				{/if}
				
			</div>
		</div>
	</div>
	
	
	<div class="codestatus">
		<b>Ваш код для проверки статуса заказа</b> <span>{$order->url}</span>
	</div>
	
	
{if !$order->paid}
{* Выбор способа оплаты *}
{if $payment_methods && !$payment_method && $order->total_price>0}
<div class="opay">
<form method="post">

<ul class="cpa">
	{foreach $payment_methods as $payment_method}
	<li>
		<label class="andru and2" for=payment_{$payment_method->id}>
		
			<input type=radio name=payment_method_id value='{$payment_method->id}' {if $payment_method@first}checked{/if} id=payment_{$payment_method->id}>
										
			<span>
				<span>
					{if $payment_method->image}<img src="../{$config->payment_method_images_dir}{$payment_method->image}" alt="{$payment_method->name}" />{/if}
												
					{if $payment_method->image}{else}
					<b>
					{$payment_method->name}
					</b>
					{/if}
					<span>к оплате {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$all_currencies[$payment_method->currency_id]->sign}</span>
				</span>
			</span>
										
			{if $payment_method->description}<div class="delivery_info din2">{$payment_method->description}</div>{/if}
			
		</label>
	</li>
	{/foreach}
</ul>

							<div class="dp_info dpi2">
								<span>
								{foreach $payment_methods as $payment_method}
								{if $payment_method@first}
								{$payment_method->description}
								{/if}
								{/foreach}
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

{* Выбраный способ оплаты *}
{elseif $payment_method}
<div class="opay">
<h2>Способ оплаты &mdash; {$payment_method->name}</h2>
<form method=post><input type=submit name='reset_payment_method' value='Выбрать другой способ оплаты'></form>	

<p>
{$payment_method->description}
</p>
<h2>
К оплате {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$all_currencies[$payment_method->currency_id]->sign}
</h2>

{* Форма оплаты, генерируется модулем оплаты *}
{checkout_form order_id=$order->id module=$payment_method->module}
</div>


{/if}
{/if}
	
	
	
	
	

</div>







