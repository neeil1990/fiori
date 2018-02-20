{* Title *}
{$meta_title='Города' scope=parent}

<div id="header">
    <h1>Города</h1>
    <form method="post">
        Домен города
        <input type="text" name="alias" style="margin:0 20px;">
        Название города
        <input type="text" name="name_city" style="margin:0 20px;">
        <a class="add" href="#" style="display:inline-block;float:none">Добавить</a>
        <div class="clear"></div>
        <input type="hidden" name="session_id" value="{$smarty.session.id}">
    </form>
</div>

{if $citys}
<div id="main_list" class="">

    <form id="list_form" method="post">
        <input type="hidden" name="session_id" value="{$smarty.session.id}">

        <div id="list" class="menu_groups">
            {foreach $citys as $city}
                <div class="{if !$city->visible}invisible{/if} row" data-id="{$city->id}">
                    <div class="checkbox cell">
                        <input type="checkbox" name="check[]" value="{$city->id}" />
                    </div>
                    <div class="cell" id="name_city">
                        {$city->name_city|escape}
                    </div>
                    <div class="icons cell">
                        <a class="accept" title="Отредактировать" href="#"></a>
                        <a class="enable" title="Активна" href="#"></a>
                        <a class="delete"  title="Удалить" href="#"></a>
                    </div>
                    <div class="icons cell" id="alias">
                        {$city->alias}
                    </div>
                    <div class="clear"></div>
                </div>
            {/foreach}
        </div>

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
{else}
    Пусто
{/if}



{literal}
<script>
    $(function() {

        $('.add').click(function (e) {
            e.preventDefault();
            $(this).closest('form').submit();
        });

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
            $(this).closest("div.row").find('input[type="checkbox"][name*="check"]').attr('checked', true);
            $(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
            $(this).closest("form").submit();
        });

        $("form").submit(function() {
            if($('#list input[type="checkbox"][name*="check"]:checked').length>0)
                if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
                    return false;
        });

        $("a.enable").click(function() {
            var icon        = $(this);
            var line        = icon.closest(".row");
            var id          = line.find('input[type="checkbox"][name*="check"]').val();
            var state       = line.hasClass('invisible')?1:0;
            icon.addClass('loading_icon');
            $.ajax({
                type: 'POST',
                url: 'ajax/update_object.php',
                data: {'object': 'city', 'id': id, 'values': {'visible': state}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
                success: function(data){
                    icon.removeClass('loading_icon');
                    if(state)
                        line.removeClass('invisible');
                    else
                        line.addClass('invisible');
                },
                dataType: 'json'
            });
            return false;
        });

        $(".row").dblclick(function() {
            $name_city = $(this).find('#name_city').text();
            $alias = $(this).find('#alias').text();
            $(this).find('#name_city').html('<input type="text" value="'+ $name_city.trim() +'">');
            $(this).find('#alias').html('<input type="text" value="'+ $alias.trim() +'">');
        });

        $(".accept").click(function(){
            $id = $(this).closest('.row').attr("data-id");

            $name_city = $(this).closest('.row').find('#name_city input').val();
            $alias = $(this).closest('.row').find('#alias input').val();

            $.ajax({
                type: 'POST',
                url: 'ajax/update_city.php',
                data: {'id': $id, 'values': {name_city: $name_city,alias:$alias}, 'session_id': '{/literal}{$smarty.session.id}{literal}'},
                success: function(data){
                   console.log(data);
                },
                dataType: 'json'
            });
            $(this).closest('.row').find('#name_city').text($name_city);
            $(this).closest('.row').find('#alias').text($alias);

            return false;
        });


    });




</script>
{/literal}