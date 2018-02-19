<?PHP

/**
 * Simpla CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simp.la
 * @author 		Denis Pikusov
 *
 * Этот класс использует шаблон index.tpl,
 * который содержит всю страницу кроме центрального блока
 * По get-параметру module мы определяем что сожержится в центральном блоке
 *
 */

require_once('View.php');

class IndexView extends View
{	
	public $modules_dir = 'view/';

	public function __construct()
	{
		parent::__construct();
	}

		
	/**
	 *
	 * Отображение
	 *
	 */
	function fetch()
	{
		
        if($this->request->method('post') && $this->request->post('callback'))
        {
                $callback->name        = $this->request->post('name');
                $callback->email         = $this->request->post('email');

                
                $this->design->assign('callname',  $callback->name);
                $this->design->assign('callemail', $callback->email);			
                $this->design->assign('call_sent', true);				
                $callback_id = $this->callbacks->add_callback($callback);				
                // Отправляем email
                $this->callbacks->email_callback_admin($callback_id);				
        }
		
		// Содержимое корзины
		$this->design->assign('cart',		$this->cart->get_cart());
	
        // Категории товаров
		$this->design->assign('categories', $this->categories->get_categories_tree());

		$city = $this->city->get_city_alias_filter($_SERVER['HTTP_HOST']);
		if(!$city){
			$city = "fiori.ru";
		}
		$this->design->assign('city', $city);

		$city_array = $this->city->get_city(array("visible" => 1));
		if($city_array){
			$row_city = ceil(count($city_array) / 3);
			$this->design->assign('citys', array_chunk($city_array,$row_city));
		}

		// Страницы
		$pages = $this->pages->get_pages(array('visible'=>1));		
		$this->design->assign('pages', $pages);
							
		// Текущий модуль (для отображения центрального блока)
		$module = $this->request->get('module', 'string');
		$module = preg_replace("/[^A-Za-z0-9]+/", "", $module);

		// Если не задан - берем из настроек
		if(empty($module))
			return false;
		//$module = $this->settings->main_module;

		// Создаем соответствующий класс
		if (is_file($this->modules_dir."$module.php"))
		{
				include_once($this->modules_dir."$module.php");
				if (class_exists($module))
				{
					$this->main = new $module($this);
				} else return false;
		} else return false;

		// Создаем основной блок страницы
		if (!$content = $this->main->fetch())
		{
			return false;
		}		

		// Передаем основной блок в шаблон
		$this->design->assign('content', $content);		
		
		// Передаем название модуля в шаблон, это может пригодиться
		$this->design->assign('module', $module);
			
		$uorders = $this->orders->get_orders(array('user_id'=>$this->user->id));
		$this->design->assign('uorders', $uorders);
			
			
		// Создаем текущую обертку сайта (обычно index.tpl)
		$wrapper = $this->design->get_var('wrapper');
		if(is_null($wrapper))
			$wrapper = 'index.tpl';
			
		if(!empty($wrapper))
			return $this->body = $this->design->fetch($wrapper);
		else
			return $this->body = $content;

	}
}
