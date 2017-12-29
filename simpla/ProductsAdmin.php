<?PHP 

require_once('api/Simpla.php');

class ProductsAdmin extends Simpla
{
	function fetch()
	{		

		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer'));
			
		$filter['limit'] = $this->settings->products_num_admin;
	
		// Категории
		$categories = $this->categories->get_categories_tree();
		$this->design->assign('categories', $categories);
		
		// Текущая категория
		$category_id = $this->request->get('category_id', 'integer'); 
		if($category_id && $category = $this->categories->get_category($category_id))
	  		$filter['category_id'] = $category->children;
		      
		// Бренды категории
		$brands = $this->brands->get_brands(array('category_id'=>$category_id));
		$this->design->assign('brands', $brands);
		
		// Все бренды
		$all_brands = $this->brands->get_brands();
		$this->design->assign('all_brands', $all_brands);
		
		// Текущий бренд
		$brand_id = $this->request->get('brand_id', 'integer'); 
		if($brand_id && $brand = $this->brands->get_brand($brand_id))
			$filter['brand_id'] = $brand->id;
		
		// События категории
		$events = $this->events->get_events(array('category_id'=>$category_id));
		$this->design->assign('events', $events);
		
		// Все события
		$all_events = $this->events->get_events();
		$this->design->assign('all_events', $all_events);
		
		// Текущее событие
		$event_id = $this->request->get('event_id', 'integer'); 
		if($event_id && $event = $this->events->get_event($event_id))
			$filter['event_id'] = $event->id;
		
		
		// Кому категории
		$whoms = $this->whoms->get_whoms(array('category_id'=>$category_id));
		$this->design->assign('whoms', $whoms);
		
		// Все кому
		$all_whoms = $this->whoms->get_whoms();
		$this->design->assign('all_whoms', $all_whoms);
		
		// Текущий кому
		$whom_id = $this->request->get('whom_id', 'integer'); 
		if($whom_id && $whom = $this->whoms->get_whom($whom_id))
			$filter['whom_id'] = $whom->id;
		
	
		// Текущий фильтр
		if($f = $this->request->get('filter', 'string'))
		{
			if($f == 'featured')
				$filter['featured'] = 1; 
			elseif($f == 'discounted')
				$filter['discounted'] = 1; 
			elseif($f == 'visible')
				$filter['visible'] = 1; 
			elseif($f == 'hidden')
				$filter['visible'] = 0;
			elseif($f == 'outofstock')
				$filter['in_stock'] = 0; 
			$this->design->assign('filter', $f);
		}
	
		// Поиск
		$keyword = $this->request->get('keyword');
		if(!empty($keyword))
		{
	  		$filter['keyword'] = $keyword;
			$this->design->assign('keyword', $keyword);
		}
			
		// Обработка действий 	
		if($this->request->method('post'))
		{
			// Сохранение цен и наличия
			$prices = $this->request->post('price');
			$stocks = $this->request->post('stock');
		
			foreach($prices as $id=>$price)
			{
				$stock = $stocks[$id];
				if($stock == '∞' || $stock == '')
					$stock = null;
					
				$this->variants->update_variant($id, array('price'=>$price, 'stock'=>$stock));
			}
		
			// Сортировка
			$positions = $this->request->post('positions'); 		
				$ids = array_keys($positions);
			sort($positions);
			$positions = array_reverse($positions);
			foreach($positions as $i=>$position)
				$this->products->update_product($ids[$i], array('position'=>$position)); 
		
			
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(!empty($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	$this->products->update_product($ids, array('visible'=>0));
					break;
			    }
			    case 'enable':
			    {
			    	$this->products->update_product($ids, array('visible'=>1));
			        break;
			    }
			    case 'set_featured':
			    {
			    	$this->products->update_product($ids, array('featured'=>1));
					break;
			    }
			    case 'unset_featured':
			    {
			    	$this->products->update_product($ids, array('featured'=>0));
					break;
			    }
			    case 'delete':
			    {
				    foreach($ids as $id)
						$this->products->delete_product($id);    
			        break;
			    }
			    case 'duplicate':
			    {
				    foreach($ids as $id)
				    	$this->products->duplicate_product(intval($id));
			        break;
			    }
			    case 'move_to_page':
			    {
		
			    	$target_page = $this->request->post('target_page', 'integer');
			    	
			    	// Сразу потом откроем эту страницу
			    	$filter['page'] = $target_page;
		
				    // До какого товара перемещать
				    $limit = $filter['limit']*($target_page-1);
				    if($target_page > $this->request->get('page', 'integer'))
				    	$limit += count($ids)-1;
				    else
				    	$ids = array_reverse($ids, true);
		

					$temp_filter = $filter;
					$temp_filter['page'] = $limit+1;
					$temp_filter['limit'] = 1;
					$target_product = array_pop($this->products->get_products($temp_filter));
					$target_position = $target_product->position;
				   	
				   	// Если вылезли за последний товар - берем позицию последнего товара в качестве цели перемещения
					if($target_page > $this->request->get('page', 'integer') && !$target_position)
					{
				    	$query = $this->db->placehold("SELECT distinct p.position AS target FROM __products p LEFT JOIN __products_categories AS pc ON pc.product_id = p.id WHERE 1 $category_id_filter $brand_id_filter $event_id_filter $whom_id_filter ORDER BY p.position DESC LIMIT 1", count($ids));	
				   		$this->db->query($query);
				   		$target_position = $this->db->result('target');
					}
				   	
			    	foreach($ids as $id)
			    	{		    	
				    	$query = $this->db->placehold("SELECT position FROM __products WHERE id=? LIMIT 1", $id);	
				    	$this->db->query($query);	      
				    	$initial_position = $this->db->result('position');
		
				    	if($target_position > $initial_position)
				    		$query = $this->db->placehold("	UPDATE __products set position=position-1 WHERE position>? AND position<=?", $initial_position, $target_position);	
				    	else
				    		$query = $this->db->placehold("	UPDATE __products set position=position+1 WHERE position<? AND position>=?", $initial_position, $target_position);	
				    		
			    		$this->db->query($query);	      			    	
			    		$query = $this->db->placehold("UPDATE __products SET __products.position = ? WHERE __products.id = ?", $target_position, $id);	
			    		$this->db->query($query);	
				    }
			        break;
				}
			    case 'move_to_category':
			    {
			    	$category_id = $this->request->post('target_category', 'integer');
			    	$filter['page'] = 1;
					$category = $this->categories->get_category($category_id);
	  				$filter['category_id'] = $category->children;
			    	
			    	foreach($ids as $id)
			    	{
			    		$query = $this->db->placehold("DELETE FROM __products_categories WHERE category_id=? AND product_id=? LIMIT 1", $category_id, $id);	
			    		$this->db->query($query);	      			    	
			    		$query = $this->db->placehold("UPDATE IGNORE __products_categories set category_id=? WHERE product_id=? ORDER BY position DESC LIMIT 1", $category_id, $id);	
			    		$this->db->query($query);
			    		if($this->db->affected_rows() == 0)
							$query = $this->db->query("INSERT IGNORE INTO __products_categories set category_id=?, product_id=?", $category_id, $id);	

				    }
			        break;
				}
			    case 'move_to_brand':
			    {
			    	$brand_id = $this->request->post('target_brand', 'integer');
			    	$brand = $this->brands->get_brand($brand_id);
			    	$filter['page'] = 1;
	  				$filter['brand_id'] = $brand_id;
			    	$query = $this->db->placehold("UPDATE __products set brand_id=? WHERE id in (?@)", $brand_id, $ids);	
			    	$this->db->query($query);	

					// Заново выберем бренды категории
					$brands = $this->brands->get_brands(array('category_id'=>$category_id));
					$this->design->assign('brands', $brands);
			    	      			    	
			        break;
				}
			    case 'move_to_event':
			    {
			    	$event_id = $this->request->post('target_event', 'integer');
			    	$event = $this->events->get_event($event_id);
			    	$filter['page'] = 1;
	  				$filter['event_id'] = $event_id;
			    	$query = $this->db->placehold("UPDATE __products set event_id=? WHERE id in (?@)", $event_id, $ids);	
			    	$this->db->query($query);	

					// Заново выберем бренды категории
					$events = $this->events->get_events(array('category_id'=>$category_id));
					$this->design->assign('events', $events);
			    	      			    	
			        break;
				}
			    case 'move_to_whom':
			    {
			    	$whom_id = $this->request->post('target_whom', 'integer');
			    	$whom = $this->whoms->get_whom($whom_id);
			    	$filter['page'] = 1;
	  				$filter['whom_id'] = $whom_id;
			    	$query = $this->db->placehold("UPDATE __products set whom_id=? WHERE id in (?@)", $whom_id, $ids);	
			    	$this->db->query($query);	

					// Заново выберем бренды категории
					$whoms = $this->whoms->get_whoms(array('category_id'=>$category_id));
					$this->design->assign('whoms', $whoms);
			    	      			    	
			        break;
				}
			}			
		}

		if($category_id == 0 and !isset($_GET['filter']))
			$filter['group_by'] = 1;

		// Отображение
		if(isset($brand))
			$this->design->assign('brand', $brand);
		if(isset($event))
			$this->design->assign('event', $event);
		if(isset($whom))
			$this->design->assign('whom', $whom);
		if(isset($category))
			$this->design->assign('category', $category);
		
	  	$products_count = $this->products->count_products($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $products_count;
		
		if($filter['limit']>0)	  	
		  	$pages_count = ceil($products_count/$filter['limit']);
		else
		  	$pages_count = 0;
	  	$filter['page'] = min($filter['page'], $pages_count);
	 	$this->design->assign('products_count', $products_count);
	 	$this->design->assign('pages_count', $pages_count);
	 	$this->design->assign('current_page', $filter['page']);
	 	
		$products = array();
		foreach($this->products->get_products($filter) as $p)
			$products[$p->id] = $p;
	 	
	
		if(!empty($products))
		{
		  	
			// Товары 
			$products_ids = array_keys($products);
			foreach($products as &$product)
			{
				$product->variants = array();
				$product->images = array();
				$product->properties = array();
			}
		
			$variants = $this->variants->get_variants(array('product_id'=>$products_ids));
		
		 
			foreach($variants as &$variant)
			{
				$products[$variant->product_id]->variants[] = $variant;
			}
		
			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[$image->id] = $image;
		}

		$this->design->assign('products', $products);
	
		return $this->design->fetch('products.tpl');
	}
}
