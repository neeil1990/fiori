{$wrapper = 'index.tpl' scope=parent}
{$canonical="" scope=parent}
{get_session_products key=wishlist}

{*<!--Слайдер-->*}{include file='slider.tpl'}
{*<!--Преимущества-->*}<div class="mainpage">{include file='advant.tpl'}</div>

{* <!--Новинки--> *}
{get_products var=new_products limit=18}
{if $new_products}
<div class="maintitle mar-b-50"><span>Новинки</span></div>
<div class="max">
	<div class="prodblock slick15{if $new_products|count > 6} bolee{/if}">
		<div class="prodblockslick">
		{foreach $new_products as $product}
			{if $product@index%2==0}<div>{/if}
			{include file='product_iteam_slick.tpl'}
			{if $product@iteration%2==0 || $product@last }</div>{/if}
		{/foreach}
		</div>
	</div>
	<div class="alllink pad-t-30"><a href="/products">Каталог товаров</a></div>
</div>
{/if}

{* <!--Рекомендуемые--> *}
{get_products var=all_products featured=1 limit=18}
{if $all_products}
<div class="mainfeatured pad-t-50 pad-b-50 mar-t-70 mar-b-50">
	<div class="maintitle2 mar-b-50"><b></b><span>Мы рекомендуем</span><b></b></div>
	<div class="max">
		<div class="prodblock slick15{if $all_products|count > 6} bolee{/if}">
			<div class="prodblockslick">
			{foreach $all_products as $product}
				{if $product@index%2==0}<div>{/if}
				{include file='product_iteam_slick.tpl'}
				{if $product@iteration%2==0 || $product@last }</div>{/if}
			{/foreach}
			</div>
		</div>
		<div class="alllink pad-t-50"><a href="/hits">Смотреть все хиты продаж</a></div>
	</div>
</div>
{/if}

{* <!--Распродажа--> *}
{get_products var=discounted_products discounted=1 limit=18}
{if $discounted_products}
<div class="maintitle mar-b-50"><span>Распродажа</span></div>
<div class="max">
	<div class="prodblock slick15{if $discounted_products|count > 6} bolee{/if}">
		<div class="prodblockslick">
		{foreach $discounted_products as $product}
			{if $product@index%2==0}<div>{/if}
			{include file='product_iteam_slick.tpl'}
			{if $product@iteration%2==0 || $product@last }</div>{/if}
		{/foreach}
		</div>
	</div>
	<div class="alllink pad-t-30"><a href="/sales">Смотреть все товары по акции</a></div>
</div>
{/if}

{* <!--Отзывы--> *}
{get_comments var=last_comments_shop limit=7 type='feedback'}
{if $last_comments_shop}
<div class="maintitle mar-b-50 mar-t-70"><span>Отзывы о нашем магазине</span></div>
<div class="max">
	<div class="lastcom slick15{if $last_comments_shop|count > 3} bolee{/if}">
		{foreach $last_comments_shop as $comment}
		<div>
			<div class="comitem">
				<div class="comtext">
					<img src="../design/{$settings->theme}/images/quote.png" alt="цитата" />
					{$comment->text}
				</div>
			</div>
			<div class="cominfo">
				<span>
					<a href="/reviews#comment_{$comment->id}">{$comment->name}</a>
					<span>{$comment->date|date}</span>
				</span>
				<div>
					<div class="rating" {if $comment->rate==1}data-tip="Ужасно!"{elseif $comment->rate==2}data-tip="Плохо"{elseif $comment->rate==3}data-tip="Нормально"{elseif $comment->rate==4}data-tip="Хорошо"{elseif $comment->rate==5}data-tip="Отлично!"{else}data-tip="Рейтин не установлен"{/if}>
						<div class="rat" {if $comment->rate==1}style="width: 20%;"{elseif $comment->rate==2}style="width: 40%;"{elseif $comment->rate==3}style="width: 60%;"{elseif $comment->rate==4}style="width: 80%;"{elseif $comment->rate==5}style="width: 100%;"{/if}></div>
					</div>
				</div>
			</div>
		</div>
		{/foreach}
	</div>
	
	<div class="alllink pad-t-30"><a href="/reviews">Смотреть все отзывы</a></div>
</div>
{/if}


<div class="mainfeatured pad-t-50 pad-b-50 mar-t-70 mar-b-50">
	<div class="maintitle2 mar-b-50"><b></b><span>Не нашли подходящий вариант?</span><b></b></div>
	<div class="max">
		<div class="maincalltext">
			<b>Мы сделаем композицию, учитывая ваши пожелания и бюджет!</b>
			<p>Звоните нам и заказывайте по телефону</p>
			<b>{$settings->zphone1}</b>
			<span>или</span>
		</div>
		<div class="alllink pad-t-30 bluron"><a href="#" onclick="$('.cback').fadeIn(300); return false;">Закажите обратный звонок</a></div>
	</div>
</div>


{get_posts var=last_posts limit=5}
{if $last_posts}
<div class="maintitle mar-b-30 mar-t-70"><span>Наши новости</span></div>
<div class="max">
	<div class="lastcom lastcomnews slick15{if $last_comments_shop|count > 3} bolee{/if}">
		{foreach $last_posts as $post}
		<div>
			<div class="iteamlastnews">
				{if $post->image}<a class="lpimg" href="news/{$post->url}"><span><span><img src="{$post->image|resizeblog:100:100}" alt="{$post->name|escape}" /></span></span></a>{/if}
				<a class="lpname" href="news/{$post->url}">{$post->name}</a>
				{$post->annotation}
			</div>
		</div>
		{/foreach}
	</div>
	
	<div class="alllink pad-t-30"><a href="/news">Смотреть все новости</a></div>
</div>
{/if}


<div class="maintitle mar-b-30 mar-t-70"><span>{$page->header}</span></div>
<div class="max">
	<div class="mtable">
		<div class="mleft">
			<img src="design/{$settings->theme}/images/mainimg.jpg" alt="{$page->header}">
		</div>
		
		<div class="mright">
			<div class="mainhidetext">
			{$page->body}
			</div>
		</div>
	</div>
</div>


{get_photos var=last_photos limit=20}
{if $last_photos}
<div class="maintitle mar-b-30 mar-t-70"><span>Наш фотоальбом</span></div>

{*<!--скрипт адаптивной плитки-->*}
{literal}
<script>
$(window).load(function() {
	$('.plitfoto').masonry({
	  itemSelector: '.grid2'
	});
});

</script>
{/literal}
{*<!--END скрипт адаптивной плитки-->*}

<div class="max">
	<div id="container" class="plitfoto">
	{foreach $last_photos as $image}
	<div class="grid2">
		<div>
			<a class="mainphotoiteam" href="{$image->filename|resizealbum:1920:0}" data-fancybox="gallery">
				<span>
				<img src="{$image->filename|resizealbum:120:0}" alt="{$album->name|escape}" />
				</span>
			</a>
		</div>
	</div>
	{/foreach}
	</div>
	<div class="alllink pad-t-10"><a href="/photo">Смотреть весь фотоальбом</a></div>
</div>

{/if}