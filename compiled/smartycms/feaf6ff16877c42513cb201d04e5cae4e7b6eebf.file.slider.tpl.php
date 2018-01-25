<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:07:08
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20793224965a2d77cced5d98-85764436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'feaf6ff16877c42513cb201d04e5cae4e7b6eebf' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/slider.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20793224965a2d77cced5d98-85764436',
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
  'unifunc' => 'content_5a2d77ccf0b980_30924085',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d77ccf0b980_30924085')) {function content_5a2d77ccf0b980_30924085($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_banners'][0][0]->get_banners_plugin(array('var'=>'banners','name'=>'mainbanner'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
<div class="slider">
	<div class="sliderslick">
		<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
		<div class="sliderrelative">
			
			<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['banner']->value->image,1920,0);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['banner']->value->name;?>
" />
			
			<div class="slidtext">
				<div>
					<div class="slidertext">
						<div class="maxst">
							<?php if ($_smarty_tpl->tpl_vars['banner']->value->name) {?>
								<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h2>
							<?php }?>
									
							
							<?php if ($_smarty_tpl->tpl_vars['banner']->value->name&&$_smarty_tpl->tpl_vars['banner']->value->opis) {?>
							<div class="otstup"></div>
							<?php }?>
							
							
							<?php if ($_smarty_tpl->tpl_vars['banner']->value->opis) {?><div class="slidopis"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->opis, ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
							
							
							<?php if ($_smarty_tpl->tpl_vars['banner']->value->name||$_smarty_tpl->tpl_vars['banner']->value->opis) {?>
							<div class="otstup"></div>
							<?php }?>
							
							
							<?php if ($_smarty_tpl->tpl_vars['banner']->value->url) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->url, ENT_QUOTES, 'UTF-8', true);?>
"><?php if ($_smarty_tpl->tpl_vars['banner']->value->linktext) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->linktext, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>Подробнее<?php }?></a><?php }?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php } ?>
	</div>
</div>
<?php }?><?php }} ?>
