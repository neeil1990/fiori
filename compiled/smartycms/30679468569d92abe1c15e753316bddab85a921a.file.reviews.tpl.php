<?php /* Smarty version Smarty-3.1.18, created on 2017-12-14 11:09:03
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/reviews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76269045a32319f8b9697-58345760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30679468569d92abe1c15e753316bddab85a921a' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/reviews.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76269045a32319f8b9697-58345760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a32319f952659_04058858',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a32319f952659_04058858')) {function content_5a32319f952659_04058858($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="rev_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>
	Введите имя
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_comment') {?>
	Введите комментарий
	<?php }?>
</div>
<?php }?>




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
						<div class="comrate">
							<div class="rating" <?php if ($_smarty_tpl->tpl_vars['comment']->value->rate==1) {?>data-tip="Ужасно!"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==2) {?>data-tip="Плохо"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==3) {?>data-tip="Нормально"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==4) {?>data-tip="Хорошо"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==5) {?>data-tip="Отлично!"<?php } else { ?>data-tip="Рейтин не установлен"<?php }?>>
								<div class="rat"<?php if ($_smarty_tpl->tpl_vars['comment']->value->rate==1) {?>style="width: 20%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==2) {?>style="width: 40%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==3) {?>style="width: 60%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==4) {?>style="width: 80%;"<?php } elseif ($_smarty_tpl->tpl_vars['comment']->value->rate==5) {?>style="width: 100%;"<?php }?>></div>
							</div>
						</div>
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
	Пока нет отзывов...
	<?php }?>
</div>










<?php }} ?>
