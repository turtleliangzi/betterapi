<?php

namespace Home\Logic;

use Think\Model;

class CategoryLogic extends Model {
    protected $categoryModel;
    public function __construct() {
        $this -> categoryModel = D('Category');
    }
    public function addCategory($data) {
        $data['cname'] = htmlspecialchars($data['cname']);
        $category = $this -> categoryModel -> authCategory($data['cname']);
        if (!empty($category)) {
            $result = return_result(0, "该分类已存在");
            return $result;
        }
        $rs = $this -> categoryModel -> addCategory($data['cname']);
        if ($rs) {
            $result = return_result(1, "添加分类成功");
        } else {
            $result = return_result(2, "添加分类失败");
        }
        return $result;
    }

    public function categoryList($data) {
        $currentPage = $data['currentPage'];
        $everyPage = $data['everyPage'];
        $totalPage = $this -> categoryModel -> getCategoryMount();
        $pageNumber = ceil($totalPage / $everyPage);
        $categorylist = $this -> categoryModel -> categoryList(($currentPage-1) * $everyPage, $everyPage);
        $result['pageNumber'] = $pageNumber;
        $result['categorylist'] = $categorylist;
        return $result;
    }

    public function addSign($data) {
        $data['signname'] = htmlspecialchars($data['signname']);
        $sign = $this -> categoryModel -> authSign($data);
        if (!empty($sign)) {
            $result = return_result(0, "该标签名已存在");
            return $result;
        }
        $rs = $this -> categoryModel -> addSign($data);
        if ($rs) {
            $result = return_result(1, "添加标签成功");
        } else {
            $result = return_result(2, "添加标签失败");
        }
        return $result;
    }

    public function editCategory($data) {
        $data['cname'] = htmlspecialchars($data['cname']);
        $categoryExist = $this -> categoryModel -> authCategoryExist($data);
        if (empty($categoryExist)) {
            return return_result(0, "该分类不存在");
        }
        $category = $this -> categoryModel -> authCategory($data['cname']);
        if (!empty($category)) {
            return return_result(0, "该分类已存在");
        }
        $rs = $this -> categoryModel -> editCategory($data);
        if ($rs === false) {
            $result = return_result(2, "编辑分类失败");
        } else {
            $result = return_result(1, "编辑分类成功");
        }
        return $result;
    }

    public function editSign($data) {
        $data['signname'] = htmlspecialchars($data['signname']);
        $signExist = $this -> categoryModel -> authSignExist($data);
        if (empty($signExist)) {
            return return_result(0, "该标签不要存在");
        }
        $sign = $this -> categoryModel -> authSign($data);
        if (!empty($sign)) {
            return return_result(0, "该标签已存在");
        }
        $rs = $this -> categoryModel -> editSign($data);
        if ($rs === false) {
            $result = return_result(2, "编辑标签失败");
        } else {
            $result = return_result(1, "编辑标签成功");
        }
        return $result;
    }


    public function enableCategory($data) {
        $categoryExist = $this -> categoryModel -> authCategoryExist($data);
        if (empty($categoryExist)) {
            return return_result(0, "该分类不存在");
        }
        $rs = $this -> categoryModel -> enableCategory($data);
        if ($rs == false) {
            $result = return_result(2, "启用分类失败");
        } else {
            $result = return_result(1, "启用分类成功");
        }
        return $result;
    }

    public function disableCategory($data) {
        $categoryExist = $this -> categoryModel -> authCategoryExist($data);
        if (empty($categoryExist)) {
            return return_result(0, "该分类不存在");
        }
        $rs = $this -> categoryModel -> disableCategory($data);
        if ($rs === false) {
            $result = return_result(2, "关闭分类失败");
        } else {
            $result = return_result(1, "关闭分类成功");
        }
        return $result;
    }

    public function enableSign($data) {
        $signExist = $this -> categoryModel -> authSignExist($data);
        if (empty($signExist)) {
            return return_result(0, "该标签不存在");
        }
        $rs = $this -> categoryModel -> enableSign($data);
        if ($rs === false) {
            $result = return_result(2, "启用标签失败");
        } else {
            $result = return_result(1, "启用标签成功");
        }
        return $result;
    }

    public function disableSign($data) {
        $signExist = $this -> categoryModel -> authSignExist($data);
        if (empty($signExist)) {
            return return_result(0, "该标签不存在");
        }
        $rs = $this -> categoryModel -> disableSign($data);
        if ($rs === false) {
            $result = return_result(2, "关闭标签失败");
        } else {
            $result = return_result(1, "关闭标签成功");
        }
        return $result;
    }
}
