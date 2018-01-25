<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	//header("Pragma: no-cache");
	header("Expires: -1");

	require_once('../../api/Simpla.php');
	$simpla = new Simpla();
	
	$menu = new stdClass;
	$menus = $simpla->pages->get_menus();
	$simpla->design->assign('menus', $menus);
		
	//if ($simpla->request->method('post'))
	//{
		$menu->id = $simpla->request->post('id', 'integer');
		$menu->parent_id = $simpla->request->post('parent_id', 'integer');
		$menu->group_id = $simpla->request->post('group_id', 'integer');
		$menu->name = $simpla->request->post('name');
		$menu->visible = $simpla->request->post('visible', 'boolean');
		$menu->url = $simpla->request->post('url');	
		$menu->onclick = $simpla->request->post('onclick');	
		$menu->style = $simpla->request->post('style');	

		$simpla->design->assign('menu', $menu);
		$menu->id = $simpla->dmenus->add_menu($menu);
			
			$result = array('additeam'=> $simpla->design->fetch('../design/html/additeam.tpl'));
			header("Content-type: application/json; charset=UTF-8");
			header("Cache-Control: must-revalidate");
			header("Pragma: no-cache");
			header("Expires: -1");		
			print json_encode($result);
	
	//}


