<?php

namespace app\ctrl;

class indexCtrl extends \core\imooc
{
	public function index()
	{
		$model = new \core\lib\model();
		$sql = "SELECT * FROM shop_user";
		
		$data = 'hello world';
		$this->assign('data', $data);
		$this->display('index.html');
	}
}