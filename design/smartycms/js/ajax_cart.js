// Аяксовая корзина
$('form.variants').live('submit', function(e) {
	e.preventDefault();
	button = $(this).find('input[type="submit"]');
	if($(this).find('input[name=variant]:checked').size()>0)
		variant = $(this).find('input[name=variant]:checked').val();
	if($(this).find('select[name=variant]').size()>0)
		variant = $(this).find('select').val();

	if($(this).find('input[name=box]:checked').size()>0)
		box = $(this).find('input[name=box]:checked').val();
	if($(this).find('select[name=box]').size()>0)
		box = $(this).find('.selectbox').val();
	
		var properties = new Array();
		$(this).find("input[name='properties[]']:checked").each(function (i, o) { 
			properties.push( $(o).val() ); 
		});

	console.log(box);


	$.ajax({
		url: "ajax/cart.php",
		data: {variant: variant,box: box,properties: properties,amount: $(this).find('input[name="amount"]').val()},
		dataType: 'json',
		success: function(data){
			$('#cart_informer').html(data);
			if(button.attr('data-result-text'))
				button.val(button.attr('data-result-text'));
			$('.minicart').fadeIn(300);
			$('.minicart').removeClass('hides');
		}
	});
	var o1 = $(this).offset();
	var o2 = $('#cart_informer').offset();
	var dx = o1.left - o2.left;
	var dy = o1.top - o2.top;
	var distance = Math.sqrt(dx * dx + dy * dy);
	$(this).closest('.product').find('.image img').effect("transfer", { to: $("#cart_informer"), className: "transfer_class" }, distance);
	$('.transfer_class').html($(this).closest('.product').find('.image').html());
	$('.transfer_class').find('img').css('height', '100%');
	return false;
});

