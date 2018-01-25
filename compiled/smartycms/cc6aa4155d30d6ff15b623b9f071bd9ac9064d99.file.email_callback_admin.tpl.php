<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:38:34
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/simpla/design/html/email_callback_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17583774345a2d7f2a692ff9-15229823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc6aa4155d30d6ff15b623b9f071bd9ac9064d99' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/simpla/design/html/email_callback_admin.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17583774345a2d7f2a692ff9-15229823',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'callback' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d7f2a6db414_58656294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7f2a6db414_58656294')) {function content_5a2d7f2a6db414_58656294($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Заявка на обратный звонок от ".((string)htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->name, ENT_QUOTES, 'UTF-8', true)), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<h1 style='font-weight:normal;font-family:arial;'>Заявка на обратный звонок от <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
<table cellpadding=6 cellspacing=0 style='border-collapse: collapse;'>
  <tr>
    <td style='padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
      Имя
    </td>
    <td style='padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->name, ENT_QUOTES, 'UTF-8', true);?>

    </td>
  </tr>
  <tr>
    <td style='padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
      Телефон
    </td>
    <td style='padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
     <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->phone, ENT_QUOTES, 'UTF-8', true);?>

    </td>
  </tr>
  <tr>
    <td style='padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
      Сообщение:
    </td>
    <td style='padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
       <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['callback']->value->message, ENT_QUOTES, 'UTF-8', true));?>
</a>
    </td>
  </tr>
</table><?php }} ?>
