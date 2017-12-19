<?php /* Smarty version Smarty-3.1.18, created on 2017-12-11 01:29:44
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9954076435a2db5589301a8-68574948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed3fa35b8a1a1aff088e5fa7a429c0356577b5c6' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/blog.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9954076435a2db5589301a8-68574948',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'page' => 0,
    'posts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2db5589b8ff7_42298114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2db5589b8ff7_42298114')) {function content_5a2db5589b8ff7_42298114($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/news", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
</ul>


<h1 class="phead"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<div class="newspage">
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
	<div class="iteamnews">
		<div>
			<?php if ($_smarty_tpl->tpl_vars['post']->value->image) {?>
			<div class="ibimg">
				<a class="lpimg" href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizeblog'][0][0]->resize_modifier_blog($_smarty_tpl->tpl_vars['post']->value->image,100,100);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" /></a>
			</div>
			<?php }?>
			<div class="ibtext">
				<h2><a data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
" href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></h2>
				<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</p>
				<div><?php echo $_smarty_tpl->tpl_vars['post']->value->annotation;?>
</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          <?php }} ?>
