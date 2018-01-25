<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:01:51
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21064834055a2d768f2df628-59361905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af4eeaa34829272755f1dc4e07c3c78f9776c1b1' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/sidebar.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21064834055a2d768f2df628-59361905',
  'function' => 
  array (
    'dmenu_tree4' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'module' => 0,
    'category' => 0,
    'categories' => 0,
    'cats' => 0,
    'c' => 0,
    'dmenu4' => 0,
    'dm' => 0,
    'settings' => 0,
    'banners' => 0,
    'banner' => 0,
    'last_posts' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d768f367c01_38764180',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d768f367c01_38764180')) {function content_5a2d768f367c01_38764180($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['module']->value=='ProductsView'||$_smarty_tpl->tpl_vars['module']->value=='ProductView') {?>

<ul class="sid_left_menu">
    <?php if ($_smarty_tpl->tpl_vars['category']->value->subcategories) {?>
        <?php $_smarty_tpl->tpl_vars['cats'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value->subcategories, null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['category']->value->parent_id==0) {?>
        <?php $_smarty_tpl->tpl_vars['cats'] = new Smarty_variable($_smarty_tpl->tpl_vars['categories']->value, null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['cats'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value->path[count(($_smarty_tpl->tpl_vars['category']->value->path))-2]->subcategories, null, 0);?>
    <?php }?>
    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
		<li <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="active"<?php }?>>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
		</li>
	<?php }?>
	<?php } ?>
</ul>

<?php } else { ?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_dmenus'][0][0]->get_dmenus_plugin(array('var'=>'dmenu4','group_id'=>4),$_smarty_tpl);?>

<?php if (!function_exists('smarty_template_function_dmenu_tree4')) {
    function smarty_template_function_dmenu_tree4($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['dmenu_tree4']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php if ($_smarty_tpl->tpl_vars['dmenu4']->value) {?>
<ul class="sid_left_menu">
<?php  $_smarty_tpl->tpl_vars['dm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dmenu4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dm']->key => $_smarty_tpl->tpl_vars['dm']->value) {
$_smarty_tpl->tpl_vars['dm']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['dm']->value->visible) {?>
		<li <?php if ($_smarty_tpl->tpl_vars['dm']->value->url==$_SERVER['REQUEST_URI']) {?>class="active"<?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['dm']->value->url;?>
">
				<?php if ($_smarty_tpl->tpl_vars['dm']->value->submenus) {?>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dm']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<?php } else { ?>
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dm']->value->name, ENT_QUOTES, 'UTF-8', true);?>

				<?php }?>
			</a>
		</li>
	<?php }?>
<?php } ?>
</ul>
<?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<?php smarty_template_function_dmenu_tree4($_smarty_tpl,array('dmenu4'=>$_smarty_tpl->tpl_vars['dmenu4']->value));?>


<?php }?>


<div class="slozhost">
	<div>
		<img src="/design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/operator.jpg" alt="Техническая поддержка" />
		<span>Сложности с выбором?<br/>Мы поможем!</span>
		<b><?php echo $_smarty_tpl->tpl_vars['settings']->value->zphone1;?>
</b>
		<a class="slz1 bluron" href="#" onclick="$('.cback').fadeIn(300); return false;">Заказать звонок</a>
		<a class="slz2" href="#">Онлайн помощь</a>
		<a class="slz3 bluron" href="#" onclick="$('.vopros').fadeIn(300); return false;">Написать письмо</a>
	</div>
</div>


<div class="leftbanner">
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_banners'][0][0]->get_banners_plugin(array('var'=>'banners','name'=>'leftbanner'),$_smarty_tpl);?>

		<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
		<div>
		<?php if ($_smarty_tpl->tpl_vars['banner']->value->url) {?><a href="<?php echo $_smarty_tpl->tpl_vars['banner']->value->url;?>
"><?php }?>
			<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['banner']->value->image,240,0);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
		<?php if ($_smarty_tpl->tpl_vars['banner']->value->url) {?></a><?php }?>
		</div>
		<?php } ?>
	<?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
	
	<?php }?>
</div>


<?php if ($_smarty_tpl->tpl_vars['module']->value=='BlogView') {?><?php } else { ?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_posts'][0][0]->get_posts_plugin(array('var'=>'last_posts','limit'=>2),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['last_posts']->value) {?>
<div class="sidblock">
	<h3>Наши новости</h3>
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['last_posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
	<div class="biteam">
		<b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</b>
		<a href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
		<span><?php echo $_smarty_tpl->tpl_vars['post']->value->annotation;?>
</span>
	</div>
	<?php } ?>
	<div class="alllink"><a href="/news">Все новости</a></div>
</div>
<?php }?>

<?php }?><?php }} ?>
