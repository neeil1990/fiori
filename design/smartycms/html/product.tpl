{$canonical="/products/{$product->url}" scope=parent}
{get_session_products key=wishlist}

<!-- Хлебные крошки /-->
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><a href="/products">Каталог товаров</a></li>
	{foreach $category->path as $cat}
		<li><a href="catalog/{$cat->url}">{$cat->name|escape}</a></li>
	{/foreach}
	<li><span>{$product->name|escape}</span></li>
</ul>
<!-- Хлебные крошки #End /-->
<div class="ptable product jsprod mar-t-30">
	
	{if $product->image}
	<div class="ptableleft">
		<div>
			<div class="image">
				<div class="slider-for">
					{foreach $product->images as $i=>$image}
					<div>
						<a href="{$image->filename|resize:800:600}" class="quick_view" data-fancybox="qw1" data-qw-form="qw-form-1"><img src="{$image->filename|resize:430:430}" alt="{$product->name|escape}" /></a>
					</div>
					{/foreach}
				</div>
			</div>
			{if $product->images|count>1}
			<div class="pp_images slider-nav">
				{foreach $product->images as $i=>$image}
				<div variants-image="{$image->id}">
					<div class="pp_i_b">
						<span>
							<span>
								<img src="{$image->filename|resize:70:70}" alt="{$product->name|escape}" />
							</span>
						</span>
					</div>
				</div>
				{/foreach}
			</div>
			{/if}
		</div>
	</div>
	{/if}
	
	<div class="ptableright">
		<h1 class="prodtitle" data-product="{$product->id}">{$product->name|escape}</h1>
		

		<div class="prodanno">
		{$product->annotation}
		</div>

		
		<div class="fichi">
			{if $product->featured}<span class="chit">Хит</span>{/if}
			<span class="cproc" {if $product->variant->compare_price > 0}{else}style="display: none"{/if}>- {floor(abs(100-{$product->variant->price}/($product->variant->compare_price)*100))}%</span>
		</div>
		
		<form class="variants pis_table mar-b-30" action="/cart">
		
			{if $product->variants|count > 0}
			<div class="blockselectprod">
				<b>Вариант букета</b>
				<div class="podipselect">
					<select class="ipselect ajaxselect" name="variant">
					{foreach $product->variants as $v}
						<option value="{$v->id}"
								data-text-var="{$v->description}"
								{if $v->compare_price > 0}
									data-compareprice2="{$v->compare_price}"
									data-proc="- {floor(abs(100-{$v->price}/($v->compare_price)*100))}%"
									data-compare_price="<span><b class='clcomp'>{$v->compare_price|string_format:"%.0f"}</b> {$currency->sign|escape}</span>"
									data-compare_price-int="{$v->compare_price|string_format:"%.0f"}"
								{/if}
								data-price="<span><b class='calcitog'>{$v->price|string_format:"%.0f"}</b> {$currency->sign|escape}</span>"
								data-price-int="{$v->price|string_format:"%.0f"}"
								>
							{$v->name}
						</option>
					{/foreach}
					</select>
				</div>
			</div>
			{else}
			{foreach $product->variants as $v}
			<input checked name="variant" value="{$v->id}" type="radio" style="display: none;"/>
			{/foreach}
			{/if}


			{if $product->boxing|count > 0}
				<div class="blockselectprod">
					<b>Вариант упаковки</b>
					<div class="podipselect">
						<select class="ipselect selectbox" name="box">
							<option value="0" data-compareprice2="0" data-proc="0" data-compare_price="0" data-price="0">не выбрано</option>
							{foreach $product->boxing as $b}
								<option value="{$b->id}" {if $b->compare_price > 0}data-compareprice2="{$b->compare_price}" data-proc="- {floor(abs(100-{$b->price}/($b->compare_price)*100))}%" data-compare_price="{$b->compare_price|string_format:"%.0f"}"{/if} data-price="{$b->price|string_format:"%.0f"}">{$b->name}</option>
							{/foreach}
						</select>
					</div>
				</div>
			{else}
					<input checked name="box" value="0" type="radio" style="display: none;"/>
			{/if}

			<div class="podcenlist prod">
				<div class="cenlist">
					<div class="prc-new"><span><b class="calcitog">{$product->variant->price|string_format:"%.0f"}</b> {$currency->sign|escape}</span></div>
					<div class="prc-old"{if $product->variant->compare_price > 0}{else} style="display: none;"{/if}>{if $product->variant->compare_price > 0}<span><b class="clcomp">{$product->variant->compare_price|string_format:"%.0f"}</b> {$currency->sign|escape}</span>{/if}</div>
				</div>
			</div>
			
			
			{if $properties}
			<div class="blockselectprod">
			<b>Дополнительно</b>
			<ul class="drops nof prodpage">
			{foreach $properties as $val}
				<li class="val{$val->id}">
					<label>
						<input style="vertical-align: middle; margin-right: 4px;" type="checkbox" name="properties[]" value="{$val->id}">
						<span class="itname">{$val->name} (+{$val->price|convert} {$currency->sign|escape})</span>
					</label>
				</li>
			{/foreach}
			</ul>
			</div>
			{/if}
			
			<div class="amountposit">
				<div class="amount scriptblock">
					{include file='calc.tpl'}
				</div>
				<button type="submit" class="but addcart" value="" data-result-text="Хочу еще">Купить</button>
				<a href="#" class="bluron" onclick="$('.oneclick').fadeIn(300); return false;">Купить в 1 клик</a>

			</div>		


			
			{literal}
			<script>		
			$(function() {



				$('select.ajaxselect').change(function(e) {
					e.preventDefault();
					$('select.selectbox option[value="0"]').prop("selected",true);
					$('.prodanno').first().html("<p>" + $('option:selected',this).attr('data-text-var') + "</p>");
					$('div[variants-image="'+ $(this).val() +'"]').click();

					$.ajax({
						dataType: 'json',
						url: "ajax/calc.php",
						data: {productid: {/literal}{$product->id}{literal}},
						success: function(data){
						if(data){
							$('.scriptblock').html(data.scriptblock);
						}
					}
					});

				});

				$('select.selectbox').change(function(e) {
					e.preventDefault();

					$(".addcalc").val(1);

					var price = parseInt($('.ajaxselect option:selected').attr('data-price-int'));
					var compareprice = parseInt($('.ajaxselect option:selected').attr('data-compare_price-int'));

					var str = (price + parseInt($('option:selected',this).attr('data-price')));
					var oldstr = (compareprice + parseInt($('option:selected',this).attr('data-compare_price')));


					$(".calcitog").text(str);
					$(".clcomp").text(oldstr);

					$.ajax({
						dataType: 'json',
						url: "ajax/calc.php",
						data: {productid: {/literal}{$product->id}{literal}},
						success: function(data){
							if(data){
								$('.scriptblock').html(data.scriptblock);
							}
						}
					});

				});

			});
			</script>
			{/literal}
				
		</form>
				
{*<!--Модалка-->*}
<div id="qw-form-1" class="hidden">
	<div class="bigqwtext">{$product->name|escape}</div>
	
	{if $product->annotation}
	<div class="prodanno">
	{$product->annotation}
	</div>
	{/if}
	
	<div class="allbumshare mar-b-30 pad-t-15">
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,telegram"></div>
	</div>

	{if $product->body}
	<div class="prodanno">
	{$product->body}
	</div>
	{/if}
		
</div>
				
				
				
				
		{if $product->body}
		<div class="prodanno">
		{$product->body}
		</div>
		{/if}
		
		<div class="bpinfo">
			<a href="/usloviya-dostavki">Условия доставки и самовывоза</a>
			<p>Курьером на дом или в офис — 300 ₽</p>
		</div>
		
		<div class="bpinfo">
			<a href="/kak-oplatit-zakaz">Способы оплаты</a>
         <!--
			<div class="payprod">
				<img src="design/{$settings->theme}/images/money1.png" alt="" />
				<img src="design/{$settings->theme}/images/money2.png" alt="" />
				<img src="design/{$settings->theme}/images/money3.png" alt="" />
				<img src="design/{$settings->theme}/images/money4.png" alt="" />
				<img src="design/{$settings->theme}/images/money5.png" alt="" />
			</div>
		-->
			<p>Или наличными курьеру</p>
		</div>
		<!--
		<div class="bpinfo">
			<a href="/vozvrat">Условия возврата товара</a>
		</div>
		-->		
	</div>
	
</div>


<div class="alllink photoalllink mar-b-50 pad-t-30">
	<a href="#" class="bluron" onclick="$('.addrevproduct').fadeIn(300); return false;"><b>Отзывы</b><span>{$comments|count}</span><b>Добавить свой</b></a>
</div>


{literal}
<script>
$(document).ready(function() {
	fileInput();
	$('.zcomments').masonry({
	  itemSelector: '.cgrid'
	});
});

</script>
{/literal}

{if $comments}
<div id="zcomments">
	<div class="zcomments">
		{foreach $comments as $comment}
		<div class="cgrid">
			<div>
				<div class="retable">
					{if $comment->image}
					<div class="rtd rtdimg">
						<a href="{$comment->image|resizepost:1920:0}" data-fancybox="gallery{$comment->id}"><img src="{$comment->image|resizepost:100:100}" alt="" /></a>
					</div>
					{/if}
					<div class="rtd rtdcom">
						<b>{$comment->name|escape}</b>
						<div class="comrate">
							<div class="rating" {if $comment->rate==1}data-tip="Ужасно!"{elseif $comment->rate==2}data-tip="Плохо"{elseif $comment->rate==3}data-tip="Нормально"{elseif $comment->rate==4}data-tip="Хорошо"{elseif $comment->rate==5}data-tip="Отлично!"{else}data-tip="Рейтин не установлен"{/if}>
								<div class="rat"{if $comment->rate==1}style="width: 20%;"{elseif $comment->rate==2}style="width: 40%;"{elseif $comment->rate==3}style="width: 60%;"{elseif $comment->rate==4}style="width: 80%;"{elseif $comment->rate==5}style="width: 100%;"{/if}></div>
							</div>
						</div>
						<p>{$comment->date|date}</p>
						{$comment->text|escape|nl2br}
						{if $comment->otvet|escape|nl2br}
						<div class="readmins">
						<b>Ответ администратора</b>
						{$comment->otvet|escape|nl2br}
						</div>
						{/if}
					</div>
				</div>
				
			</div>
		</div>
		{/foreach}
	</div>
</div>
{/if}


{if $related_products}
<h2 class="pad-t-50 mar-b-30">Рекомендуем к просмотру</h2>
<ul class="catprods">
{foreach $related_products as $product}
{include file='product_iteam.tpl'}
{/foreach}
</ul>
{/if}
