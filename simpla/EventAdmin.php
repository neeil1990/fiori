<?php

require_once('api/Simpla.php');


############################################
# Class Category - Edit the good gategory
############################################
class EventAdmin extends Simpla
{
  private $allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');

  function fetch()
  {
	  	$event = new stdClass;
		if($this->request->method('post'))
		{
			$event->id = $this->request->post('id', 'integer');
			$event->name = $this->request->post('name');
			$event->description = $this->request->post('description');

			$event->url = trim($this->request->post('url', 'string'));
			$event->meta_title = $this->request->post('meta_title');
			$event->meta_keywords = $this->request->post('meta_keywords');
			$event->meta_description = $this->request->post('meta_description');
			
			// Не допустить одинаковые URL разделов.
			if(($c = $this->events->get_event($event->url)) && $c->id!=$event->id)
			{			
				$this->design->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($event->id))
				{
	  				$event->id = $this->events->add_event($event);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->events->update_event($event->id, $event);
					$this->design->assign('message_success', 'updated');
  	    		}	
  	    		// Удаление изображения
  	    		if($this->request->post('delete_image'))
  	    		{
  	    			$this->events->delete_image($event->id);
  	    		}
  	    		// Загрузка изображения
  	    		$image = $this->request->files('image');
  	    		if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions))
  	    		{
  	    			$this->events->delete_image($event->id);   	    			
  	    			move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->events_images_dir.$image['name']);
  	    			$this->events->update_event($event->id, array('image'=>$image['name']));
  	    		}
	  			$event = $this->events->get_event($event->id);
			}
		}
		else
		{
			$event->id = $this->request->get('id', 'integer');
			$event = $this->events->get_event($event->id);
		}
		
 		$this->design->assign('event', $event);
		return  $this->design->fetch('event.tpl');
	}
}