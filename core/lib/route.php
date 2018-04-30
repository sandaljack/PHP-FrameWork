<?php 

namespace core\lib;

class route
{	
	public $ctrl;
	public $action;
	public function __construct()
	{
		//XXX.com/index.php/index/index
		//1.隐藏index.php 根目录建立.htaccess
		//2.获取url 参数部分
		//3.返回对应的控制器和方法
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/PHP-FrameWork/') {
			$path = $_SERVER['REQUEST_URI'];
			$patharr = explode('/',trim($path,'/'));
			if (isset($patharr[1])) {
				$this->ctrl = $patharr[1];
			}
			//删除控制器和方法为了拿后面的
			unset($patharr[0]);
			unset($patharr[1]);
			if (isset($patharr[2])) {
				$this->action = $patharr[2];
				unset($patharr[2]);
			} else {
				$this->action = 'index';
			}
			//url多余部分转换成GET
			//id/1/str/2/test/3
			$count = count($patharr)+3;
			$i = 3;
			while ($i < $count) {
				//判断是否存在第二个参数
				if (isset($patharr[$i + 1])) {
					$_GET[$patharr[$i]] = $patharr[$i + 1];
				}
				$i = $i + 2;
			}
			// p($_GET);
			// p($patharr);
		} else {
			$this->ctrl = 'index';
			$this->action = 'index';
		}
	}
}