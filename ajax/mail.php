<?php
	chdir('..');
        require_once('api/Simpla.php');
        $simpla = new Simpla();

	$callback = new StdClass;
	$callback->email = $simpla->request->post('email');
	
	
	// добавляем заказ
	$callback_id = $simpla->callbacks->add_callback($callback);
	
	// добавляем товар в заказ
	$simpla->callbacks->add_callback(array('email'=>$email));
	
	// отправляем письмо администратору
	$simpla->callbacks->email_callback_admin($callback_id);
	

