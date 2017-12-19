{if $dabla}
{foreach $dabla as $dabl}
<div class="dabl mar-b-15">
Cтатус заказа - {if $order->status == 0}принят{/if}{if $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}{if $order->paid == 1}, оплачен{else}, не оплачен{/if}
</div>
<a href="/order/{$dabl->url}" class="knop">Перейти на страницу заказа</a>
{/foreach}
{else}
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
{/if}