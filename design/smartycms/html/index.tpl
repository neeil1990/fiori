<!DOCTYPE html>
<html lang="ru">
<head>


	<meta name="yandex-verification" content="30abf236af9472eb" />
 	<meta name="google-site-verification" content="wc2fSX7wTIMSbdI7NSDVY2Q0Pjcw-Ou0OO4WuVYi5UY" />
	<base href="{$config->root_url}/"/>
	<title>{$meta_title|escape}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
 	<!-- 
    <meta name="description" content="{$meta_description|escape}" />
	<meta name="keywords"    content="{$meta_keywords|escape}" /> 
	-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="icon" type="image/x-icon"/>
	{if isset($canonical)}<link rel="canonical" href="{$config->root_url}{$canonical}"/>{/if}
	<link href="design/{$settings->theme|escape}/css/style.css?v={filemtime("design/{$settings->theme|escape}/css/style.css")}" rel="stylesheet" type="text/css" media="screen"/>
	{if $category}{if $category->brands || $category->whoms || $category->events || $features}<link href="design/{$settings->theme|escape}/css/filter.css" rel="stylesheet" type="text/css" media="screen"/>{/if}{else}{if $brands || $whoms || $events || $features}<link href="design/{$settings->theme|escape}/css/filter.css" rel="stylesheet" type="text/css" media="screen"/>{/if}{/if} 
	<link href="design/{$settings->theme|escape}/css/adaptive.css?v={filemtime("design/{$settings->theme|escape}/css/adaptive.css")}" rel="stylesheet" type="text/css" media="screen"/>
	<link href="design/{$settings->theme|escape}/css/pagination.css" rel="stylesheet" type="text/css" media="screen"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"  type="text/javascript"></script>

{literal}
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-62115054-26"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-62115054-26');
</script>
{/literal}
 
</head>
 
<body>

<div class="blurs">	
	<div id="top">
		<div class="top">
			<div class="openmenu">Навигация</div>
			<ul class="nav1">
			{get_dmenus var=dmenu2 group_id=2}
			{function name=dmenu_tree}
				{if $dmenu2}
				{foreach $dmenu2 as $dm}
				
					{if $dm->visible}
						<li {if $dm->url == $smarty.server.REQUEST_URI}class="selected"{/if}>
							<a {if $dm->submenus}class="msub"{/if} href="{$dm->url}"{if $dm->onclick} onclick="{$dm->onclick}"{/if}{if $dm->style} class="{$dm->style}"{/if}>
								{if $dm->submenus}
								<span>{$dm->name|escape}</span>
								{else}
								{$dm->name|escape}
								{/if}
							</a>
							{if $dm->submenus}
							<div>
							<ul>
							{dmenu_tree dmenu2=$dm->submenus}
							</ul>
							</div>
							{/if}
						</li>
					{/if}
				
				{/foreach}
				{/if}
			{/function}
			
			{dmenu_tree dmenu2=$dmenu2}
			</ul>
			
			{get_session_products key=wishlist}
			<div id="wishlist_informer">
				{*<!--Информер избранных товаров-->*}{include file='products_session_wishlist_informer.tpl' session=$wishlist}
			</div>
			
			<span class="userlink bluron" onclick="$('.userprofile').fadeIn(300); return false;">Кабинет</span>
			
		</div>
	</div>


	<div id="header">
		<div class="logo">
			<a href="/"><img src="design/{$settings->theme|escape}/images/logo.jpg" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a>
		</div>
		
		<div class="tpt">

			<div class="topinfo">
				<div class="name-shop">
					<span>Интернет-магазин</span>
					<span>цветов с доставкой</span>
				</div>
				<span class="time"><b>Работаем:</b> с 08:00 до 20:00</span>
			</div>

			{if $city}
			<div class="city" onclick="$('.city-form').fadeIn(300); return false;">
				<div class="c-where">Куда доставить букет:</div>
				<div class="c-now-city">
					<span>{$city->name_city}</span>
				</div>
			</div>
			{/if}

			<div class="phone">
				<span class="pk">Номер телефона приема заказов</span>
				<b class="pk">{$settings->zphone1}</b>
				<span class="callback bluron" onclick="$('.cback').fadeIn(300); return false;">Заказать обратный звонок</span>

				<b class="mob bluron link" onclick="$('.cback').fadeIn(300); return false;">{$settings->zphone1}</b>
				<span class="mob"><b>Работаем:</b> с 08:00 до 20:00</span>
			</div>

		</div>
		
		<div class="butsearch">
			<span class="seron bluron" onclick="$('.serblock').fadeIn(300); return false;"></span>
		</div>
		
		<div class="topcart">
			<div id="cart_informer">
				{*<!--Корзина-->*}{include file='cart_informer.tpl'}
			</div>

		</div>
	</div>

	{*<!--Меню-->*}{include file='categories.tpl' categories=$categories level=0}

	
	{if $module==MainView}
		{$content}
	{elseif $module==PageView || $module==BlogView || $module==ProductsView || $module==RegisterView || $module==UserView || $module==LoginView || $module=='ProductView' || $module==FeedbackView}
		<div class="max pad-t-30 pad-b-50">
			<div class="contable{if $module=='ProductView'} pro{/if}">
				<div class="sidebar">
					<div>
						{*<!--Блок слева-->*}{include file='sidebar.tpl'}
					</div>
				</div>
				<div class="content">
					{$content}
				</div>
			</div>
		</div>
	{elseif $module==PhotoView || $module==CartView || $module==OrderView}
		<div class="max pad-t-30 pad-b-50">
			{$content}
		</div>
	{else}
		{$content}
	{/if}
	
	{*<!--Футер-->*}{include file='footer.tpl'}
	
</div>{*<!--END Blurs-->*}

{if empty($module)}{literal}

<div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},500);};</script>
{/literal}{/if}

{*<!--Все, что модальное-->*}{include file='modal.tpl' categories=$categories level=0}

<script src="design/{$settings->theme}/js/slick.min.js" type="text/javascript"></script>
<script src="design/{$settings->theme}/js/smarty.js"></script>
<script src="design/{$settings->theme}/js/jquery-ui.min.js"></script>
<script src="design/{$settings->theme}/js/ajax_cart.js"></script>
<script src="design/{$settings->theme}/js/product_to_session.js"></script>
<script src="design/{$settings->theme}/js/readmore.js"></script>
<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
<script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
<script src="design/{$settings->theme}/js/jTabs.js"></script>
<script src="design/{$settings->theme}/js/jquery.maskedinput-1.2.2.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,800&subset=cyrillic" rel="stylesheet">
<link href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 
{if $module=='MainView' || $module=='ProductView' || $module=='PhotoView' || $page->url=='reviews' || $module=='BlogView'}
<link href="design/{$settings->theme}/css/jquery.fancybox.min.css" rel="stylesheet">
<script src="design/{$settings->theme}/js/jquery.fancybox.min.js"></script>
{elseif $module=='CartView'}
<script src="design/{$settings->theme}/js/timedropper.min.js"></script>
<script src="design/{$settings->theme}/js/datedropper.min.js"></script>
<link href="design/{$settings->theme}/css/timedropper.min.css" rel="stylesheet" type="text/css" /> 
<link href="design/{$settings->theme}/css/datedropper.min.css" rel="stylesheet" type="text/css" /> 
{/if}
{if $category}
{if $category->brands || $category->whoms || $category->events || $features}
<script src="design/{$settings->theme}/js/jquery-ui-1.9.0.custom.min.js"  type="text/javascript"></script>
<script src="design/{$settings->theme}/js/filter.js"  type="text/javascript"></script>
{/if}
{else}
{if $brands || $whoms || $events || $features}
<script src="design/{$settings->theme}/js/jquery-ui-1.9.0.custom.min.js"  type="text/javascript"></script>
<script src="design/{$settings->theme}/js/filter.js"  type="text/javascript"></script>
{/if}
{/if} 
{if $page->url == 'reviews' || $module=='PhotoView' || $module=='ProductView' || $module=='MainView'}
{if $module !=='MainView'}<script src="design/{$settings->theme}/js/fileinput.js"></script>{/if}
{if $module=='ProductView'}<script src="design/{$settings->theme}/js/product.js"  type="text/javascript"></script>{/if}
<script src="design/{$settings->theme}/js/masonry.pkgd.min.js"></script>
{/if}
<link rel="stylesheet" href="design/{$settings->theme}/css/jquery.mmenu.all.css?v={filemtime("design/{$settings->theme|escape}/css/jquery.mmenu.all.css")}" type="text/css" />
<script src="design/{$settings->theme}/js/jquery.mmenu.all.min.js" type="text/javascript"></script>

 
 <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47411374 = new Ya.Metrika2({
                    id:47411374,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47411374" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

</body>
</html>