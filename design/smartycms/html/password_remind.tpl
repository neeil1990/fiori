{$canonical="/user/password_remind" scope=parent}
{$meta_title = "Восстановление пароля" scope=parent}

{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>Восстановление пароля</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

{if $email_sent}
<h1 class="phead">Вам отправлено письмо</h1>
<p>На {$email|escape} отправлено письмо для восстановления пароля.</p>
{else}
<h1 class="phead">Восстановление пароля</h1>

{if $error}
<div class="message_error">
	{if $error == 'user_not_found'}Пользователь не найден
	{else}{$error}{/if}
</div>
{/if}

<form class="formuserpage" method="post">
	<ul class="export">
		<li>
			<label>Email</label>
			<input type="text" name="email" data-format="email" data-notice="Введите email" value="{$email|escape}"  maxlength="255"/>
		</li>
		<li>
			<input type="submit" class="knop next" value="Вспомнить" />
		</li>
	</ul>
</form>
{/if}