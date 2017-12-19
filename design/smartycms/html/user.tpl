{* Шаблон страницы зарегистрированного пользователя *}
{*<!-- Хлебные крошки -->*}
<ul class="path">
	<li><a href="/">{$settings->site_name}</a></li>
	<li><span>Личный кабинет {$user->name|escape}</span></li>
</ul>
{*<!-- END Хлебные крошки -->*}

<h1 class="phead">{$user->name|escape}</h1>

<div class="uskid mar-b-30">
Моя персональная скидка - {if $group->discount}{$group->discount}{else}0{/if}%
</div>

{if $error}
<div class="message_error">
	{if $error == 'empty_name'}Введите имя
	{elseif $error == 'empty_email'}Введите email
	{elseif $error == 'empty_password'}Введите пароль
	{elseif $error == 'user_exists'}Пользователь с таким email уже зарегистрирован
	{else}{$error}{/if}
</div>
{/if}

<div class="reuser mar-b-15">
	<a class="knop" href="#" onclick="$('.formuserpage').slideToggle(300); return false;">Редактировать мои данные</a>
</div>

<form class="formuserpage" method="post" style="display: none;">
	<ul class="export">
		<li>
			<label>Имя</label>
			<input data-format=".+" data-notice="Введите имя" value="{$name|escape}" name="name" maxlength="255" type="text"/>
		</li>
		<li>
			<label>Email</label>
			<input data-format="email" data-notice="Введите email" value="{$email|escape}" name="email" maxlength="255" type="text"/>
		</li>
		<li>
			<label>Телефон</label>
			<input class="regphone" value="{$phone|escape}" name="phone" maxlength="255" type="text"/>
		</li>
		<li>
			<label>Пароль</label>
			<input id="password" value="" name="password" type="password"/>
		</li>
		<li>
			<input type="submit" class="knop next" value="Сохранить" />
		</li>
	</ul>
</form>

{if $orders}
<p></p>
<h2>Ваши заказы</h2>
<ul class="uorders userpage">
{foreach $orders as $order}
	<li>
	{$order->date|date} <a href='order/{$order->url}'>Заказ №{$order->id}</a>
	{if $order->paid == 1}оплачен,{/if} 
	{if $order->status == 0}ждет обработки{elseif $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
	</li>
{/foreach}
</ul>
{else}
<div class="mar-t-30">Вы еще не делали заказов в нашем интернет-магазине</div>
{/if}