<?php /* Smarty version Smarty-3.1.18, created on 2017-12-13 18:49:23
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/citwo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7172696645a314c0389d9a7-99738684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c5498af56745514bad636215ee2c6339ec453dd' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/citwo.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7172696645a314c0389d9a7-99738684',
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
  'unifunc' => 'content_5a314c038a9887_70227266',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a314c038a9887_70227266')) {function content_5a314c038a9887_70227266($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
<?php }} ?>
