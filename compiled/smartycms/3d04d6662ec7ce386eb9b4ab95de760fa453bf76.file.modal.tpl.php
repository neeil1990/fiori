<?php /* Smarty version Smarty-3.1.18, created on 2018-02-09 14:00:33
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6986628655a7d7f51079df1-57444794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d04d6662ec7ce386eb9b4ab95de760fa453bf76' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/modal.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6986628655a7d7f51079df1-57444794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'keyword' => 0,
    'module' => 0,
    'page' => 0,
    'comment_name' => 0,
    'comment_email' => 0,
    'comment_text' => 0,
    'categories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a7d7f510b3d50_08429107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7d7f510b3d50_08429107')) {function content_5a7d7f510b3d50_08429107($_smarty_tpl) {?><div class="modalitem cback">
	<div class="modalclose"></div>
	<div class="modal">
		<div>
			<div class="modaltitle">
				Заказать звонок
				<span class="close bluroff" onclick="$('.cback').fadeOut(300); return false;"></span>
			</div>
			<div class="modalscroll">
				<form method="POST" id="feedback-form">
					<ul class="export">
						<li>
							<label>Имя</label>
							<input type="text" name="nameFF" required placeholder="Иванов Иван">
						</li>
						<li>
							<label>Телефон</label>
							<input id="phone" type="text" name="phoneFF" required placeholder="+7 (900) 900-90-90">
						</li>
						<li>
							<button type="submit" class="but" value="">Отправить</button>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modalitem vopros">
	<div class="modalclose"></div>
	<div class="modal">
		<div>
			<div class="modaltitle">
				Возникли вопросы?
				<span class="close bluroff" onclick="$('.vopros').fadeOut(300); return false;"></span>
			</div>
			<div class="modalscroll">
				<form method="POST" id="vopros-form">
					<ul class="export">
						<li>
							<label>Имя <span>*</span></label>
							<input type="text" name="nameFF" required="" placeholder="Иванов Иван">
						</li>
						<li>
							<label>Телефон <span>*</span></label>
							<input id="phone2" type="text" name="phoneFF" required="" placeholder="+7 (900) 900-90-90">
						</li>
						<li>
							<label>E-mail</label>
							<input type="text" name="mailFF" placeholder="support@smartycms.ru">
						</li>
						<li>
							<label>Опишите ваш вопрос <span>*</span></label>
							<textarea name="messageFF" required="" placeholder="....."></textarea>
						</li>
						<li>
							<button type="submit" class="but" value="">Отправить</button>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modalitem userprofile">
	<div class="modalclose"></div>
	<div class="modal">
		<div>
			<div class="modaltitle">
				<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
				<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>

				<?php } else { ?>
				Личный кабинет
				<?php }?>
				<span class="close bluroff" onclick="$('.userprofile').fadeOut(300); return false;"></span>
			</div>
			<div class="modalscroll">
				<div id="ajaxlogin">
					<?php echo $_smarty_tpl->getSubTemplate ("ajax_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="modalitem testorder">
	<div class="modalclose"></div>
	<div class="modal">
		<div>
			<div class="modaltitle">
				Проверка заказа
				<span class="close bluroff" onclick="$('.testorder').fadeOut(300); return false;"></span>
			</div>
			<div class="modalscroll">
				<div id="ajaxorder">
					<?php echo $_smarty_tpl->getSubTemplate ("ajax_order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</div>
			</div>
		</div>
	</div>
</div>



<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
<?php } else { ?>

<script>
$(function() {
	$('.login_form').submit(function(e) {
		e.preventDefault();
			 
		var s_data=$(this).serialize();
		$.ajax({
			type: 'POST',
			url: "ajax/login.php",
			data: s_data,
		success: function(data){
        if(data){
			$('#ajaxlogin').html(data.ajax_login);
			$('.message_error').show().html(data);
		}
		}
		});
	

	});
});
</script>

<?php }?>


<div class="modalitem send">
	<div class="modalclose"></div>
	<div class="modal">
		<div style="text-align: center;">
			<img class="icon icons8-Checkmark" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAC80lEQVR4Xu2c3XEaMRSFJVJAUopLwJl4Jl0EOrBLcQWbEvLqZIa4BEqJCwgKstkMMBjpaqU9ku7xm8fSvfj7dMSKn7WGP1ACFtqdzQ0FgBcBBVAAmAC4PRNAAWAC4PZMAAWACYDbMwEUACYAbs8EUACYALg9E0ABYALg9kwABYAJgNszARQAJgBuzwRQAJgAuD0TQAFgAuD2TAAFgAlMbL8c7m4W1n7brH4+pJRiAlKoHeYc4P+2xn5yxnzfrJ7W0nIUICV2Af5YIkUCBSQIOF7559OlEihAKOAa/JQkUIBAQAz8/xKcedysn+5D5SkgROjKnv/uVOde/hq3fF7/2obKU0CI0P7vkpVvBPB9awoICCgJnwLA8CngioDSK39szS3ogoS54DMBYPgUcCZgzpXPLagC+ExA4UNWxBGD5wDEtnMsRvVVEBq+6i2oBvhqBdQCX6WAmuCrE1AbfFUCaoSvRkCt8FUIqBl+9wJqh9+1gBbgdyugFfiTBHwe7lY7Y7Yx7/zHvCiVa0xL8JMFePjWLgZn3J+dc7e1SGgNfpKAEf64YmuR0CJ8sYBz+LVIaBW+SMB78NESWoYfLSAEHyWhdfjZBfiCcz0n9AA/WoAfGJuCOST0Al8koBYJPcEXC0BL6A1+kgCUhB7hJwuYW0Kv8CcJ8JO/DF+Xzux+GGs/hl7LSb066hn+ZAG+gAf0wdjnEhJ6h59FQCkJGuBnE5Bbghb4WQXkkqAJfnYBUyVog19EQKoEP29/15HXG1+ErqikXwUN1gMOKPbpaOnV0dtq0AW/WALGBSWRELUIhV+CjqoJHlQsAdkldAi/eAKySegU/mwCpE/MJ7tCx/BnFZAkoXP4swsQSVAAHyIgSoIS+DABVyUogg8VcFGCMvhwAScS9r/E3uYLfHbK2r74QSzm0foTsx9Xy4d8Yx5zrjFVCMj1z7RYhwLA1iiAAsAEwO2ZAAoAEwC3ZwIoAEwA3J4JoAAwAXB7JoACwATA7ZkAsIB/NOr5f8KRYVsAAAAASUVORK5CYII=" width="96" height="96" alt="Успешно!">
			<br/>
			<b>Заявка принята!</b>
			<p>В ближайшее время с вами свяжется наш менеджер!</p>
			<br/>
			<span class="link bluroff" onclick="$('.send').fadeOut(300); return false;">Закрыть</span>
		</div>
	</div>
</div>


<div class="modalitem serblock">
	<div class="modalclose"></div>
	<div class="bsear">
		<div>
			<span class="close bluroff" onclick="$('.serblock').fadeOut(300); return false;"></span>
			<div class="podsearchgorm">
				<form action="products" class="searchform">
					<input class="input_search" type="text" name="keyword" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Поиск товара"/>
					<input class="button_search" value="" type="submit" />
				</form>
			</div>
		</div>
	</div>
</div>


<?php if ($_smarty_tpl->tpl_vars['module']->value=='ProductView') {?>
<div class="modalitem oneclick">
	<div class="modalclose"></div>
	<div class="modal">
		<div>
			<div class="modaltitle">
				Быстрый заказ товара
				<span class="close bluroff" onclick="$('.oneclick').fadeOut(300); return false;"></span>
			</div>
			<div class="modalscroll">
				<form class="oneclickform">
					<ul class="export">
						<li>
							<label>Имя <span>*</span></label>
							<input class="onename" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" type="text" placeholder="Введите ваше имя" required />
						</li>
						<li>
							<label>Телефон <span>*</span></label>
							<input id="oneclickphone" class="onephone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->phone, ENT_QUOTES, 'UTF-8', true);?>
" type="text" placeholder="Введите номер моб.телефона" required />
						</li>
						<li>
							<label>Адрес доставки</label>
							<input class="oneaddress" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->address, ENT_QUOTES, 'UTF-8', true);?>
" type="text" placeholder="Введите адрес доставки" />
						</li>
						<li>
							<label>Ваш комментарий</label>
							<textarea placeholder="Ваш комментарий:" class="onecomment" id="user_comment" name="comment" data-notice="Введите комментарий"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->comment, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
						</li>
						<li>
							<button type="submit" class="but oneclickbuy" value="">Заказать</button>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$('.oneclickform').submit(function(e) {
			if($('.variants').find('input[name=variant]:checked').size()>0) variant = $('.variants input[name=variant]:checked').val();
			if($('.variants').find('select[name=variant]').size()>0)
			variant = $('.variants').find('select').val();
			$.ajax({
				type: "post",
				url: "/ajax/oneclick.php",
				data: {amount: 1, variant: variant, name: $('.onename').val() , phone: $('.onephone').val() , address: $('.oneaddress').val() , comment: $('.onecomment').val()},
				dataType: 'json'
			});
			$(".oneclick").fadeOut(300),
			setTimeout('$(".send").fadeIn(300)', 300),
			setTimeout('$(".send").fadeOut(300)', 3500),
			setTimeout('$(".blurs").removeClass("blur")', 3500);
			jQuery('.oneclickform')[0].reset();
			return false;
		});
	});
</script>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['module']->value=='ProductView'||$_smarty_tpl->tpl_vars['page']->value->url=='reviews'||$_smarty_tpl->tpl_vars['module']->value=='PhotoView') {?>
<div class="modalitem addrevproduct">
	<div class="modalclose"></div>
	<div class="modal">
		<div>
			<div class="modaltitle">
				Новый отзыв
				<span class="close bluroff" onclick="$('.addrevproduct').fadeOut(300); return false;"></span>
			</div>
			<div class="modalscroll">
				<form enctype="multipart/form-data" method="post">
					<ul class="export">
						<li>
							<label>Имя <span>*</span></label>
							<input type="text" id="comment_name" name="name" placeholder="Введите иия" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment_name']->value, ENT_QUOTES, 'UTF-8', true);?>
" required/>
						</li>
						<li>
							<label>Ваш e-mail</label>
							<input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['comment_email']->value;?>
" placeholder="Введите e-mail" />  
						</li>
						<?php if ($_smarty_tpl->tpl_vars['module']->value!=='PhotoView') {?>
						<li>
							<label>Фото</label>
							<input class='upload_image' name="image" id="file" type="file">
						</li>
						
						<li class="addrate">
							<label><?php if ($_smarty_tpl->tpl_vars['module']->value=='ProductView') {?>Оцените товар<?php } elseif ($_smarty_tpl->tpl_vars['page']->value->url=='reviews') {?>Ваша оценка<?php }?></label>
							<div id="reviewStars-input" class="prod">
								<input id="star-4" type="radio" name="rate" value="5"/>
								<label title="gorgeous" for="star-4"></label>

								<input id="star-3" type="radio" name="rate" value="4"/>
								<label title="good" for="star-3"></label>

								<input id="star-2" type="radio" name="rate" value="3"/>
								<label title="regular" for="star-2"></label>

								<input id="star-1" type="radio" name="rate" value="2"/>
								<label title="poor" for="star-1"></label>

								<input id="star-0" type="radio" name="rate" value="1"/>
								<label title="bad" for="star-0"></label>
							</div>
						</li>
						<?php }?>
						<li>
							<label>Ваш отзыв</label>
							<textarea id="comment_text" name="text" placeholder="Введите отзыв" required><?php echo $_smarty_tpl->tpl_vars['comment_text']->value;?>
</textarea>
						</li>
						<li>
							<input class="frbutton" type="submit" name="comment" value="Оставить отзыв" />
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>
<?php }?>

<div class="podmenumob">
	<div class="podmenumobclose"></div>
	<span class="close bluroff" onclick="$('.podmenumob').fadeOut(300); return false;"></span>
	<div class="mobmenublock">
	</div>
</div>

<div class="podmmenu podmmenupage bluroff"></div>
<div class="mmenu mmenupage">
	<div class="mmnav mmnavpage">
	</div>
</div>

<div class="podmmenu podmmenucat bluroff"></div>
<div class="mmenu mmenucat">
	<?php echo $_smarty_tpl->getSubTemplate ('mmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0), 0);?>

</div><?php }} ?>
