<?PHP

/**
 * Simpla CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simplacms.ru
 * @author 		Denis Pikusov
 *
 * Этот класс использует шаблоны photo.tpl и album.tpl
 *
 */

require_once('View.php');

class PhotoView extends View
{
	public function fetch()
	{
		$url = $this->request->get('url', 'string');
		
		// Если указан адрес поста,
		if(!empty($url))
		{
			// Выводим пост
			return $this->fetch_album($url);
		}
		else
		{
			// Иначе выводим ленту блога
			return $this->fetch_photo();
		}
	}
	
	private function fetch_album($url)
	{
		// Выбираем пост из базы
		$album = $this->photo->get_album($url);
		
		$album->images = $this->photo->get_images(array('album_id'=>$album->id));
		$album->image = &$album->images[0];
		
		// Если не найден - ошибка
		if(!$album || (!$album->visible && empty($_SESSION['admin'])))
			return false;
		
		// Автозаполнение имени для формы комментария
		if(!empty($this->user))
		{
			$this->design->assign('comment_name', $this->user->name);
			$this->design->assign('comment_email', $this->user->email);
		}
		
		// Принимаем комментарий
		if ($this->request->method('post') && $this->request->post('comment'))
		{
			$comment->name = $this->request->post('name');
			$comment->email = $this->request->post('email');
			$comment->text = $this->request->post('text');
			$comment->rate = $this->request->post('rate');
			
			// Передадим комментарий обратно в шаблон - при ошибке нужно будет заполнить форму
			$this->design->assign('comment_text', $comment->text);
			$this->design->assign('comment_name', $comment->name);
			
			// Проверяем капчу и заполнение формы
			if (empty($comment->name))
			{
				$this->design->assign('error', 'empty_name');
			}
			elseif (empty($comment->text))
			{
				$this->design->assign('error', 'empty_comment');
			}
			else
			{
				// Создаем комментарий
				$comment->object_id = $album->id;
				$comment->type      = 'photo';
				$comment->ip        = $_SERVER['REMOTE_ADDR'];
				
				// Если были одобренные комментарии от текущего ip, одобряем сразу
				$this->db->query("SELECT 1 FROM __comments WHERE approved=1 AND ip=? LIMIT 1", $comment->ip);
				if($this->db->num_rows()>0)
					$comment->approved = 1;
				
				// Добавляем комментарий в базу
				$comment_id = $this->comments->add_comment($comment);
				
				// Отправляем email
				// $this->notify->email_comment_admin($comment_id);				
				
				header('location: '.$_SERVER['REQUEST_URI'].'#comment_'.$comment_id);
			}			
		}
		
		// Комментарии к посту
		$comments = $this->comments->get_comments(array('type'=>'photo', 'object_id'=>$album->id, 'approved'=>1, 'ip'=>$_SERVER['REMOTE_ADDR']));
		$this->design->assign('comments', $comments);
		$this->design->assign('album', $album);
		
		// Мета-теги
		$this->design->assign('meta_title', $album->meta_title);
		$this->design->assign('meta_keywords', $album->meta_keywords);
		$this->design->assign('meta_description', $album->meta_description);
		
		return $this->design->fetch('album.tpl');
	}	
	
	// Отображение списка постов
	private function fetch_photo()
	{
		// Количество постов на 1 странице
		$items_per_page = 20;

		$filter = array();
		
		// Выбираем только видимые посты
		$filter['visible'] = 1;
		
		// Текущая страница в постраничном выводе
		$current_page = $this->request->get('page', 'integer');
		
		// Если не задана, то равна 1
		$current_page = max(1, $current_page);
		$this->design->assign('current_page_num', $current_page);

		// Вычисляем количество страниц
		$albums_count = $this->photo->count_albums($filter);

		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$items_per_page = $albums_count;	

		$pages_num = ceil($albums_count/$items_per_page);
		$this->design->assign('total_pages_num', $pages_num);

		$filter['page'] = $current_page;
		$filter['limit'] = $items_per_page;
		
		// Выбираем статьи из базы
		$albums = array();
		$temp_albums = $this->photo->get_albums($filter);
		if(empty($temp_albums))
			return false;

		$albums_ids = array();
		foreach($temp_albums as $p) {
			$albums[$p->id] = $p;
			$albums_ids[] = $p->id;
		}

		$images = $this->photo->get_images(array('album_id'=>$albums_ids));
		foreach($images as $i)
			$albums[$i->album_id]->images[] = $i; 
		
		// Передаем в шаблон
		$this->design->assign('albums', $albums);
		
		// Метатеги
		if($this->page)
		{
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		}
		
		$body = $this->design->fetch('photo.tpl');
		
		return $body;
	}	
}