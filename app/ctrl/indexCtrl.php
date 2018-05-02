<?php

namespace app\ctrl;

class indexCtrl extends \core\imooc
{
	public function index()
	{
		// $model = new \core\lib\model();
		// $sql = "SELECT * FROM shop_user";
		// $user = $model->select('shop_user','*');
		// $temp = \core\lib\conf::get('CTRL', 'route');
		// $temp = \core\lib\conf::all('database');
		// var_dump($user);
		$model = new \app\model\userModel();
		$data = $model->lists();
		
		$data = 'hello world';
		$this->assign('data', $data);
		$this->display('index.html');
	}
}