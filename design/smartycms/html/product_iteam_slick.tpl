<div class="product_iteam_slick product jsprod">
	<form class="variants pis_table" action="/cart">
		<div class="pis_info">
			<div class="pisi_table">
				<div>
					<div class="pisit">
						<a href="products/{$product->url}">{$product->name|escape}</a>	
						
						{*<!--Выбор варианта-->*}
						{if $product->variants|count > 1}
						{if $product->variants|count > 2}
						{*<!--Выбор варианта списком-->*}
						<div class="podipselect">
							<select class="ipselect ajaxselect" name="variant">
								{foreach $product->variants as $v}
								<option value="{$v->id}" {if $v->compare_price > 0}data-compareprice2="{$v->compare_price}" data-proc="- {floor(abs(100-{$v->price}/($v->compare_price)*100))}%" data-compare_price="<span><b>{$v->compare_price|convert}</b> {$currency->sign|escape}</span>"{/if} data-price="<span><b>{$v->price|convert}</b> {$currency->sign|escape}</span>">{$v->name}</option>
								{/foreach}
							</select>
						</div>
						{else}
						{*<!--Выбор варианта кнопками-->*}
						<div class="variki">
						{foreach $product->variants as $v}
						<label class="variant">
							<input {if $v@first}class="active"{/if} name="variant" value="{$v->id}" type="radio" data-id="{$v->id}" {if $v->compare_price > 0}data-compareprice2="{$v->compare_price}" data-proc="- {floor(abs(100-{$v->price}/($v->compare_price)*100))}%" data-compare_price="<span><b>{$v->compare_price|convert}</b> {$currency->sign|escape}</span>" {/if} data-price="<span><b>{$v->price|convert}</b> {$currency->sign|escape}</span>" {if $product->variant->id==$v->id}checked{/if} />
							<span>{$v->name}</span>
						</label>
						{/foreach}
						</div>
						{/if}
						{else}
						{foreach $product->variants as $v}
						<input checked name="variant" value="{$v->id}" type="radio" style="display: none;"/>
						{/foreach}
						{/if}
						{*<!--END Выбор варианта-->*}
					</div>
				</div>
				<div>
					<div>
						<div class="cenlist">
							<div class="prc-new"><span><b>{$product->variant->price|convert}</b> {$currency->sign|escape}</span></div>
							<div class="prc-old">{if $product->variant->compare_price > 0}<span><b>{$product->variant->compare_price|convert}</b> {$currency->sign|escape}</span>{/if}</div>
						</div>
						
						<div class="formpanel">
							<div>
								<button type="submit" class="but addcart" value="" data-result-text="Хочу еще">Купить</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<input checked name="box" value="0" type="radio" style="display: none;"/>

		
		<div class="pis_photo">
			{if $product->image}
			<span class="image">
				<a href="products/{$product->url}"><img src="{$product->image->filename|resize:150:150}" alt="{$product->name|escape}"/></a>
			</span>
			{/if}
		</div>
	
		{*<!--фичи-->*}
		<div class="fichi">
			{if $product->featured}<span class="chit">Хит</span>{/if}
			<span class="cproc" {if $product->variant->compare_price > 0}{else}style="display: none"{/if}>- {floor(abs(100-{$product->variant->price}/($product->variant->compare_price)*100))}%</span>
		</div>
		
		{if $page->url == 'wishlist'}
		<span class='mylist_add delete'><a href="/wishlist?remove={$product->id}"></a></span>
		{elseif $wishlist->ids && in_array($product->id, $wishlist->ids)}
		<span class='mylist_add active'><a href="/wishlist"></a></span>
		{else}
		<span class='mylist_add'>
			<a href="/wishlist?id={$product->id}" class='addps' data-id='{$product->id}' data-key='wishlist' data-informer='1' data-result-text='<a href="/wishlist"></a>'></a>
		</span>
		{/if}
	</form>
</div>