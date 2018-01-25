<?PHP

/**
 * Simpla CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simp.la
 * @author 		Denis Pikusov
 *
 * Базовый класс для всех View
 *
 */

require_once('api/Simpla.php');

class View extends Simpla
{
	/* Смысл класса в доступности следующих переменных в любом View */
	public $currency;
	public $currencies;
	public $user;
	public $group;
	public $page;
	
	/* Класс View похож на синглтон, храним статически его инстанс */
	private static $view_instance;
	
	public function __construct()
	{
		parent::__construct();
		
		// Если инстанс класса уже существует - просто используем уже существующие переменные
		if(self::$view_instance)
		{
			$this->currency     = &self::$view_instance->currency;
			$this->currencies   = &self::$view_instance->currencies;
			$this->user         = &self::$view_instance->user;
			$this->group        = &self::$view_instance->group;	
			$this->page         = &self::$view_instance->page;	
		}
		else
		{
			// Сохраняем свой инстанс в статической переменной,
			// чтобы в следующий раз использовать его
			self::$view_instance = $this;

			// Все валюты
			$this->currencies = $this->money->get_currencies(array('enabled'=>1));
	
			// Выбор текущей валюты
			if($currency_id = $this->request->get('currency_id', 'integer'))
			{
				$_SESSION['currency_id'] = $currency_id;
				header("Location: ".$this->request->url(array('currency_id'=>null)));
			}
			
			// Берем валюту из сессии
			if(isset($_SESSION['currency_id']))
				$this->currency = $this->money->get_currency($_SESSION['currency_id']);
			// Или первую из списка
			else
				$this->currency = reset($this->currencies);
	
			// Пользователь, если залогинен
			if(isset($_SESSION['user_id']))
			{
				$u = $this->users->get_user(intval($_SESSION['user_id']));
				if($u && $u->enabled)
				{
					$this->user = $u;
					$this->group = $this->users->get_group($this->user->group_id);
				
				}
			}

			// Текущая страница (если есть)
			$subdir = substr(dirname(dirname(__FILE__)), strlen($_SERVER['DOCUMENT_ROOT']));
			$page_url = trim(substr($_SERVER['REQUEST_URI'], strlen($subdir)),"/");
			if(strpos($page_url, '?') !== false)
				$page_url = substr($page_url, 0, strpos($page_url, '?'));
			$this->page = $this->pages->get_page((string)$page_url);
			$this->design->assign('page', $this->page);		
			
			// Передаем в дизайн то, что может понадобиться в нем
			$this->design->assign('currencies',	$this->currencies);
			$this->design->assign('currency',	$this->currency);
			$this->design->assign('user',       $this->user);
			$this->design->assign('group',      $this->group);
			
			$this->design->assign('config',		$this->config);
			$this->design->assign('settings',	$this->settings);

			// Настраиваем плагины для смарти
			$this->design->smarty->registerPlugin("function", "get_posts",					array($this, 'get_posts_plugin'));
			$this->design->smarty->registerPlugin("function", "get_albums",					array($this, 'get_albums_plugin'));
			$this->design->smarty->registerPlugin("function", "get_brands",					array($this, 'get_brands_plugin'));
			$this->design->smarty->registerPlugin("function", "get_events",					array($this, 'get_events_plugin'));
			$this->design->smarty->registerPlugin("function", "get_whoms",					array($this, 'get_whoms_plugin'));
			$this->design->smarty->registerPlugin("function", "get_browsed_products",		array($this, 'get_browsed_products'));
			$this->design->smarty->registerPlugin("function", "get_featured_products",		array($this, 'get_featured_products_plugin'));
			$this->design->smarty->registerPlugin("function", "get_new_products",			array($this, 'get_new_products_plugin'));
			$this->design->smarty->registerPlugin("function", "get_discounted_products",	array($this, 'get_discounted_products_plugin'));
			$this->design->smarty->registerPlugin("function", "get_banners",               	array($this, 'get_banners_plugin'));
			$this->design->smarty->registerPlugin("function", "get_products",            	array($this, 'get_products_plugin'));
			$this->design->smarty->registerPlugin("function", "get_session_products",    	array($this, 'get_session_products_plugin'));
			$this->design->smarty->registerPlugin("function", "remove_product_session",  	array($this, 'remove_product_session_plugin'));
			$this->design->smarty->registerPlugin("function", "add_product_session",     	array($this, 'add_product_session_plugin'));
			$this->design->smarty->registerPlugin("function", "get_comments", 			 	array($this, 'get_comments_plugin'));
			$this->design->smarty->registerPlugin("function", "get_photos",					array($this, 'get_photos_plugin'));
			$this->design->smarty->registerPlugin("function", "get_dmenus", 				array($this, 'get_dmenus_plugin'));
		}
	}
		
	/**
	 *
	 * Отображение
	 *
	 */
	function fetch()
	{
		return false;
	}
	
	/**
	 *
	 * Плагины для смарти
	 *
	 */	
	public function get_posts_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->blog->get_posts($params));
	}
	
	public function get_albums_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->photo->get_albums($params));
	}
	
	public function get_photos_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->photo->get_photos($params));
	}

	public function get_brands_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->brands->get_brands($params));
	}
	
	public function get_events_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->events->get_events($params));
	}
	
	public function get_whoms_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->whoms->get_whoms($params));
	}
	
	public function get_browsed_products($params, &$smarty)
	{
		if(!empty($_COOKIE['browsed_products']))
		{
			$browsed_products_ids = explode(',', $_COOKIE['browsed_products']);
			$browsed_products_ids = array_reverse($browsed_products_ids);
			if(isset($params['limit']))
				$browsed_products_ids = array_slice($browsed_products_ids, 0, $params['limit']);

			$products = array();
			foreach($this->products->get_products(array('id'=>$browsed_products_ids, 'visible'=>1)) as $p)
				$products[$p->id] = $p;
			
			
			
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$browsed_products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
			
			
			$browsed_products_images = $this->products->get_images(array('product_id'=>$browsed_products_ids));
			foreach($browsed_products_images as $browsed_product_image)
				if(isset($products[$browsed_product_image->product_id]))
					$products[$browsed_product_image->product_id]->images[] = $browsed_product_image;
			
			foreach($browsed_products_ids as $id)
			{	
				if(isset($products[$id]))
				{
					if(isset($products[$id]->images[0]))
						$products[$id]->image = $products[$id]->images[0];
					$result[] = $products[$id];
				}
			}
			$smarty->assign($params['var'], $result);
		}
	}
	
	
	public function get_featured_products_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		$params['featured'] = 1;
		if(!empty($params['var']))
		{
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;

			if(!empty($products))
			{
				// id выбраных товаров
				$products_ids = array_keys($products);
		
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
				
				// Выбираем изображения товаров
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
			}

			$smarty->assign($params['var'], $products);
			
		}
	}
		
	
	public function get_new_products_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!isset($params['sort']))
			$params['sort'] = 'created';
		if(!empty($params['var']))
		{
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;

			if(!empty($products))
			{
				// id выбраных товаров
				$products_ids = array_keys($products);
		
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
				
				// Выбираем изображения товаров
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
			}

			$smarty->assign($params['var'], $products);
			
		}
	}
	
	
	public function get_discounted_products_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		$params['discounted'] = 1;
		if(!empty($params['var']))
		{
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;

			if(!empty($products))
			{
				// id выбраных товаров
				$products_ids = array_keys($products);
		
				// Выбираем варианты товаров
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				
				// Для каждого варианта
				foreach($variants as &$variant)
				{
					// добавляем вариант в соответствующий товар
					$products[$variant->product_id]->variants[] = $variant;
				}
				
				// Выбираем изображения товаров
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
			}

			$smarty->assign($params['var'], $products);
			
		}
	}
	
	public function get_banners_plugin($params, &$smarty)
	{
		if($params['name'])
		{
			if( ($category = $this->banner->getCategoryByMnem($params['name']) ))
			{

				$elfilter = array();
				$elfilter['category_id'] = $category->id;
				$elfilter['sort'] = $category->sorted;
				$elfilter['enabled'] = 1;
				if($category->limited > 0)
				{
					$elfilter['limit'] = (int)$category->limited;
				}

				$elements = $this->banner->getElements($elfilter);
				$smarty->assign($params['var'], $elements);
			}
		}
	}
	public function add_product_session_plugin($params, &$smarty)
	{
        $key  = $params['key'];
        $id   = $params['id'];
        if(empty($key) && empty($id))
            return false;
        if(!$this->design->smarty->templateExists('products_session_'.$key.'_informer.tpl'))
            return false;
        $product = $this->products->get_product((int)$id);
        if(empty($product))
            return false;
		$_SESSION[$key][$product->id] = $product->id;
	}
	public function remove_product_session_plugin($params, &$smarty)
	{
		if(!empty($params['key']) && $params['remove'] && !empty($_SESSION[$params['key']][$params['remove']]))
        {
            unset($_SESSION[$params['key']][$params['remove']]);
		}
	}
	public function get_session_products_plugin($params, &$smarty)
	{
		if(!empty($_SESSION[$params['key']]))
        {
            $result = new stdClass();
            $result->key   = $params['key']; // ключ
            $result->ids   = $_SESSION[$params['key']]; // сессия
            $result->count = count($_SESSION[$params['key']]); // количество
            $smarty->assign($params['key'], $result);
		}
	}
	public function get_products_plugin($params, &$smarty)
	{
		if(!empty($params['var']))
		{
            if(!empty($params['get_session_products'])){
                if(!empty($_SESSION[$params['get_session_products']])){
                    $params['id'] = $_SESSION[$params['get_session_products']];
                    $params['visible'] = 1;
                }
                else{
                    return false;
                }
            }
			foreach($this->products->get_products($params) as $p)
				$products[$p->id] = $p;
			if(!empty($products))
			{
				$products_ids = array_keys($products);
				$variants = $this->variants->get_variants(array('product_id'=>$products_ids, 'in_stock'=>true));
				foreach($variants as &$variant)
				{
					$products[$variant->product_id]->variants[] = $variant;
				}
				$images = $this->products->get_images(array('product_id'=>$products_ids));
				foreach($images as $image)
					$products[$image->product_id]->images[] = $image;

                if(!empty($params['data_features'])){
    			    $properties = $this->features->get_product_options($products_ids);
    			    foreach($properties as $property)
    				    $products[$property->product_id]->options[] = $property;
                }
                if(!empty($params['data_categories'])){
    			    $categories = $this->categories->get_categories(array('product_id'=>$products_ids));
                    $product_categories = $this->categories->get_product_categories($products_ids);
    			    foreach($product_categories as $category)
    				    $products[$category->product_id]->categories[$category->category_id] = $categories[$category->category_id];
                }
				foreach($products as &$product)
				{
					
					if(isset($product->variants[0]))
						$product->variant = $product->variants[0];
					if(isset($product->images[0]))
						$product->image = $product->images[0];
					if(!empty($product->categories))
						$product->category = reset($product->categories);
				}
			}
			$smarty->assign($params['var'], $products);

		}
	}
	
	 
	public function get_comments_plugin($params, &$smarty)
	{
		if(!isset($params['approved']))
			$params['approved'] = 1;
		if(!empty($params['var']))
			$smarty->assign($params['var'], $this->comments->get_comments($params));
	}
	
	public function get_dmenus_plugin($params, &$smarty)
	{
		if(!isset($params['visible']))
			$params['visible'] = 1;
		if(!isset($params['menu_visible']))
			$params['menu_visible'] = 1;
        if(!empty($params['var'])){
			$smarty->assign($params['var'], $this->dmenus->get_menus_tree($params));
		}
	}
}
