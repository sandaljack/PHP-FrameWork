<?php
namespace app\model;

use core\lib\model;

class guestbookModel extends model
{
	// public $table = 'shop_user';
	// public function lists()
	// {
	// 	return $this->select($this->table,'*');
	// }

	// public function getOne($id)
	// {
	// 	return $this->get($this->table,'*',array('id'=>$id));
	// }

	// public function setOne($id,$data)
	// {
	// 	return $this->update($this->table,$data,array('id'=>$id));
	// }

	// public function delOne($id)
	// {
	// 	return $this->delete($this->table,array('id'=>$id));
	// }
	
	public $table = 'guestbook';

    public function all(){
        return $this->select($this->table,"*");
    }

    public function addOne($data){
        return $this->insert($this->table, $data);
    }

    public function deleteOne($id){
        return $this->delete($this->table, array(
            'id'=>$id
        ));
    }
}