<?php /* Smarty version Smarty-3.1.18, created on 2017-12-13 18:44:28
         compiled from "simpla/design/html/album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6991326105a314adc9b5ac3-64055793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc9855334a58fd0245ee18fdf5cb01dce35145c7' => 
    array (
      0 => 'simpla/design/html/album.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6991326105a314adc9b5ac3-64055793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'album' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'album_images' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a314adca561b4_05133702',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a314adca561b4_05133702')) {function content_5a314adca561b4_05133702($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li class="active"><a href="index.php?module=PhotoAdmin">Фотоальбом</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['album']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['album']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый альбом', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>


<?php echo $_smarty_tpl->getSubTemplate ('tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<script src="design/js/jquery/datepicker/jquery.ui.datepicker-ru.js"></script>

<script>
$(function() {

	$('input[name="date"]').datepicker({
		regional:'ru'
	});

	// Сортировка изображений
	$(".images ul").sortable({ tolerance: 'pointer'});

	// Удаление изображений
	$(".images a.delete").live('click', function() {
		 $(this).closest("li").fadeOut(200, function() { $(this).remove(); });
		 return false;
	});
	// Загрузить изображение с компьютера
	$('#upload_image').click(function() {
		$("<input class='upload_image' name=images[] type=file multiple  accept='image/jpeg,image/png,image/gif'>").appendTo('div#add_image').focus().click();
	});

	// Или перетаскиванием
	if(window.File && window.FileReader && window.FileList)
	{
		$("#dropZone").show();
		$("#dropZone").on('dragover', function (e){
			$(this).css('border', '1px solid #8cbf32');
		});
		$(document).on('dragenter', function (e){
			$("#dropZone").css('border', '1px dotted #8cbf32').css('background-color', '#c5ff8d');
		});
	
		dropInput = $('.dropInput').last().clone();
		
		function handleFileSelect(evt){
			var files = evt.target.files; // FileList object
			// Loop through the FileList and render image files as thumbnails.
		    for (var i = 0, f; f = files[i]; i++) {
				// Only process image files.
				if (!f.type.match('image.*')) {
					continue;
				}
			var reader = new FileReader();
			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					// Render thumbnail.
					$("<li class=wizard><a href='' class='delete'><img src='design/images/cross-circle-frame.png'></a><img onerror='$(this).closest(\"li\").remove();' src='"+e.target.result+"' /><input name=images_urls[] type=hidden value='"+theFile.name+"'></li>").appendTo('div .images ul');
					temp_input =  dropInput.clone();
					$('.dropInput').hide();
					$('#dropZone').append(temp_input);
					$("#dropZone").css('border', '1px solid #d0d0d0').css('background-color', '#ffffff');
					clone_input.show();
		        };
		      })(f);
		
		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		}
		$('.dropInput').live("change", handleFileSelect);
	};
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Автозаполнение мета-тегов
	meta_title_touched = true;
	meta_keywords_touched = true;
	meta_description_touched = true;
	url_touched = true;
	
	if($('input[name="meta_title"]').val() == generate_meta_title() || $('input[name="meta_title"]').val() == '')
		meta_title_touched = false;
	if($('input[name="meta_keywords"]').val() == generate_meta_keywords() || $('input[name="meta_keywords"]').val() == '')
		meta_keywords_touched = false;
	if($('textarea[name="meta_description"]').val() == generate_meta_description() || $('textarea[name="meta_description"]').val() == '')
		meta_description_touched = false;
	if($('input[name="url"]').val() == generate_url() || $('input[name="url"]').val() == '')
		url_touched = false;
		
	$('input[name="meta_title"]').change(function() { meta_title_touched = true; });
	$('input[name="meta_keywords"]').change(function() { meta_keywords_touched = true; });
	$('textarea[name="meta_description"]').change(function() { meta_description_touched = true; });
	$('input[name="url"]').change(function() { url_touched = true; });
	
	$('input[name="name"]').keyup(function() { set_meta(); });
	$('select[name="brand_id"]').change(function() { set_meta(); });
	$('select[name="categories[]"]').change(function() { set_meta(); });
	
});

function set_meta()
{
	if(!meta_title_touched)
		$('input[name="meta_title"]').val(generate_meta_title());
	if(!meta_keywords_touched)
		$('input[name="meta_keywords"]').val(generate_meta_keywords());
	if(!meta_description_touched)
	{
		descr = $('textarea[name="meta_description"]');
		descr.val(generate_meta_description());
		descr.scrollTop(descr.outerHeight());
	}
	if(!url_touched)
		$('input[name="url"]').val(generate_url());
}

function generate_meta_title()
{
	name = $('input[name="name"]').val();
	return name;
}

function generate_meta_keywords()
{
	name = $('input[name="name"]').val();
	return name;
}

function generate_meta_description()
{
	if(typeof(tinyMCE.get("annotation")) =='object')
	{
		description = tinyMCE.get("annotation").getContent().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
		return description;
	}
	else
		return $('textarea[name=annotation]').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
}

function generate_url()
{
	url = $('input[name="name"]').val();
	url = url.replace(/[\s]+/gi, '-');
	url = translit(url);
	url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();	
	return url;
}

function translit(str)
{
	var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")   
	var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")   
 	var res = '';
	for(var i=0, l=str.length; i<l; i++)
	{ 
		var s = str.charAt(i), n = ru.indexOf(s); 
		if(n >= 0) { res += en[n]; } 
		else { res += s; } 
    } 
    return res;  
}

</script>


<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Альбом добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Альбом обновлен<?php }?></span>
	<a class="link" target="_blank" href="../photo/<?php echo $_smarty_tpl->tpl_vars['album']->value->url;?>
">Открыть альбом на сайте</a>
	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Альбом с таким адресом уже существует<?php }?></span>
	<?php if ($_GET['return']) {?>
		<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>
	</div>
<!-- Системное сообщение (The End)-->
<?php }?>


<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<div id="name">
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" <?php if ($_smarty_tpl->tpl_vars['album']->value->visible) {?>checked<?php }?>/> <label for="active_checkbox">Активен</label>
		</div>

	</div> 

	<!-- Левая колонка свойств товара -->
		<div class="block">
			<ul>
				<li><label class=property>Дата</label><input type=text name=date value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['album']->value->date);?>
'></li>
			</ul>
		</div>
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
		<!-- Параметры страницы (The End)-->
			<h2>seo параметры</h2>
		<!-- Параметры страницы -->
			<ul>
				<li><label class=property>Адрес</label><div class="page_url"> /photo/</div><input name="url" class="page_url" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Заголовок</label><input name="meta_title" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Ключевые слова</label><input name="meta_keywords"  type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Описание</label><textarea name="meta_description" /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea></li>
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->


			
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<!-- Правая колонка свойств товара -->	
	<div id="column_right">
	</div>
	<!-- Правая колонка свойств товара (The End)--> 
	
	<!-- Фото -->
	<div class="block layer images">
		<h2>Изображения</h2>
			<ul>
				<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['album_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
				<li>
					<a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,100,100);?>
" alt="" />
					<input type=hidden name='images[]' value='<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
'>
				</li>
				<?php } ?>
			</ul>
			<div id=dropZone>
				<div id=dropMessage>Перетащите файлы сюда</div>
				<input type="file" name="dropped_images[]" multiple class="dropInput">
			</div>
			<div id=add_image></div>
			<span class=upload_image><i class="dash_link" id="upload_image">Добавить изображение</i></span>
	</div>
	
	<!-- Описагние товара -->
	<div class="block layer">
		<h2>Краткое описание</h2>
		<textarea name="annotation" class='editor_small'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->annotation, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
	</div>
		
	<div class="block">
		<h2>Полное  описание</h2>
		<textarea name="body"  class='editor_large'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['album']->value->text, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
	</div>
	<!-- Описание товара (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->
<?php }} ?>
