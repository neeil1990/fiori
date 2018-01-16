<?php

require_once('View.php');

class ProductsView extends View
{

	public function __construct() {
		parent::__construct();
			
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
			// Если к нам идёт Ajax запрос, то ловим его
				$this->filter_json();
				exit;
			}

	}

 	/**
	 *
	 * Отображение списка товаров
	 *
	 */
	function fetch()
	{
		// GET-Параметры
		$category_url = $this->request->get('category', 'string');


		$brand_url    = $this->request->get('brand', 'string');
		$brand_id	  = $this->request->get('brand_id');

		$event_url    = $this->request->get('event', 'string');
		$event_id	  = $this->request->get('event_id');

		$whom_url    = $this->request->get('whom', 'string');
		$whom_id	  = $this->request->get('whom_id');


		$mode    = $this->request->get('mode', 'string');

		$filter = array();
		$filter['visible'] = 1;
		$filter['brand_id'] = array();
		$filter['event_id'] = array();
		$filter['whom_id'] = array();
		
        if ($mode == 'hits')
        {
            $filter['featured'] = 1;
        }
        if ($mode == 'sale')
        {
            $filter['discounted'] = 1;
        } 
		
		// Если задан бренд, выберем его из базы
		if (!empty($brand_url))
		{
			$brand = $this->brands->get_brand((string)$brand_url);
			if (empty($brand))
				return false;
			$this->design->assign('brand', $brand);
			$filter['brand_id'][] = $brand->id;
			//+++++ 10.08.2013

			if (empty($category_url)){
				$sql = "SELECT s_categories.* 
				FROM s_brands, s_categories, s_products, s_products_categories
				WHERE s_products.brand_id = s_brands.id
				AND s_categories.id = s_products_categories.category_id
				AND s_products_categories.product_id = s_products.id
				AND s_brands.id =".$brand->id."
				GROUP BY s_categories.id";
				$res = $this->db->query($sql);
				$this->design->assign('brand_categories', $this->db->results());
			}

		}
		if (!empty($brand_id)) {
			$filter['brand_id'] = array_merge($filter['brand_id'], $this->request->get('brand_id'));
		}
		
		// Если задано событие, выберем его из базы
		if (!empty($event_url))
		{
			$event = $this->events->get_event((string)$event_url);
			if (empty($event))
				return false;
			$this->design->assign('event', $event);
			$filter['event_id'][] = $event->id;
			//+++++ 10.08.2013

			if (empty($category_url)){
				$sql = "SELECT s_categories.* 
				FROM s_events, s_categories, s_products, s_products_categories
				WHERE s_products.event_id = s_events.id
				AND s_categories.id = s_products_categories.category_id
				AND s_products_categories.product_id = s_products.id
				AND s_events.id =".$event->id."
				GROUP BY s_categories.id";
				$res = $this->db->query($sql);
				$this->design->assign('event_categories', $this->db->results());
			}

		}
		if (!empty($event_id)) {
			$filter['event_id'] = array_merge($filter['event_id'], $this->request->get('event_id'));
		}
		
		// Если задано 'кому', выберем его из базы
		if (!empty($whom_url))
		{
			$whom = $this->whoms->get_whom((string)$whom_url);
			if (empty($whom))
				return false;
			$this->design->assign('whom', $whom);
			$filter['whom_id'][] = $whom->id;
			//+++++ 10.08.2013

			if (empty($category_url)){
				$sql = "SELECT s_categories.* 
				FROM s_whoms, s_categories, s_products, s_products_categories
				WHERE s_products.whom_id = s_whoms.id
				AND s_categories.id = s_products_categories.category_id
				AND s_products_categories.product_id = s_products.id
				AND s_whoms.id =".$whom->id."
				GROUP BY s_categories.id";
				$res = $this->db->query($sql);
				$this->design->assign('whom_categories', $this->db->results());
			}

		}
		if (!empty($whom_id)) {
			$filter['whom_id'] = array_merge($filter['whom_id'], $this->request->get('whom_id'));
		}
		
		
		
		
		
		
		
		
		
/*

		// Если задан бренд, выберем его из базы
		if (!empty($brand_url)) {
			$brand = $this->brands->get_brand((string)$brand_url);
			if (empty($brand))
				return false;
			$this->design->assign('brand', $brand);
			$filter['brand_id'] = $brand->id;
		}
*/
		// Выберем текущую категорию
		if (!empty($category_url)) {
			$category = $this->categories->get_category((string)$category_url);
			if (empty($category) || (!$category->visible && empty($_SESSION['admin'])))
				return false;
			$this->design->assign('category', $category);
			$filter['category_id'] = $category->id;
		}
		
		// Если задано ключевое слово
		$keyword = $this->request->get('keyword');
		if (!empty($keyword)) {
			$this->design->assign('keyword', $keyword);
			$filter['keyword'] = $keyword;
		}

		
		
		if ($this->request->get('featured', 'integer'))
			$filter['featured'] = 1;
		
		if ($this->request->get('discounted', 'integer'))
			$filter['discounted'] = 1;
			
		if ($this->request->get('min_price', 'integer'))
			$filter['min_price'] = $this->request->get('min_price', 'integer') * $this->currency->rate_to/$this->currency->rate_from;
				
		if ($this->request->get('max_price'))
			$filter['max_price'] = $this->request->get('max_price', 'integer') * $this->currency->rate_to/$this->currency->rate_from;
		
		// Сортировка товаров, сохраняем в сесси, чтобы текущая сортировка оставалась для всего сайта
		if($sort = $this->request->get('sort', 'string'))
			$_SESSION['sort'] = $sort;
		if (!empty($_SESSION['sort']))
			$filter['sort'] = $_SESSION['sort'];
		else
			$filter['sort'] = 'position';
		$this->design->assign('sort', $filter['sort']);

		$filter['in_stock'] = true;

		
		// Свойства товаров
		//if(!empty($category))
		//{
			$features = array();
			$filter['features'] = array();
			foreach($this->features->get_features(array('category_id'=>$category->id, 'in_filter'=>1)) as $feature)
			{ 
				$features[$feature->id] = $feature;
				//if(($val = strval($this->request->get($feature->id)))!='')
				if(($val = $this->request->get($feature->id))!='')
				{
					if($val[0] != '')
						$filter['features'][$feature->id] = (array)$val;
								
					$features[$feature->id]->active = true;
				}
				else
				{
					$features[$feature->id]->active = false;
				}
			}
			
			$options_filter['visible'] = 1;
			
			$features_ids = array_keys($features);
			if(!empty($features_ids))
				$options_filter['feature_id'] = $features_ids;
			$options_filter['category_id'] = $category->children;
			if(isset($filter['features']))
				$options_filter['features'] = $filter['features'];

			$options = $this->features->get_options($options_filter);
			
			if(isset($options)) {
				foreach($options as &$option) {
					// в этой групе есть чекнутый фильтер
					if($features[$option->feature_id]->active) {

						if( in_array($option->value, $filter['features'][$option->feature_id])){
							$option->checked = true;
							$option->disabled = false;
							$option->count = 0;
						}else{
							$temp_filter = $filter;
							$temp_filter['features'][$option->feature_id] = (array)$option->value;
							$option->count = '+'.$this->products->count_products($temp_filter);
								if((int)$option->count > 0){
									$option->disabled = false;
								}else{
									$option->disabled = true;
									$option->count = 0;
								}
									
							unset($temp_filter);
						}
					} else {
						$temp_filter = $filter;
						$temp_filter['features'][$option->feature_id] = (array)$option->value;
						$option->count = $this->products->count_products($temp_filter);
							if((int)$option->count > 0)
								$option->disabled = false;
							else
								$option->disabled = true;
						unset($temp_filter);
						$option->checked = false;
					}
						
					$features[$option->feature_id]->options[] = $option;
				}
			}
			

			
			foreach($features as $i=>&$feature)
			{ 
				if(empty($feature->options))
					unset($features[$i]);
			}

			$this->design->assign('features', $features);
		
			//Минимальная и максимальная допустимая цена
			$this->design->assign('max_min_price', $this->products->max_min_products($filter));	
			
			//Минимальная и максимальная допустимая цена
			$this->design->assign('slider_max_min_price', $this->products->max_min_products(array('category_id'=>$filter['category_id'])));	
 		//}

		$this->design->assign('filter_features', $filter['features']);
		
		// Постраничная навигация
		$items_per_page = $this->settings->products_num;

		// Текущая страница в постраничном выводе
		$current_page = $this->request->get('page', 'integer');

		// Если не задана, то равна 1
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);

		// Вычисляем количество страниц
		$products_count = $this->products->count_products($filter);

		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$items_per_page = $products_count;

		$pages_num = ceil($products_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);
		$this->design->assign('total_products_num', $products_count);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;


		$discount = 0;
		if(isset($_SESSION['user_id']) && $user = $this->users->get_user(intval($_SESSION['user_id'])))
			$discount = $user->discount;

		// Товары
		$products = array();
		foreach($this->products->get_products($filter) as $p)
			$products[$p->id] = $p;

		// Если искали товар и найден ровно один - перенаправляем на него
		if(!empty($keyword) && $products_count == 1)
			header('Location: '.$this->config->root_url.'/products/'.$p->url);

		if(!empty($products))
		{
			$products_ids = array_keys($products);
			foreach($products as &$product)
			{
				$product->variants = array();
				$product->images = array();
				$product->properties = array();
			}

			$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));

			foreach($variants as &$variant)
			{
				//$variant->price *= (100-$discount)/100;
				$products[$variant->product_id]->variants[] = $variant;
			}

			$images = $this->products->get_images(array('product_id'=>$products_ids));
			foreach($images as $image)
				$products[$image->product_id]->images[] = $image;

			foreach($products as &$product)
			{
				if(isset($product->variants[0]))
					$product->variant = $product->variants[0];
				if(isset($product->images[0]))
					$product->image = $product->images[0];
			}


			/*
			$properties = $this->features->get_options(array('product_id'=>$products_ids));
			foreach($properties as $property)
				$products[$property->product_id]->options[] = $property;
			*/

			$this->design->assign('products', $products);
 		}
		
		
		
		
		// Выбираем бренды, они нужны нам в шаблоне	
		//if(!empty($category))
		//{


			if(!empty($category)){
				$brands = $this->brands->get_brands_category(array('category_id'=>$category->children));
				$category->brands = $brands;
			}else{
				$brands = $this->brands->get_brands(array('enabled'=>1));
				$this->design->assign('brands', $brands);
			}
				//Есть ли активный бренд в фильтре
				if(!empty($filter['brand_id'])){
					$brands_active = true;
					$count_prefix = '+';
				}else{
					$count_prefix = '';
				}
			//////////////////


			foreach($brands as &$brand_temp){

				if(isset($brands_active)){
					if(in_array($brand_temp->id, $filter['brand_id'])){ //если активен текущий
						$brand_temp->checked = true;
						$brand_temp->disabled = false;
						$brand_temp->count = 0;
					} else {
						$brand_temp->checked = false;
						$temp_filter = $filter;
						$temp_filter['brand_id'] = (array)$brand_temp->id;
						$brand_temp->count = $count_prefix.$this->products->count_products($temp_filter);
						unset($temp_filter);
						if((int)$brand_temp->count > 0){
							$brand_temp->disabled = false;
						}else{
							$brand_temp->disabled = true;
							$brand_temp->count = 0;
						}
					}
				
				}else{

					$brand_temp->checked = false;
					$temp_filter = $filter;
					$temp_filter['brand_id'] = (array)$brand_temp->id;

					$brand_temp->count = $count_prefix.$this->products->count_products($temp_filter);

					unset($temp_filter);
						if((int)$brand_temp->count > 0)
							$brand_temp->disabled = false;
						else
							$brand_temp->disabled = true;
				}

			}
		//}
		$this->design->assign('filter_brand', $filter['brand_id']);

		
		
		// Выбираем комушки, они нужны нам в шаблоне	
		//if(!empty($category))
		//{
			if(!empty($category)){
				$whoms = $this->whoms->get_whoms_category(array('category_id'=>$category->children));
				$category->whoms = $whoms;
			}else{
				$whoms = $this->whoms->get_whoms(array('enabled'=>1));
				$this->design->assign('whoms', $whoms);
			}
				//Есть ли активный бренд в фильтре
				if(!empty($filter['whom_id'])){
					$whoms_active = true;
					$count_prefix = '+';
				}else{
					$count_prefix = '';
				}
			//////////////////
			
			
			foreach($whoms as &$whom_temp){

				if(isset($whoms_active)){
					if(in_array($whom_temp->id, $filter['whom_id'])){ //если активен текущий
						$whom_temp->checked = true;
						$whom_temp->disabled = false;
						$whom_temp->count = 0;
					} else {
						$whom_temp->checked = false;
						$temp_filter = $filter;
						$temp_filter['whom_id'] = (array)$whom_temp->id;
						$whom_temp->count = $count_prefix.$this->products->count_products($temp_filter);
						unset($temp_filter);
						if((int)$whom_temp->count > 0){
							$whom_temp->disabled = false;
						}else{
							$whom_temp->disabled = true;
							$whom_temp->count = 0;
						}
					}
				
				}else{
					$whom_temp->checked = false;
					$temp_filter = $filter;
					$temp_filter['whom_id'] = (array)$whom_temp->id;
					$whom_temp->count = $count_prefix.$this->products->count_products($temp_filter);
					unset($temp_filter);
						if((int)$whom_temp->count > 0)
							$whom_temp->disabled = false;
						else
							$whom_temp->disabled = true;
				}

			}
		//}
		$this->design->assign('filter_whom', $filter['whom_id']);
		
		
		
		// Выбираем события, они нужны нам в шаблоне	
		//if(!empty($category))
		//{
			if(!empty($category)){
				$events = $this->events->get_events_category(array('category_id'=>$category->children));
				$category->events = $events;
			}else{
				$events = $this->events->get_events(array('enabled'=>1));
				$this->design->assign('events', $events);
			}
				//Есть ли активный бренд в фильтре
				if(!empty($filter['event_id'])){
					$events_active = true;
					$count_prefix = '+';
				}else{
					$count_prefix = '';
				}
			//////////////////
			
			
			foreach($events as &$event_temp){

				if(isset($events_active)){
					if(in_array($event_temp->id, $filter['event_id'])){ //если активен текущий
						$event_temp->checked = true;
						$event_temp->disabled = false;
						$event_temp->count = 0;
					} else {
						$event_temp->checked = false;
						$temp_filter = $filter;
						$temp_filter['event_id'] = (array)$event_temp->id;
						$event_temp->count = $count_prefix.$this->products->count_products($temp_filter);
						unset($temp_filter);
						if((int)$event_temp->count > 0){
							$event_temp->disabled = false;
						}else{
							$event_temp->disabled = true;
							$event_temp->count = 0;
						}
					}
				
				}else{
					$event_temp->checked = false;
					$temp_filter = $filter;
					$temp_filter['event_id'] = (array)$event_temp->id;
					$event_temp->count = $count_prefix.$this->products->count_products($temp_filter);
					unset($temp_filter);
						if((int)$event_temp->count > 0)
							$event_temp->disabled = false;
						else
							$event_temp->disabled = true;
				}

			}

			$featured = new stdClass();
			if ($this->request->get('featured', 'integer'))
			{
				$featured->checked = true;
				$featured->disabled = false;
				$featured->count = 0;
			}
			else
			{
				$temp_filter = $filter;
				$temp_filter['featured'] = 1;
				$featured->count = $this->products->count_products($temp_filter);
				if((int)$featured->count > 0)
				{
					$featured->disabled = false;
				}
				else
				{
					$featured->disabled = true;
					$featured->count = 0;
				}
				unset($temp_filter);
			}
			$this->design->assign('featured', $featured);
			$this->design->assign('filter_featured', $filter['featured']);
			
			$discounted = new stdClass();
			if ($this->request->get('discounted', 'integer'))
			{
				$discounted->checked = true;
				$discounted->disabled = false;
				$discounted->count = 0;
			}
			else
			{
				$temp_filter = $filter;
				$temp_filter['discounted'] = 1;
				$discounted->count = $this->products->count_products($temp_filter);
				if((int)$discounted->count > 0)
				{
					$discounted->disabled = false;
				}
				else
				{
					$discounted->disabled = true;
					$discounted->count = 0;
				}
				unset($temp_filter);
			}
			$this->design->assign('discounted', $discounted);
			$this->design->assign('filter_discounted', $filter['discounted']);
		//}
		$this->design->assign('filter_event', $filter['event_id']);
		
		
/*		
		if(!empty($category)) {
			// Выбираем бренды, они нужны нам в шаблоне
			$brands = $this->brands->get_brands(array('category_id'=>$category->children));
			$category->brands = $brands;
			$allBrandCount = 0;
			foreach ($category->brands as $brand) $allBrandCount += $brand->cnt;
			$this->design->assign('all_brands_count', $allBrandCount);
		}

		$this->design->assign('price_range', $this->categories->getCategoryPrices((!empty($category) ? $category->children : array())));

*/
		
		// Устанавливаем мета-теги в зависимости от запроса
		if($this->page) {
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		} elseif(isset($category)) {
			$this->design->assign('meta_title', $category->meta_title);
			$this->design->assign('meta_keywords', $category->meta_keywords);
			$this->design->assign('meta_description', $category->meta_description);
		} elseif(isset($brand)) {
			$this->design->assign('meta_title', $brand->meta_title);
			$this->design->assign('meta_keywords', $brand->meta_keywords);
			$this->design->assign('meta_description', $brand->meta_description);
		}elseif(isset($event)) {
			$this->design->assign('meta_title', $event->meta_title);
			$this->design->assign('meta_keywords', $event->meta_keywords);
			$this->design->assign('meta_description', $event->meta_description);
		}elseif(isset($whom)) {
			$this->design->assign('meta_title', $whom->meta_title);
			$this->design->assign('meta_keywords', $whom->meta_keywords);
			$this->design->assign('meta_description', $whom->meta_description);
		}
		elseif(isset($keyword)) $this->design->assign('meta_title', $keyword);

	 $tpl = 'products.tpl';

		return $this->design->fetch($tpl);
	}
	
	
	
	function filter_json()
	{
		$result = array();
	
		// GET-Параметры
		$category_url = $this->request->get('category', 'string');
		$brand_url    = $this->request->get('brand', 'string');
		$brand_id = $this->request->get('brand_id');
		$event_url    = $this->request->get('event', 'string');
		$event_id = $this->request->get('event_id');
		$whom_url    = $this->request->get('whom', 'string');
		$whom_id = $this->request->get('whom_id');
		
		$filter = array();
		$filter['visible'] = 1;
		$filter['in_stock'] = true;
		$filter['brand_id'] = array();
		$filter['event_id'] = array();
		$filter['whom_id'] = array();
		
		// Выберем текущую категорию
		if (!empty($category_url))
		{
			$category = $this->categories->get_category((string)$category_url);
			if (empty($category) || (!$category->visible && empty($_SESSION['admin'])))
				return false;
			$filter['category_id'] = $category->id;
		}
		if (!empty($brand_url))
		{
			$brand = $this->brands->get_brand((string)$brand_url);
			if (empty($brand))
				return false;
			$this->design->assign('brand', $brand);
			$filter['brand_id'][] = $brand->id;
		}
		
		if (!empty($brand_id)) {
			$filter['brand_id'] = array_merge($filter['brand_id'], $this->request->get('brand_id'));
		}
		
		if (!empty($event_url))
		{
			$event = $this->events->get_event((string)$event_url);
			if (empty($event))
				return false;
			$this->design->assign('event', $event);
			$filter['event_id'][] = $event->id;
		}
		
		if (!empty($event_id)) {
			$filter['event_id'] = array_merge($filter['event_id'], $this->request->get('event_id'));
		}
		
		if (!empty($whom_url))
		{
			$whom = $this->whoms->get_whom((string)$whom_url);
			if (empty($whom))
				return false;
			$this->design->assign('whom', $whom);
			$filter['whom_id'][] = $whom->id;
		}
		
		if (!empty($whom_id)) {
			$filter['whom_id'] = array_merge($filter['whom_id'], $this->request->get('whom_id'));
		}
		
		
		
		if ($this->request->get('featured', 'integer'))
			$filter['featured'] = 1;
			
		if ($this->request->get('discounted', 'integer'))
			$filter['discounted'] = 1;
		
		if ($this->request->get('min_price', 'integer'))
			$filter['min_price'] = $this->request->get('min_price', 'integer') * $this->currency->rate_to/$this->currency->rate_from;
				
		if ($this->request->get('max_price'))
			$filter['max_price'] = $this->request->get('max_price', 'integer') * $this->currency->rate_to/$this->currency->rate_from;

		
		// Свойства товаров
		//if(!empty($category))
		//{
			$features = array();
			$filter['features'] = array();
			foreach($this->features->get_features(array('category_id'=>$category->id, 'in_filter'=>1)) as $feature)
			{ 
				$features[$feature->id] = $feature;
				//if(($val = strval($this->request->get($feature->id)))!=''){
				if(($val = $this->request->get($feature->id))!=''){
					if($val[0] != '')
						$filter['features'][$feature->id] = (array)$val;
								
					$features[$feature->id]->active = true;
				}else{
					$features[$feature->id]->active = false;
				}
			}
			
			$options_filter['visible'] = 1;
			
			$features_ids = array_keys($features);
			if(!empty($features_ids))
				$options_filter['feature_id'] = $features_ids;
			$options_filter['category_id'] = $category->children;
			if(isset($filter['features']))
				$options_filter['features'] = $filter['features'];

			$options = $this->features->get_options($options_filter);
			
			if(isset($options)) {
				foreach($options as &$option) {
					// в этой групе есть чекнутый фильтер
					if($features[$option->feature_id]->active) {

						if( in_array($option->value, $filter['features'][$option->feature_id])){
							$option->checked = true;
							$option->disabled = false;
							$option->count = 0;
						}else{
							$temp_filter = $filter;
							$temp_filter['features'][$option->feature_id] = (array)$option->value;
							$option->count = '+'.$this->products->count_products($temp_filter);
								if((int)$option->count > 0){
									$option->disabled = false;
								}else{
									$option->disabled = true;
									$option->count = 0;
								}
									
							unset($temp_filter);
						}
					} else {
						$temp_filter = $filter;
						$temp_filter['features'][$option->feature_id] = (array)$option->value;
						$option->count = $this->products->count_products($temp_filter);
							if((int)$option->count > 0)
								$option->disabled = false;
							else
								$option->disabled = true;
						unset($temp_filter);
						$option->checked = false;
					}
						
					$features[$option->feature_id]->options[] = $option;
				}
			}
			

			
			foreach($features as $i=>&$feature)
			{ 
				if(empty($feature->options))
					unset($features[$i]);
			}
			$result['features'] = $features;
			
			//Минимальная и максимальная допустимая цена
			$max_min_price = $this->products->max_min_products($filter);
			$max_min_price->min_price = $this->money->convert($max_min_price->min_price, null,false);
			$max_min_price->max_price = $this->money->convert($max_min_price->max_price, null,false);
			
			$result['max_min_price'] = $max_min_price;	
 		//}
		
		$result['total_view'] = $this->products->count_products($filter);

		$brands = $this->brands->get_brands(array('visible'=>1));
		$result['brands'] = array();
				//Есть ли активный бренд в фильтре
				if(!empty($filter['brand_id'])){
					$brands_active = true;
					$count_prefix = '+';
				}else{
					$count_prefix = '';
				}
		
			foreach($brands as &$brand_temp){
			
				if(isset($brands_active)){
					if(in_array($brand_temp->id, $filter['brand_id'])){ //если активен текущий
						$brand_temp->checked = true;
						$brand_temp->disabled = false;
						$brand_temp->count = 0;
					} else {
						$brand_temp->checked = false;
						$temp_filter = $filter;
						$temp_filter['brand_id'] = (array)$brand_temp->id;
						$brand_temp->count = $count_prefix.$this->products->count_products($temp_filter);
						unset($temp_filter);
						if((int)$brand_temp->count > 0){
							$brand_temp->disabled = false;
						}else{
							$brand_temp->disabled = true;
							$brand_temp->count = 0;
						}
					}
				
				}else{
					$brand_temp->checked = false;
					$temp_filter = $filter;
					$temp_filter['brand_id'] = (array)$brand_temp->id;
					$brand_temp->count = $count_prefix.$this->products->count_products($temp_filter);
					unset($temp_filter);
						if((int)$brand_temp->count > 0)
							$brand_temp->disabled = false;
						else
							$brand_temp->disabled = true;
				}
			}
				$result['brands'] = $brands;
				
				
		$events = $this->events->get_events(array('visible'=>1));
		$result['events'] = array();
				//Есть ли активный бренд в фильтре
				if(!empty($filter['event_id'])){
					$events_active = true;
					$count_prefix = '+';
				}else{
					$count_prefix = '';
				}
		
			foreach($events as &$event_temp){
			
				if(isset($events_active)){
					if(in_array($event_temp->id, $filter['event_id'])){ //если активен текущий
						$event_temp->checked = true;
						$event_temp->disabled = false;
						$event_temp->count = 0;
					} else {
						$event_temp->checked = false;
						$temp_filter = $filter;
						$temp_filter['event_id'] = (array)$event_temp->id;
						$event_temp->count = $count_prefix.$this->products->count_products($temp_filter);
						unset($temp_filter);
						if((int)$event_temp->count > 0){
							$event_temp->disabled = false;
						}else{
							$event_temp->disabled = true;
							$event_temp->count = 0;
						}
					}
				
				}else{
					$event_temp->checked = false;
					$temp_filter = $filter;
					$temp_filter['event_id'] = (array)$event_temp->id;
					$event_temp->count = $count_prefix.$this->products->count_products($temp_filter);
					unset($temp_filter);
						if((int)$event_temp->count > 0)
							$event_temp->disabled = false;
						else
							$event_temp->disabled = true;
				}
			}
				$result['events'] = $events;
				
		$whoms = $this->whoms->get_whoms(array('visible'=>1));
		$result['whoms'] = array();
				//Есть ли активный бренд в фильтре
				if(!empty($filter['whom_id'])){
					$whoms_active = true;
					$count_prefix = '+';
				}else{
					$count_prefix = '';
				}
		
			foreach($whoms as &$whom_temp){
			
				if(isset($whoms_active)){
					if(in_array($whom_temp->id, $filter['whom_id'])){ //если активен текущий
						$whom_temp->checked = true;
						$whom_temp->disabled = false;
						$whom_temp->count = 0;
					} else {
						$whom_temp->checked = false;
						$temp_filter = $filter;
						$temp_filter['whom_id'] = (array)$whom_temp->id;
						$whom_temp->count = $count_prefix.$this->products->count_products($temp_filter);
						unset($temp_filter);
						if((int)$whom_temp->count > 0){
							$whom_temp->disabled = false;
						}else{
							$whom_temp->disabled = true;
							$whom_temp->count = 0;
						}
					}
				
				}else{
					$whom_temp->checked = false;
					$temp_filter = $filter;
					$temp_filter['whom_id'] = (array)$whom_temp->id;
					$whom_temp->count = $count_prefix.$this->products->count_products($temp_filter);
					unset($temp_filter);
						if((int)$whom_temp->count > 0)
							$whom_temp->disabled = false;
						else
							$whom_temp->disabled = true;
				}
			}
				$result['whoms'] = $whoms;	
				
				
				
				
				
				
				
		
			$featured = new stdClass(); 
			if ($this->request->get('featured', 'integer')){
				$featured->checked = true;
				$featured->disabled = false;
				$featured->count = 0;
			}else{
				$temp_filter = $filter;
				$temp_filter['featured'] = 1;
				$featured->count = $this->products->count_products($temp_filter);
				if((int)$featured->count > 0){
					$featured->disabled = false;
				}else{
					$featured->disabled = true;
					$featured->count = 0;
				}
				unset($temp_filter);
			}
			$result['featured'] = $featured;
			
			$discounted = new stdClass(); 
			if ($this->request->get('discounted', 'integer')){
				$discounted->checked = true;
				$discounted->disabled = false;
				$discounted->count = 0;
			}else{
				$temp_filter = $filter;
				$temp_filter['discounted'] = 1;
				$discounted->count = $this->products->count_products($temp_filter);
				if((int)$discounted->count > 0){
					$discounted->disabled = false;
				}else{
					$discounted->disabled = true;
					$discounted->count = 0;
				}
				unset($temp_filter);
			}
			$result['discounted'] = $discounted;


			
		header("Content-type: application/json; charset=UTF-8");
		header("Cache-Control: must-revalidate");
		header("Pragma: no-cache");
		header("Expires: -1");		
		print json_encode($result);

	}
	
}