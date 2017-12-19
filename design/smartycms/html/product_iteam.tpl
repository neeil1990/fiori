<li class="catprod product jsprod">
	<div>
		<div class="iprod">
			<div class="ipimage image">
				<a href="products/{$product->url}"><img src="{$product->image->filename|resize:250:250}" alt="{$product->name|escape}"/></a>
			</div>
			
			<div class="ipname">
				<a href="products/{$product->url}">{$product->name|escape}</a>
			</div>
			
			<form class="variants pis_table" action="/cart">
				{if $product->variants|count > 1}
				<div class="blockselect">
					<div class="podipselect">
						<select class="ipselect ajaxselect" name="variant">
						{foreach $product->variants as $v}
							<option value="{$v->id}" {if $v->compare_price > 0}data-compareprice2="{$v->compare_price}" data-proc="- {floor(abs(100-{$v->price}/($v->compare_price)*100))}%" data-compare_price="<span><b>{$v->compare_price|convert}</b> {$currency->sign|escape}</span>"{/if} data-price="<span><b>{$v->price|convert}</b> {$currency->sign|escape}</span>">{$v->name}</option>
						{/foreach}
						</select>
					</div>
				</div>
				{else}
				{foreach $product->variants as $v}
				<input checked name="variant" value="{$v->id}" type="radio" style="display: none;"/>
				{/foreach}
				{/if}
				
				<div class="podcenlist">
					<div class="cenlist">
						<div class="prc-new"><span><b>{$product->variant->price|convert}</b> {$currency->sign|escape}</span></div>
						<div class="prc-old"{if $product->variant->compare_price > 0}{else} style="display: none;"{/if}>{if $product->variant->compare_price > 0}<span><b>{$product->variant->compare_price|convert}</b> {$currency->sign|escape}</span>{/if}</div>
					</div>
				</div>
				
				<div class="podbtn">
					<button type="submit" class="but addcart" value="" data-result-text="Хочу еще">Купить</button>
				</div>
			</form>
			
			<div class="ipdescr">
				<div>
				{$product->annotation}
				</div>
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
		</div>
	</div>
</li>