<script>
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
<input type=button value="+" class="add add2 calcbutton" onclick="javascript:this.form.amount.value= this.form.amount.value>=1000 ? 1000 :parseInt(this.form.amount.value)+1 ;">