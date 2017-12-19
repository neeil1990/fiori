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

class Photo extends Simpla
{

	/*
	*
	* Функция возвращает пост по его id или url
	* (в зависимости от типа аргумента, int - id, string - url)
	* @param $id id или url поста
	*
	*/
	public function get_album($id)
	{
		if(is_int($id))
			$where = $this->db->placehold(' WHERE b.id=? ', intval($id));
		else
			$where = $this->db->placehold(' WHERE b.url=? ', $id);
		
		$query = $this->db->placehold("SELECT b.id, b.url, b.name, b.image, b.annotation, b.text, b.meta_title,
		                               b.meta_keywords, b.meta_description, b.visible, b.date
		                               FROM __photo b $where LIMIT 1");
		if($this->db->query($query))
			return $this->db->result();
		else
			return false; 
	}
	
	/*
	*
	* Функция возвращает массив постов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function get_albums($filter = array())
	{	
		// По умолчанию
		$limit = 1000;
		$page = 1;
		$album_id_filter = '';
		$visible_filter = '';
		$keyword_filter = '';
		$albums = array();
		
		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));

		if(!empty($filter['id']))
			$album_id_filter = $this->db->placehold('AND b.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND b.visible = ?', intval($filter['visible']));		
		
		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
				$keyword_filter .= $this->db->placehold('AND (b.name LIKE "%'.$this->db->escape(trim($keyword)).'%" OR b.meta_keywords LIKE "%'.$this->db->escape(trim($keyword)).'%") ');
		}

		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);

		$query = $this->db->placehold("SELECT b.id, b.url, b.name, b.image, b.annotation, b.text,
		                                      b.meta_title, b.meta_keywords, b.meta_description, b.visible,
		                                      b.date
		                                      FROM __photo b WHERE 1 $album_id_filter $visible_filter $keyword_filter
		                                      ORDER BY date DESC, id DESC $sql_limit");
		
		$this->db->query($query);
		return $this->db->results();
	}
	
	
	
	public function get_photos($filter = array())
	{		
		$limit = 1000;
		$page = 1;
		$album_id_filter = '';
		$group_by = '';

		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));
		
		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));
		
		//if(!empty($filter['product_id']))
		//	$product_id_filter = $this->db->placehold('AND i.product_id in(?@)', (array)$filter['product_id']);

		// images
		$sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);
		$query = $this->db->placehold("SELECT b.id, b.album_id, b.name, b.filename, b.position
									FROM __images_album AS b WHERE 1 $album_id_filter $group_by ORDER BY b.album_id, b.position, id DESC $sql_limit");
		$this->db->query($query);
		return $this->db->results();
	}
	
	
	
	/*
	*
	* Функция вычисляет количество постов, удовлетворяющих фильтру
	* @param $filter
	*
	*/
	public function count_albums($filter = array())
	{	
		$album_id_filter = '';
		$visible_filter = '';
		$keyword_filter = '';
		
		if(!empty($filter['id']))
			$album_id_filter = $this->db->placehold('AND b.id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND b.visible = ?', intval($filter['visible']));		

		if(isset($filter['keyword']))
		{
			$keywords = explode(' ', $filter['keyword']);
			foreach($keywords as $keyword)
				$keyword_filter .= $this->db->placehold('AND (b.name LIKE "%'.$this->db->escape(trim($keyword)).'%" OR b.meta_keywords LIKE "%'.$this->db->escape(trim($keyword)).'%") ');
		}
		
		$query = "SELECT COUNT(distinct b.id) as count
		          FROM __photo b WHERE 1 $album_id_filter $visible_filter $keyword_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
	
	/*
	*
	* Создание поста
	* @param $album
	*
	*/	
	public function add_album($album)
	{	
		if(!isset($album->date))
			$date_query = ', date=NOW()';
		else
			$date_query = '';
		$query = $this->db->placehold("INSERT INTO __photo SET ?% $date_query", $album);
		
		if(!$this->db->query($query))
			return false;
		else
			return $this->db->insert_id();
	}
	
	
	/*
	*
	* Обновить пост(ы)
	* @param $album
	*
	*/	
	public function update_album($id, $album)
	{
		$query = $this->db->placehold("UPDATE __photo SET ?% WHERE id in(?@) LIMIT ?", $album, (array)$id, count((array)$id));
		$this->db->query($query);
		return $id;
	}


	/*
	*
	* Удалить пост
	* @param $id
	*
	*/	
	public function delete_album($id)
	{
		if(!empty($id))
		{
			$images = $this->get_images(array('album_id'=>$id));
				foreach($images as $i)
					$this->delete_image($i->id);
		
			$query = $this->db->placehold("DELETE FROM __photo WHERE id=? LIMIT 1", intval($id));
			$this->delete_image($id);
			if($this->db->query($query))
			{
				$query = $this->db->placehold("DELETE FROM __comments WHERE type='photo' AND object_id=?", intval($id));
				if($this->db->query($query))
					return true;
			}							
		}
		return false;
	}	
	
	function get_images($filter = array())
	{		
		$album_id_filter = '';
		$group_by = '';

		if(!empty($filter['album_id']))
			$album_id_filter = $this->db->placehold('AND i.album_id in(?@)', (array)$filter['album_id']);

		// images
		$query = $this->db->placehold("SELECT i.id, i.album_id, i.name, i.filename, i.position
									FROM __images_album AS i WHERE 1 $album_id_filter $group_by ORDER BY i.album_id, i.position");
		$this->db->query($query);
		return $this->db->results();
	}
	
	public function add_image($album_id, $filename, $name = '')
	{
		$query = $this->db->placehold("SELECT id FROM __images_album WHERE album_id=? AND filename=?", $album_id, $filename);
		$this->db->query($query);
		$id = $this->db->result('id');
		if(empty($id))
		{
			$query = $this->db->placehold("INSERT INTO __images_album SET album_id=?, filename=?", $album_id, $filename);
			$this->db->query($query);
			$id = $this->db->insert_id();
			$query = $this->db->placehold("UPDATE __images_album SET position=id WHERE id=?", $id);
			$this->db->query($query);
		}
		return($id);
	}
	
	public function update_image($id, $image)
	{
	
		$query = $this->db->placehold("UPDATE __images_album SET ?% WHERE id=?", $image, $id);
		$this->db->query($query);
		
		return($id);
	}
	
	public function delete_image($id)
	{
		$query = $this->db->placehold("SELECT filename FROM __images_album WHERE id=?", $id);
		$this->db->query($query);
		$filename = $this->db->result('filename');
		$query = $this->db->placehold("DELETE FROM __images_album WHERE id=? LIMIT 1", $id);
		$this->db->query($query);
		$query = $this->db->placehold("SELECT count(*) as count FROM __images_album WHERE filename=? LIMIT 1", $filename);
		$this->db->query($query);
		$count = $this->db->result('count');
		if($count == 0)
		{			
			$file = pathinfo($filename, PATHINFO_FILENAME);
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			
			// Удалить все ресайзы
			$rezised_images = glob($this->config->root_dir.$this->config->photo_images_dir.$file."*.".$ext);
			if(is_array($rezised_images))
			foreach (glob($this->config->root_dir.$this->config->photo_images_dir.$file."*.".$ext) as $f)
				@unlink($f);

			@unlink($this->config->root_dir.$this->config->original_images_dir.$filename);		
		}
	}
	

	/*
	*
	* Следующий пост
	* @param $album
	*
	*/	
	public function get_next_album($id)
	{
		$this->db->query("SELECT date FROM __photo WHERE id=? LIMIT 1", $id);
		$date = $this->db->result('date');

		$this->db->query("(SELECT id FROM __photo WHERE date=? AND id>? AND visible  ORDER BY id limit 1)
		                   UNION
		                  (SELECT id FROM __photo WHERE date>? AND visible ORDER BY date, id limit 1)",
		                  $date, $id, $date);
		$next_id = $this->db->result('id');
		if($next_id)
			return $this->get_album(intval($next_id));
		else
			return false; 
	}
	
	/*
	*
	* Предыдущий пост
	* @param $album
	*
	*/	
	public function get_prev_album($id)
	{
		$this->db->query("SELECT date FROM __photo WHERE id=? LIMIT 1", $id);
		$date = $this->db->result('date');

		$this->db->query("(SELECT id FROM __photo WHERE date=? AND id<? AND visible ORDER BY id DESC limit 1)
		                   UNION
		                  (SELECT id FROM __photo WHERE date<? AND visible ORDER BY date DESC, id DESC limit 1)",
		                  $date, $id, $date);
		$prev_id = $this->db->result('id');
		if($prev_id)
			return $this->get_album(intval($prev_id));
		else
			return false; 
	}
}
