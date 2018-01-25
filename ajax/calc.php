<?php
	chdir('..');
	require_once('api/Simpla.php');
	$simpla = new Simpla();
	
	$productid = $simpla->request->get('productid', 'integer');
	
	$result = array('scriptblock'=> $simpla->design->fetch('calc.tpl'));
	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		
	print json_encode($result);
	
