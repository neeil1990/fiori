<?php /* Smarty version Smarty-3.1.18, created on 2018-01-31 16:27:47
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1842527065a2d768ef08b67-55744000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a22196e84fdfc4c6f2aaa26545be869df712bacf' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/index.tpl',
      1 => 1517405264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1842527065a2d768ef08b67-55744000',
  'function' => 
  array (
    'dmenu_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d768f0f12b9_30646090',
  'variables' => 
  array (
    'config' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'settings' => 0,
    'canonical' => 0,
    'category' => 0,
    'features' => 0,
    'brands' => 0,
    'whoms' => 0,
    'events' => 0,
    'dmenu2' => 0,
    'dm' => 0,
    'wishlist' => 0,
    'categories' => 0,
    'module' => 0,
    'content' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d768f0f12b9_30646090')) {function content_5a2d768f0f12b9_30646090($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ru">
<head>


	<meta name="yandex-verification" content="30abf236af9472eb" />
 	<meta name="google-site-verification" content="wc2fSX7wTIMSbdI7NSDVY2Q0Pjcw-Ou0OO4WuVYi5UY" />
	<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
	<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
 	<!-- 
    <meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" /> 
	-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/favicon.ico" rel="icon" type="image/x-icon"/>
	<?php if (isset($_smarty_tpl->tpl_vars['canonical']->value)) {?><link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
<?php echo $_smarty_tpl->tpl_vars['canonical']->value;?>
"/><?php }?>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/style.css?v=<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp1=ob_get_clean();?><?php echo filemtime("design/".$_tmp1."/css/style.css");?>
" rel="stylesheet" type="text/css" media="screen"/>
	<?php if ($_smarty_tpl->tpl_vars['category']->value) {?><?php if ($_smarty_tpl->tpl_vars['category']->value->brands||$_smarty_tpl->tpl_vars['category']->value->whoms||$_smarty_tpl->tpl_vars['category']->value->events||$_smarty_tpl->tpl_vars['features']->value) {?><link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/filter.css" rel="stylesheet" type="text/css" media="screen"/><?php }?><?php } else { ?><?php if ($_smarty_tpl->tpl_vars['brands']->value||$_smarty_tpl->tpl_vars['whoms']->value||$_smarty_tpl->tpl_vars['events']->value||$_smarty_tpl->tpl_vars['features']->value) {?><link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/filter.css" rel="stylesheet" type="text/css" media="screen"/><?php }?><?php }?> 
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/adaptive.css?v=<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp2=ob_get_clean();?><?php echo filemtime("design/".$_tmp2."/css/adaptive.css");?>
" rel="stylesheet" type="text/css" media="screen"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/pagination.css" rel="stylesheet" type="text/css" media="screen"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"  type="text/javascript"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-62115054-26"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-62115054-26');
</script>

 
</head>
 
<body>

<div class="blurs">	
	<div id="top">
		<div class="top">
			<div class="openmenu">Навигация</div>
			<ul class="nav1">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_dmenus'][0][0]->get_dmenus_plugin(array('var'=>'dmenu2','group_id'=>2),$_smarty_tpl);?>

			<?php if (!function_exists('smarty_template_function_dmenu_tree')) {
    function smarty_template_function_dmenu_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['dmenu_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
				<?php if ($_smarty_tpl->tpl_vars['dmenu2']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['dm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dmenu2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dm']->key => $_smarty_tpl->tpl_vars['dm']->value) {
$_smarty_tpl->tpl_vars['dm']->_loop = true;
?>
				
					<?php if ($_smarty_tpl->tpl_vars['dm']->value->visible) {?>
						<li <?php if ($_smarty_tpl->tpl_vars['dm']->value->url==$_SERVER['REQUEST_URI']) {?>class="selected"<?php }?>>
							<a <?php if ($_smarty_tpl->tpl_vars['dm']->value->submenus) {?>class="msub"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['dm']->value->url;?>
"<?php if ($_smarty_tpl->tpl_vars['dm']->value->onclick) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['dm']->value->onclick;?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['dm']->value->style) {?> class="<?php echo $_smarty_tpl->tpl_vars['dm']->value->style;?>
"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['dm']->value->submenus) {?>
								<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dm']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
								<?php } else { ?>
								<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['dm']->value->name, ENT_QUOTES, 'UTF-8', true);?>

								<?php }?>
							</a>
							<?php if ($_smarty_tpl->tpl_vars['dm']->value->submenus) {?>
							<div>
							<ul>
							<?php smarty_template_function_dmenu_tree($_smarty_tpl,array('dmenu2'=>$_smarty_tpl->tpl_vars['dm']->value->submenus));?>

							</ul>
							</div>
							<?php }?>
						</li>
					<?php }?>
				
				<?php } ?>
				<?php }?>
			<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

			
			<?php smarty_template_function_dmenu_tree($_smarty_tpl,array('dmenu2'=>$_smarty_tpl->tpl_vars['dmenu2']->value));?>

			</ul>
			
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_session_products'][0][0]->get_session_products_plugin(array('key'=>'wishlist'),$_smarty_tpl);?>

			<div id="wishlist_informer">
				<?php echo $_smarty_tpl->getSubTemplate ('products_session_wishlist_informer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('session'=>$_smarty_tpl->tpl_vars['wishlist']->value), 0);?>

			</div>
			
			<span class="userlink bluron" onclick="$('.userprofile').fadeIn(300); return false;">Кабинет</span>
			
		</div>
	</div>


	<div id="header">
		<div class="logo">
			<a href="/"><img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/logo.jpg" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
		</div>
		
		<div class="tpt">
			<div class="phone">
				<b class="pk"><?php echo $_smarty_tpl->tpl_vars['settings']->value->zphone1;?>
</b>
				<b class="mob bluron link" onclick="$('.cback').fadeIn(300); return false;"><?php echo $_smarty_tpl->tpl_vars['settings']->value->zphone1;?>
</b>
				<span class="pk">Номер телефона приема заказов</span>
				<span class="mob"><b>Работаем:</b> с 08:00 до 20:00</span>
			</div>
			
			<div class="topinfo">
				<span class="callback bluron" onclick="$('.cback').fadeIn(300); return false;">Заказать обратный звонок</span>
				<span class="time"><b>Работаем:</b> с 08:00 до 20:00</span>
			</div>
		</div>
		
		<div class="butsearch">
			<span class="seron bluron" onclick="$('.serblock').fadeIn(300); return false;"></span>
		</div>
		
		<div class="topcart">
			<div id="cart_informer">
				<?php echo $_smarty_tpl->getSubTemplate ('cart_informer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>

		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('categories.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0), 0);?>


	
	<?php if ($_smarty_tpl->tpl_vars['module']->value=='MainView') {?>
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	<?php } elseif ($_smarty_tpl->tpl_vars['module']->value=='PageView'||$_smarty_tpl->tpl_vars['module']->value=='BlogView'||$_smarty_tpl->tpl_vars['module']->value=='ProductsView'||$_smarty_tpl->tpl_vars['module']->value=='RegisterView'||$_smarty_tpl->tpl_vars['module']->value=='UserView'||$_smarty_tpl->tpl_vars['module']->value=='LoginView'||$_smarty_tpl->tpl_vars['module']->value=='ProductView'||$_smarty_tpl->tpl_vars['module']->value=='FeedbackView') {?>
		<div class="max pad-t-30 pad-b-50">
			<div class="contable<?php if ($_smarty_tpl->tpl_vars['module']->value=='ProductView') {?> pro<?php }?>">
				<div class="sidebar">
					<div>
						<?php echo $_smarty_tpl->getSubTemplate ('sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					</div>
				</div>
				<div class="content">
					<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

				</div>
			</div>
		</div>
	<?php } elseif ($_smarty_tpl->tpl_vars['module']->value=='PhotoView'||$_smarty_tpl->tpl_vars['module']->value=='CartView'||$_smarty_tpl->tpl_vars['module']->value=='OrderView') {?>
		<div class="max pad-t-30 pad-b-50">
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</div>
	<?php } else { ?>
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	<?php }?>
	
	<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
</div>

<?php if (empty($_smarty_tpl->tpl_vars['module']->value)) {?>

<div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},500);};</script>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ('modal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0), 0);?>


<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/slick.min.js" type="text/javascript"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/smarty.js"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery-ui.min.js"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/ajax_cart.js"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/product_to_session.js"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/readmore.js"></script>
<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
<script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jTabs.js"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery.maskedinput-1.2.2.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,800&subset=cyrillic" rel="stylesheet">
<link href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 
<?php if ($_smarty_tpl->tpl_vars['module']->value=='MainView'||$_smarty_tpl->tpl_vars['module']->value=='ProductView'||$_smarty_tpl->tpl_vars['module']->value=='PhotoView'||$_smarty_tpl->tpl_vars['page']->value->url=='reviews'||$_smarty_tpl->tpl_vars['module']->value=='BlogView') {?>
<link href="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/css/jquery.fancybox.min.css" rel="stylesheet">
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery.fancybox.min.js"></script>
<?php } elseif ($_smarty_tpl->tpl_vars['module']->value=='CartView') {?>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/timedropper.min.js"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/datedropper.min.js"></script>
<link href="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/css/timedropper.min.css" rel="stylesheet" type="text/css" /> 
<link href="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/css/datedropper.min.css" rel="stylesheet" type="text/css" /> 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['category']->value) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->brands||$_smarty_tpl->tpl_vars['category']->value->whoms||$_smarty_tpl->tpl_vars['category']->value->events||$_smarty_tpl->tpl_vars['features']->value) {?>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery-ui-1.9.0.custom.min.js"  type="text/javascript"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/filter.min.js"  type="text/javascript"></script>
<?php }?>
<?php } else { ?>
<?php if ($_smarty_tpl->tpl_vars['brands']->value||$_smarty_tpl->tpl_vars['whoms']->value||$_smarty_tpl->tpl_vars['events']->value||$_smarty_tpl->tpl_vars['features']->value) {?>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery-ui-1.9.0.custom.min.js"  type="text/javascript"></script>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/filter.min.js"  type="text/javascript"></script>
<?php }?>
<?php }?> 
<?php if ($_smarty_tpl->tpl_vars['page']->value->url=='reviews'||$_smarty_tpl->tpl_vars['module']->value=='PhotoView'||$_smarty_tpl->tpl_vars['module']->value=='ProductView'||$_smarty_tpl->tpl_vars['module']->value=='MainView') {?>
<?php if ($_smarty_tpl->tpl_vars['module']->value!=='MainView') {?><script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/fileinput.js"></script><?php }?>
<?php if ($_smarty_tpl->tpl_vars['module']->value=='ProductView') {?><script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/product.js"  type="text/javascript"></script><?php }?>
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/masonry.pkgd.min.js"></script>
<?php }?>
<link rel="stylesheet" href="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/css/jquery.mmenu.all.css?v=<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp3=ob_get_clean();?><?php echo filemtime("design/".$_tmp3."/css/jquery.mmenu.all.css");?>
" type="text/css" />
<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery.mmenu.all.min.js" type="text/javascript"></script>

 
 <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47411374 = new Ya.Metrika2({
                    id:47411374,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47411374" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

</body>
</html><?php }} ?>
