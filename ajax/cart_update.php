<?php
	session_start();
	chdir('..');
	require_once('api/Simpla.php');
	$simpla = new Simpla();

    $new_variant_id = $simpla->request->get('new_variant_id');
    $amount     = $simpla->request->get('amount',     'integer');
    $remove_id  = $simpla->request->get('remove_id');
	
    // Если есть amount, обновляем их
    if($amount && $new_variant_id){
       $simpla->cart->update_item($new_variant_id, $amount);
       $variant = $simpla->variants->get_variants(array('id'=>$new_variant_id));
       $simpla->design->assign('amount',  $_SESSION['shopping_cart'][$new_variant_id]);
		if($_SESSION['shopping_boxing'][$new_variant_id]){
			$variant[0]->price += $_SESSION['shopping_boxing'][$new_variant_id]['price'];
			if($variant[0]->compare_price){
				$variant[0]->compare_price += $_SESSION['shopping_boxing'][$new_variant_id]['price'];
			}
		}
       $simpla->design->assign('variant', $variant[0]);
    }

	// Способы доставки
    $deliveries = $simpla->delivery->get_deliveries(array('enabled'=>1));
    $simpla->design->assign('deliveries', $deliveries);
	foreach($deliveries as $delivery)
	
	// Способы оплаты
	$delivery->payment_methods = $simpla->payment->get_payment_methods(array('delivery_id'=>$delivery->id, 'enabled'=>1));
	
    // Если есть remove
    if($remove_id)
      $simpla->cart->delete_item($remove_id);

	$cart = $simpla->cart->get_cart();
	$simpla->design->assign('cart', $cart);

	$currencies = $simpla->money->get_currencies(array('enabled'=>1));
	if(isset($_SESSION['currency_id']))
		$currency = $simpla->money->get_currency($_SESSION['currency_id']);
	else
		$currency = reset($currencies);

	$simpla->design->assign('currency',	  $currency);

	$result = array(
	'total_products'=> $simpla->design->fetch('cart_total_products.tpl'), 
	'delivery' => $simpla->design->fetch('cart_deliveries.tpl'), 
	'total_price'=>$simpla->design->fetch('cart_total_price.tpl'),
	'total_cost'=>$simpla->design->fetch('cart_total_cost.tpl'), 
	'summ_skidka'=>$simpla->design->fetch('cart_summ_skidka.tpl'), 
	'cup'=>$simpla->design->fetch('cart_cup.tpl'), 
	'skidka'=>$simpla->design->fetch('cart_skidka.tpl'), 
	'informer'=>$simpla->design->fetch('cart_informer.tpl'),
	'carmobitog'=>$simpla->design->fetch('cart_carmobitog.tpl'),
	);
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");
	print json_encode($result);

	
	
	