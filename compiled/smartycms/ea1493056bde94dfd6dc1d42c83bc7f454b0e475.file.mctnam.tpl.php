<?php /* Smarty version Smarty-3.1.18, created on 2017-12-13 18:49:23
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/mctnam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15439810545a314c0381a6b5-65560949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea1493056bde94dfd6dc1d42c83bc7f454b0e475' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/mctnam.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15439810545a314c0381a6b5-65560949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a314c03877612_97897479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a314c03877612_97897479')) {function content_5a314c03877612_97897479($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>В корзине <?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->tpl_vars['cart']->value->total_products,'позиция','позиций','позиции');?>
<?php } else { ?>Корзина пуста<?php }?><?php }} ?>
