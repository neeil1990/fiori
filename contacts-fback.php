<?php
	chdir('..');
    require_once('api/Simpla.php');
    $simpla = new Simpla();
	
if (array_key_exists('nameFF', $_POST)) {
  mail ($simpla->settings->order_email,
        "заполнена форма обратной связи",
        "Имя: ".$_POST['nameFF'].
		"\nE-mail: ".$_POST['mailFF'].
		"\nТовар: ".$_POST['uslugaFF'].
		"\nUrl адрес: ".$_POST['urlFF'].
		"\nСообщение: ".$_POST['messageFF'].
		"\nТелефон: ".$_POST['contactFF']);
  echo $_POST['nameFF'];
}
?>