<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

	chdir('..');
	require_once('api/Simpla.php');
	$simpla = new Simpla();
	
		$ourl = $simpla->request->post('ourl');
		$simpla->design->assign('ourl', $ourl);
		
		$dabla = $simpla->orders->get_orders(array('url' => $ourl));
		$simpla->design->assign('dabla', $dabla);

	if ($simpla->request->method('post') && $simpla->request->post('ourl'))
	{
		if($dabla)
		{
			$result = array('ourl'=> $simpla->design->fetch('ajax_order.tpl'));
			header("Content-type: application/json; charset=UTF-8");
			header("Cache-Control: must-revalidate");
			header("Pragma: no-cache");
			header("Expires: -1");		
			print json_encode($result);
		}
		else
		{
			$result2 = ('<span>Заказа с таким номером нет</span>');
			print ($result2);
		}	
	}