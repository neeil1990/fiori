<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:07:08
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2238397155a2d77ccdc4128-99692974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c9901054466e83486879b4f3ac874bc513052f1' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/main.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2238397155a2d77ccdc4128-99692974',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new_products' => 0,
    'all_products' => 0,
    'discounted_products' => 0,
    'last_comments_shop' => 0,
    'settings' => 0,
    'comment' => 0,
    'last_posts' => 0,
    'post' => 0,
    'page' => 0,
    'last_photos' => 0,
    'image' => 0,
    'album' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d77ccecc8c0_99291718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d77ccecc8c0_99291718')) {function content_5a2d77ccecc8c0_99291718($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('index.tpl', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['wrapper'] = clone $_smarty_tpl->tpl_vars['wrapper'];?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable('', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_session_products'][0][0]->get_session_products_plugin(array('key'=>'wishlist'),$_smarty_tpl);?>


<?php echo $_smarty_tpl->getSubTemplate ('slider.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="mainpage"><?php echo $_smarty_tpl->getSubTemplate ('advant.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_products'][0][0]->get_products_plugin(array('var'=>'new_products','limit'=>18),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['new_products']->value) {?>
<div class="maintitle mar-b-50"><span>Новинки</span></div>
<div class="max">
	<div class="prodblock slick15<?php if (count($_smarty_tpl->tpl_vars['new_products']->value)>6) {?> bolee<?php }?>">
		<div class="prodblockslick">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
			<?php if ($_smarty_tpl->tpl_vars['product']->index%2==0) {?><div><?php }?>
			<?php echo $_smarty_tpl->getSubTemplate ('product_iteam_slick.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php if ($_smarty_tpl->tpl_vars['product']->iteration%2==0||$_smarty_tpl->tpl_vars['product']->last) {?></div><?php }?>
		<?php } ?>
		</div>
	</div>
	<div class="alllink pad-t-30"><a href="/products">Каталог товаров</a></div>
</div>
<?php }?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_products'][0][0]->get_products_plugin(array('var'=>'all_products','featured'=>1,'limit'=>18),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['all_products']->value) {?>
<div class="mainfeatured pad-t-50 pad-b-50 mar-t-70 mar-b-50">
	<div class="maintitle2 mar-b-50"><b></b><span>Мы рекомендуем</span><b></b></div>
	<div class="max">
		<div class="prodblock slick15<?php if (count($_smarty_tpl->tpl_vars['all_products']->value)>6) {?> bolee<?php }?>">
			<div class="prodblockslick">
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
				<?php if ($_smarty_tpl->tpl_vars['product']->index%2==0) {?><div><?php }?>
				<?php echo $_smarty_tpl->getSubTemplate ('product_iteam_slick.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php if ($_smarty_tpl->tpl_vars['product']->iteration%2==0||$_smarty_tpl->tpl_vars['product']->last) {?></div><?php }?>
			<?php } ?>
			</div>
		</div>
		<div class="alllink pad-t-50"><a href="/hits">Смотреть все хиты продаж</a></div>
	</div>
</div>
<?php }?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_products'][0][0]->get_products_plugin(array('var'=>'discounted_products','discounted'=>1,'limit'=>18),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['discounted_products']->value) {?>
<div class="maintitle mar-b-50"><span>Распродажа</span></div>
<div class="max">
	<div class="prodblock slick15<?php if (count($_smarty_tpl->tpl_vars['discounted_products']->value)>6) {?> bolee<?php }?>">
		<div class="prodblockslick">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounted_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
			<?php if ($_smarty_tpl->tpl_vars['product']->index%2==0) {?><div><?php }?>
			<?php echo $_smarty_tpl->getSubTemplate ('product_iteam_slick.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php if ($_smarty_tpl->tpl_vars['product']->iteration%2==0||$_smarty_tpl->tpl_vars['product']->last) {?></div><?php }?>
		<?php } ?>
		</div>
	</div>
	<div class="alllink pad-t-30"><a href="/sales">Смотреть все товары по акции</a></div>
</div>
<?php }?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_comments'][0][0]->get_comments_plugin(array('var'=>'last_comments_shop','limit'=>7,'type'=>'feedback'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['last_comments_shop']->value) {?>
<div class="maintitle mar-b-50 mar-t-70"><span>Отзывы о нашем магазине</span></div>
<div class="max">
	<div class="lastcom slick15<?php if (count($_smarty_tpl->tpl_vars['last_comments_shop']->value)>3) {?> bolee<?php }?>">
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['last_comments_shop']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
		<div>
			<div class="comitem">
				<div class="comtext">
					<img src="../design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/quote.png" alt="цитата" />
					<?php echo $_smarty_tpl->tpl_vars['comment']->value->text;?>

				</div>
			</div>
			<div class="cominfo">
				<span>
					<a href="/reviews#comment_<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value->name;?>
</a>
					<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
</span>
				</span>
				<div>
					<div class="rating" <?php if ($_smarty_tpl->tpl_vars['comment']->value->rate==1) {?>data-tip="Ужасно!"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==2) {?>data-tip="Плохо"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==3) {?>data-tip="Нормально"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==4) {?>data-tip="Хорошо"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==5) {?>data-tip="Отлично!"<?php } else { ?>data-tip="Рейтин не установлен"<?php }?>>
						<div class="rat" <?php if ($_smarty_tpl->tpl_vars['comment']->value->rate==1) {?>style="width: 20%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==2) {?>style="width: 40%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==3) {?>style="width: 60%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==4) {?>style="width: 80%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==5) {?>style="width: 100%;"<?php }?>></div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<div class="alllink pad-t-30"><a href="/reviews">Смотреть все отзывы</a></div>
</div>
<?php }?>


<div class="mainfeatured pad-t-50 pad-b-50 mar-t-70 mar-b-50">
	<div class="maintitle2 mar-b-50"><b></b><span>Не нашли подходящий вариант?</span><b></b></div>
	<div class="max">
		<div class="maincalltext">
			<b>Мы сделаем композицию, учитывая ваши пожелания и бюджет!</b>
			<p>Звоните нам и заказывайте по телефону</p>
			<b><?php echo $_smarty_tpl->tpl_vars['settings']->value->zphone1;?>
</b>
			<span>или</span>
		</div>
		<div class="alllink pad-t-30 bluron"><a href="#" onclick="$('.cback').fadeIn(300); return false;">Закажите обратный звонок</a></div>
	</div>
</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_posts'][0][0]->get_posts_plugin(array('var'=>'last_posts','limit'=>5),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['last_posts']->value) {?>
<div class="maintitle mar-b-30 mar-t-70"><span>Наши новости</span></div>
<div class="max">
	<div class="lastcom lastcomnews slick15<?php if (count($_smarty_tpl->tpl_vars['last_comments_shop']->value)>3) {?> bolee<?php }?>">
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['last_posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
		<div>
			<div class="iteamlastnews">
				<?php if ($_smarty_tpl->tpl_vars['post']->value->image) {?><a class="lpimg" href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><span><span><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizeblog'][0][0]->resize_modifier_blog($_smarty_tpl->tpl_vars['post']->value->image,100,100);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" /></span></span></a><?php }?>
				<a class="lpname" href="news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value->name;?>
</a>
				<?php echo $_smarty_tpl->tpl_vars['post']->value->annotation;?>

			</div>
		</div>
		<?php } ?>
	</div>
	
	<div class="alllink pad-t-30"><a href="/news">Смотреть все новости</a></div>
</div>
<?php }?>


<div class="maintitle mar-b-30 mar-t-70"><span><?php echo $_smarty_tpl->tpl_vars['page']->value->header;?>
</span></div>
<div class="max">
	<div class="mtable">
		<div class="mleft">
			<img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/mainimg.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['page']->value->header;?>
">
		</div>
		
		<div class="mright">
			<div class="mainhidetext">
			<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

			</div>
		</div>
	</div>
</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_photos'][0][0]->get_photos_plugin(array('var'=>'last_photos','limit'=>20),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['last_photos']->value) {?>
<div class="maintitle mar-b-30 mar-t-70"><span>Наш фотоальбом</span></div>



<script>
$(window).load(function() {
	$('.plitfoto').masonry({
	  itemSelector: '.grid2'
	});
});

</script>



<div class="max">
	<div id="container" class="plitfoto">
	<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['last_photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
	<div class="grid2">
		<div>
			<a class="mainphotoiteam" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizealbum'][0][0]->resize_modifier_album($_smarty_tpl->tpl_vars['image']->value->filename,1920,0);?>
" data-fancybox="gallery">
				<span>
				<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizealbum'][0][0]->resize_modifier_album($_smarty_tpl->tpl_vars['image']->value->filename,120,0);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
				</span>
			</a>
		</div>
	</div>
	<?php } ?>
	</div>
	<div class="alllink pad-t-10"><a href="/photo">Смотреть весь фотоальбом</a></div>
</div>

<?php }?><?php }} ?>
