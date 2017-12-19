<?php
	session_start();
	require_once('../api/Simpla.php');
	$simpla = new Simpla();
	$variant = $simpla->variants->get_variant($simpla->request->get('variant', 'integer'));
	if(!$variant) exit;
	$simpla->cart->add_item($simpla->request->get('variant', 'integer'), $simpla->request->get('amount', 'integer'), $simpla->request->get('properties'));
	$cart = $simpla->cart->get_cart();
	$simpla->design->assign('cart', $cart);
	
	$currencies = $simpla->money->get_currencies(array('enabled'=>1));
	if(isset($_SESSION['currency_id']))
		$currency = $simpla->money->get_currency($_SESSION['currency_id']);
	else
		$currency = reset($currencies);

	$simpla->design->assign('currency',	$currency);
	
	// Связанные товары
	$related_ids = array();
	$related_products = array();
	
	foreach($simpla->products->get_related_products($variant->product_id) as $p){
		$related_ids[$p->related_id] = $p->related_id;
	}

	if($related_ids){
		foreach($simpla->products->get_products(array('id'=>$related_ids, 'visible'=>1)) as $p){
			$p->images = $p->variants = array();
			$related_products[$p->id] = $p;
		}
		
		if($related_products){
			foreach($simpla->products->get_images(array('product_id'=>array_keys($related_products))) as $image)
				$related_products[$image->product_id]->images[] = $image;
				
			foreach($simpla->variants->get_variants(array('product_id'=>array_keys($related_products), 'in_stock'=>1)) as $variant)
				$related_products[$variant->product_id]->variants[] = $variant;

			foreach($related_products as &$p){
				if($p->images) 
					$p->image = reset($p->images);
				if($p->variants) 
					$p->variant = reset($p->variants);
			}
		}
	}
	
	$simpla->design->assign('informer_related_products', $related_products);
	
	$result = $simpla->design->fetch('cart_informer.tpl');
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($result);
