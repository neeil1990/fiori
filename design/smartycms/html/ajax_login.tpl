{if $user}
<ul class="hidus">
	<li><a class="profile" href="user">Мой профиль</a></li>
	<li><a class="discount" href="user">Моя скидка - {if $group->discount}{$group->discount}{else}0{/if}%</a></li>
	<li><a class="logout" href="user/logout">Выйти</a></li>
</ul>
{if $uorders}
<ul class="uorders">
{foreach $uorders as $order}
	<li>
	{$order->date|date} <a href='order/{$order->url}'>Заказ №{$order->id}</a>
	{if $order->paid == 1}оплачен,{/if} 
	{if $order->status == 0}ждет обработки{elseif $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
	</li>
{/foreach}
</ul>
{/if}
{else}
{*<!--вход-->*}
<div id="slog">
	<div class="message_error" style="display:none"></div>
	
	<form method="post" class="login_form">
		<ul class="export">
			<li>
				<label>Ваш e-mail</label>
				<input id="login_email" class="on1" type="text" name="email" required placeholder="smartycms@yandex.ru" value="{$email|escape}" maxlength="255" />
			</li>
			<li>
				<label>Пароль <a href="/user/password_remind">Забыли?</a></label>
				<input id="login_password" class="on2" type="password" placeholder="password" required name="password" value="" />
			</li>
			<li>
				<button id="check_login" type="submit" name="login" value="" class="but loginclick">Авторизоваться</button>
				<a href="/user/register" class="modalreglink">Регистрация</a>
			</li>
		</ul>
	</form>
</div>
{*<!--end вход-->*}
{/if}