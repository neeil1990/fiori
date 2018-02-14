<?php /* Smarty version Smarty-3.1.18, created on 2018-02-14 09:13:09
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/total_mcprice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19534564785a83d375694da1-41947669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b912f669e21b1fc8fe9165649d44b82a6326c1' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/minicart/total_mcprice.tpl',
      1 => 1514467025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19534564785a83d375694da1-41947669',
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
  'unifunc' => 'content_5a83d3756a6b02_13879208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a83d3756a6b02_13879208')) {function content_5a83d3756a6b02_13879208($_smarty_tpl) {?>					<?php if ($_smarty_tpl->tpl_vars['variant']->value->compare_price) {?>
					<span class="cpcar"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['variant']->value->compare_price*$_smarty_tpl->tpl_vars['amount']->value));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
					<br/>
					<?php }?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['variant']->value->price*$_smarty_tpl->tpl_vars['amount']->value));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

<?php }} ?>
