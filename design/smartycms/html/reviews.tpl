{if $error}
<div class="rev_error">
	{if $error=='empty_name'}
	Введите имя
	{elseif $error=='empty_comment'}
	Введите комментарий
	{/if}
</div>
{/if}

{*
<div class="addrev">
<div class="podtable">
	<div class="formreviews">
		<form enctype="multipart/form-data" method="post">
			<div class="reform">
				<div class="frtd frtd1 ">
					<label>Ваше имя</label>
					<input type="text" id="comment_name" name="name" placeholder="Введите иия" value="{$comment_name|escape}" required/>
					<br/><br/>
					<label>Ваш e-mail</label>
					<input type="text" name="email" value="{$comment_email}" placeholder="Введите e-mail" />  
					<br/><br/>
					<label>Фото</label>
					<input class='upload_image' name="image" id="file" type="file">
				</div>
				<br/><br/>
				<div class="frtd frtd2">
					<label>Ваш отзыв</label>
					<textarea id="comment_text" name="text" placeholder="Введите отзыв" required>{$comment_text}</textarea>

					<div id="reviewStars-input">
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

					<input class="frbutton" type="submit" name="comment" value="Оставить отзыв" />
				</div>
			</div>
		</form>
	</div>
</div>
</div>
*}


<div class="alllink photoalllink mar-b-50 pad-t-30">
	<a href="#" class="bluron" onclick="$('.addrevproduct').fadeIn(300); return false;"><b>Отзывы</b><span>{$comments|count}</span><b>Добавить свой</b></a>
</div>


{literal}
<script>
$(document).ready(function() {
	fileInput();
	$('.zcomments').masonry({
	  itemSelector: '.cgrid'
	});
});

</script>
{/literal}



<div id="zcomments">
	{if $comments}
	<div class="zcomments">
		{foreach $comments as $comment}
		<div class="cgrid">
			<div>
				<div class="retable">
					{if $comment->image}
					<div class="rtd rtdimg">
						<a href="{$comment->image|resizepost:1920:0}" data-fancybox="example-set"><img src="{$comment->image|resizepost:100:100}" alt="" /></a>
					</div>
					{/if}
					<div class="rtd rtdcom">
						<b>{$comment->name|escape}</b>
						<div class="comrate">
							<div class="rating" {if $comment->rate==1}data-tip="Ужасно!"{elseif $comment->rate==2}data-tip="Плохо"{elseif $comment->rate==3}data-tip="Нормально"{elseif $comment->rate==4}data-tip="Хорошо"{elseif $comment->rate==5}data-tip="Отлично!"{else}data-tip="Рейтин не установлен"{/if}>
								<div class="rat"{if $comment->rate==1}style="width: 20%;"{elseif $comment->rate==2}style="width: 40%;"{elseif $comment->rate==3}style="width: 60%;"{elseif $comment->rate==4}style="width: 80%;"{elseif $comment->rate==5}style="width: 100%;"{/if}></div>
							</div>
						</div>
						{$comment->text|escape|nl2br}
						{if $comment->otvet|escape|nl2br}
						<div class="readmins">
						<b>Ответ администратора</b>
						{$comment->otvet|escape|nl2br}
						</div>
						{/if}
					</div>
				</div>
				
			</div>
		</div>
		{/foreach}
	</div>
	{else}
	Пока нет отзывов...
	{/if}
</div>










