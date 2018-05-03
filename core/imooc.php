<?php

namespace core;

class imooc
{	
	public $assign;
	static public $classMap = array();
	static public function run()
	{	
		\core\lib\log::init();
		\core\lib\log::log($_SERVER,'server');
		$route = new \core\lib\route;
		$ctrlClass = $route->ctrl;
		$action = $route->action;

		$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';

		$cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';

		if (is_file($ctrlfile)) {
			include $ctrlfile;
			$ctrl = new $cltrlClass();
			$ctrl->$action();
			
		} else {
			throw new \Exception('找不到控制器'.$ctrlClass);
		}
	
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

	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}

	public function display($file)
	{	
		$filename = $file;
		$file = APP.'/views/'.$file;
		if (is_file($file)) {
			//打散数组，变为单独的变量,将数组生成以键为变量名以值为变量值的变量
			// extract($this->assign);
			// include $file;
			
			\Twig_Autoloader::register();

			$loader = new \Twig_Loader_Filesystem(APP.'/views');
			$twig = new \Twig_Environment($loader,array(
					// 'cache' => IMOOC.'/log',
				));
			$template = $twig->loadTemplate($filename);
			$template->display($this->assign?$this->assign:array());
		}
	}
}