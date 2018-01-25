{* Страница с формой обратной связи *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>{$page->header|escape}</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead" data-page="{$page->id}">{$page->header|escape}</h1>

{$page->body}