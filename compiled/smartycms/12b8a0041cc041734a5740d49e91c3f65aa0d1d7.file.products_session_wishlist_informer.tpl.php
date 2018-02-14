<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:32
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/products_session_wishlist_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20369989705a7d7f50d0d705-60858352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12b8a0041cc041734a5740d49e91c3f65aa0d1d7' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/products_session_wishlist_informer.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20369989705a7d7f50d0d705-60858352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'session' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f50d15ae4_97506101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f50d15ae4_97506101')) {function content_5a7d7f50d15ae4_97506101($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['session']->value->count>0) {?>
	<a href="/wishlist">
		<b>Избранное</b> <span><?php echo $_smarty_tpl->tpl_vars['session']->value->count;?>
</span>
	</a>
<?php } else { ?>
	<span>
		<b>Избранное</b> <span>0</span>
	</span>
<?php }?><?php }} ?>
