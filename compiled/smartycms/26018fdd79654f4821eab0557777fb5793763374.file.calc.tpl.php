<?php /* Smarty version Smarty-3.1.18, created on 2017-12-10 21:11:41
         compiled from "/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/calc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8989331635a2d78ddf2e8c2-50203027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26018fdd79654f4821eab0557777fb5793763374' => 
    array (
      0 => '/home/s/svprim4w/svprim4w.beget.tech/public_html/design/smartycms/html/calc.tpl',
      1 => 1512928511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8989331635a2d78ddf2e8c2-50203027',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a2d78ddf30e49_08472347',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d78ddf30e49_08472347')) {function content_5a2d78ddf30e49_08472347($_smarty_tpl) {?><script>
$(function(){

	var price = parseInt($(".calcitog").text());
	var compareprice = parseInt($(".clcomp").text());
	var quantity = parseInt($(".addcalc").val());	
	
	$(".calcitog").text(price.toLocaleString());
	$(".clcomp").text(compareprice.toLocaleString());
	
	$(".calcbutton").click(function(){
		var quantity = parseInt($(".addcalc").val());
		var str = price*quantity;
		var oldstr = compareprice*quantity;
		
		$(".calcitog").text(str.toLocaleString());
		$(".clcomp").text(oldstr.toLocaleString());
	});
	
});
</script>
<input type="text" class="add_input addcalc" name="amount" value="1">
<input type=button value="-" class="add add1 calcbutton" onclick="javascript:this.form.amount.value= this.form.amount.value<=1 ? 1 :parseInt(this.form.amount.value)-1 ;">
<input type=button value="+" class="add add2 calcbutton" onclick="javascript:this.form.amount.value= this.form.amount.value>=1000 ? 1000 :parseInt(this.form.amount.value)+1 ;"><?php }} ?>
