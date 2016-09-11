<?php
/*
 * 分类控制器
 */
namespace Home\Controller;

use Think\Controller;

class CategoryController extends Controller {
    protected $categoryLogic;
    public function __construct() {
        $this -> categoryLogic = D('Category', 'Logic');
    }    
    public function addCategory(){
        $this -> getResponse(addCategory);
    }

    public function categoryList() {
        $this -> getResponse(categoryList);
    }

    public function addSign() {
        $this -> getResponse(addSign);
    }

    public function editCategory() {
        $this -> getResponse(editCategory);
    }

    public function editSign() {
        $this -> getResponse(editSign);
    }

    public function enableCategory() {
        $this -> getResponse(enableCategory);
    }

    public function disableCategory() {
        $this -> getResponse(disableCategory);
    }

    public function enableSign() {
        $this -> getResponse(enableSign);
    }

    public function disableSign() {
        $this -> getResponse(disableSign);
    }

    protected function getResponse($function) {
        if (IS_POST) {
            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this -> categoryLogic -> $function($data);
            $this -> ajaxReturn($response);
        } else {
            $this -> ajaxReturn('sorry, access denied');
        }
    }
}
