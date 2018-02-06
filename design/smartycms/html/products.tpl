{* Список товаров *}

{* Канонический адрес страницы *}
{if $category && $brand}
{$canonical="/catalog/{$category->url}/{$brand->url}" scope=parent}
{elseif $category && $whom}
{$canonical="/catalog/{$category->url}/whom/{$whom->url}" scope=parent}
{elseif $category && $event}
{$canonical="/catalog/{$category->url}/event/{$event->url}" scope=parent}
{elseif $category}
{$canonical="/catalog/{$category->url}" scope=parent}
{elseif $brand}
{$canonical="/brands/{$brand->url}" scope=parent}
{elseif $whom}
{$canonical="/whoms/{$whom->url}" scope=parent}
{elseif $event}
{$canonical="/events/{$event->url}" scope=parent}
{elseif $keyword}
{$canonical="/products?keyword={$keyword|escape}" scope=parent}
{else}
{$canonical="/products" scope=parent}
{/if}
{get_session_products key=wishlist}

<!-- Хлебные крошки /-->
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><a href="/products">Каталог товаров</a></li>
	{if $category}
	{foreach $category->path as $cat}
		{* <!--if $cat@last || !$brand
		<li><span>{$cat->name|escape}</span></li>
		{* <!--else--> *}
		<li><a href="catalog/{$cat->url}">{$cat->name|escape}</a></li>
		{* <!--/if--> *}
	{/foreach}
	{if $brand}
	<li><a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a></li>
	{/if}
	{if $whom}
	<li><a href="catalog/{$cat->url}/whom/{$whom->url}">{$whom->name|escape}</a></li>
	{/if}
	{if $event}
	<li><a href="catalog/{$cat->url}/event/{$event->url}">{$event->name|escape}</a></li>
	{/if}
	{elseif $brand}
	<li><a href="brands/{$brand->url}">{$brand->name|escape}</a></li>
	{elseif $whom}
	<li><a href="whoms/{$whom->url}">{$whom->name|escape}</a></li>
	{elseif $event}
	<li><a href="events/{$event->url}">{$event->name|escape}</a></li>
	{elseif $keyword}
	<li><span>Поиск</span></li>
	{/if}
</ul>
<!-- Хлебные крошки #End /-->

{* Заголовок страницы *}
<div class="pspage">
	{if $keyword}
	<h1 class="phead">Поиск {$keyword|escape}</h1>
	{elseif $page}
	<h1 class="phead">{$page->name|escape}</h1>
	{else}
	<h1 class="phead">{$category->name|escape} {$brand->name|escape} {$whom->name|escape} {$event->name|escape}</h1>
	{/if}
	
	{if $products}
	<div class="fil">
		<ul class="samopal">
			<li>
				<span>
					{*
					{elseif $sort=='position'}
						<b>По умолчанию</b>
					*}
					{if $sort=='price_asc'}
						<b>Сначала дешевые</b>
					{elseif $sort=='price_desc'}
						<b>Сначала дорогие</b>
					{elseif $sort=='name_asc'}
						<b>Имени от А до Я</b>
					{elseif $sort=='name_desc'}
						<b>Имени от Я до А</b>
					{/if}
				</span>
				<ul class="drops">
					{*<li><a {if $sort=='position'}class="selected"{/if} href="{url sort=position page=null}">По умолчанию</a></li>*}
					<li><a {if $sort=='price_asc'}class="selected"{/if} href="{url sort=price_asc page=null}">Сначала дешевые</a></li>
					<li><a {if $sort=='price_desc'}class="selected"{/if} href="{url sort=price_desc page=null}">Сначала дорогие</a></li>
					<li><a {if $sort=='name_asc'}class="selected"{/if} href="{url sort=name_asc page=null}">По имени от А до Я</a></li>
					<li><a {if $sort=='name_desc'}class="selected"{/if} href="{url sort=name_desc page=null}">По имени от Я до А</a></li>
				</ul>
			</li>
		</ul>
	</div>
	{/if}
</div>

{if $products}

{if $category}
{if $category->brands || $category->whoms || $category->events || $features}
<div id="filter">
	{include file='filter.tpl'}
</div>
{/if} 
{else}
{if $brands || $whoms || $events || $features}
<div id="filter">
	{include file='filter.tpl'}
</div>
{/if} 
{/if}

<ul class="catprods">
{foreach $products as $product}
{include file='product_iteam.tpl'}
{/foreach}
</ul>

{include file='pagination.tpl'}	
{else}
Товары не найдены
{/if}



{if $current_page_num==1}
{if $page->body}
<div class="prodopis">
<div class="maxtext">
{$page->body}
</div>
</div>
{/if}
{/if}

{if $current_page_num==1}
{if $category->description}
<div class="prodopis">
<div class="maxtext">
{$category->description}
</div>
</div>
{/if}
{/if}

{if $current_page_num==1}
{if $brand->description}
<div class="prodopis">
<div class="maxtext">
{$brand->description}
</div>
</div>
{/if}
{/if}

{if $current_page_num==1}
{if $whom->description}
<div class="prodopis">
<div class="maxtext">
{$whom->description}
</div>
</div>
{/if}
{/if}

{if $current_page_num==1}
{if $event->description}
<div class="prodopis">
<div class="maxtext">
{$event->description}
</div>
</div>
{/if}
{/if}