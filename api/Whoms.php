<?php

/**
 * Simpla CMS
 *
 * @copyright	2011 Denis Pikusov
 * @link		http://simplacms.ru
 * @author		Denis Pikusov
 *
 */

require_once('Simpla.php');

class Whoms extends Simpla
{
	/*
	*
	* Функция возвращает массив брендов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_whoms($filter = array())
	{
		$whoms = array();
		$category_id_filter = '';
		$visible_filter = '';
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=?', intval($filter['visible']));
		
		if(!empty($filter['category_id']))
			$category_id_filter = $this->db->placehold("LEFT JOIN __products p ON p.whom_id=w.id LEFT JOIN __products_categories pc ON p.id = pc.product_id WHERE pc.category_id in(?@) $visible_filter", (array)$filter['category_id']);

		// Выбираем все бренды
		$query = $this->db->placehold("SELECT DISTINCT w.id, w.name, w.url, w.meta_title, w.meta_keywords, w.meta_description, w.description, w.image
								 		FROM __whoms w $category_id_filter ORDER BY w.name");
		$this->db->query($query);

		return $this->db->results();
	}

	/*
	*
	* Функция возвращает бренд по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_whom($id)
	{
		if(is_int($id))			
			$filter = $this->db->placehold('w.id = ?', $id);
		else
			$filter = $this->db->placehold('w.url = ?', $id);
		$query = "SELECT w.id, w.name, w.url, w.meta_title, w.meta_keywords, w.meta_description, w.description, w.image
								 FROM __whoms w WHERE $filter LIMIT 1";
		$this->db->query($query);
		return $this->db->result();
	}

	/*
	*
	* Добавление бренда
	* @param $whom
	*
	*/
	public function add_whom($whom)
	{
		$whom = (array)$whom;
		if(empty($whom['url']))
		{
			$whom['url'] = preg_replace("/[\s]+/ui", '_', $whom['name']);
			$whom['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $whom['url']));
		}
	
		$this->db->query("INSERT INTO __whoms SET ?%", $whom);
		return $this->db->insert_id();
	}

	/*
	*
	* Обновление бренда(ов)
	* @param $whom
	*
	*/		
	public function update_whom($id, $whom)
	{
		$query = $this->db->placehold("UPDATE __whoms SET ?% WHERE id=? LIMIT 1", $whom, intval($id));
		$this->db->query($query);
		return $id;
	}
	
	/*
	*
	* Удаление бренда
	* @param $id
	*
	*/	
	public function delete_whom($id)
	{
		if(!empty($id))
		{
			$this->delete_image($id);	
			$query = $this->db->placehold("DELETE FROM __whoms WHERE id=? LIMIT 1", $id);
			$this->db->query($query);		
			$query = $this->db->placehold("UPDATE __products SET whom_id=NULL WHERE whom_id=?", $id);
			$this->db->query($query);	
		}
	}
	
	/*
	*
	* Удаление изображения бренда
	* @param $id
	*
	*/
	public function delete_image($whom_id)
	{
		$query = $this->db->placehold("SELECT image FROM __whoms WHERE id=?", intval($whom_id));
		$this->db->query($query);
		$filename = $this->db->result('image');
		if(!empty($filename))
		{
			$query = $this->db->placehold("UPDATE __whoms SET image=NULL WHERE id=?", $whom_id);
			$this->db->query($query);
			$query = $this->db->placehold("SELECT count(*) as count FROM __whoms WHERE image=? LIMIT 1", $filename);
			$this->db->query($query);
			$count = $this->db->result('count');
			if($count == 0)
			{			
				@unlink($this->config->root_dir.$this->config->whoms_images_dir.$filename);		
			}
		}
	}

}