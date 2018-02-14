<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:33
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/mmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16754413835a7d7f51116098-85188850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a22f1f1f75d2977a890b8ba8d47817c75c597cb' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/mmenu.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16754413835a7d7f51116098-85188850',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'level' => 0,
    'c' => 0,
    'first_category' => 0,
    'last_category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f511c1af8_63041925',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f511c1af8_63041925')) {function content_5a7d7f511c1af8_63041925($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
<?php $_smarty_tpl->tpl_vars['first_category'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['category']->value->path), null, 0);?>
<?php $_smarty_tpl->tpl_vars['last_category'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value->path[count(($_smarty_tpl->tpl_vars['category']->value->path))-2], null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?>
<div class="mmnav">
	<ul>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
		<li class="<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['first_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?>
			<a class="msub" href="#"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php } else { ?>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('mmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>1), 0);?>
<?php }?>
		</li>
	<?php }?>
	<?php } ?>
	</ul>
	<div class="mmcenterlink">
		<a href="/products">Весь каталог &raquo;</a>
	</div>
</div>
<?php }?>




<?php if ($_smarty_tpl->tpl_vars['level']->value==1) {?>
<div class="mmenu<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
	<ul>
		<li>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><b>Все <?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</b></a>
		</li>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
		<li class="<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?>
			<a class="msub" href="#"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php } else { ?>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('mmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>2), 0);?>
<?php }?>
		</li>
	<?php }?>
	<?php } ?>
	</ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==2) {?>
<div class="mmenu<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
	<ul>
		<li>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><b>Все <?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</b></a>
		</li>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
		<li class="<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?>
			<a class="msub" href="#"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php } else { ?>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('mmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>3), 0);?>
<?php }?>
		</li>
	<?php }?>
	<?php } ?>
	</ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==3) {?>
<div class="mmenu<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
	<ul>
		<li>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><b>Все <?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</b></a>
		</li>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
		<li class="<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>active<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?>
			<a class="msub" href="#"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php } else { ?>
			<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('mmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>4), 0);?>
<?php }?>
		</li>
	<?php }?>
	<?php } ?>
	</ul>
</div>
<?php }?>

<?php }?><?php }} ?>
