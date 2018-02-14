<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:09:21
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/advant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7265228875a7d8161f37771-61556752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81bc7c57987f116a8ac458034942144535c98224' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/advant.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7265228875a7d8161f37771-61556752',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banners' => 0,
    'banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d81620267d9_56705153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d81620267d9_56705153')) {function content_5a7d81620267d9_56705153($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_banners'][0][0]->get_banners_plugin(array('var'=>'banners','name'=>'advant'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
<div class="max">
	<div class="advant">
		<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
		<div>
			<div class="advantiteam">
			<?php if ($_smarty_tpl->tpl_vars['banner']->value->url) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->url, ENT_QUOTES, 'UTF-8', true);?>
"><?php } else { ?><div><?php }?>
				<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['banner']->value->image,75,75);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value->name;?>
" />
				<b><span><?php echo $_smarty_tpl->tpl_vars['banner']->value->name;?>
</span></b>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->opis, ENT_QUOTES, 'UTF-8', true);?>
</span>
			<?php if ($_smarty_tpl->tpl_vars['banner']->value->url) {?></a><?php } else { ?></div><?php }?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php }?><?php }} ?>
