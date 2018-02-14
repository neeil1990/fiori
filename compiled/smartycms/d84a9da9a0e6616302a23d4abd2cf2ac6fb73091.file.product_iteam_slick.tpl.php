<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:09:22
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/product_iteam_slick.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16211234385a7d8162051083-42746497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd84a9da9a0e6616302a23d4abd2cf2ac6fb73091' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/product_iteam_slick.tpl',
      1 => 1515512498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16211234385a7d8162051083-42746497',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'v' => 0,
    'currency' => 0,
    'page' => 0,
    'wishlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d81620e5543_90571737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d81620e5543_90571737')) {function content_5a7d81620e5543_90571737($_smarty_tpl) {?><div class="product_iteam_slick product jsprod">
	<form class="variants pis_table" action="/cart">
		<div class="pis_info">
			<div class="pisi_table">
				<div>
					<div class="pisit">
						<a href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>	
						
						
						<?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>1) {?>
						<?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>2) {?>
						
						<div class="podipselect">
							<select class="ipselect ajaxselect" name="variant">
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->index++;
 $_smarty_tpl->tpl_vars['v']->first = $_smarty_tpl->tpl_vars['v']->index === 0;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value->compare_price>0) {?>data-compareprice2="<?php echo $_smarty_tpl->tpl_vars['v']->value->compare_price;?>
" data-proc="- <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value->price;?>
<?php $_tmp1=ob_get_clean();?><?php echo floor(abs(100-$_tmp1/($_smarty_tpl->tpl_vars['v']->value->compare_price)*100));?>
%" data-compare_price="<span><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->compare_price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>"<?php }?> data-price="<span><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>"><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</option>
								<?php } ?>
							</select>
						</div>
						<?php } else { ?>
						
						<div class="variki">
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->index++;
 $_smarty_tpl->tpl_vars['v']->first = $_smarty_tpl->tpl_vars['v']->index === 0;
?>
						<label class="variant">
							<input <?php if ($_smarty_tpl->tpl_vars['v']->first) {?>class="active"<?php }?> name="variant" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="radio" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value->compare_price>0) {?>data-compareprice2="<?php echo $_smarty_tpl->tpl_vars['v']->value->compare_price;?>
" data-proc="- <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value->price;?>
<?php $_tmp2=ob_get_clean();?><?php echo floor(abs(100-$_tmp2/($_smarty_tpl->tpl_vars['v']->value->compare_price)*100));?>
%" data-compare_price="<span><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->compare_price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>" <?php }?> data-price="<span><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['v']->value->price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>" <?php if ($_smarty_tpl->tpl_vars['product']->value->variant->id==$_smarty_tpl->tpl_vars['v']->value->id) {?>checked<?php }?> />
							<span><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</span>
						</label>
						<?php } ?>
						</div>
						<?php }?>
						<?php } else { ?>
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->index++;
 $_smarty_tpl->tpl_vars['v']->first = $_smarty_tpl->tpl_vars['v']->index === 0;
?>
						<input checked name="variant" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="radio" style="display: none;"/>
						<?php } ?>
						<?php }?>
						
					</div>
				</div>
				<div>
					<div>
						<div class="cenlist">
							<div class="prc-new"><span><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span></div>
							<div class="prc-old"><?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?><span><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>
</b> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?></div>
						</div>
						
						<div class="formpanel">
							<div>
								<button type="submit" class="but addcart" value="" data-result-text="Хочу еще">Купить</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<input checked name="box" value="0" type="radio" style="display: none;"/>

		
		<div class="pis_photo">
			<?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?>
			<span class="image">
				<a href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,150,150);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
			</span>
			<?php }?>
		</div>
	
		
		<div class="fichi">
			<?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?><span class="chit">Хит</span><?php }?>
			<span class="cproc" <?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?><?php } else { ?>style="display: none"<?php }?>>- <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['product']->value->variant->price;?>
<?php $_tmp3=ob_get_clean();?><?php echo floor(abs(100-$_tmp3/($_smarty_tpl->tpl_vars['product']->value->variant->compare_price)*100));?>
%</span>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['page']->value->url=='wishlist') {?>
		<span class='mylist_add delete'><a href="/wishlist?remove=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"></a></span>
		<?php } elseif ($_smarty_tpl->tpl_vars['wishlist']->value->ids&&in_array($_smarty_tpl->tpl_vars['product']->value->id,$_smarty_tpl->tpl_vars['wishlist']->value->ids)) {?>
		<span class='mylist_add active'><a href="/wishlist"></a></span>
		<?php } else { ?>
		<span class='mylist_add'>
			<a href="/wishlist?id=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" class='addps' data-id='<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' data-key='wishlist' data-informer='1' data-result-text='<a href="/wishlist"></a>'></a>
		</span>
		<?php }?>
	</form>
</div><?php }} ?>
