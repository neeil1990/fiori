{$canonical="/user/login" scope=parent}
{$meta_title = "Авторизация" scope=parent}
{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>Авторизация</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}


<h1 class="phead">Авторизация</h1>

{if $error}
<div class="message_error">
	{if $error == 'login_incorrect'}Неверный логин или пароль
	{elseif $error == 'user_disabled'}Ваш аккаунт еще не активирован.
	{else}{$error}{/if}
</div>
{/if}

<form class="formuserpage" method="post">
	<ul class="export">
		<li>
			<label>Email</label>
			<input type="text" name="email" data-format="email" data-notice="Введите email" value="{$email|escape}" maxlength="255" />
		</li>
		<li>
			<label>Пароль (<a href="user/password_remind">напомнить</a>)</label>
			<input type="password" name="password" data-format=".+" data-notice="Введите пароль" value="" />
		</li>
		<li>
			<input type="submit" class="knop next" name="login" value="Войти" />
		</li>
	</ul>
</form>