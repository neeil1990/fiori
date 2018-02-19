<?php

require_once('api/Simpla.php');


class CityAdmin extends Simpla
{

    function fetch()
    {

        if($this->request->method('post'))
        {
            $alias = strip_tags(trim($this->request->post('alias')));
            $name_city = strip_tags(trim($this->request->post('name_city')));
            $data = array("alias" => $alias,"name_city" => $name_city);

            if($alias and $name_city){
                $this->city->add_city($data);
            }else{
                // Действия с выбранными
                $ids = $this->request->post('check');
                if(is_array($ids))
                    switch($this->request->post('action'))
                    {
                        case 'disable':
                        {
                            foreach($ids as $id)
                                $this->city->update_city($id, array('visible'=>0));
                            break;
                        }
                        case 'enable':
                        {
                            foreach($ids as $id)
                                $this->city->update_city($id, array('visible'=>1));
                            break;
                        }
                        case 'delete':
                        {
                            foreach($ids as $id)
                                $this->city->delete_city($id);
                            break;
                        }
                    }
            }


        }

        $citys = $this->city->get_city();
        $this->design->assign('citys', $citys);

        return  $this->design->fetch('city.tpl');
    }
}