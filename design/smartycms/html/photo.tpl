{$canonical="/photo" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>{$page->header|escape}</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">{$page->header|escape}</h1>

<!-- Статьи /-->
<ul class="photo">
	{foreach $albums as $album}
	<li>
		<div class="maintitle"><span><a data-album="{$album->id}" href="photo/{$album->url}"><h3>{$album->name|escape}</h3></a></span></div>
		<p>{$album->annotation}</p>
		<div class="photoblock">
		{foreach $album->images as $i=>$image}
		{if $image@iteration < 6}
			<div class="grid">
				<div>
					<a class="mainphotoiteam" href="{$image->filename|resizealbum:1920:0}" data-fancybox="example-set-{$album->id}">
						<span>
						<img src="{$image->filename|resizealbum:110:110}" alt="{$album->name|escape}" />
						</span>
					</a>
				</div>
			</div>
		{/if}
		{/foreach}
		</div>
		
		<div class="alllink photoalllink mar-b-50 pad-t-30">
			<a href="photo/{$album->url}"><b>Смотреть все</b><span>{$album->images|count}</span><b>фото</b></a>
		</div>
		
	</li>
	{/foreach}
</ul>
<!-- Статьи #End /-->    

{include file='pagination.tpl'}
