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

class Events extends Simpla
{
	/*
	*
	* Функция возвращает массив брендов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_events($filter = array())
	{
		$events = array();
		$category_id_filter = '';
		$visible_filter = '';
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=?', intval($filter['visible']));
		
		if(!empty($filter['category_id']))
			$category_id_filter = $this->db->placehold("LEFT JOIN __products p ON p.event_id=e.id LEFT JOIN __products_categories pc ON p.id = pc.product_id WHERE pc.category_id in(?@) $visible_filter", (array)$filter['category_id']);

		// Выбираем все бренды
		$query = $this->db->placehold("SELECT DISTINCT e.id, e.name, e.url, e.meta_title, e.meta_keywords, e.meta_description, e.description, e.image
								 		FROM __events e $category_id_filter ORDER BY e.name");
		$this->db->query($query);

		return $this->db->results();
	}

	public function get_events_category($filter = array())
	{
		$brands = array();
		$category_id_filter = '';
		$visible_filter = '';
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND p.visible=?', intval($filter['visible']));

		if(!empty($filter['category_id']))
			$category_id_filter = $this->db->placehold("
			LEFT JOIN s_products p ON p.id=bp.product_id
			LEFT JOIN s_events b ON b.id=bp.event_id
			LEFT JOIN s_products_categories pc ON p.id = pc.product_id
			WHERE pc.category_id in(?@) $visible_filter", (array)$filter['category_id']);

		// Выбираем все бренды
		$query = $this->db->placehold("SELECT DISTINCT b.id, b.name, b.url, b.meta_title, b.meta_keywords, b.meta_description, b.description, b.image
								 		FROM __events_products bp $category_id_filter ORDER BY b.name");
		$this->db->query($query);

		return $this->db->results();
	}

	//Добавить бренд к заданному товару
	public function add_product_event($product_id, $brand_id)
	{
		$query = $this->db->placehold("INSERT IGNORE INTO __events_products SET product_id=?, event_id=?", $product_id, $brand_id);
		$this->db->query($query);
	}

	// Функция возвращает массив брендов
	public function get_events_product($filter = array())
	{
		if(!empty($filter['product_id']))
		{
			$query = $this->db->placehold("SELECT event_id FROM __events_products WHERE product_id in(?@) ORDER BY id", (array)$filter['product_id']);
			$this->db->query($query);
			$brands_ids = $this->db->results('event_id');
			if(is_array($brands_ids) and !empty($brands_ids))
			{
				foreach($brands_ids as $b)
				{
					$x = new stdClass;
					$x->id = $b;
					$pb[] = $x;
				}
				$result = $pb;

				return $result;
			}else{
				$x = new stdClass;
				$x->id = 0;
				return array($x);
			}
		}
	}

	/*
	*
	* Функция возвращает бренд по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_event($id)
	{
		if(is_int($id))			
			$filter = $this->db->placehold('e.id = ?', $id);
		else
			$filter = $this->db->placehold('e.url = ?', $id);
		$query = "SELECT e.id, e.name, e.url, e.meta_title, e.meta_keywords, e.meta_description, e.description, e.image
								 FROM __events e WHERE $filter LIMIT 1";
		$this->db->query($query);
		return $this->db->result();
	}

	/*
	*
	* Добавление бренда
	* @param $event
	*
	*/
	public function add_event($event)
	{
		$event = (array)$event;
		if(empty($event['url']))
		{
			$event['url'] = preg_replace("/[\s]+/ui", '_', $event['name']);
			$event['url'] = strtolower(preg_replace("/[^0-9a-zа-я_]+/ui", '', $event['url']));
		}
	
		$this->db->query("INSERT INTO __events SET ?%", $event);
		return $this->db->insert_id();
	}

	/*
	*
	* Обновление бренда(ов)
	* @param $event
	*
	*/		
	public function update_event($id, $event)
	{
		$query = $this->db->placehold("UPDATE __events SET ?% WHERE id=? LIMIT 1", $event, intval($id));
		$this->db->query($query);
		return $id;
	}
	
	/*
	*
	* Удаление бренда
	* @param $id
	*
	*/	
	public function delete_event($id)
	{
		if(!empty($id))
		{
			$this->delete_image($id);	
			$query = $this->db->placehold("DELETE FROM __events WHERE id=? LIMIT 1", $id);
			$this->db->query($query);		
			$query = $this->db->placehold("UPDATE __products SET event_id=NULL WHERE event_id=?", $id);
			$this->db->query($query);	
		}
	}
	
	/*
	*
	* Удаление изображения бренда
	* @param $id
	*
	*/
	public function delete_image($event_id)
	{
		$query = $this->db->placehold("SELECT image FROM __events WHERE id=?", intval($event_id));
		$this->db->query($query);
		$filename = $this->db->result('image');
		if(!empty($filename))
		{
			$query = $this->db->placehold("UPDATE __events SET image=NULL WHERE id=?", $event_id);
			$this->db->query($query);
			$query = $this->db->placehold("SELECT count(*) as count FROM __events WHERE image=? LIMIT 1", $filename);
			$this->db->query($query);
			$count = $this->db->result('count');
			if($count == 0)
			{			
				@unlink($this->config->root_dir.$this->config->events_images_dir.$filename);		
			}
		}
	}

}