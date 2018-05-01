<?php

namespace app\ctrl;

class indexCtrl
{
	public function index()
	{
		$model = new \core\lib\model();
		$sql = "SELECT * FROM shop_user";
		var_dump($model->query($sql)->fetchall(2));
	}
}