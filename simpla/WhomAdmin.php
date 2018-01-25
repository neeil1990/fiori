<?php

require_once('api/Simpla.php');


############################################
# Class Category - Edit the good gategory
############################################
class WhomAdmin extends Simpla
{
  private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');

  function fetch()
  {
	  	$whom = new stdClass;
		if($this->request->method('post'))
		{
			$whom->id = $this->request->post('id', 'integer');
			$whom->name = $this->request->post('name');
			$whom->description = $this->request->post('description');

			$whom->url = trim($this->request->post('url', 'string'));
			$whom->meta_title = $this->request->post('meta_title');
			$whom->meta_keywords = $this->request->post('meta_keywords');
			$whom->meta_description = $this->request->post('meta_description');
			
			// Не допустить одинаковые URL разделов.
			if(($c = $this->whoms->get_whom($whom->url)) && $c->id!=$whom->id)
			{			
				$this->design->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($whom->id))
				{
	  				$whom->id = $this->whoms->add_whom($whom);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->whoms->update_whom($whom->id, $whom);
					$this->design->assign('message_success', 'updated');
  	    		}	
  	    		// Удаление изображения
  	    		if($this->request->post('delete_image'))
  	    		{
  	    			$this->whoms->delete_image($whom->id);
  	    		}
  	    		// Загрузка изображения
  	    		$image = $this->request->files('image');
  	    		if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
  	    		{
  	    			$this->whoms->delete_image($whom->id);   	    			
  	    			move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->whoms_images_dir.$image['name']);
  	    			$this->whoms->update_whom($whom->id, array('image'=>$image['name']));
  	    		}
	  			$whom = $this->whoms->get_whom($whom->id);
			}
		}
		else
		{
			$whom->id = $this->request->get('id', 'integer');
			$whom = $this->whoms->get_whom($whom->id);
		}
		
 		$this->design->assign('whom', $whom);
		return  $this->design->fetch('whom.tpl');
	}
}