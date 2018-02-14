<?php
	chdir('..');
    require_once('api/Simpla.php');
    $simpla = new Simpla();
	
	if (array_key_exists('nameFF', $_POST)) {

		$headers = "MIME-Version: 1.0\n" ;
		$headers .= "Content-type: text/html; charset=utf-8; \r\n";
		$headers .= 'From: '.$simpla->settings->notify_from_email.'\r\n';

	  mail ($simpla->settings->order_email,
			"заполнена форма заказа звонка",
			"Имя: ".$_POST['nameFF'].
			"\nТелефон: ".$_POST['phoneFF'],$headers);
	  echo $_POST['nameFF'];
	}
?>