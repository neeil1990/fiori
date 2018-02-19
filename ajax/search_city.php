<?php
require_once('../api/Simpla.php');
$simpla = new Simpla();
$limit = 30;

$keyword = $simpla->request->get('query', 'string');
$kw = $simpla->db->escape($keyword);
$simpla->db->query("SELECT id, alias, name_city FROM __city
	                  WHERE (name_city LIKE '%$kw%') AND visible=1 ORDER BY name_city LIMIT ?", $limit);
$citys = $simpla->db->results();

$suggestions = array();

foreach($citys as $city)
{
    $suggestion = new stdClass();
    $suggestion->value = $city->name_city;
    $suggestion->link = $city->alias;
    $suggestions[] = $suggestion;
}
$res = new stdClass;
$res->query = $keyword;
$res->suggestions = $suggestions;
header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");
print json_encode($res);
