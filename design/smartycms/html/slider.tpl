{get_banners var=banners name='mainbanner'}
{if $banners}
<div class="slider">
	<div class="sliderslick">
		{foreach from=$banners item=banner}
		<div class="sliderrelative">
			
			<img src="{$banner->image|resize:1920:0}" alt="{$banner->name}" />
			
			<div class="slidtext">
				<div>
					<div class="slidertext">
						<div class="maxst">
							{if $banner->name}
								<h2>{$banner->name|escape}</h2>
							{/if}
									
							{* отступ между заголовком и описанием *}
							{if $banner->name && $banner->opis}
							<div class="otstup"></div>
							{/if}
							{* end отступ *}
							
							{if $banner->opis}<div class="slidopis">{$banner->opis|escape}</div>{/if}
							
							{* отступ между заголовком или описанием и ссылкой *}
							{if $banner->name || $banner->opis}
							<div class="otstup"></div>
							{/if}
							{* end отступ *}
							
							{if $banner->url}<a href="{$banner->url|escape}">{if $banner->linktext}{$banner->linktext|escape}{else}Подробнее{/if}</a>{/if}
						</div>
					</div>
				</div>
			</div>
			
		</div>
		{/foreach}
	</div>
</div>
{/if}