<?PHP

require_once('api/Simpla.php');

class WhomsAdmin extends Simpla
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
						$this->whoms->delete_whom($id);    
		        break;
				}
			}
		}	

		$whoms = $this->whoms->get_whoms();
 
		$this->design->assign('whoms', $whoms);
		return $this->body = $this->design->fetch('whoms.tpl');
	}
}

