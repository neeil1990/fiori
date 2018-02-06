<div class="mainfeatured pad-t-50 pad-b-50 mar-t-70 mar-b-50">
	<div class="max">
		<form id="mail_form" class="mail_form validate" method="post">
			<div class="mailtable">
				<div class="mt_text">
					Подпишитесь на наши новости и акции!
				</div>
				
				<div>
					<span class="podimmail">
						<span class="nadoeda">Надоедать не будем :)</span>
						<input class="onemail" type="email" name="email" value="{$callback_email}" placeholder="E-mail" required/>
					</span>
				</div>
				
				<div class="mtbut">
					<button class="btnmail but" type="submit" name="callback" value="">Подписаться</button>
				</div>
			</div>
		</form>
		<div class='sendonecloic'>
			<b>Спасибо за подписку!</b>
			Теперь вы будете всегда в курсе новостей и акций нашего магазина
		</div>
	</div>
</div>

<div class="max">
	<div class="mobtable">
	
		<div class="zeblock">
			<div class="zenam">Компания</div>
			<div class="zenam mob">Компания</div>
			{get_dmenus var=dmenu3 group_id=3}
			{function name=dmenu_tree3}
				{if $dmenu3}
				<ul>
				{foreach $dmenu3 as $dm}
					{if $dm->visible}
						<li{if $dm->url == $smarty.server.REQUEST_URI} class="selected"{/if}>
							<a href="{$dm->url}">
								{if $dm->submenus}
								<span>{$dm->name|escape}</span>
								{else}
								{$dm->name|escape}
								{/if}
							</a>
						</li>
					{/if}
				{/foreach}
				</ul>
				{/if}
			{/function}
			{dmenu_tree3 dmenu3=$dmenu3}
		</div>
		
		<div class="zeblock">
			<div class="zenam">Каталог товаров</div>
			<div class="zenam mob">Каталог товаров</div>
			{function name=categories_tree}
				{if $categories}
					<ul>
						{foreach $categories as $c}
							{* Показываем только видимые категории *}
							{if $c->visible}
								<li{if $category->id == $c->id} class="selected"{/if}>
									<a href="catalog/{$c->url}" data-category="{$c->id}">{$c->name|escape}</a>
								</li>
							{/if}
						{/foreach}
					</ul>
				{/if}
			{/function}
			{categories_tree categories=$categories}
		</div>


		<div class="zeblock" style="margin: 145px 0px 0px 0px;">
			<script type="text/javascript" src="http://incut.prime-ltd.su/incut/incut.js" async></script>
			<link rel="stylesheet" href="http://incut.prime-ltd.su/incut/incut.css">
			<a class="prime-incut black colour marketing-only" style="margin: auto"></a>
		</div>

	</div>

	<div class="zecopy">
		{$settings->zcopy}
		<br/>
		{if $settings->vkontakte || $settings->twitter || $settings->instagram || $settings->youtube || $settings->facebook || $settings->odnoklassniki}
		<div class="socblock">
			{if $settings->vkontakte}<a href="https://vk.com/fiori36" target="_blank"><img src="design/{$settings->theme}/images/vk.png" alt="" /></a>{/if}
			{if $settings->twitter}<a href="{$settings->twitter}" target="_blank"><img src="design/{$settings->theme}/images/twitter.png" alt="" /></a>{/if}
			{if $settings->instagram}<a href="{$settings->instagram}" target="_blank"><img src="design/{$settings->theme}/images/instagram.png" alt="" /></a>{/if}
			{if $settings->youtube}<a href="{$settings->youtube}" target="_blank"><img src="design/{$settings->theme}/images/youtube.png" alt="" /></a>{/if}
			{if $settings->facebook}<a href="{$settings->facebook}" target="_blank"><img src="design/{$settings->theme}/images/facebook.png" alt="" /></a>{/if}
			{if $settings->odnoklassniki}<a href="{$settings->odnoklassniki}" target="_blank"><img src="design/{$settings->theme}/images/odnoklassniki.png" alt="" /></a>{/if}
		</div>
		{/if}
		<p>Цена на сайте может не соответсовать цене в магазине, уточняйте у менеджера.</p>
		<div class="socblock pay">
			<img src="design/{$settings->theme}/images/money1.png" alt="" />
			<img src="design/{$settings->theme}/images/money2.png" alt="" />
			<img src="design/{$settings->theme}/images/money3.png" alt="" />
			<img src="design/{$settings->theme}/images/money4.png" alt="" />
			<img src="design/{$settings->theme}/images/money5.png" alt="" />
		</div>
	</div>
	<div class="zecontact">
		<b>{$settings->zphone1}</b>
		<div>
			{$settings->zrezhim}
		</div>
		<span class="fotcall bluron" onclick="$('.cback').fadeIn(300); return false;">Заказать звонок</span>
		<span class="fotcall mail bluron" onclick="$('.vopros').fadeIn(300); return false;">Задать вопрос</span>
	</div>
</div>

