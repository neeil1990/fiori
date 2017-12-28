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
	'mctnam'=> $simpla->design->fetch('minicart/mctnam.tpl'), 
	'mcitogo'=> $simpla->design->fetch('minicart/mcitogo.tpl'), 
	'cione'=> $simpla->design->fetch('minicart/cione.tpl'), 
	'citwo'=> $simpla->design->fetch('minicart/citwo.tpl'), 
	'total_mcprice'=>$simpla->design->fetch('minicart/total_mcprice.tpl')
	);
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");
	print json_encode($result);

	
	
	