<?php
	chdir('..');
        require_once('api/Simpla.php');
        $simpla = new Simpla();

	$callback = new StdClass;
	$callback->email = $simpla->request->post('email');
	
	
	// ��������� �����
	$callback_id = $simpla->callbacks->add_callback($callback);
	
	// ��������� ����� � �����
	$simpla->callbacks->add_callback(array('email'=>$email));
	
	// ���������� ������ ��������������
	$simpla->callbacks->email_callback_admin($callback_id);
	

