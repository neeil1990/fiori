<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:32
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8151052165a7d7f50d921a5-28558827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f42077e2ef7cc8f482c3bc02de6c4ef5292fe9b' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/categories.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8151052165a7d7f50d921a5-28558827',
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
  'unifunc' => 'content_5a7d7f50ea7e68_43263711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f50ea7e68_43263711')) {function content_5a7d7f50ea7e68_43263711($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
<?php $_smarty_tpl->tpl_vars['first_category'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['category']->value->path), null, 0);?>
<?php $_smarty_tpl->tpl_vars['last_category'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value->path[count(($_smarty_tpl->tpl_vars['category']->value->path))-2], null, 0);?>


<?php if ($_smarty_tpl->tpl_vars['level']->value==0) {?>
<div id="nav">
	<div class="podmobnav">
		<a href="#" class="navtoggle bluron">Каталог товаров</a>
		<div class="nav">
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
				<div class="navone <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['first_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
					<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><span<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?> class="sub"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
					<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>1), 0);?>
<?php }?>
				</div>
			<?php }?>
			<?php } ?>
		</div>
	</div>
	
	<div class="appendsearch">
	</div>
	<div class="appendcart">
	</div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==1) {?>
<div>
	<div>
		<div class="podnavtwo">
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
			<div class="navtwo <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
             	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><span<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?> class="sub"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>2), 0);?>
<?php }?>
			</div>
		<?php }?>
		<?php } ?>
		</div>
	</div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==2) {?>
<div>
	<div>
		<div class="podnavtwo">
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
			<div class="navtwo <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
             	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><span<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?> class="sub"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>3), 0);?>
<?php }?>
			</div>
		<?php }?>
		<?php } ?>
		</div>
	</div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==3) {?>
<div>
	<div>
		<div class="podnavtwo">
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
			<div class="navtwo <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
             	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><span<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?> class="sub"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>4), 0);?>
<?php }?>
			</div>
		<?php }?>
		<?php } ?>
		</div>
	</div>
</div>
<?php }?>







<?php if ($_smarty_tpl->tpl_vars['level']->value==5) {?>
<div>
	<div>
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
			<div class="navtwo <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
             	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
"><span<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?> class="sub"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?><?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>1), 0);?>
<?php }?>
			</div>
		<?php }?>
		<?php } ?>
	</div>
</div>
<?php }?>













<?php if ($_smarty_tpl->tpl_vars['level']->value==50) {?>
	<div class="navblock">
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
			<?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?>
			<div class="licat <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['first_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
             	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><span class="sub"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>1), 0);?>

			</div>
			<?php } else { ?>
			<div class="licat <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
				
				<?php if ($_smarty_tpl->tpl_vars['c']->value->url=='print') {?>
				<a href="/print"><span><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php } else { ?>
				
				<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><span><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
				<?php }?>
			</div>
			<?php }?>
		<?php }?>
	<?php } ?>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==51) {?>
	<div class="ulsubpad" id="ff<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['c']->value->subcategories) {?>
                <div class="licat <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
                 	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="nomob asub"><span class="sub"><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
                 	<span class="podcat"></span>
                    <?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>2), 0);?>

                </div>
                <?php } else { ?>
                <div class="licat <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
                    <a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="asub"><span><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
                </div>
                <?php }?>
            <?php } ?>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['level']->value==52) {?>
    <div class="ulsub2pad" id="ff<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                <div class="licat <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> <?php if ($_smarty_tpl->tpl_vars['first_category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
                	<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
" class="asub"><span><?php echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</span></a>
                </div>
            <?php } ?>
    </div>
<?php }?>

<?php }?>
<?php }} ?>
