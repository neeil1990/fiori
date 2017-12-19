<?php /* Smarty version Smarty-3.1.18, created on 2017-12-11 01:30:11
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18236021255a2db5731fa5d8-18585492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac96efe2fbe017b836e7b3f0e564773aa8868fd2' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/photo.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18236021255a2db5731fa5d8-18585492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'page' => 0,
    'albums' => 0,
    'album' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2db573268534_66404617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2db573268534_66404617')) {function content_5a2db573268534_66404617($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/photo", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>


<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
</ul>


<h1 class="phead"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<!-- Статьи /-->
<ul class="photo">
	<?php  $_smarty_tpl->tpl_vars['album'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['album']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['albums']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['album']->key => $_smarty_tpl->tpl_vars['album']->value) {
$_smarty_tpl->tpl_vars['album']->_loop = true;
?>
	<li>
		<div class="maintitle"><span><a data-album="<?php echo $_smarty_tpl->tpl_vars['album']->value->id;?>
" href="photo/<?php echo $_smarty_tpl->tpl_vars['album']->value->url;?>
"><h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h3></a></span></div>
		<p><?php echo $_smarty_tpl->tpl_vars['album']->value->annotation;?>
</p>
		<div class="photoblock">
		<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['album']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
 $_smarty_tpl->tpl_vars['image']->iteration++;
?>
		<?php if ($_smarty_tpl->tpl_vars['image']->iteration<6) {?>
			<div class="grid">
				<div>
					<a class="mainphotoiteam" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizealbum'][0][0]->resize_modifier_album($_smarty_tpl->tpl_vars['image']->value->filename,1920,0);?>
" data-fancybox="example-set-<?php echo $_smarty_tpl->tpl_vars['album']->value->id;?>
">
						<span>
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizealbum'][0][0]->resize_modifier_album($_smarty_tpl->tpl_vars['image']->value->filename,110,110);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
						</span>
					</a>
				</div>
			</div>
		<?php }?>
		<?php } ?>
		</div>
		
		<div class="alllink photoalllink mar-b-50 pad-t-30">
			<a href="photo/<?php echo $_smarty_tpl->tpl_vars['album']->value->url;?>
"><b>Смотреть все</b><span><?php echo count($_smarty_tpl->tpl_vars['album']->value->images);?>
</span><b>фото</b></a>
		</div>
		
	</li>
	<?php } ?>
</ul>
<!-- Статьи #End /-->    

<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
