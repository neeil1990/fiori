<?PHP

/**
 * Simpla CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simplacms.ru
 * @author 		Denis Pikusov
 *
 * Этот класс использует шаблон page.tpl
 *
 */
require_once('View.php');

class PageView extends View
{
	private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico', 'bmp');
	function fetch()
	{
		$url = $this->request->get('page_url', 'string');

		$page = $this->pages->get_page($url);
		
		// Отображать скрытые страницы только админу
		if(empty($page) || (!$page->visible && empty($_SESSION['admin'])))
			return false;
		
		$this->design->assign('page', $page);
		$this->design->assign('meta_title', $page->meta_title);
		$this->design->assign('meta_keywords', $page->meta_keywords);
		$this->design->assign('meta_description', $page->meta_description);
		
		// Автозаполнение имени для формы комментария
		if(!empty($this->user))
		{
			$this->design->assign('comment_name', $this->user->name);
			$this->design->assign('comment_email', $this->user->email);
		}
		
		// Принимаем комментарий
		if ($this->request->method('post') && $this->request->post('comment'))
		{
			$comment = new stdClass;
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
				$comment->object_id = $page->id;
				$comment->type      = 'feedback';
				$comment->ip        = $_SERVER['REMOTE_ADDR'];
				

				
				// Если были одобренные комментарии от текущего ip, одобряем сразу
				$this->db->query("SELECT 1 FROM __comments WHERE approved=1 AND ip=? LIMIT 1", $comment->ip);
				if($this->db->num_rows()>0)
					$comment->approved = 1;
				
				// Добавляем комментарий в базу
				$comment_id = $this->comments->add_comment($comment);
				
                // Загрузка изображения
                $image = $this->request->files('image');
                if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
                {
                    if ($image_name = $this->image->upload_image($image['tmp_name'], $image['name']))
                    {
                            $this->comments->delete_image($comment_id);
                            $this->comments->update_comment($comment_id, array('image'=>$image_name));
                    }
                    else
                    {
                        $this->design->assign('error', 'error uploading image');
                    }    
                }    
                $comment = $this->comments->get_comment(intval($comment_id));
				
				// Отправляем email
				$this->notify->email_comment_admin($comment_id);	
				//$this->smssend->send($this->settings->smsphone, 'Новый отзыв о сайте '.$this->config->root_url.'/reviews ');
				
				header('location: '.$_SERVER['REQUEST_URI'].'#comment_'.$comment_id);
			}			
		}


				
		// Комментарии к странице
		$comments = $this->comments->get_comments(array('type'=>'feedback', 'object_id'=>$page->id, 'approved'=>1, 'ip'=>$_SERVER['REMOTE_ADDR']));
		$this->design->assign('comments', $comments);
		
		return $this->design->fetch('page.tpl');
	}
}