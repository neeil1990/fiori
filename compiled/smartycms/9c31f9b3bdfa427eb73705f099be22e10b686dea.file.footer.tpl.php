<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:32:37
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13403001545a2d768f37be78-15764068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c31f9b3bdfa427eb73705f099be22e10b686dea' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/footer.tpl',
      1 => 1512930749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13403001545a2d768f37be78-15764068',
  'function' => 
  array (
    'dmenu_tree3' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d768f40a4d4_58964470',
  'variables' => 
  array (
    'callback_email' => 0,
    'dmenu3' => 0,
    'dm' => 0,
    'categories' => 0,
    'c' => 0,
    'category' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d768f40a4d4_58964470')) {function content_5a2d768f40a4d4_58964470($_smarty_tpl) {?><div class="mainfeatured pad-t-50 pad-b-50 mar-t-70 mar-b-50">
	<div class="max">
		<form id="mail_form" class="mail_form validate" method="post">
			<div class="mailtable">
				<div class="mt_text">
					Подпишитесь на наши новости и акции!
				</div>
				
				<div>
					<span class="podimmail">
						<span class="nadoeda">Надоедать не будем :)</span>
						<input class="onemail" type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['callback_email']->value;?>
" placeholder="E-mail" required/>
					</span>
				</div>
				
				<div class="mtbut">
					<button class="btnmail but" type="submit" name="callback" value="">Подписаться</button>
				</div>
			</div>
		</form>
		<div class='sendonecloic'>
			<b>Спасибо за подписку!</b>
			Теперь вы будете всегда в курсе новостей и акций нашего магазина
		</div>
	</div>
</div>

<div class="max">
	<div class="mobtable">
	
		<div class="zeblock">
			<div class="zenam">Компания</div>
			<div class="zenam mob">Компания</div>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_dmenus'][0][0]->get_dmenus_plugin(array('var'=>'dmenu3','group_id'=>3),$_smarty_tpl);?>

			<?php if (!function_exists('smarty_template_function_dmenu_tree3')) {
    function smarty_template_function_dmenu_tree3($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['dmenu_tree3']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
				<?php if ($_smarty_tpl->tpl_vars['dmenu3']->value) {?>
				<ul>
				<?php  $_smarty_tpl->tpl_vars['dm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dmenu3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dm']->key => $_smarty_tpl->tpl_vars['dm']->value) {
$_smarty_tpl->tpl_vars['dm']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['dm']->value->visible) {?>
						<li<?php if ($_smarty_tpl->tpl_vars['dm']->value->url==$_SERVER['REQUEST_URI']) {?> class="selected"<?php }?>>
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

			<?php smarty_template_function_dmenu_tree3($_smarty_tpl,array('dmenu3'=>$_smarty_tpl->tpl_vars['dmenu3']->value));?>

		</div>
		
		<div class="zeblock">
			<div class="zenam">Каталог товаров</div>
			<div class="zenam mob">Каталог товаров</div>
			<?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
			<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
				
				<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
					<li<?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?> class="selected"<?php }?>>
						<a href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
					</li>
				<?php }?>
			<?php } ?>
			</ul>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

			<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value));?>

		</div>
		
	</div>

	<div class="zecopy">
		<?php echo $_smarty_tpl->tpl_vars['settings']->value->zcopy;?>

		<br/>
		<?php if ($_smarty_tpl->tpl_vars['settings']->value->vkontakte||$_smarty_tpl->tpl_vars['settings']->value->twitter||$_smarty_tpl->tpl_vars['settings']->value->instagram||$_smarty_tpl->tpl_vars['settings']->value->youtube||$_smarty_tpl->tpl_vars['settings']->value->facebook||$_smarty_tpl->tpl_vars['settings']->value->odnoklassniki) {?>
		<div class="socblock">
			<?php if ($_smarty_tpl->tpl_vars['settings']->value->vkontakte) {?><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value->vkontakte;?>
" target="_blank"><img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/vk.png" alt="" /></a><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['settings']->value->twitter) {?><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value->twitter;?>
" target="_blank"><img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/twitter.png" alt="" /></a><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['settings']->value->instagram) {?><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value->instagram;?>
" target="_blank"><img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/instagram.png" alt="" /></a><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['settings']->value->youtube) {?><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value->youtube;?>
" target="_blank"><img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/youtube.png" alt="" /></a><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['settings']->value->facebook) {?><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value->facebook;?>
" target="_blank"><img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/facebook.png" alt="" /></a><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['settings']->value->odnoklassniki) {?><a href="<?php echo $_smarty_tpl->tpl_vars['settings']->value->odnoklassniki;?>
" target="_blank"><img src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/images/odnoklassniki.png" alt="" /></a><?php }?>
		</div>
		<?php }?>
		<p>Мы принимаем онлайн оплату, цена на сайте может не соответсовать цене в магазине, уточняйте у менеджера.</p>

		<div class="socblock pay">
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
	</div>
	
	<div class="zecontact">
		<b><?php echo $_smarty_tpl->tpl_vars['settings']->value->zphone1;?>
</b>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['settings']->value->zrezhim;?>

		</div>
		<span class="fotcall bluron" onclick="$('.cback').fadeIn(300); return false;">Заказать звонок</span>
		<span class="fotcall mail bluron" onclick="$('.vopros').fadeIn(300); return false;">Задать вопрос</span>
	</div>
</div>

<?php }} ?>
