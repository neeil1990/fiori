<?php /* Smarty version Smarty-3.1.18, created on 2018-02-11 02:05:48
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15853085795a7f7acc17dc66-15155632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2936b9bcf8696d583a27dab14c9391653ebf2494' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/album.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15853085795a7f7acc17dc66-15155632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'album' => 0,
    'settings' => 0,
    'image' => 0,
    'comments' => 0,
    'error' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7f7acc26ca32_67004609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7f7acc26ca32_67004609')) {function content_5a7f7acc26ca32_67004609($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/photo/".((string)$_smarty_tpl->tpl_vars['album']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>


<ul class="path">
	<li><a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a></li>
	<li><a href="/photo">Фотогаллерея</a></li>
	<li><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
</ul>


<h1 class="phead"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<p><?php echo $_smarty_tpl->tpl_vars['album']->value->text;?>
</p>

<div class="allbumshare mar-b-50 pad-t-30">
	<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
	<script src="//yastatic.net/share2/share.js"></script>
	<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,viber,whatsapp,telegram"></div>
</div>

<div class="albumphoto">
<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['album']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
	<div class="grid3">
		<div>
			<a class="mainphotoiteam" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizealbum'][0][0]->resize_modifier_album($_smarty_tpl->tpl_vars['image']->value->filename,1920,0);?>
" data-fancybox="example-set-<?php echo $_smarty_tpl->tpl_vars['album']->value->id;?>
">
				<span>
				<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizealbum'][0][0]->resize_modifier_album($_smarty_tpl->tpl_vars['image']->value->filename,300,0);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
				</span>
			</a>
		</div>
	</div>
<?php } ?>
</div>



<script>
$(window).load(function() {
	$('.albumphoto').masonry({
	  itemSelector: '.grid3'
	});
});
</script>





<div class="alllink photoalllink mar-b-50 pad-t-30">
	<a href="#" class="bluron" onclick="$('.addrevproduct').fadeIn(300); return false;"><b>Отзывы</b><span><?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
</span><b>Добавить свой</b></a>
</div>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="rev_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>
	Введите имя
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_comment') {?>
	Введите комментарий
	<?php }?>
</div>
<?php }?>




<script>
$(document).ready(function() {
	$('.zcomments').masonry({
	  itemSelector: '.cgrid'
	});
});

</script>




<div id="zcomments">
	<?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
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
" data-fancybox="example-set"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resizepost'][0][0]->resize_modifier_post($_smarty_tpl->tpl_vars['comment']->value->image,100,100);?>
" alt="" /></a>
					</div>
					<?php }?>
					<div class="rtd rtdcom">
						<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b>
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
	<?php } else { ?>
	<div style="padding: 15px;">Пока нет отзывов...</div>
	<?php }?>
</div><?php }} ?>
