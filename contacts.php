<?php
	chdir('..');
    require_once('api/Simpla.php');
    $simpla = new Simpla();
	
	if (array_key_exists('nameFF', $_POST)) {
	  mail ($simpla->settings->order_email,
			"заполнена форма заказа звонка",
			"Имя: ".$_POST['nameFF'].
			"\nТелефон: ".$_POST['phoneFF']);
	  echo $_POST['nameFF'];
	}
?>