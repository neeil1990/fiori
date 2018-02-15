<form class="ufilter" method="get" action="{if $category}{$config->root_url}/catalog/{$category->url}{else}{$config->root_url}/products{/if}">

<div class="glavfilter">
	<div class="iteamfilter">
		<div class="if_name">Цена</div>
		<div class="price_slider">
			<span>
				<input type="text" class="keypress" id="min_price" data-min-price="{$max_min_price->min_price|convert:null:false|floor}" placeholder="{$max_min_price->min_price|convert:null:false|floor}" name="min_price" value="{if $smarty.get.min_price}{$smarty.get.min_price}{else}{/if}" autocomplete="off">
				<i>От</i>
				<em>{$currency->sign|escape}</em>
			</span>
			<span class="ifnlast">
				<input type="text" class="keypress" id="max_price" data-max-price="{$max_min_price->max_price|convert:null:false|ceil}" placeholder="{$max_min_price->max_price|convert:null:false|ceil}" name="max_price" value="{if $smarty.get.max_price}{$smarty.get.max_price}{else}{/if}" autocomplete="off">
				<i>До</i>
				<em>{$currency->sign|escape}</em>
			</span>
			<div class="podslider">
			<div id="slider_price" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content" data-slider-min-range="{$max_min_price->min_price|convert:null:false|floor}" data-slider-max-range="{$max_min_price->max_price|convert:null:false|ceil}">
			
				<div class="ui-slider-range ui-widget-header ui-widget-header-bar"></div>
				<div class="ui-slider-range ui-widget-header ui-widget-header-left ui-widget-header-hidden"></div>
				<div class="ui-slider-range ui-widget-header ui-widget-header-right ui-widget-header-hidden"></div>
                <div class="ui-slider-range ui-widget-header polosa"></div>
                <a class="ui-slider-handle ui-state-default ui-state-left" href="#"></a>
                <a class="ui-slider-handle ui-state-default ui-state-right" href="#"></a>
            </div>
			</div>
		</div>
		
	</div>
	
	{if $category}
	{if $category->brands}
	<div class="iteamfilter">
		<div class="if_name">Цветок</div>
		<ul class="samopal">
			<li>
				<span>
					{if $filter_brand}{foreach $category->brands as $b}{if $b->checked}<b>{$b->name|escape}</b>{/if}{/foreach}{else}<b>Выберите</b>{/if}
				</span>
				<ul class="drops">
				{foreach $category->brands as $b}
                    <li{if $b->disabled} class="disabled"{/if}>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="brand_{$b->id}" class="{if $b->checked}checkeds{elseif $b->disabled}disabled{/if}">
							<input id="brand_{$b->id}" type="checkbox" name="brand_id[]" value="{$b->id}"{if $b->checked} checked{elseif $b->disabled} disabled{/if}>
                            <span class="itname">{$b->name|escape}</span>
                        </label>
                    </li>
				{/foreach}
				</ul>
			</li>
		</ul>
	</div>
	{/if}
	{else}
	{if $brands}
	<div class="iteamfilter">
		<div class="if_name">Цветок</div>
		<ul class="samopal">
			<li>
				<span>
					{if $filter_brand}{foreach $brands as $b}{if $b->checked}<b>{$b->name|escape}</b>{/if}{/foreach}{else}<b>Выберите</b>{/if}
				</span>
				<ul class="drops">
				{foreach $brands as $b}
                    <li{if $b->disabled} class="disabled"{/if}>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="brand_{$b->id}" class="{if $b->checked}checkeds{elseif $b->disabled}disabled{/if}">
							<input id="brand_{$b->id}" type="checkbox" name="brand_id[]" value="{$b->id}"{if $b->checked} checked{elseif $b->disabled} disabled{/if}>
                            <span class="itname">{$b->name|escape}</span>
                        </label>
                    </li>
				{/foreach}
				</ul>
			</li>
		</ul>
	</div>
	{/if}
	{/if}
	
	{if $category}
	{if $category->whoms}
	<div class="iteamfilter">
		<div class="if_name">Кому</div>
		<ul class="samopal">
			<li>
				<span>
					{if $filter_whom}{foreach $category->whoms as $b}{if $b->checked}<b>{$b->name|escape}</b>{/if}{/foreach}{else}<b>Выберите</b>{/if}
				</span>
				<ul class="drops">
				{foreach $category->whoms as $b}
                    <li{if $b->disabled} class="disabled"{/if}>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="whom_{$b->id}" class="{if $b->checked}checkeds{elseif $b->disabled}disabled{/if}">
							<input id="whom_{$b->id}" type="checkbox" name="whom_id[]" value="{$b->id}"{if $b->checked} checked{elseif $b->disabled} disabled{/if}>
                            <span class="itname">{$b->name|escape}</span>
                        </label>
                    </li>
				{/foreach}
				</ul>
			</li>
		</ul>
	</div>
	{/if}
	{else}
	{if $whoms}
	<div class="iteamfilter">
		<div class="if_name">Кому</div>
		<ul class="samopal">
			<li>
				<span>
					{if $filter_whom}{foreach $whoms as $b}{if $b->checked}<b>{$b->name|escape}</b>{/if}{/foreach}{else}<b>Выберите</b>{/if}
				</span>
				<ul class="drops">
				{foreach $whoms as $b}
                    <li{if $b->disabled} class="disabled"{/if}>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="whom_{$b->id}" class="{if $b->checked}checkeds{elseif $b->disabled}disabled{/if}">
							<input id="whom_{$b->id}" type="checkbox" name="whom_id[]" value="{$b->id}"{if $b->checked} checked{elseif $b->disabled} disabled{/if}>
                            <span class="itname">{$b->name|escape}</span>
                        </label>
                    </li>
				{/foreach}
				</ul>
			</li>
		</ul>
	</div>
	{/if}
	{/if}
	
	{if $category}
	{if $category->events}
	<div class="iteamfilter">
		<div class="if_name">Событие</div>
		<ul class="samopal">
			<li>
				<span>
					{if $filter_event}{foreach $category->events as $b}{if $b->checked}<b>{$b->name|escape}</b>{/if}{/foreach}{else}<b>Выберите</b>{/if}
				</span>
				<ul class="drops">
				{foreach $category->events as $b}
                    <li{if $b->disabled} class="disabled"{/if}>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="event_{$b->id}" class="{if $b->checked}checkeds{elseif $b->disabled}disabled{/if}">
							<input id="event_{$b->id}" type="checkbox" name="event_id[]" value="{$b->id}"{if $b->checked} checked{elseif $b->disabled} disabled{/if}>
                            <span class="itname">{$b->name|escape}</span>
                        </label>
                    </li>
				{/foreach}
				</ul>
			</li>
		</ul>
	</div>
	{/if}
	{else}
	{if $events}
	<div class="iteamfilter">
		<div class="if_name">Событие</div>
		<ul class="samopal">
			<li>
				<span>
					{if $filter_event}{foreach $events as $b}{if $b->checked}<b>{$b->name|escape}</b>{/if}{/foreach}{else}<b>Выберите</b>{/if}
				</span>
				<ul class="drops">
				{foreach $events as $b}
                    <li{if $b->disabled} class="disabled"{/if}>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="event_{$b->id}" class="{if $b->checked}checkeds{elseif $b->disabled}disabled{/if}">
							<input id="event_{$b->id}" type="checkbox" name="event_id[]" value="{$b->id}"{if $b->checked} checked{elseif $b->disabled} disabled{/if}>
                            <span class="itname">{$b->name|escape}</span>
                        </label>
                    </li>
				{/foreach}
				</ul>
			</li>
		</ul>
	</div>
	{/if}
	{/if}
	
	<div class="iteamfilter">
		<span class="fullfilterlink fileBtn" onclick="$('.podfilter').slideToggle(300); return false;">Еще</span>
	</div>
	
</div>{*<!--END glavfilter-->*}

<div class="podfilter"{if $filter_features || $filter_featured || $filter_discounted} style="display: block;"{/if}>
	<div>
		
		<div class="siplo">
			<div>
				<ul class="drops">
					<li>
						<label for="discounted"{if $discounted->disabled} class="disabled"{/if}>
							<input id="discounted" type="checkbox" name="discounted" value="1"{if $discounted->checked} checked{elseif $discounted->disabled} disabled{/if}>
							<span class="itname">Акционные</span>
						</label>
					</li>
				</ul>
			</div>
			<div>
				<ul class="drops">
					<li>
						<label for="featured"{if $featured->disabled} class="disabled"{/if}>
							<input id="featured" type="checkbox" name="featured" value="1"{if $featured->checked} checked{elseif $featured->disabled} disabled{/if}>
							<span class="itname">Рекомендуемые</span>
						</label>
					</li>
				</ul>
			</div>
		</div>
		
		{if $features}
		<div class="siplo pad-t-15">
			{foreach $features as $f}
			<div>
				<div class="if_name">{$f->name}</div>
				<ul class="drops">
				{foreach $f->options as $k=>$o}
					<li>
						<label for="option_{$f->id}_{$k}"{if $o->disabled} class="disabled"{/if}>
							<input id="option_{$f->id}_{$k}" type="checkbox" name="{$f->id}[]" value="{$o->value|escape}"{if $o->checked} checked{elseif $o->disabled} disabled{/if}>
							<span class="itname">{$o->value|escape}</span>
						</label>
					</li>
				{/foreach}
				</ul>
			</div>
			{/foreach}
		</div>
		{/if}
		
	</div>
</div>
	
<div class="butfilter pad-t-15">
	<div class="count_filter">Найдено {$products|count}</div>
	<span class="sendsform fileBtn">Подобрать</span>
</div>
	
	
{literal}
<script>
    $(function() {
		$('.sendsform').live('click', function(){ $(this).parents('form').submit(); return false; });
	});
</script>
{/literal}



</form>