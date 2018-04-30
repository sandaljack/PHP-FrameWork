<?php

namespace core;

class imooc
{	
	static public $classMap = array();
	static public function run()
	{
		$route = new \core\route;
	}

	static public function load($class)
	{
		//自动加载类
		//new \core\route()
		//$class = '\core\route';
		//IMOOC.'/core/route.php';
		if (isset($classMap[$class])) {
			return true;
		} else {
			$class = str_replace('\\', '/', $class);
			$file = IMOOC.'/'.$class.'.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}
		
	}
}