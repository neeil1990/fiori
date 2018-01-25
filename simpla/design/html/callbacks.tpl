{* Вкладки *}
{capture name=tabs}
		{if in_array('comments', $manager->permissions)}<li><a href="index.php?module=CommentsAdmin">Комментарии</a></li>{/if}
		{if in_array('feedbacks', $manager->permissions)}<li><a href="index.php?module=FeedbacksAdmin">Обратная связь</a></li>{/if}
		<li class="active"><a href="index.php?module=CallbacksAdmin">E-mail подписчики</a></li>
{/capture}

{* Title *}
{$meta_title='E-mail подписчики' scope=parent}

{* Заголовок *}
<div id="header">
	{if $callbacks_count}
	<h1>
		{$callbacks_count} {$callbacks_count|plural:'подписчик':'подписчика':'подписчиков'}
	</h1> 
	{else}
	<h1>Нет подписчиков</h1> 
	{/if}
</div>	

<div id="main_list">
	
	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->

	{if $callbacks}
		<span class="button_green" onclick="$('.maillist').slideToggle(300); return false;" style="display: inline-block; margin: 0px 0px 15px 0px; height: 26px; line-height: 28px;">Открыть email адреса списком</span>
		
		<div class="maillist" style="display: none;">
			<div>
				<ol type="1" class="mlist">
				{foreach $callbacks as $callback}
					<li><span>{$callback->email|escape}</span></li>
				{/foreach}
				</ol>
			</div>
		</div>
		<br/>
		<form id="list_form" method="post">
		<input type="hidden" name="session_id" value="{$smarty.session.id}">
		
			<div id="list" style="width:100%;">
				
				{foreach $callbacks as $callback}
				<div class="row">
			 		<div class="checkbox cell">
						<input type="checkbox" name="check[]" value="{$callback->id}" />				
					</div>
					<div class="name cell">
						<div class='comment_text'>
						E-mail: {$callback->email|escape}
						</div>
						<div class='comment_info'>
						Подписался {$callback->date|date} в {$callback->date|time}
						</div>
					</div>
					<div class="icons cell">
						<a href='#' title='Удалить' class="delete"></a>
					</div>
					<div class="clear"></div>
				</div>
				{/foreach}
			</div>
		
			<div id="action">
			<label id='check_all' class='dash_link'>Выбрать все</label>
		
			<span id=select>
			<select name="action">
				<option value="delete">Удалить</option>
			</select>
			</span>
		
			<input id='apply_action' class="button_green" type=submit value="Применить">
		</div>
		</form>
		
	{else}
	Нет сообщений
	{/if}
		
	<!-- Листалка страниц -->
	{include file='pagination.tpl'}	
	<!-- Листалка страниц (The End) -->
			
</div>

<!-- Меню -->
<div id="right_menu">
	
</div>
<!-- Меню  (The End) -->

{literal}
<style>

.maillist {
    display: block;
    position: relative;
    background: #fff;
    border-radius: 5px;
    box-shadow: inset 0px 0px 0px 2px rgba(0, 0, 0, 0.12);
}

.maillist> div {
	display: block;
	padding: 20px;
}

ol.mlist {
    list-style: initial;
    list-style-type: decimal;
    font-size: 13px;
    padding: 0px 0px 0px 15px;
}

ol.mlist> li {
    padding: 3px 0px;
}

ol.mlist> li> span {
    padding: 3px 7px;
    background: #ecf1e3;
    border-radius: 5px;
    font-size: 13px;
    color: #000;
}
</style>
{/literal}

{literal}
<script>
$(function() {

	// Раскраска строк
	function colorize()
	{
		$("#list div.row:even").addClass('even');
		$("#list div.row:odd").removeClass('even');
	}
	// Раскрасить строки сразу
	colorize();
	
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:checked)').length>0);
	});	

	// Удалить 
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest(".row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});
	
	// Подтверждение удаления
	$("form#list_form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});

});

</script>
{/literal}
