<?PHP

require_once('api/Simpla.php');

class EventsAdmin extends Simpla
{
	function fetch()
	{

		// Обработка действий 	
		if($this->request->method('post'))
		{

			// Действия с выбранными
			$ids = $this->request->post('check');

			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'delete':
				{
					foreach($ids as $id)
						$this->events->delete_event($id);    
		        break;
				}
			}
		}	

		$events = $this->events->get_events();
 
		$this->design->assign('events', $events);
		return $this->body = $this->design->fetch('events.tpl');
	}
}

