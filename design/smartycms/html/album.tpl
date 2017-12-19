{$canonical="/photo/{$album->url}" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><a href="/photo">Фотогаллерея</a></li>
	<li><span>{$album->name|escape}</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">{$album->name|escape}</h1>

<p>{$album->text}</p>

<div class="allbumshare mar-b-50 pad-t-30">
	<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
	<script src="//yastatic.net/share2/share.js"></script>
	<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,telegram"></div>
</div>

<div class="albumphoto">
{foreach $album->images as $i=>$image}
	<div class="grid3">
		<div>
			<a class="mainphotoiteam" href="{$image->filename|resizealbum:1920:0}" data-fancybox="example-set-{$album->id}">
				<span>
				<img src="{$image->filename|resizealbum:300:0}" alt="{$album->name|escape}" />
				</span>
			</a>
		</div>
	</div>
{/foreach}
</div>

{*<!--скрипт адаптивной плитки-->*}
{literal}
<script>
$(window).load(function() {
	$('.albumphoto').masonry({
	  itemSelector: '.grid3'
	});
});
</script>
{/literal}
{*<!--END скрипт адаптивной плитки-->*}



<div class="alllink photoalllink mar-b-50 pad-t-30">
	<a href="#" class="bluron" onclick="$('.addrevproduct').fadeIn(300); return false;"><b>Отзывы</b><span>{$comments|count}</span><b>Добавить свой</b></a>
</div>

{if $error}
<div class="rev_error">
	{if $error=='empty_name'}
	Введите имя
	{elseif $error=='empty_comment'}
	Введите комментарий
	{/if}
</div>
{/if}



{literal}
<script>
$(document).ready(function() {
	$('.zcomments').masonry({
	  itemSelector: '.cgrid'
	});
});

</script>
{/literal}



<div id="zcomments">
	{if $comments}
	<div class="zcomments">
		{foreach $comments as $comment}
		<div class="cgrid">
			<div>
				<div class="retable">
					{if $comment->image}
					<div class="rtd rtdimg">
						<a href="{$comment->image|resizepost:1920:0}" data-fancybox="example-set"><img src="{$comment->image|resizepost:100:100}" alt="" /></a>
					</div>
					{/if}
					<div class="rtd rtdcom">
						<b>{$comment->name|escape}</b>
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
	{else}
	<div style="padding: 15px;">Пока нет отзывов...</div>
	{/if}
</div>