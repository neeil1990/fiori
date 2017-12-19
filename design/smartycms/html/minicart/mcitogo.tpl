{if $cart->purchases}
<span class="mcit">
	Итого {$cart->total_price|convert} {$currency->sign}
</span>
<div class="butki">
	<a class="knop" href="#" onclick="$('.minicart').fadeOut(300); return false;">&laquo; Продолжить покупки</a>
	<a class="knop next" href="/cart/">Оформить заказ &raquo;</a>
</div>
{else}
<script>
$('.minicart').fadeOut(300);
$('.cionecitwo').html('Корзина пуста');
$('.opencartmodal').fadeOut(300);
</script>
{/if}