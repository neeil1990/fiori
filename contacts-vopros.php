<?php
	chdir('..');
    require_once('api/Simpla.php');
    $simpla = new Simpla();
	
	if (array_key_exists('nameFF', $_POST)) {
	  mail ($simpla->settings->order_email,
			"Заполнена форма вопроса",
			"Имя: ".$_POST['nameFF'].
			"\nТелефон: ".$_POST['phoneFF'].
			"\nE-mail: ".$_POST['mailFF'].
			"\nСообщение: ".$_POST['messageFF']);
	  echo $_POST['nameFF'];
	}
?>