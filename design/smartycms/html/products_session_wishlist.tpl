{if $smarty.get.remove}
    {remove_product_session key=wishlist remove=$smarty.get.remove}
{/if}
{if $smarty.get.id}
    {add_product_session key=wishlist id=$smarty.get.id}
{/if}

{get_products var=products get_session_products=wishlist}
<ul class="catprods">
{foreach $products as $product}
{include file='product_iteam.tpl'}
{/foreach}
</ul>



