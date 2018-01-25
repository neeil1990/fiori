<?php



class Properties extends Simpla
{
  

	public function get_property($id)
	{

		$query = $this->db->placehold("SELECT id, name, product_id, price FROM __properties WHERE id=? LIMIT 1", intval($id));

		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_properties( $filter = array() )
	{
		$enabled_filter = '';
		if(!empty($filter['product_id']))
			$enabled_filter = $this->db->placehold('AND product_id=?', intval($filter['product_id']));
			
		$query = "SELECT id, name, product_id, price
					FROM __properties WHERE 1 $enabled_filter ORDER BY id";
	
		$this->db->query($query);
		
		return $this->db->results();
	}
  
  
	public function update_property($id, $property)
	{
		$query = $this->db->placehold("UPDATE __properties SET ?% WHERE id in(?@)", $property, (array)$id);
		$this->db->query($query);
		return $id;
	}
	
	public function add_property($property)
	{	
		$query = $this->db->placehold('INSERT INTO __properties
		SET ?%',
		$property);

		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		return $id;
	}

	public function delete_property($id)
	{
		$query = $this->db->placehold("DELETE FROM __properties WHERE product_id=?", intval($id));
		$this->db->query($query);
	}	

	
}