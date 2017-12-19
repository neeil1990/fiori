{if $module=='ProductsView' || $module=='ProductView'}
{*<!--меню-->*}
<ul class="sid_left_menu">
    {if $category->subcategories}
        {$cats=$category->subcategories}
    {elseif $category->parent_id==0}
        {$cats=$categories}
    {else}
        {$cats=$category->path[($category->path)|count-2]->subcategories}
    {/if}
    {foreach $cats as $c}
	{if $c->visible}
		<li {if $category->id == $c->id}class="active"{/if}>
			<a href="catalog/{$c->url}">{$c->name|escape}</a>
		</li>
	{/if}
	{/foreach}
</ul>
{*<!--END меню-->*}
{else}
{*<!--меню-->*}
{get_dmenus var=dmenu4 group_id=4}
{function name=dmenu_tree4}
{if $dmenu4}
<ul class="sid_left_menu">
{foreach $dmenu4 as $dm}
	{if $dm->visible}
		<li {if $dm->url == $smarty.server.REQUEST_URI}class="active"{/if}>
			<a href="{$dm->url}">
				{if $dm->submenus}
				<span>{$dm->name|escape}</span>
				{else}
				{$dm->name|escape}
				{/if}
			</a>
		</li>
	{/if}
{/foreach}
</ul>
{/if}
{/function}
{dmenu_tree4 dmenu4=$dmenu4}
{*<!--END меню-->*}
{/if}

{*<!--Контактный блок-->*}
<div class="slozhost">
	<div>
		<img src="/design/{$settings->theme}/images/operator.jpg" alt="Техническая поддержка" />
		<span>Сложности с выбором?<br/>Мы поможем!</span>
		<b>{$settings->zphone1}</b>
		<a class="slz1 bluron" href="#" onclick="$('.cback').fadeIn(300); return false;">Заказать звонок</a>
		<a class="slz2" href="#">Онлайн помощь</a>
		<a class="slz3 bluron" href="#" onclick="$('.vopros').fadeIn(300); return false;">Написать письмо</a>
	</div>
</div>
{*<!--END Контактный блок-->*}
{*<!--Баннеры в блоке-->*}
<div class="leftbanner">
	{get_banners var=banners name='leftbanner'}
		{foreach from=$banners item=banner}
		<div>
		{if $banner->url}<a href="{$banner->url}">{/if}
			<img src="{$banner->image|resize:240:0}" alt="{$banner->name|escape}" />
		{if $banner->url}</a>{/if}
		</div>
		{/foreach}
	{if $banners}
	
	{/if}
</div>
{*<!--END Баннеры в блоке-->*}

{if $module==BlogView}{else}
{*<!--Последние новости-->*}
{get_posts var=last_posts limit=2}
{if $last_posts}
<div class="sidblock">
	<h3>Наши новости</h3>
	{foreach $last_posts as $post}
	<div class="biteam">
		<b>{$post->date|date}</b>
		<a href="news/{$post->url}">{$post->name|escape}</a>
		<span>{$post->annotation}</span>
	</div>
	{/foreach}
	<div class="alllink"><a href="/news">Все новости</a></div>
</div>
{/if}
{*<!--END Последние новости-->*}
{/if}