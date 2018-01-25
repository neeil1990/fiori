<?php

/**
 * Simpla CMS
 *
 * @copyright	2011 Denis Pikusov
 * @link		http://simplacms.ru
 * @author		Denis Pikusov
 *
 */
 
require_once('Simpla.php');

class Cart extends Simpla
{

	/*
	*
	* Функция возвращает корзину
	*
	*/
	public function get_cart()
	{
		$cart = new stdClass();
		$cart->purchases = array();
		$cart->total_price = 0;
		$cart->total_products = 0;
		$cart->coupon = null;
		$cart->discount = 0;
		$cart->coupon_discount = 0;

		// Берем из сессии список variant_id=>amount
		if(!empty($_SESSION['shopping_cart']))
		{
			$session_items = $_SESSION['shopping_cart'];
			
			$session_properties = $_SESSION['shopping_properties'];

			$session_boxing = $_SESSION['shopping_boxing'];


			//$variants = $this->variants->get_variants(array('id'=>array_keys($session_items)));

			//if(!empty($variants))
			//{
 
				//foreach($variants as $variant)
				foreach( array_keys($session_items) as $si)
				{
					$session_items_keys = explode( '_', $si );
					$vi = reset($session_items_keys);

					$variant = $this->variants->get_variant($vi);

				
					if( !empty( $session_properties[$si] ) ) {
						$price = 0;
						foreach( $session_properties[$si] as $i )
							$price += $i['price'];
							
						$variant->price = $variant->price+$price;
					}

					if( !empty( $session_boxing[$si] ) ) {
							$price = 0;
							$price += $session_boxing[$si]['price'];
						$variant->price = $variant->price+$price;
					}
					
					$items[$si] = new stdClass();
					$items[$si]->variant = $variant;
					$items[$si]->amount = $session_items[$si];
					
					$items[$si]->properties = $session_properties[$si];
					$items[$si]->boxing = $session_boxing[$si];

					$products_ids[] = $variant->product_id;
				}

	
				$products = array();

				foreach($this->products->get_products_cart(array('id'=>$products_ids, 'limit' => count($products_ids))) as $p)
					$products[$p->id]=$p;
				
				$images = $this->products->get_images(array('product_id'=>$products_ids));
				foreach($images as $image)
					$products[$image->product_id]->images[$image->id] = $image;
			
			
				$properties_price = 0;
				foreach($items as $variant_id=>$item)
				{
					$purchase = null;
					if(!empty($products[$item->variant->product_id]))
					{
						$purchase = new stdClass();
						$purchase->product = $products[$item->variant->product_id];						
						$purchase->variant = $item->variant;
						$purchase->new_variant_id = $variant_id;
						$purchase->amount = $item->amount;

						$purchase->properties = $item->properties;
						if( $item->properties )
							foreach( $item->properties as $i )
								$properties_price += $i['price'];

						$purchase->boxing = $item->boxing;
						if( $item->boxing )
								$properties_price += $item->boxing['price'];


						$cart->purchases[] = $purchase;
						$cart->total_price += $item->variant->price*$item->amount;
						$cart->total_products += $item->amount;
					}
				}
				
				// Пользовательская скидка
				$cart->discount = 0;
				if(isset($_SESSION['user_id']) && $user = $this->users->get_user(intval($_SESSION['user_id'])))
					$cart->discount = $user->discount;
					
				$cart->total_price *= (100-$cart->discount)/100;
				
				// Скидка по купону
				if(isset($_SESSION['coupon_code']))
				{
					$cart->coupon = $this->coupons->get_coupon($_SESSION['coupon_code']);
					if($cart->coupon && $cart->coupon->valid && $cart->total_price>=$cart->coupon->min_order_price)
					{
						if($cart->coupon->type=='absolute')
						{
							// Абсолютная скидка не более суммы заказа
							$cart->coupon_discount = $cart->total_price>$cart->coupon->value?$cart->coupon->value:$cart->total_price;
							$cart->total_price = max(0, $cart->total_price-$cart->coupon->value);
						}
						else
						{
							$cart->coupon_discount = $cart->total_price * ($cart->coupon->value)/100;
							$cart->total_price = $cart->total_price-$cart->coupon_discount;
						}
					}
					else
					{
						unset($_SESSION['coupon_code']);
					}
				}
				
			//}
		}
			
		return $cart;
	}
	
	/*
	*
	* Добавление варианта товара в корзину
	*
	*/
	public function add_item($variant_id, $amount = 1, $properties = array(),$box )
	{ 
		$amount = max(1, $amount);
		
		if( !empty( $properties ) ) {
			$implode = implode('_', $properties );
			$new_variant_id = $variant_id . '_' . $implode;
		} else
			$new_variant_id = $variant_id;

	
		if(isset($_SESSION['shopping_cart'][$new_variant_id]))
      		$amount = max(1, $amount+$_SESSION['shopping_cart'][$new_variant_id]);

		// Выберем товар из базы, заодно убедившись в его существовании
		$variant = $this->variants->get_variant($variant_id);

		// Если товар существует, добавим его в корзину
		if(!empty($variant) && ($variant->stock>0) )
		{
			// Не дадим больше чем на складе
			$amount = min($amount, $variant->stock);
	     
			$_SESSION['shopping_cart'][$new_variant_id] = intval($amount); 
			$_SESSION['shopping_properties'][$new_variant_id] = '';
			$_SESSION['shopping_boxing'][$new_variant_id] = '';
			if( !empty( $properties ) ) {
				foreach( $properties as $p ) {
					$property = $this->properties->get_property( $p );
					$_SESSION['shopping_properties'][$new_variant_id][] = array('id' => $property->id, 'name' => $property->name, 'price' => $property->price);
				}
			}

			if( !empty( $box ) ) {
					$box = $this->boxing->get_box( $box );
					$_SESSION['shopping_boxing'][$new_variant_id] = array('id' => $box->id, 'name' => $box->name, 'price' => $box->price);
			}
			
			
		}
	}
	
	/*
	*
	* Обновление количества товара
	*
	*/
	public function update_item($variant_id, $amount = 1)
	{

		$parsed = explode( '_', $variant_id );
		$var_id = reset($parsed);
					
		$amount = max(1, $amount);
		
		// Выберем товар из базы, заодно убедившись в его существовании
		$variant = $this->variants->get_variant($var_id);

		// Если товар существует, добавим его в корзину
		if(!empty($variant) && $variant->stock>0)
		{
			// Не дадим больше чем на складе
			$amount = min($amount, $variant->stock);
	     
			$_SESSION['shopping_cart'][$variant_id] = intval($amount); 
		}
 
	}
	
	
	/*
	*
	* Удаление товара из корзины
	*
	*/
	public function delete_item($variant_id)
	{
		unset($_SESSION['shopping_cart'][$variant_id]); 
		unset($_SESSION['shopping_properties'][$variant_id]); 
		unset($_SESSION['shopping_boxing'][$variant_id]);
	}
	
	/*
	*
	* Очистка корзины
	*
	*/
	public function empty_cart()
	{
		unset($_SESSION['shopping_cart']);
		unset($_SESSION['shopping_properties']);
		unset($_SESSION['shopping_boxing']);
		unset($_SESSION['coupon_code']);
	}
 
	/*
	*
	* Применить купон
	*
	*/
	public function apply_coupon($coupon_code)
	{
		$coupon = $this->coupons->get_coupon((string)$coupon_code);
		if($coupon && $coupon->valid)
		{
			$_SESSION['coupon_code'] = $coupon->code;
		}
		else
		{
			unset($_SESSION['coupon_code']);
		}		
	}
}