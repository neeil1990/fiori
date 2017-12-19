					{if $variant->compare_price}
					<span class="cpcar">{($variant->compare_price*$amount)|convert} {$currency->sign}</span>
					<br/>
					{/if}
					{($variant->price*$amount)|convert} {$currency->sign}