{if $categories}
{$first_category = $category->path|first}
{$last_category = $category->path[($category->path)|count-2]}


{if $level == 0}
<div id="nav">
	<div class="podmobnav">
		<a href="#" class="navtoggle bluron">Каталог товаров</a>
		<div class="nav">
			{foreach item=c from=$categories}
			{if $c->visible}
				<div class="navone {if $category->id == $c->id}selected{/if} {if $first_category->id == $c->id}selected{/if}">
					<a href="catalog/{$c->url}"><span{if $c->subcategories} class="sub"{/if}>{$c->name}</span></a>
					{if $c->subcategories}{include file='categories.tpl' categories=$c->subcategories level=1}{/if}
				</div>
			{/if}
			{/foreach}
		</div>
	</div>
	
	<div class="appendsearch">
	</div>
	<div class="appendcart">
	</div>
</div>
{/if}

{if $level == 1}
<div>
	<div>
		<div class="podnavtwo">
		{foreach item=c from=$categories}
		{if $c->visible}
			<div class="navtwo {if $category->id == $c->id}selected{/if} {if $last_category->id == $c->id}selected{/if}">
             	<a href="catalog/{$c->url}"><span{if $c->subcategories} class="sub"{/if}>{$c->name}</span></a>
				{if $c->subcategories}{include file='categories.tpl' categories=$c->subcategories level=2}{/if}
			</div>
		{/if}
		{/foreach}
		</div>
	</div>
</div>
{/if}

{if $level == 2}
<div>
	<div>
		<div class="podnavtwo">
		{foreach item=c from=$categories}
		{if $c->visible}
			<div class="navtwo {if $category->id == $c->id}selected{/if} {if $last_category->id == $c->id}selected{/if}">
             	<a href="catalog/{$c->url}"><span{if $c->subcategories} class="sub"{/if}>{$c->name}</span></a>
				{if $c->subcategories}{include file='categories.tpl' categories=$c->subcategories level=3}{/if}
			</div>
		{/if}
		{/foreach}
		</div>
	</div>
</div>
{/if}

{if $level == 3}
<div>
	<div>
		<div class="podnavtwo">
		{foreach item=c from=$categories}
		{if $c->visible}
			<div class="navtwo {if $category->id == $c->id}selected{/if} {if $last_category->id == $c->id}selected{/if}">
             	<a href="catalog/{$c->url}"><span{if $c->subcategories} class="sub"{/if}>{$c->name}</span></a>
				{if $c->subcategories}{include file='categories.tpl' categories=$c->subcategories level=4}{/if}
			</div>
		{/if}
		{/foreach}
		</div>
	</div>
</div>
{/if}







{if $level == 5}
<div>
	<div>
		{foreach item=c from=$categories}
		{if $c->visible}
			<div class="navtwo {if $category->id == $c->id}selected{/if} {if $last_category->id == $c->id}selected{/if}">
             	<a href="catalog/{$c->url}"><span{if $c->subcategories} class="sub"{/if}>{$c->name}</span></a>
				{if $c->subcategories}{include file='categories.tpl' categories=$c->subcategories level=1}{/if}
			</div>
		{/if}
		{/foreach}
	</div>
</div>
{/if}













{if $level == 50}
	<div class="navblock">
	{foreach item=c from=$categories}
		{if $c->visible}
			{if $c->subcategories}
			<div class="licat {if $category->id == $c->id}selected{/if} {if $first_category->id == $c->id}selected{/if}">
             	<a href="catalog/{$c->url}" data-category="{$c->id}"><span class="sub">{$c->name}</span></a>
				{include file='categories.tpl' categories=$c->subcategories level=1}
			</div>
			{else}
			<div class="licat {if $category->id == $c->id}selected{/if}">
				{*<!--печать на шарах-->*}
				{if $c->url=='print'}
				<a href="/print"><span>{$c->name}</span></a>
				{else}
				{*<!--end печать на шарах-->*}
				<a href="catalog/{$c->url}" data-category="{$c->id}"><span>{$c->name}</span></a>
				{*<!--печать на шарах-->*}{/if}{*<!--end печать на шарах-->*}
			</div>
			{/if}
		{/if}
	{/foreach}
	</div>
{/if}

{if $level == 51}
	<div class="ulsubpad" id="ff{$c->id}">
            {foreach item=c from=$categories}
                {if $c->subcategories}
                <div class="licat {if $category->id == $c->id}selected{/if} {if $last_category->id == $c->id}selected{/if}">
                 	<a href="catalog/{$c->url}" data-category="{$c->id}" class="nomob asub"><span class="sub">{$c->name}</span></a>
                 	<span class="podcat"></span>
                    {include file='categories.tpl' categories=$c->subcategories level=2}
                </div>
                {else}
                <div class="licat {if $category->id == $c->id}selected{/if}">
                    <a href="catalog/{$c->url}" data-category="{$c->id}" class="asub"><span>{$c->name}</span></a>
                </div>
                {/if}
            {/foreach}
    </div>
{/if}

{if $level == 52}
    <div class="ulsub2pad" id="ff{$c->id}">
            {foreach item=c from=$categories}
                <div class="licat {if $category->id == $c->id}selected{/if} {if $first_category->id == $c->id}selected{/if}">
                	<a href="catalog/{$c->url}" data-category="{$c->id}" class="asub"><span>{$c->name}</span></a>
                </div>
            {/foreach}
    </div>
{/if}

{/if}
