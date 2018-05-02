<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

//当前框架所在目录
define('IMOOC', realpath('./'));

//框架核心文件所在目录
define('CORE', IMOOC.'/core');

//项目文件所在目录
define('APP',IMOOC.'\app');

define('MODULE', 'app');

//是否开启调试模式
define('DEBUG',true);

include "vendor/autoload.php";

if (DEBUG) {
	//错误累显示
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('display_error', 'On');
} else {
	ini_set('display_error', 'Off');
}


//加载函数库
include CORE.'/common/function.php';

//加载框架核心文件
include CORE.'/imooc.php';

//new一个类不存在触发这个方法
spl_autoload_register('\core\imooc::load');

\core\imooc::run();