# PHP-FrameWork
学习搭建PHP框架

### 框架运行流程 ###

入口文件 -> 定义常量 -> 引入函数库 -> 自动加载类 -> 启动框架 -> 路由解析 -> 加载控制器 -> 返回结果

### 入口文件 ###
1.定义常量

2.加载函数库

3.启动框架

### 类自动加载 ###

	spl_autoload_register('\core\imooc::load');
	//没有引入的类调用load方法

### 路由类 ###
默认的路由地址： xxx.com/index.php/index/index

1.隐藏index.php
  (在根目录添加.htaccess文件)

2.获取URL参数部分
  (/index/index/id/1/str/2)

3.返回对应的控制器和方法

### 模型类 ###
继承pdo

### 视图类 ###
	extract()   数组打散函数    
	将数组生成以键为变量名以值为变量值的变量

### 配置类 ###