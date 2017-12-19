{$subject="Администратор магазина оставил ответ на Ваш комментарий" scope=parent}

<h1 style="font-weight:normal;font-family:arial;">Ваш комментарий получил ответ администратора магазина</h1>

<div style="font-family:arial; font-size: 11pt;">Уважаемый(ая) {$comment->name|escape}! На ваш комментарий
{if $comment->type == 'product'}
к товару <a target="_blank" href="{$config->root_url}/products/{$comment->product->url}#comment_{$comment->id}">{$comment->product->name}</a>
{elseif $comment->type == 'blog'}
к статье <a target="_blank" href="{$config->root_url}/blog/{$comment->post->url}#comment_{$comment->id}">{$comment->post->name}</a>
{/if}
от {$comment->date|date} {$comment->date|time} с текстом:</div>
<span style="font-family:arial; font-size: 10pt; font-style:italic; padding-left:30px">{$comment->text|escape|nl2br}</span> 

<div style="font-family:arial; font-size: 11pt; padding-top: 10px;">получен официальный ответ:</div>
<span style="font-family:arial; font-size: 10pt; font-style:italic; padding-left:30px">{$comment->otvet|escape|nl2br}</span> 

<div style="font-family:arial; font-size: 10pt; padding-top: 20px;">Посмотреть
{if $comment->type == 'product'}
<a target="_blank" href="{$config->root_url}/products/{$comment->product->url}#comment_{$comment->id}">комментарий к товару</a>
{elseif $comment->type == 'blog'}
<a target="_blank" href="{$config->root_url}/blog/{$comment->post->url}#comment_{$comment->id}">комментарий к статье</a>
{/if}
или перейти в <a href="{$config->root_url}">Магазин</a>
</div>