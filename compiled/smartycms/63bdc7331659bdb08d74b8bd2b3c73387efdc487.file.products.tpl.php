<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:32
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17456308155a7d7f5087a084-23384962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63bdc7331659bdb08d74b8bd2b3c73387efdc487' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/products.tpl',
      1 => 1517908593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17456308155a7d7f5087a084-23384962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'brand' => 0,
    'whom' => 0,
    'event' => 0,
    'keyword' => 0,
    'settings' => 0,
    'cat' => 0,
    'page' => 0,
    'products' => 0,
    'sort' => 0,
    'features' => 0,
    'brands' => 0,
    'whoms' => 0,
    'events' => 0,
    'current_page_num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f50973d41_18288421',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f50973d41_18288421')) {function content_5a7d7f50973d41_18288421($_smarty_tpl) {?>


<?php if ($_smarty_tpl->tpl_vars['category']->value&&$_smarty_tpl->tpl_vars['brand']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url)."/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['category']->value&&$_smarty_tpl->tpl_vars['whom']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url)."/whom/".((string)$_smarty_tpl->tpl_vars['whom']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['category']->value&&$_smarty_tpl->tpl_vars['event']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url)."/event/".((string)$_smarty_tpl->tpl_vars['event']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['category']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['brand']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/brands/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['whom']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/whoms/".((string)$_smarty_tpl->tpl_vars['whom']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['event']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/events/".((string)$_smarty_tpl->tpl_vars['event']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products?keyword=".$_tmp1, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php }?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_session_products'][0][0]->get_session_products_plugin(array('key'=>'wishlist'),$_smarty_tpl);?>


<!-- Хлебные крошки /-->
<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><a href="/products">Каталог товаров</a></li>
	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cat']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->iteration++;
 $_smarty_tpl->tpl_vars['cat']->last = $_smarty_tpl->tpl_vars['cat']->iteration === $_smarty_tpl->tpl_vars['cat']->total;
?>
		
		<li><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
		
	<?php } ?>
	<?php if ($_smarty_tpl->tpl_vars['brand']->value) {?>
	<li><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['whom']->value) {?>
	<li><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/whom/<?php echo $_smarty_tpl->tpl_vars['whom']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['whom']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['event']->value) {?>
	<li><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
/event/<?php echo $_smarty_tpl->tpl_vars['event']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['event']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php }?>
	<?php } elseif ($_smarty_tpl->tpl_vars['brand']->value) {?>
	<li><a href="brands/<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php } elseif ($_smarty_tpl->tpl_vars['whom']->value) {?>
	<li><a href="whoms/<?php echo $_smarty_tpl->tpl_vars['whom']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['whom']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php } elseif ($_smarty_tpl->tpl_vars['event']->value) {?>
	<li><a href="events/<?php echo $_smarty_tpl->tpl_vars['event']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['event']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
	<li><span>Поиск</span></li>
	<?php }?>
</ul>
<!-- Хлебные крошки #End /-->


<div class="pspage">
	<?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
	<h1 class="phead">Поиск <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
	<?php } elseif ($_smarty_tpl->tpl_vars['page']->value) {?>
	<h1 class="phead"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
	<?php } else { ?>
	<h1 class="phead"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['whom']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['event']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
	<div class="fil">
		<ul class="samopal">
			<li>
				<span>
					
					<?php if ($_smarty_tpl->tpl_vars['sort']->value=='price_asc') {?>
						<b>Сначала дешевые</b>
					<?php } elseif ($_smarty_tpl->tpl_vars['sort']->value=='price_desc') {?>
						<b>Сначала дорогие</b>
					<?php } elseif ($_smarty_tpl->tpl_vars['sort']->value=='name_asc') {?>
						<b>Имени от А до Я</b>
					<?php } elseif ($_smarty_tpl->tpl_vars['sort']->value=='name_desc') {?>
						<b>Имени от Я до А</b>
					<?php }?>
				</span>
				<ul class="drops">
					
					<li><a <?php if ($_smarty_tpl->tpl_vars['sort']->value=='price_asc') {?>class="selected"<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price_asc','page'=>null),$_smarty_tpl);?>
">Сначала дешевые</a></li>
					<li><a <?php if ($_smarty_tpl->tpl_vars['sort']->value=='price_desc') {?>class="selected"<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price_desc','page'=>null),$_smarty_tpl);?>
">Сначала дорогие</a></li>
					<li><a <?php if ($_smarty_tpl->tpl_vars['sort']->value=='name_asc') {?>class="selected"<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name_asc','page'=>null),$_smarty_tpl);?>
">По имени от А до Я</a></li>
					<li><a <?php if ($_smarty_tpl->tpl_vars['sort']->value=='name_desc') {?>class="selected"<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name_desc','page'=>null),$_smarty_tpl);?>
">По имени от Я до А</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
</div>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>

<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->brands||$_smarty_tpl->tpl_vars['category']->value->whoms||$_smarty_tpl->tpl_vars['category']->value->events||$_smarty_tpl->tpl_vars['features']->value) {?>
<div id="filter">
	<?php echo $_smarty_tpl->getSubTemplate ('filter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }?> 
<?php } else { ?>
<?php if ($_smarty_tpl->tpl_vars['brands']->value||$_smarty_tpl->tpl_vars['whoms']->value||$_smarty_tpl->tpl_vars['events']->value||$_smarty_tpl->tpl_vars['features']->value) {?>
<div id="filter">
	<?php echo $_smarty_tpl->getSubTemplate ('filter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }?> 
<?php }?>

<ul class="catprods">
<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
<?php echo $_smarty_tpl->getSubTemplate ('product_iteam.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } ?>
</ul>

<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
<?php } else { ?>
Товары не найдены
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
<?php if ($_smarty_tpl->tpl_vars['page']->value->body) {?>
<div class="prodopis">
<div class="maxtext">
<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

</div>
</div>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->description) {?>
<div class="prodopis">
<div class="maxtext">
<?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>

</div>
</div>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
<?php if ($_smarty_tpl->tpl_vars['brand']->value->description) {?>
<div class="prodopis">
<div class="maxtext">
<?php echo $_smarty_tpl->tpl_vars['brand']->value->description;?>

</div>
</div>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
<?php if ($_smarty_tpl->tpl_vars['whom']->value->description) {?>
<div class="prodopis">
<div class="maxtext">
<?php echo $_smarty_tpl->tpl_vars['whom']->value->description;?>

</div>
</div>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
<?php if ($_smarty_tpl->tpl_vars['event']->value->description) {?>
<div class="prodopis">
<div class="maxtext">
<?php echo $_smarty_tpl->tpl_vars['event']->value->description;?>

</div>
</div>
<?php }?>
<?php }?><?php }} ?>
