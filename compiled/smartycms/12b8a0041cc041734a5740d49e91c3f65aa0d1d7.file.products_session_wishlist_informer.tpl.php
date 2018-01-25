<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:01:51
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/products_session_wishlist_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8880220555a2d768f100740-11088362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '8880220555a2d768f100740-11088362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'session' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d768f10ab78_49906855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d768f10ab78_49906855')) {function content_5a2d768f10ab78_49906855($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['session']->value->count>0) {?>
	<a href="/wishlist">
		<b>Избранное</b> <span><?php echo $_smarty_tpl->tpl_vars['session']->value->count;?>
</span>
	</a>
<?php } else { ?>
	<span>
		<b>Избранное</b> <span>0</span>
	</span>
<?php }?><?php }} ?>
