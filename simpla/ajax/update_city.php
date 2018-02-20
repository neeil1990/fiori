<?php

session_start();

require_once('../../api/Simpla.php');

$simpla = new Simpla();

// Проверка сессии для защиты от xss
if(!$simpla->request->check_session())
{
    trigger_error('Session expired', E_USER_WARNING);
    exit();
}

$id = intval($simpla->request->post('id'));
$values = $simpla->request->post('values');

$result = $simpla->city->update_city($id, $values);

header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");
$json = json_encode($result);
print $json;