<?PHP

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once('api/Simpla.php');

class AlbumAdmin extends Simpla
{
	private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');
	public function fetch()
	{
		$images = array();
		$album = new stdClass;
		if($this->request->method('post'))
		{
			$album->id = $this->request->post('id', 'integer');
			$album->name = $this->request->post('name');
			$album->date = date('Y-m-d', strtotime($this->request->post('date')));
			
			$album->visible = $this->request->post('visible', 'boolean');

			$album->url = trim($this->request->post('url', 'string'));
			$album->meta_title = $this->request->post('meta_title');
			$album->meta_keywords = $this->request->post('meta_keywords');
			$album->meta_description = $this->request->post('meta_description');
			
			$album->annotation = $this->request->post('annotation');
			$album->text = $this->request->post('body');

 			// Не допустить одинаковые URL разделов.
			if(($a = $this->photo->get_album($album->url)) && $a->id!=$album->id)
			{			
				$this->design->assign('message_error', 'url_exists');
				$images = $this->photo->get_images(array('album_id'=>$album->id));
			}
			else
			{
				if(empty($album->id))
				{
	  				$album->id = $this->photo->add_album($album);
	  				$album = $this->photo->get_album($album->id);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->photo->update_album($album->id, $album);
  	    			$album = $this->photo->get_album($album->id);
					$this->design->assign('message_success', 'updated');
  	    		}	
				
				// Удаление изображений
				$images = (array)$this->request->post('images');
				$current_images = $this->photo->get_images(array('album_id'=>$album->id));
				foreach($current_images as $image)
				{
					if(!in_array($image->id, $images))
						$this->photo->delete_image($image->id);
					}

				// Порядок изображений
				if($images = $this->request->post('images'))
				{
					$i=0;
					foreach($images as $id)
					{
						$this->photo->update_image($id, array('position'=>$i));
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
							$this->photo->add_image($album->id, $image_name);
						}
						else
						{
							$this->design->assign('error', 'error uploading image');
						}
					}
				}
				
	   	   		// Загрузка изображений drag-n-drop
		 	    if($images = $this->request->post('images_urls'))
		 	    {
					foreach($images as $url)
					{
						// Если не пустой адрес и файл не локальный
						if(!empty($url) && $url != 'http://' && strstr($url,'/')!==false)
				 			$this->photo->add_image($album->id, $url);
				 		elseif($dropped_images = $this->request->files('dropped_images'))
				  		{
				 			$key = array_search($url, $dropped_images['name']);
						 	if ($key!==false && $image_name = $this->image->upload_image($dropped_images['tmp_name'][$key], $dropped_images['name'][$key]))
					  	   				$this->photo->add_image($album->id, $image_name);
						}
					}
				}
				
				$images = $this->photo->get_images(array('album_id'=>$album->id));
				
				
				
			}
		}
		else
		{
			$album->id = $this->request->get('id', 'integer');
			$album = $this->photo->get_album(intval($album->id));
			
			if($album && $album->id)
			{
				// Изображения товара
				$images = $this->photo->get_images(array('album_id'=>$album->id));
			}
			
		}

		if(empty($album))
		{
			$album = new stdClass;
			$album->date = date($this->settings->date_format, time());
		}
 		
		$this->design->assign('album_images', $images);
		$this->design->assign('album', $album);
		
		
 	  	return $this->design->fetch('album.tpl');
	}
}