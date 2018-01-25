{if $session->count>0}
	<a href="/wishlist">
		<b>Избранное</b> <span>{$session->count}</span>
	</a>
{else}
	<span>
		<b>Избранное</b> <span>0</span>
	</span>
{/if}