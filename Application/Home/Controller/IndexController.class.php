<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){

        $category = D('Category')->getTree();
        $speakers    = D('Document')
        ->field('title,cover_id,honor,honor_en,title_en,hr_document_speakers.id')
        ->join('hr_document_speakers ON hr_document.id = hr_document_speakers.id')
        ->order(array('level'=>'desc'))
        ->where('category_id = 39  AND status = 1')
        ->limit(8)
        ->select();

        foreach ($speakers as $key => $value) {
            $honors_cn=explode(',',$value['honor']);
            $honors_en=explode(',',$value['honor_en']);

            $speakers[$key]['honor_cn'] = isset($honors_cn[0])?$honors_cn[0]: ' ';
            $speakers[$key]['honor_en'] = isset($honors_en[0]) ? $honors_en[0] : ' ';
        }

        $cases    = D('Document')
        ->field('title, cover_id, description,id')
        ->where('category_id = 41 AND status = 1')
        ->order(array('level'=>'desc'))
        ->limit(5)
        ->select();


        $SilderModel = D('Addons://Silder/Silder');
            $info = $SilderModel->silderLists($param);

            if(empty($info)){
                return ;
            }

            $this->assign('addons_info', $info);

        $this->assign('category',$category);//栏目
        $this->assign('speakers',$speakers);//列表
        $this->assign('cases',$cases);//列表
        $this->assign('page',D('Document')->page);//分页

                 
        $this->display('index2');
    }

    //关于我们
    public function about(){
        
                
                $lists    = D('Document')->lists(44,'`id` DESC',1,'`title`,`cover_id`,`description`');
                $this->assign('founders',$lists);//列表  
                
                $this->display('about');
            }

}