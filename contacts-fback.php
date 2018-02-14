<?php
	chdir('..');
    require_once('api/Simpla.php');
    $simpla = new Simpla();
	
if (array_key_exists('nameFF', $_POST)) {

    $headers = "MIME-Version: 1.0\n" ;
    $headers .= "Content-type: text/html; charset=utf-8; \r\n";
    $headers .= 'From: '.$simpla->settings->notify_from_email.'\r\n';

  mail ($simpla->settings->order_email,
        "заполнена форма обратной связи",
        "Имя: ".$_POST['nameFF'].
		"\nE-mail: ".$_POST['mailFF'].
		"\nТовар: ".$_POST['uslugaFF'].
		"\nUrl адрес: ".$_POST['urlFF'].
		"\nСообщение: ".$_POST['messageFF'].
		"\nТелефон: ".$_POST['contactFF'],
        $headers);
  echo $_POST['nameFF'];
}

?>