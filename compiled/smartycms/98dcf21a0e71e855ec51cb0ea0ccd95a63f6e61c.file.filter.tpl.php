<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 16:10:08
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19417506415a7d7f5097bce6-01577925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98dcf21a0e71e855ec51cb0ea0ccd95a63f6e61c' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/filter.tpl',
      1 => 1518181807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19417506415a7d7f5097bce6-01577925',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f50ad6d88_00951585',
  'variables' => 
  array (
    'category' => 0,
    'config' => 0,
    'max_min_price' => 0,
    'currency' => 0,
    'slider_max_min_price' => 0,
    'filter_brand' => 0,
    'b' => 0,
    'brands' => 0,
    'filter_whom' => 0,
    'whoms' => 0,
    'filter_event' => 0,
    'events' => 0,
    'filter_features' => 0,
    'filter_featured' => 0,
    'filter_discounted' => 0,
    'discounted' => 0,
    'featured' => 0,
    'features' => 0,
    'f' => 0,
    'k' => 0,
    'o' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f50ad6d88_00951585')) {function content_5a7d7f50ad6d88_00951585($_smarty_tpl) {?><form class="ufilter" method="get" action="<?php if ($_smarty_tpl->tpl_vars['category']->value) {?><?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/catalog/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products<?php }?>">

<div class="glavfilter">
	<div class="iteamfilter">
		<div class="if_name">Цена</div>
		<div class="price_slider">
			<span>
				<input type="text" class="keypress" id="min_price" data-min-price="<?php echo floor($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['max_min_price']->value->min_price,null,false));?>
" placeholder="<?php echo floor($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['max_min_price']->value->min_price,null,false));?>
" name="min_price" value="<?php if ($_GET['min_price']) {?><?php echo $_GET['min_price'];?>
<?php } else { ?><?php }?>" autocomplete="off">
				<i>От</i>
				<em><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</em>
			</span>
			<span class="ifnlast">
				<input type="text" class="keypress" id="max_price" data-max-price="<?php echo ceil($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['max_min_price']->value->max_price,null,false));?>
" placeholder="<?php echo ceil($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['max_min_price']->value->max_price,null,false));?>
" name="max_price" value="<?php if ($_GET['max_price']) {?><?php echo $_GET['max_price'];?>
<?php } else { ?><?php }?>" autocomplete="off">
				<i>До</i>
				<em><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</em>
			</span>
			<div class="podslider">
			<div id="slider_price" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content" data-slider-min-range="<?php echo floor($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['slider_max_min_price']->value->min_price,null,false));?>
" data-slider-max-range="<?php echo ceil($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['slider_max_min_price']->value->max_price,null,false));?>
">
			
				<div class="ui-slider-range ui-widget-header ui-widget-header-bar"></div>
				<div class="ui-slider-range ui-widget-header ui-widget-header-left ui-widget-header-hidden"></div>
				<div class="ui-slider-range ui-widget-header ui-widget-header-right ui-widget-header-hidden"></div>
                <div class="ui-slider-range ui-widget-header polosa"></div>
                <a class="ui-slider-handle ui-state-default ui-state-left" href="#"></a>
                <a class="ui-slider-handle ui-state-default ui-state-right" href="#"></a>
            </div>
			</div>
		</div>
		
	</div>
	
	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['category']->value->brands) {?>
	<div class="iteamfilter">
		<div class="if_name">Цветок</div>
		<ul class="samopal">
			<li>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['filter_brand']->value) {?><?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->brands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b><?php }?><?php } ?><?php } else { ?><b>Выберите</b><?php }?>
				</span>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->brands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> class="disabled"<?php }?>>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="brand_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" class="<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?>checkeds<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?>disabled<?php }?>">
							<input id="brand_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" type="checkbox" name="brand_id[]" value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> disabled<?php }?>>
                            <span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </label>
                    </li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
	<?php } else { ?>
	<?php if ($_smarty_tpl->tpl_vars['brands']->value) {?>
	<div class="iteamfilter">
		<div class="if_name">Цветок</div>
		<ul class="samopal">
			<li>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['filter_brand']->value) {?><?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b><?php }?><?php } ?><?php } else { ?><b>Выберите</b><?php }?>
				</span>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> class="disabled"<?php }?>>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="brand_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" class="<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?>checkeds<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?>disabled<?php }?>">
							<input id="brand_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" type="checkbox" name="brand_id[]" value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> disabled<?php }?>>
                            <span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </label>
                    </li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['category']->value->whoms) {?>
	<div class="iteamfilter">
		<div class="if_name">Кому</div>
		<ul class="samopal">
			<li>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['filter_whom']->value) {?><?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->whoms; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b><?php }?><?php } ?><?php } else { ?><b>Выберите</b><?php }?>
				</span>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->whoms; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> class="disabled"<?php }?>>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="whom_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" class="<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?>checkeds<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?>disabled<?php }?>">
							<input id="whom_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" type="checkbox" name="whom_id[]" value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> disabled<?php }?>>
                            <span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </label>
                    </li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
	<?php } else { ?>
	<?php if ($_smarty_tpl->tpl_vars['whoms']->value) {?>
	<div class="iteamfilter">
		<div class="if_name">Кому</div>
		<ul class="samopal">
			<li>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['filter_whom']->value) {?><?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['whoms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b><?php }?><?php } ?><?php } else { ?><b>Выберите</b><?php }?>
				</span>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['whoms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> class="disabled"<?php }?>>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="whom_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" class="<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?>checkeds<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?>disabled<?php }?>">
							<input id="whom_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" type="checkbox" name="whom_id[]" value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> disabled<?php }?>>
                            <span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </label>
                    </li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['category']->value->events) {?>
	<div class="iteamfilter">
		<div class="if_name">Событие</div>
		<ul class="samopal">
			<li>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['filter_event']->value) {?><?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->events; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b><?php }?><?php } ?><?php } else { ?><b>Выберите</b><?php }?>
				</span>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->events; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> class="disabled"<?php }?>>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="event_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" class="<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?>checkeds<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?>disabled<?php }?>">
							<input id="event_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" type="checkbox" name="event_id[]" value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> disabled<?php }?>>
                            <span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </label>
                    </li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
	<?php } else { ?>
	<?php if ($_smarty_tpl->tpl_vars['events']->value) {?>
	<div class="iteamfilter">
		<div class="if_name">Событие</div>
		<ul class="samopal">
			<li>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['filter_event']->value) {?><?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b><?php }?><?php } ?><?php } else { ?><b>Выберите</b><?php }?>
				</span>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                    <li<?php if ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> class="disabled"<?php }?>>
						<div class="li-count" onclick="$('.sendsform').trigger('click')"></div>
                       <label for="event_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" class="<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?>checkeds<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?>disabled<?php }?>">
							<input id="event_<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" type="checkbox" name="event_id[]" value="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['b']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['b']->value->disabled) {?> disabled<?php }?>>
                            <span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
                        </label>
                    </li>
				<?php } ?>
				</ul>
			</li>
		</ul>
	</div>
	<?php }?>
	<?php }?>
	
	<div class="iteamfilter">
		<span class="fullfilterlink fileBtn" onclick="$('.podfilter').slideToggle(300); return false;">Еще</span>
	</div>
	
</div>

<div class="podfilter"<?php if ($_smarty_tpl->tpl_vars['filter_features']->value||$_smarty_tpl->tpl_vars['filter_featured']->value||$_smarty_tpl->tpl_vars['filter_discounted']->value) {?> style="display: block;"<?php }?>>
	<div>
		
		<div class="siplo">
			<div>
				<ul class="drops">
					<li>
						<label for="discounted"<?php if ($_smarty_tpl->tpl_vars['discounted']->value->disabled) {?> class="disabled"<?php }?>>
							<input id="discounted" type="checkbox" name="discounted" value="1"<?php if ($_smarty_tpl->tpl_vars['discounted']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['discounted']->value->disabled) {?> disabled<?php }?>>
							<span class="itname">Акционные</span>
						</label>
					</li>
				</ul>
			</div>
			<div>
				<ul class="drops">
					<li>
						<label for="featured"<?php if ($_smarty_tpl->tpl_vars['featured']->value->disabled) {?> class="disabled"<?php }?>>
							<input id="featured" type="checkbox" name="featured" value="1"<?php if ($_smarty_tpl->tpl_vars['featured']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['featured']->value->disabled) {?> disabled<?php }?>>
							<span class="itname">Рекомендуемые</span>
						</label>
					</li>
				</ul>
			</div>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
		<div class="siplo pad-t-15">
			<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
			<div>
				<div class="if_name"><?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>
</div>
				<ul class="drops">
				<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['f']->value->options; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
					<li>
						<label for="option_<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['o']->value->disabled) {?> class="disabled"<?php }?>>
							<input id="option_<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if ($_smarty_tpl->tpl_vars['o']->value->checked) {?> checked<?php } elseif ($_smarty_tpl->tpl_vars['o']->value->disabled) {?> disabled<?php }?>>
							<span class="itname"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
						</label>
					</li>
				<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
		<?php }?>
		
	</div>
</div>
	
<div class="butfilter pad-t-15">
	<div class="count_filter">Найдено <?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
</div>
	<span class="sendsform fileBtn">Подобрать</span>
</div>
	
	

<script>
    $(function() {
		$('.sendsform').live('click', function(){ $(this).parents('form').submit(); return false; });
	});
</script>




</form><?php }} ?>
