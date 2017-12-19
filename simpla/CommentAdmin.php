<?PHP
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require_once('api/Simpla.php');

class CommentAdmin extends Simpla
{
	private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
	public function fetch()
	{
		$comment = new stdClass();
		if($this->request->method('POST'))
		{
			$comment->id = $this->request->post('id', 'integer');
			$comment->name = $this->request->post('name');
			$comment->email = $this->request->post('email');
			
			
			$comment->type = $this->request->post('type');
			$comment->object_id = $this->request->post('object_id');
			$comment->approved = $this->request->post('approved', 'boolean');

			$comment->text = $this->request->post('text');
			$comment->otvet = $this->request->post('otvet');
			$comment->rate = $this->request->post('rate');
			

			$is_notify = $this->request->post('notify_user');

  			$comment_id = $this->comments->update_comment($comment->id, $comment);
			if ($comment_id and $is_notify and $comment->email and $comment->otvet)
				$this->notify->email_comment_user($comment_id);
				
  			$comment = $this->comments->get_comment($comment->id);
			$this->design->assign('message_success', 'updated');
			
			
            // Удаление изображения
            if($this->request->post('delete_image'))
            {
                $this->comments->delete_image($comment_id);
            }
            // Загрузка изображения
            $image = $this->request->files('image');
            if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
            {
                if ($image_name = $this->image->upload_image($image['tmp_name'], $image['name']))
                {
                        $this->comments->delete_image($comment->id);
                        $this->comments->update_comment($comment->id, array('image'=>$image_name));
                }
                else
                {
                    $this->design->assign('error', 'error uploading image');
                }    
            }    
			$comment = $this->comments->get_comment(intval($comment->id));
			
		}
		
		
		else
		{
			$comment->id = $this->request->get('id', 'integer');
			$comment = $this->comments->get_comment(intval($comment->id));
		}
		


		// Выбирает объект, который прокомментирован:
		if($comment->type == 'product')
		{
			$products = array();
			$products_ids = array();
			$products_ids[] = $comment->object_id;
			foreach($this->products->get_products(array('id'=>$products_ids)) as $p)
				$products[$p->id] = $p;
			if(isset($products[$comment->object_id]))
				$comment->product = $products[$comment->object_id];
		}

		if($comment->type == 'blog')
		{
			$posts = array();
			$posts_ids = array();
			$posts_ids[] = $comment->object_id;
			foreach($this->blog->get_posts(array('id'=>$posts_ids)) as $p)
				$posts[$p->id] = $p;
			if(isset($posts[$comment->object_id]))
				$comment->post = $posts[$comment->object_id];
		}
		
 		
		$this->design->assign('comment', $comment);
		
 	  	return $this->design->fetch('comment.tpl');
	}
}