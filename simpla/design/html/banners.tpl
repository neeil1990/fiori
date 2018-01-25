{capture name=tabs}
<li class="active"><a href="index.php?module=BannersAdmin">Категории баннеров</a></li>
{/capture}

{$meta_title = "Баннеры" scope=parent}

{* Заголовок *}
<div id="header">
	<h1>Баннеры</h1>
	<a class="add" href="{url module=BannerAdmin return=$smarty.server.REQUEST_URI}">Добавить категорию</a>
</div>

{if $categories}
<div id="main_list" class="categories">

	<form id="list_form" method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">

		<div id="list" class="brands">
			{foreach $categories as $category}
			<div class="row">
				<div class="cell">
					<a href="{url module=BannerAdmin id=$category->id return=$smarty.server.REQUEST_URI}">{$category->name|escape}</a>
				</div>
				<div class="icons cell">
					<a class="delete"  title="Удалить" href="{url module=BannersAdmin id=$category->id mode=delete return=$smarty.server.REQUEST_URI}"></a>
				</div>
				<div class="clear"></div>
			</div>
			{/foreach}
		</div>
	</form>
</div>
{else}
Нет баннеров
{/if}