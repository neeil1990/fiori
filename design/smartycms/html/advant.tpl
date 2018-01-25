{get_banners var=banners name='advant'}
{if $banners}
<div class="max">
	<div class="advant">
		{foreach from=$banners item=banner}
		<div>
			<div class="advantiteam">
			{if $banner->url}<a href="{$banner->url|escape}">{else}<div>{/if}
				<img src="{$banner->image|resize:75:75}" alt="{$banner->name}" />
				<b><span>{$banner->name}</span></b>
				<span>{$banner->opis|escape}</span>
			{if $banner->url}</a>{else}</div>{/if}
			</div>
		</div>
		{/foreach}
	</div>
</div>
{/if}