<?php /* Smarty version Smarty-3.1.18, created on 2018-01-14 14:39:04
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3751944975a2d78dddab537-29009487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee3641854207e3aca894e9224462b6526dcc3b1f' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/product.tpl',
      1 => 1515929939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3751944975a2d78dddab537-29009487',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d78ddf20fb0_33584231',
  'variables' => 
  array (
    'product' => 0,
    'settings' => 0,
    'category' => 0,
    'cat' => 0,
    'image' => 0,
    'v' => 0,
    'currency' => 0,
    'b' => 0,
    'properties' => 0,
    'val' => 0,
    'comments' => 0,
    'comment' => 0,
    'related_products' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d78ddf20fb0_33584231')) {function content_5a2d78ddf20fb0_33584231($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products/".((string)$_smarty_tpl->tpl_vars['product']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_session_products'][0][0]->get_session_products_plugin(array('key'=>'wishlist'),$_smarty_tpl);?>


<!-- Хлебные крошки /-->
<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><a href="/products">Каталог товаров</a></li>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
		<li><a href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
	<?php } ?>
	<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
</ul>
<!-- Хлебные крошки #End /-->
<div class="ptable product jsprod mar-t-30">
	
	<?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?>
	<div class="ptableleft">
		<div>
			<div class="image">
				<div class="slider-for">
					<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
					<div>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,800,600);?>
" class="quick_view" data-fancybox="qw1" data-qw-form="qw-form-1"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,430,430);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" /></a>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php if (count($_smarty_tpl->tpl_vars['product']->value->images)>1) {?>
			<div class="pp_images slider-nav">
				<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
				<div variants-image="<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
">
					<div class="pp_i_b">
						<span>
							<span>
								<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,70,70);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
							</span>
						</span>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php }?>
		</div>
	</div>
	<?php }?>
	
	<div class="ptableright">
		<h1 class="prodtitle" data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
		

		<div class="prodanno">
		<?php echo $_smarty_tpl->tpl_vars['product']->value->annotation;?>

		</div>

		
		<div class="fichi">
			<?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?><span class="chit">Хит</span><?php }?>
			<span class="cproc" <?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?><?php } else { ?>style="display: none"<?php }?>>- <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['product']->value->variant->price;?>
<?php $_tmp1=ob_get_clean();?><?php echo floor(abs(100-$_tmp1/($_smarty_tpl->tpl_vars['product']->value->variant->compare_price)*100));?>
%</span>
		</div>
		
		<form class="variants pis_table mar-b-30" action="/cart">
		
			<?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>0) {?>
			<div class="blockselectprod">
				<b>Вариант букета</b>
				<div class="podipselect">
					<select class="ipselect ajaxselect" name="variant">
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"
								data-text-var="<?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
"
								<?php if ($_smarty_tpl->tpl_vars['v']->value->compare_price>0) {?>
									data-compareprice2="<?php echo $_smarty_tpl->tpl_vars['v']->value->compare_price;?>
"
									data-proc="- <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value->price;?>
<?php $_tmp2=ob_get_clean();?><?php echo floor(abs(100-$_tmp2/($_smarty_tpl->tpl_vars['v']->value->compare_price)*100));?>
%"
									data-compare_price="<span><b class='clcomp'><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['v']->value->compare_price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>"
									data-compare_price-int="<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['v']->value->compare_price);?>
"
								<?php }?>
								data-price="<span><b class='calcitog'><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['v']->value->price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>"
								data-price-int="<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['v']->value->price);?>
"
								>
							<?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>

						</option>
					<?php } ?>
					</select>
				</div>
			</div>
			<?php } else { ?>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			<input checked name="variant" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="radio" style="display: none;"/>
			<?php } ?>
			<?php }?>


			<?php if (count($_smarty_tpl->tpl_vars['product']->value->boxing)>0) {?>
				<div class="blockselectprod">
					<b>Вариант упаковки</b>
					<div class="podipselect">
						<select class="ipselect selectbox" name="box">
							<option value="0" data-compareprice2="0" data-proc="0" data-compare_price="0" data-price="0">не выбрано</option>
							<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->boxing; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['b']->value->compare_price>0) {?>data-compareprice2="<?php echo $_smarty_tpl->tpl_vars['b']->value->compare_price;?>
" data-proc="- <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['b']->value->price;?>
<?php $_tmp3=ob_get_clean();?><?php echo floor(abs(100-$_tmp3/($_smarty_tpl->tpl_vars['b']->value->compare_price)*100));?>
%" data-compare_price="<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['b']->value->compare_price);?>
"<?php }?> data-price="<?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['b']->value->price);?>
"><?php echo $_smarty_tpl->tpl_vars['b']->value->name;?>
</option>
							<?php } ?>
						</select>
					</div>
				</div>
			<?php } else { ?>
					<input checked name="box" value="0" type="radio" style="display: none;"/>
			<?php }?>

			<div class="podcenlist prod">
				<div class="cenlist">
					<div class="prc-new"><span><b class="calcitog"><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['product']->value->variant->price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
					<div class="prc-old"<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?><?php } else { ?> style="display: none;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?><span><b class="clcomp"><?php echo sprintf("%.0f",$_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?></div>
				</div>
			</div>
			
			
			<?php if ($_smarty_tpl->tpl_vars['properties']->value) {?>
			<div class="blockselectprod">
			<b>Дополнительно</b>
			<ul class="drops nof prodpage">
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['properties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
				<li class="val<?php echo $_smarty_tpl->tpl_vars['val']->value->id;?>
">
					<label>
						<input style="vertical-align: middle; margin-right: 4px;" type="checkbox" name="properties[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value->id;?>
">
						<span class="itname"><?php echo $_smarty_tpl->tpl_vars['val']->value->name;?>
 (+<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['val']->value->price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
)</span>
					</label>
				</li>
			<?php } ?>
			</ul>
			</div>
			<?php }?>
			
			<div class="amountposit">
				<div class="amount scriptblock">
					<?php echo $_smarty_tpl->getSubTemplate ('calc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>
				<button type="submit" class="but addcart" value="" data-result-text="Хочу еще">Купить</button>
				<a href="#" class="bluron" onclick="$('.oneclick').fadeIn(300); return false;">Купить в 1 клик</a>

			</div>		


			
			
			<script>		
			$(function() {



				$('select.ajaxselect').change(function(e) {
					e.preventDefault();
					$('select.selectbox option[value="0"]').prop("selected",true);
					$('.prodanno').first().html("<p>" + $('option:selected',this).attr('data-text-var') + "</p>");
					$('div[variants-image="'+ $(this).val() +'"]').click();

					$.ajax({
						dataType: 'json',
						url: "ajax/calc.php",
						data: {productid: <?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
},
						success: function(data){
						if(data){
							$('.scriptblock').html(data.scriptblock);
						}
					}
					});

				});

				$('select.selectbox').change(function(e) {
					e.preventDefault();

					$(".addcalc").val(1);

					var price = parseInt($('.ajaxselect option:selected').attr('data-price-int'));
					var compareprice = parseInt($('.ajaxselect option:selected').attr('data-compare_price-int'));

					var str = (price + parseInt($('option:selected',this).attr('data-price')));
					var oldstr = (compareprice + parseInt($('option:selected',this).attr('data-compare_price')));


					$(".calcitog").text(str);
					$(".clcomp").text(oldstr);

					$.ajax({
						dataType: 'json',
						url: "ajax/calc.php",
						data: {productid: <?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
},
						success: function(data){
							if(data){
								$('.scriptblock').html(data.scriptblock);
							}
						}
					});

				});

			});
			</script>
			
				
		</form>
				

<div id="qw-form-1" class="hidden">
	<div class="bigqwtext"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</div>
	
	<?php if ($_smarty_tpl->tpl_vars['product']->value->annotation) {?>
	<div class="prodanno">
	<?php echo $_smarty_tpl->tpl_vars['product']->value->annotation;?>

	</div>
	<?php }?>
	
	<div class="allbumshare mar-b-30 pad-t-15">
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,telegram"></div>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['product']->value->body) {?>
	<div class="prodanno">
	<?php echo $_smarty_tpl->tpl_vars['product']->value->body;?>

	</div>
	<?php }?>
		
</div>
				
				
				
				
		<?php if ($_smarty_tpl->tpl_vars['product']->value->body) {?>
		<div class="prodanno">
		<?php echo $_smarty_tpl->tpl_vars['product']->value->body;?>

		</div>
		<?php }?>
		
		<div class="bpinfo">
			<a href="/usloviya-dostavki">Условия доставки и самовывоза</a>
			<p>Курьером на дом или в офис — 150 ₽</p>
			<p>Бесплатно — от 3000 p</p>
		</div>
		
		<div class="bpinfo">
			<a href="/kak-oplatit-zakaz">Способы оплаты</a>
         <!--
			<div class="payprod">
				<img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/money1.png" alt="" />
				<img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/money2.png" alt="" />
				<img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/money3.png" alt="" />
				<img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/money4.png" alt="" />
				<img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/money5.png" alt="" />
			</div>
		-->
			<p>Или наличными курьеру</p>
		</div>
		<!--
		<div class="bpinfo">
			<a href="/vozvrat">Условия возврата товара</a>
		</div>
		-->		
	</div>
	
</div>


<div class="alllink photoalllink mar-b-50 pad-t-30">
	<a href="#" class="bluron" onclick="$('.addrevproduct').fadeIn(300); return false;"><b>Отзывы</b><span><?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
</span><b>Добавить свой</b></a>
</div>



<script>
$(document).ready(function() {
	fileInput();
	$('.zcomments').masonry({
	  itemSelector: '.cgrid'
	});
});

</script>


<?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
<div id="zcomments">
	<div class="zcomments">
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
		<div class="cgrid">
			<div>
				<div class="retable">
					<?php if ($_smarty_tpl->tpl_vars['comment']->value->image) {?>
					<div class="rtd rtdimg">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizepost'][0][0]->resize_modifier_post($_smarty_tpl->tpl_vars['comment']->value->image,1920,0);?>
" data-fancybox="gallery<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizepost'][0][0]->resize_modifier_post($_smarty_tpl->tpl_vars['comment']->value->image,100,100);?>
" alt="" /></a>
					</div>
					<?php }?>
					<div class="rtd rtdcom">
						<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b>
						<div class="comrate">
							<div class="rating" <?php if ($_smarty_tpl->tpl_vars['comment']->value->rate==1) {?>data-tip="Ужасно!"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==2) {?>data-tip="Плохо"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==3) {?>data-tip="Нормально"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==4) {?>data-tip="Хорошо"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==5) {?>data-tip="Отлично!"<?php } else { ?>data-tip="Рейтин не установлен"<?php }?>>
								<div class="rat"<?php if ($_smarty_tpl->tpl_vars['comment']->value->rate==1) {?>style="width: 20%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==2) {?>style="width: 40%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==3) {?>style="width: 60%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==4) {?>style="width: 80%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==5) {?>style="width: 100%;"<?php }?>></div>
							</div>
						</div>
						<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
</p>
						<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->text, ENT_QUOTES, 'UTF-8', true));?>

						<?php if (nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->otvet, ENT_QUOTES, 'UTF-8', true))) {?>
						<div class="readmins">
						<b>Ответ администратора</b>
						<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->otvet, ENT_QUOTES, 'UTF-8', true));?>

						</div>
						<?php }?>
					</div>
				</div>
				
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['related_products']->value) {?>
<h2 class="pad-t-50 mar-b-30">Рекомендуем к просмотру</h2>
<ul class="catprods">
<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
<?php echo $_smarty_tpl->getSubTemplate ('product_iteam.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } ?>
</ul>
<?php }?>
<?php }} ?>
