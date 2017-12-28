<?PHP

require_once('api/Simpla.php');

############################################
# Class Product - edit the static section
############################################
class ProductAdmin extends Simpla
{
	public function fetch()
	{
	
		$options = array();
		$product_categories = array();
		$variants = array();
		$boxing = array();
		$images = array();
		$product_features = array();
		$related_products = array();
	
		if($this->request->method('post') && !empty($_POST))
		{
			$product = new stdClass;
			$product->id = $this->request->post('id', 'integer');
			$product->name = $this->request->post('name');
			$product->visible = $this->request->post('visible', 'boolean');
			$product->featured = $this->request->post('featured');
			$product->url = trim($this->request->post('url', 'string'));
			$product->meta_title = $this->request->post('meta_title');
			$product->meta_keywords = $this->request->post('meta_keywords');
			$product->meta_description = $this->request->post('meta_description');
			
			$product->annotation = $this->request->post('annotation');
			$product->body = $this->request->post('body');

			// Варианты товара
			if($this->request->post('variants'))
			foreach($this->request->post('variants') as $n=>$va)
			{
				foreach($va as $i=>$v)
				{
					if(empty($variants[$i]))
						$variants[$i] = new stdClass;
					$variants[$i]->$n = $v;
				}
			}

			// Варианты упаковки
			if($this->request->post('boxing'))
			foreach($this->request->post('boxing') as $n=>$bo)
			{
				foreach($bo as $i=>$b)
				{
					if(empty($boxing[$i]))
						$boxing[$i] = new stdClass;
					$boxing[$i]->$n = $b;
				}
			}

			// Категории товара
			$product_categories = $this->request->post('categories');
			if(is_array($product_categories))
			{
				foreach($product_categories as $c)
				{
					$x = new stdClass;
					$x->id = $c;
					$pc[] = $x;
				}
				$product_categories = $pc;
			}

			//Бренды товара
			$product_brands = $this->request->post('brand_id');
			if(is_array($product_brands))
			{
				foreach($product_brands as $b)
				{
					if($b > 0){
						$x = new stdClass;
						$x->id = $b;
						$pb[] = $x;
					}else{
						$pb = false;
					}
				}
				$product_brands = $pb;
			}

			//Кому товара
			$product_whoms = $this->request->post('whom_id');
			if(is_array($product_whoms))
			{
				foreach($product_whoms as $w)
				{
					if($w > 0) {
						$x = new stdClass;
						$x->id = $w;
						$pw[] = $x;
					}else{
						$pw = false;
					}
				}
				$product_whoms = $pw;
			}

			//Событие товара
			$product_events = $this->request->post('event_id');
			if(is_array($product_events))
			{
				foreach($product_events as $e)
				{
					if($e > 0) {
						$x = new stdClass;
						$x->id = $e;
						$pe[] = $x;
					}else{
						$pe = false;
					}
				}
				$product_events = $pe;
			}

			// Свойства товара
   	    	$options = $this->request->post('options');
			if(is_array($options))
			{
				foreach($options as $f_id=>$val)
				{
					$po[$f_id] = new stdClass;
					$po[$f_id]->feature_id = $f_id;
					$po[$f_id]->value = $val;
				}
				$options = $po;
			}

			// Связанные товары
			if(is_array($this->request->post('related_products')))
			{
				foreach($this->request->post('related_products') as $p)
				{
					$rp[$p] = new stdClass;
					$rp[$p]->product_id = $product->id;
					$rp[$p]->related_id = $p;
				}
				$related_products = $rp;
			}
				
			// Не допустить пустое название товара.
			if(empty($product->name))
			{			
				$this->design->assign('message_error', 'empty_name');
				if(!empty($product->id))
					$images = $this->products->get_images(array('product_id'=>$product->id));
			}
			// Не допустить одинаковые URL разделов.
			elseif(($p = $this->products->get_product($product->url)) && $p->id!=$product->id)
			{			
				$this->design->assign('message_error', 'url_exists');
				if(!empty($product->id))
					$images = $this->products->get_images(array('product_id'=>$product->id));
			}
			else
			{
				if(empty($product->id))
				{
	  				$product->id = $this->products->add_product($product);
	  				$product = $this->products->get_product($product->id);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->products->update_product($product->id, $product);
  	    			$product = $this->products->get_product($product->id);
					$this->design->assign('message_success', 'updated');
  	    		}	
   	    		
   	    		if($product->id)
   	    		{
	   	    		// Категории товара
	   	    		$query = $this->db->placehold('DELETE FROM __products_categories WHERE product_id=?', $product->id);
	   	    		$this->db->query($query);
	 	  		    if(is_array($product_categories))
		  		    {
		  		    	foreach($product_categories as $i=>$category)
	   	    				$this->categories->add_product_category($product->id, $category->id, $i);
	  	    		}

					//Бренды товара
					$query = $this->db->placehold('DELETE FROM __brands_products WHERE product_id=?', $product->id);
					$this->db->query($query);
					if(is_array($product_brands))
					{
						foreach($product_brands as $i=>$brand)
							$this->brands->add_product_brand($product->id, $brand->id);
					}

					//Кому товара
					$query = $this->db->placehold('DELETE FROM __whoms_products WHERE product_id=?', $product->id);
					$this->db->query($query);
					if(is_array($product_whoms))
					{
						foreach($product_whoms as $i=>$whom)
							$this->whoms->add_product_whom($product->id, $whom->id);
					}

					//Событие товара
					$query = $this->db->placehold('DELETE FROM __events_products WHERE product_id=?', $product->id);
					$this->db->query($query);
					if(is_array($product_events))
					{
						foreach($product_events as $i=>$event)
							$this->events->add_product_event($product->id, $event->id);
					}
	
	   	    		// Варианты
		  		    if(is_array($variants))
		  		    { 
	 					$variants_ids = array();
						foreach($variants as $index=>&$variant)
						{
							if($variant->stock == '∞' || $variant->stock == '')
								$variant->stock = null;
								
							// Удалить файл
							if(!empty($_POST['delete_attachment'][$index]))
							{
								$this->variants->delete_attachment($variant->id);
							}
	
		 					// Загрузить файлы
		 					if(!empty($_FILES['attachment']['tmp_name'][$index]) && !empty($_FILES['attachment']['name'][$index]))
		 					{
			 					$attachment_tmp_name = $_FILES['attachment']['tmp_name'][$index];					
			 					$attachment_name = $_FILES['attachment']['name'][$index];
		 						move_uploaded_file($attachment_tmp_name, $this->config->root_dir.'/'.$this->config->downloads_dir.$attachment_name);
		 						$variant->attachment = $attachment_name;
		 					}
	
							if(!empty($variant->id))
								$this->variants->update_variant($variant->id, $variant);
							else
							{
								$variant->product_id = $product->id;
								$variant->id = $this->variants->add_variant($variant);
							}
							$variant = $this->variants->get_variant($variant->id);
							if(!empty($variant->id))
					 			$variants_ids[] = $variant->id;
						}
						
	
						// Удалить непереданные варианты
						$current_variants = $this->variants->get_variants(array('product_id'=>$product->id));
						foreach($current_variants as $current_variant)
							if(!in_array($current_variant->id, $variants_ids))
	 							$this->variants->delete_variant($current_variant->id);
	 							 					
	 					//if(!empty($))
						
						// Отсортировать  варианты
						asort($variants_ids);
						$i = 0;
						foreach($variants_ids as $variant_id)
						{ 
							$this->variants->update_variant($variants_ids[$i], array('position'=>$variant_id));
							$i++;
						}
					}
					// Упаковки
		  		    if(is_array($boxing))
		  		    {
	 					$boxing_ids = array();
						foreach($boxing as $index=>&$box)
						{
							if($box->stock == '∞' || $box->stock == '')
								$box->stock = null;

							// Удалить файл
							if(!empty($_POST['delete_attachment_box'][$index]))
							{
								$this->boxing->delete_attachment($box->id);
							}

		 					// Загрузить файлы
		 					if(!empty($_FILES['attachment_box']['tmp_name'][$index]) && !empty($_FILES['attachment_box']['name'][$index]))
		 					{
			 					$attachment_tmp_name = $_FILES['attachment_box']['tmp_name'][$index];
			 					$attachment_name = $_FILES['attachment_box']['name'][$index];
		 						move_uploaded_file($attachment_tmp_name, $this->config->root_dir.'/'.$this->config->downloads_dir.$attachment_name);
		 						$box->attachment = $attachment_name;
		 					}

							if(!empty($box->id))
								$this->boxing->update_box($box->id, $box);
							else
							{
								$box->product_id = $product->id;
								$box->id = $this->boxing->add_box($box);
							}
							$box = $this->boxing->get_box($box->id);
							if(!empty($box->id))
					 			$boxing_ids[] = $box->id;
						}


						// Удалить непереданные варианты
						$current_boxing = $this->boxing->get_boxing(array('product_id'=>$product->id));
						foreach($current_boxing as $current_box)
							if(!in_array($current_box->id, $boxing_ids))
	 							$this->boxing->delete_box($current_box->id);

	 					//if(!empty($))

						// Отсортировать  варианты
						asort($boxing_ids);
						$i = 0;
						foreach($boxing_ids as $box_id)
						{
							$this->boxing->update_box($boxing_ids[$i], array('position'=>$box_id));
							$i++;
						}
					}
	
					// Удаление изображений
					$images = (array)$this->request->post('images');
					$current_images = $this->products->get_images(array('product_id'=>$product->id));
					foreach($current_images as $image)
					{
						if(!in_array($image->id, $images))
	 						$this->products->delete_image($image->id);
						}
	
					// Порядок изображений
					if($images = $this->request->post('images'))
					{
	 					$i=0;
						foreach($images as $id)
						{
							$this->products->update_image($id, array('position'=>$i));
							$i++;
						}
					}
	   	    		// Загрузка изображений
		  		    if($images = $this->request->files('images'))
		  		    {
						for($i=0; $i<count($images['name']); $i++)
						{
				 			if ($image_name = $this->image->upload_image($images['tmp_name'][$i], $images['name'][$i]))
				 			{
			  	   				$this->products->add_image($product->id, $image_name);
			  	   			}
							else
							{
								$this->design->assign('error', 'error uploading image');
							}
						}
					}
	   	    		// Загрузка изображений из интернета и drag-n-drop файлов
		  		    if($images = $this->request->post('images_urls'))
		  		    {
						foreach($images as $url)
						{
							// Если не пустой адрес и файл не локальный
							if(!empty($url) && $url != 'http://' && strstr($url,'/')!==false)
					 			$this->products->add_image($product->id, $url);
					 		elseif($dropped_images = $this->request->files('dropped_images'))
					  		{
					 			$key = array_search($url, $dropped_images['name']);
							 	if ($key!==false && $image_name = $this->image->upload_image($dropped_images['tmp_name'][$key], $dropped_images['name'][$key]))
						  	   				$this->products->add_image($product->id, $image_name);
							}
						}
					}
					$images = $this->products->get_images(array('product_id'=>$product->id));
	
	   	    		// Характеристики товара
	   	    		
	   	    		// Удалим все из товара
					foreach($this->features->get_product_options($product->id) as $po)
						$this->features->delete_option($product->id, $po->feature_id);
						
					// Свойства текущей категории
					$category_features = array();
					foreach($this->features->get_features(array('category_id'=>$product_categories[0])) as $f)
						$category_features[] = $f->id;
	
	  	    		if(is_array($options))
					foreach($options as $option)
					{
						if(in_array($option->feature_id, $category_features))
							$this->features->update_option($product->id, $option->feature_id, $option->value);
					}
					
					// Новые характеристики
					$new_features_names = $this->request->post('new_features_names');
					$new_features_values = $this->request->post('new_features_values');
					if(is_array($new_features_names) && is_array($new_features_values))
					{
						foreach($new_features_names as $i=>$name)
						{
							$value = trim($new_features_values[$i]);
							if(!empty($name) && !empty($value))
							{
								$query = $this->db->placehold("SELECT * FROM __features WHERE name=? LIMIT 1", trim($name));
								$this->db->query($query);
								$feature_id = $this->db->result('id');
								if(empty($feature_id))
								{
									$feature_id = $this->features->add_feature(array('name'=>trim($name)));
								}
								$this->features->add_feature_category($feature_id, reset($product_categories)->id);
								$this->features->update_option($product->id, $feature_id, $value);
							}
						}
						// Свойства товара
						$options = $this->features->get_product_options($product->id);
					}
					
					// удаляем старые значения
					$this->properties->delete_property($product->id);
					// добавляем новые
					$new_properties_names = $this->request->post('new_properties_names');
					$new_properties_values = $this->request->post('new_properties_values');
					if(is_array($new_properties_names) && is_array($new_properties_values))
					{
						foreach($new_properties_names as $k=>$name)
						{
							$price = trim($new_properties_values[$k]);
							if(!empty($name) && !empty($price))
							{
								$this->properties->add_property( array('name' => $name, 'price' => $price, 'product_id' => $product->id ) );
							}
						}
					}
					
					// отображаем
					$properties = $this->properties->get_properties(array('product_id' => $product->id ));

					
					// Связанные товары
	   	    		$query = $this->db->placehold('DELETE FROM __related_products WHERE product_id=?', $product->id);
	   	    		$this->db->query($query);
	 	  		    if(is_array($related_products))
		  		    {
		  		    	$pos = 0;
		  		    	foreach($related_products  as $i=>$related_product)
	   	    				$this->products->add_related_product($product->id, $related_product->related_id, $pos++);
	  	    		}
  	    		}
			}


			//header('Location: '.$this->request->url(array('message_success'=>'updated')));
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			$product = $this->products->get_product(intval($id));

			if($product)
			{
				
				// Категории товара
				$product_categories = $this->categories->get_categories(array('product_id'=>$product->id));

				//Бренды товара
				$product_brands = $this->brands->get_brands_product(array('product_id'=>$product->id));

				//Кому товара
				$product_whoms = $this->whoms->get_whoms_product(array('product_id'=>$product->id));

				//Событие товара
				$product_events = $this->events->get_events_product(array('product_id'=>$product->id));

				// Варианты товара
				$variants = $this->variants->get_variants(array('product_id'=>$product->id));

				// Варианты упаковки
				$boxing = $this->boxing->get_boxing(array('product_id'=>$product->id));
				
				// Изображения товара
				$images = $this->products->get_images(array('product_id'=>$product->id));
				
				$properties = $this->properties->get_properties(array('product_id' => $product->id ));
				
				// Свойства товара
				$options = $this->features->get_options(array('product_id'=>$product->id));
				
				// Связанные товары
				$related_products = $this->products->get_related_products(array('product_id'=>$product->id));
			}
			else
			{
				// Сразу активен
				$product = new stdClass;
				$product->visible = 1;			
			}
		}


		if(empty($variants))
			$variants = array(1);

		if(empty($boxing))
			$boxing = array(1);
			
		if(empty($product_categories))
		{
			if($category_id = $this->request->get('category_id')){
				$product_categories[0]->id = $category_id;
			}else{
				$product_categories = array(1);
			}

		}
		if(empty($product->brand_id) && $brand_id=$this->request->get('brand_id'))
		{
			$product_brands = $brand_id;
		}
		if(empty($product->event_id) && $event_id=$this->request->get('event_id'))
		{
			$product_events = $event_id;
		}
		if(empty($product->whom_id) && $whom_id=$this->request->get('whom_id'))
		{
			$product_whoms = $whom_id;
		}
			
		if(!empty($related_products))
		{
			foreach($related_products as &$r_p)
				$r_products[$r_p->related_id] = &$r_p;
			$temp_products = $this->products->get_products(array('id'=>array_keys($r_products)));
			foreach($temp_products as $temp_product)
				$r_products[$temp_product->id] = $temp_product;
		
			$related_products_images = $this->products->get_images(array('product_id'=>array_keys($r_products)));
			foreach($related_products_images as $image)
			{
				$r_products[$image->product_id]->images[] = $image;
			}
		}
			
		if(is_array($options))
		{
			$temp_options = array();
			foreach($options as $option)
				$temp_options[$option->feature_id] = $option;
			$options = $temp_options;
		}


		$this->design->assign('product', $product);
		$this->design->assign('properties', $properties);
		$this->design->assign('product_categories', $product_categories);
		$this->design->assign('product_brands', $product_brands);
		$this->design->assign('product_events', $product_events);
		$this->design->assign('product_whoms', $product_whoms);
		$this->design->assign('product_variants', $variants);
		$this->design->assign('product_boxing', $boxing);
		$this->design->assign('product_images', $images);
		$this->design->assign('options', $options);
		$this->design->assign('related_products', $related_products);		
		
		// Все бренды
		$brands = $this->brands->get_brands();
		$this->design->assign('brands', $brands);
		
		// Все события
		$events = $this->events->get_events();
		$this->design->assign('events', $events);
		
		// Все кому
		$whoms = $this->whoms->get_whoms();
		$this->design->assign('whoms', $whoms);
		
		// Все категории
		$categories = $this->categories->get_categories_tree();
		$this->design->assign('categories', $categories);
		
		// Все свойства товара
		$category = reset($product_categories);
		if(!is_object($category))
			$category = reset($categories);		
		if(is_object($category))
		{
			$features = $this->features->get_features(array('category_id'=>$category->id));
			$this->design->assign('features', $features);
		}
		
 	  	return $this->design->fetch('product.tpl');
	}
}