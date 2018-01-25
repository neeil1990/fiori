<?php

/**
 * Simpla CMS
 *
 * @copyright	2011 Denis Pikusov
 * @link		http://simplacms.ru
 * @author		Denis Pikusov
 *
 */
 
require_once('api/Simpla.php');

class PhotoAdmin extends Simpla
{
	public function fetch()
	{
		// Обработка действий
		if($this->request->method('post'))
		{
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
					$this->photo->update_album($ids, array('visible'=>0));	      
					break;
			    }
			    case 'enable':
			    {
					$this->photo->update_album($ids, array('visible'=>1));	      
			        break;
			    }
			    case 'delete':
			    {
				    foreach($ids as $id)
						$this->photo->delete_album($id);    
			        break;
			    }
			}				
		}

		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
		$filter['limit'] = 30;
  	
		// Поиск
		$keyword = $this->request->get('keyword', 'string');
		if(!empty($keyword))
		{
			$filter['keyword'] = $keyword;
			$this->design->assign('keyword', $keyword);
		}		
		
		$albums_count = $this->photo->count_albums($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $albums_count;	
		
		$albums = $this->photo->get_albums($filter);
		$this->design->assign('albums_count', $albums_count);
		
		$this->design->assign('pages_count', ceil($albums_count/$filter['limit']));
		$this->design->assign('current_page', $filter['page']);
		
		$this->design->assign('albums', $albums);
		return $this->design->fetch('photo.tpl');
	}
}
