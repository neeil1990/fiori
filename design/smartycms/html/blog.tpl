{$canonical="/news" scope=parent}
{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>{$page->header|escape}</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">{$page->header|escape}</h1>

<div class="newspage">
	{foreach $posts as $post}
	<div class="iteamnews">
		<div>
			{if $post->image}
			<div class="ibimg">
				<a class="lpimg" href="news/{$post->url}"><img src="{$post->image|resizeblog:100:100}" alt="{$post->name|escape}" /></a>
			</div>
			{/if}
			<div class="ibtext">
				<h2><a data-post="{$post->id}" href="news/{$post->url}">{$post->name|escape}</a></h2>
				<p>{$post->date|date}</p>
				<div>{$post->annotation}</div>
			</div>
		</div>
	</div>
	{/foreach}
</div>

{include file='pagination.tpl'}
          