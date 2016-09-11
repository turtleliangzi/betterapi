<?php

namespace Home\Model;

use Think\Model\RelationModel;

class CategoryModel extends RelationModel {
    protected $_link = array(
        'Sign' => array(
            'mapping_type' => self::HAS_MANY,
            'class_name'   => 'Sign',
            'foreign_key'  => 'category',
            'mapping_name' => 'signs'
        )
    );
    public function categoryList($limit1, $limit2) {
        $Category = D('Category');
        $categorylist = $Category -> relation(true) -> limit($limit1, $limit2) -> select();
        return $categorylist;
    }

    public function getCategoryMount() {
        $mount = M('Category') -> count();
        return $mount;
    }
    public function authCategory($cname) {
        $where['cname'] = $cname;
        $category = M('Category') -> where($where) -> select();
        return $category;
    }   

    public function authCategoryExist($data) {
        $where['categoryid'] = $data['categoryid'];
        return M('Category') -> where($where) -> select();
    }

    public function addCategory($cname) {
        $data['cname'] = $cname;
        $rs = M('Category') -> add($data);
        return $rs;
    }

    public function editCategory($data) {
        return M('Category') -> save($data);
    }

    public function authSign($data) {
        $where['signname'] = $data['signname'];
        $where['category'] = $data['category'];
        $sign = M('Sign') -> where($where) -> select();
        return $sign;
    }

    public function authSignExist($data) {
        $where['signid'] = $data['signid'];
        return M('Sign') -> where($where) -> select();
    }

    public function addSign($data) {
        $data['category'] = $data['categoryid'];
        $rs = M('Sign') -> add($data);
        return $rs;
    }

    public function editSign($data) {
        return M('Sign') -> save($data);
    }

    public function enableCategory($data) {
        $data['status'] = 1;
        return M('Category') -> save($data);
    }

    public function disableCategory($data) {
        $data['status'] = 0;
        return M('Category') -> save($data);
    }

    public function enableSign($data) {
        $data['status'] = 1;
        return M('Sign') -> save($data);
    }

    public function disableSign($data) {
        $data['status'] = 0;
        return M('Sign') -> save($data);
    }
}
