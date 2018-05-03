<?php

namespace app\ctrl;

class indexCtrl extends \core\imooc
{
	 /**
     * 所有留言
     */
    public function index(){
        $model = new \app\model\guestbookModel();
        $ret = $model->all();
        // var_dump($ret);exit;
        $this->assign('data', $ret);
        $this->display('index.html');
    }
    /**
     * 添加留言
     */
    public function add(){
        $this->display('add.html');
    }
    /**
     * 保存留言
     */
    public function save(){
        $data['title'] = post('title');
        $data['content'] = post('content');
        // $data['createtime'] = time();
        $model = new \app\model\guestbookModel();
        $ret = $model->addOne($data);
        if($ret){
            jump('/PHP-FrameWork/');
        }else{
            p('error');
        }
    }

    public function del(){
        $id = get('id',0,'int');
        if($id){
            $model = new \app\model\guestbookModel();
            $ret = $model->deleteOne($id);
            if($ret){
                jump('/PHP-FrameWork/');
            }else{
                exit('删除失败');    
            }
        }else{
            exit('参数错误');
        }
    }


    public function test(){
        // $model = new \app\model\testModel();
        // $data = $model->updateOne(1,array(
        //     'name'=>'他们'
        // ));
        // dump($data);
        //$temp = \core\lib\conf::get('DEFAULT_CTRL', 'route');
        //$temp = \core\lib\conf::get('DEFAULT_ACTION', 'route');
        //p($temp);
        $data = 'Hello World';
        $title = '视图文件';
        $this->assign('title', $title);
        $this->assign('data', $data);
        $this->display('test.html');
    }
}