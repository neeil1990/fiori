<!-- Основная форма -->
<form method=post action="{$smarty.server.REQUEST_URI}" id="additeam" class="ajax-comment-form" enctype="multipart/form-data">
{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span>{if $message_success=='added'}Пункт меню добавлен{elseif $message_success=='updated'}Пункт меню обновлен{else}{$message_success}{/if}</span>
</div>
<!-- Системное сообщение (The End)-->
{/if}

	<input type=hidden name="session_id" value="{$smarty.session.id}">
	<input type=hidden name="group_id" value="{$menu_group->id}">
	<div id="name">
		Название<input class="name" name=name type="text" value="{$dmenu->name|escape}"/> 
		URL<input class="name" name=url type="text" value="{$dmenu->url|escape}"/> 
		<input name=id type="hidden" value="{$dmenu->id|escape}"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" {if $dmenu->visible}checked{/if}/> <label for="active_checkbox">Активна</label>
		</div>
	</div> 

	<div id="product_categories">
		<select name="parent_id">
			<option value='0'>Корневой пункт меню</option>
			{function name=dmenu_select level=0}
				{foreach from=$cats item=cat}
					{if $dmenu->id != $cat->id}
						<option value='{$cat->id}' {if $dmenu->parent_id == $cat->id}selected{/if}>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$cat->name}</option>
						{dmenu_select cats=$cat->submenus level=$level+1}
					{/if}
				{/foreach}
			{/function}
			{dmenu_select cats=$dmenus}
		</select>
	</div>
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->