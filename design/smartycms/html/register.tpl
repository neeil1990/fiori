{$canonical="/user/register" scope=parent}
{$meta_title = "Регистрация" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>Регистрация</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">Регистрация</h1>

{if $error}
<div class="message_error">
	{if $error == 'empty_name'}Введите имя
	{elseif $error == 'empty_email'}Введите email
	{elseif $error == 'empty_password'}Введите пароль
	{elseif $error == 'user_exists'}Пользователь с таким email уже зарегистрирован
	{elseif $error == 'captcha'}Неверно введена капча
	{else}{$error}{/if}
</div>
{/if}

<form class="formuserpage" method="post">
	<ul class="export">
		<li>
			<label>Имя <span>*</span></label>
			<input type="text" name="name" data-format=".+" data-notice="Введите имя" value="{$name|escape}" maxlength="255" />
		</li>
		<li>
			<label>Email <span>*</span></label>
			<input type="text" name="email" data-format="email" data-notice="Введите email" value="{$email|escape}" maxlength="255" />
		</li>
		<li>
			<label>Телефон</label>
			<input class="regphone" type="text" name="phone" value="{$phone|escape}"  maxlength="255"/>
		</li>
		<li>
			<label>Пароль <span>*</span></label>
			<input type="password" name="password" data-format=".+" data-notice="Введите пароль" value="" />
		</li>
		<li>
			<input type="submit" class="knop next" name="register" value="Зарегистрироваться" />
		</li>
	</ul>
</form>
