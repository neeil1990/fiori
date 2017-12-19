<div id="main_list" class="categories">

	<form id="list_form" method="post" class="ajax-content">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
		<input type="text" name="group_name" value="{$menu_group->name}" style="width:200px;margin-right:20px;">
		<br>
		<br>
		{function name=categories_tree level=0}
			{if $categories}
			<div id="list" class="sortable">
			
				{foreach $categories as $category}
				<div class="{if !$category->visible}invisible{/if} row">		
					<div class="tree_row">
						<input type="hidden" name="positions[{$category->id}]" value="{$category->position}">
						<div class="move cell" style="margin-left:{$level*20}px"><div class="move_zone"></div></div>
						<div class="checkbox cell">
							<input type="checkbox" name="check[]" value="{$category->id}" />				
						</div>
						<div class="cell">
							<a href="{url module=DmenusAdmin id=$category->id}">{$category->name|escape}</a> 	 			
						</div>
						<div class="icons cell">
							<a class="preview" title="Предпросмотр в новом окне" href="../catalog/{$category->url}" target="_blank"></a>				
							<a class="enable" title="Активна" href="#"></a>
							<a class="delete" title="Удалить" href="#"></a>
						</div>
						<div class="clear"></div>
					</div>
					{categories_tree categories=$category->submenus level=$level+1}
				</div>
				{/foreach}
		
			</div>
			{/if}
		{/function}
		{categories_tree categories=$categories}
		
		<div id="action">
		<label id="check_all" class="dash_link">Выбрать все</label>
		
		<span id="select">
		<select name="action">
			<option value="enable">Сделать видимыми</option>
			<option value="disable">Сделать невидимыми</option>
			<option value="delete">Удалить</option>
		</select>
		</span>
		
		<input id="apply_action" class="button_green" type="submit" value="Применить">
		
		</div>
	
	</form>
</div>