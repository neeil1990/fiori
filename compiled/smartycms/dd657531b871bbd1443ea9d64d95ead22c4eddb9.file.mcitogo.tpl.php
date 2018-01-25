<?php /* Smarty version Smarty-3.1.18, created on 2017-12-13 18:49:23
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/mcitogo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13727381305a314c03881869-77282563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd657531b871bbd1443ea9d64d95ead22c4eddb9' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/mcitogo.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13727381305a314c03881869-77282563',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a314c03890dc4_45450537',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a314c03890dc4_45450537')) {function content_5a314c03890dc4_45450537($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>
<span class="mcit">
	Итого <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

</span>
<div class="butki">
	<a class="knop" href="#" onclick="$('.minicart').fadeOut(300); return false;">&laquo; Продолжить покупки</a>
	<a class="knop next" href="/cart/">Оформить заказ &raquo;</a>
</div>
<?php } else { ?>
<script>
$('.minicart').fadeOut(300);
$('.cionecitwo').html('Корзина пуста');
$('.opencartmodal').fadeOut(300);
</script>
<?php }?><?php }} ?>
