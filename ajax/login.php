<?php
	session_start();
	chdir('..');
	require_once('api/Simpla.php');
	$simpla = new Simpla();
	
	$email			= $simpla->request->post('email');
	$password		= $simpla->request->post('password');
	$simpla->design->assign('email', $email);
		
	if($user_id = $simpla->users->check_password($email, $password))
	{
		$user = $simpla->users->get_user($email);
		$simpla->design->assign('user',	$user);
		$uorders = $simpla->orders->get_orders(array('user_id'=>$user->id));
		$simpla->design->assign('uorders', $uorders);
	
		if($user->enabled)
		{
			$_SESSION['user_id'] = $user_id;
			$simpla->users->update_user($user_id, array('last_ip'=>$_SERVER['REMOTE_ADDR']));
			
			$result = array('ajax_login'=> $simpla->design->fetch('ajax_login.tpl'));
			header("Content-type: application/json; charset=UTF-8");
			header("Cache-Control: must-revalidate");
			header("Pragma: no-cache");
			header("Expires: -1");		
			print json_encode($result);
		}
		else
		{
			$result2 = array('NO USER');
			print json_encode($result2);
		}		
	}
	else
	{
		$result3 = ('<span>Не верный email или пароль</span>');
		print ($result3);
	}