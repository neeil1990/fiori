<?php /* Smarty version Smarty-3.1.18, created on 2017-12-13 18:49:23
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/total_mcprice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4045577805a314c038afa01-28345937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b912f669e21b1fc8fe9165649d44b82a6326c1' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/total_mcprice.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4045577805a314c038afa01-28345937',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'variant' => 0,
    'amount' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a314c038c5305_42572560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a314c038c5305_42572560')) {function content_5a314c038c5305_42572560($_smarty_tpl) {?>					<?php if ($_smarty_tpl->tpl_vars['variant']->value->compare_price) {?>
					<span class="cpcar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['variant']->value->compare_price*$_smarty_tpl->tpl_vars['amount']->value));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
					<br/>
					<?php }?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['variant']->value->price*$_smarty_tpl->tpl_vars['amount']->value));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
<?php }} ?>
