<?php /* Smarty version Smarty-3.1.18, created on 2017-12-12 18:05:47
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8196959135a2ff04b7e3aa6-94268129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fb08566f5f5f166f455d1541b16cf91b697585a' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/post.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8196959135a2ff04b7e3aa6-94268129',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post' => 0,
    'settings' => 0,
    'last_posts' => 0,
    'relatedpost' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2ff04b84d012_65791690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2ff04b84d012_65791690')) {function content_5a2ff04b84d012_65791690($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/news/".((string)$_smarty_tpl->tpl_vars['post']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>


<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><a href="/news">Наши новости</a></li>
	<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
</ul>


<h1 class="phead"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<div class="newstext mar-b-50">
	<a class="npimg" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizeblog'][0][0]->resize_modifier_blog($_smarty_tpl->tpl_vars['post']->value->image,1920,0);?>
" data-fancybox="example-set-<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
">
		<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizeblog'][0][0]->resize_modifier_blog($_smarty_tpl->tpl_vars['post']->value->image,150,0);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
	</a>
	<?php echo $_smarty_tpl->tpl_vars['post']->value->text;?>

</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_posts'][0][0]->get_posts_plugin(array('var'=>'last_posts','limit'=>4),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['last_posts']->value) {?>
<h2 class="mar-b-30">Рекомендуем к просмотру</h2>
<ul class="relatednews">
	<?php  $_smarty_tpl->tpl_vars['relatedpost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['relatedpost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['last_posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['relatedpost']->key => $_smarty_tpl->tpl_vars['relatedpost']->value) {
$_smarty_tpl->tpl_vars['relatedpost']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['relatedpost']->value->id!=$_smarty_tpl->tpl_vars['post']->value->id) {?>
	<li>
		<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['relatedpost']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b>
		<span><?php echo $_smarty_tpl->tpl_vars['relatedpost']->value->annotation;?>
</span>
		<a href="news/<?php echo $_smarty_tpl->tpl_vars['relatedpost']->value->url;?>
" data-tip="Читать полностью &raquo;" class="more_icon"><i></i><i></i><i></i></a>
	</li>
	<?php }?>
	<?php } ?>
</ul>
<?php }?><?php }} ?>
