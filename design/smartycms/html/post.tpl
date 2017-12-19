{$canonical="/news/{$post->url}" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><a href="/news">Наши новости</a></li>
	<li><span>{$post->name|escape}</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">{$post->name|escape}</h1>

<div class="newstext mar-b-50">
	<a class="npimg" href="{$post->image|resizeblog:1920:0}" data-fancybox="example-set-{$post->id}">
		<img src="{$post->image|resizeblog:150:0}" alt="{$post->name|escape}" />
	</a>
	{$post->text}
</div>


{get_posts var=last_posts limit=4}
{if $last_posts}
<h2 class="mar-b-30">Рекомендуем к просмотру</h2>
<ul class="relatednews">
	{foreach $last_posts as $relatedpost}
	{if $relatedpost->id != $post->id}
	<li>
		<b>{$relatedpost->name|escape}</b>
		<span>{$relatedpost->annotation}</span>
		<a href="news/{$relatedpost->url}" data-tip="Читать полностью &raquo;" class="more_icon"><i></i><i></i><i></i></a>
	</li>
	{/if}
	{/foreach}
</ul>
{/if}