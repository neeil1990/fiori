<?php

/**
 * Simpla CMS
 *
 * @copyright	2014 Vadym Bakchinov
 *
 *
 */

require_once('Simpla.php');

class City extends Simpla
{

    public function add_city($city){
        if(is_array($city)){
            $this->db->query("INSERT INTO __city SET ?%", $city);
            return $this->db->insert_id();
        }
    }

    public function get_city($filter = array())
    {
        $is_visible = '';
        if(isset($filter['visible']))
            $is_visible = 'WHERE visible =1 ';

        $query = $this->db->placehold("SELECT DISTINCT * FROM __city $is_visible ORDER BY name_city");
        $this->db->query($query);
        return $this->db->results();
    }

    public function get_city_alias_filter($alias)
    {
        $alias = strip_tags(trim($alias));
        $query = "SELECT * FROM __city WHERE alias='$alias' AND visible = 1 ORDER BY name_city LIMIT 1";
        $this->db->query($query);
        $city = $this->db->result();
        return $city;
    }

    public function get_city_name_filter($name)
    {
        $name = strip_tags(trim($name));
        $query = "SELECT * FROM __city WHERE name_city='$name' AND visible = 1 ORDER BY name_city LIMIT 1";
        $this->db->query($query);
        $city = $this->db->result();
        return $city;
    }

    public function update_city($id, $city)
    {
        $query = $this->db->placehold("UPDATE __city SET ?% WHERE id=? LIMIT 1", $city, intval($id));
        $this->db->query($query);
        return $id;
    }

    public function delete_city($id)
    {
        if(!empty($id))
        {
            $query = $this->db->placehold("DELETE FROM __city WHERE id=? LIMIT 1", intval($id));
            $this->db->query($query);
        }
    }

    public function detect_city($ip){

        if(!isset($_COOKIE["city"])){
            $result = file_get_contents("http://ipgeobase.ru:7020/geo?ip=".$ip);
            $result = new SimpleXMLElement($result);
            $city = (string)$result->ip->city;
            if($city){
                setcookie("city", 1, time()+3600);
                $city = $this->get_city_name_filter($city);
                if($city->alias AND $_SERVER['HTTP_HOST'] != $city->alias){
                    header('Location: http://'.$city->alias, true, 302);
                    exit;
                }
            }
        }
    }

}