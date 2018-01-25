{if $categories}
{$first_category = $category->path|first}
{$last_category = $category->path[($category->path)|count-2]}

{if $level == 0}
<div class="mmnav">
	<ul>
	{foreach item=c from=$categories}
	{if $c->visible}
		<li class="{if $category->id == $c->id}active{/if} {if $first_category->id == $c->id}active{/if}">
			{if $c->subcategories}
			<a class="msub" href="#">{$c->name}</a>
			{else}
			<a href="catalog/{$c->url}">{$c->name}</a>
			{/if}
			{if $c->subcategories}{include file='mmenu.tpl' categories=$c->subcategories level=1}{/if}
		</li>
	{/if}
	{/foreach}
	</ul>
	<div class="mmcenterlink">
		<a href="/products">Весь каталог &raquo;</a>
	</div>
</div>
{/if}




{if $level == 1}
<div class="mmenu{$c->id}">
	<ul>
		<li>
			<a href="catalog/{$c->url}"><b>Все {$c->name}</b></a>
		</li>
	{foreach item=c from=$categories}
	{if $c->visible}
		<li class="{if $category->id == $c->id}active{/if} {if $last_category->id == $c->id}active{/if}">
			{if $c->subcategories}
			<a class="msub" href="#">{$c->name}</a>
			{else}
			<a href="catalog/{$c->url}">{$c->name}</a>
			{/if}
			{if $c->subcategories}{include file='mmenu.tpl' categories=$c->subcategories level=2}{/if}
		</li>
	{/if}
	{/foreach}
	</ul>
</div>
{/if}

{if $level == 2}
<div class="mmenu{$c->id}">
	<ul>
		<li>
			<a href="catalog/{$c->url}"><b>Все {$c->name}</b></a>
		</li>
	{foreach item=c from=$categories}
	{if $c->visible}
		<li class="{if $category->id == $c->id}active{/if} {if $last_category->id == $c->id}active{/if}">
			{if $c->subcategories}
			<a class="msub" href="#">{$c->name}</a>
			{else}
			<a href="catalog/{$c->url}">{$c->name}</a>
			{/if}
			{if $c->subcategories}{include file='mmenu.tpl' categories=$c->subcategories level=3}{/if}
		</li>
	{/if}
	{/foreach}
	</ul>
</div>
{/if}

{if $level == 3}
<div class="mmenu{$c->id}">
	<ul>
		<li>
			<a href="catalog/{$c->url}"><b>Все {$c->name}</b></a>
		</li>
	{foreach item=c from=$categories}
	{if $c->visible}
		<li class="{if $category->id == $c->id}active{/if} {if $last_category->id == $c->id}active{/if}">
			{if $c->subcategories}
			<a class="msub" href="#">{$c->name}</a>
			{else}
			<a href="catalog/{$c->url}">{$c->name}</a>
			{/if}
			{if $c->subcategories}{include file='mmenu.tpl' categories=$c->subcategories level=4}{/if}
		</li>
	{/if}
	{/foreach}
	</ul>
</div>
{/if}

{/if}