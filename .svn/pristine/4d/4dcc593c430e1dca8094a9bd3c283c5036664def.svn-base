<?php

namespace Home\Logic;

use Think\Model;

class PermissionLogic extends Model {
    protected $permissionModel;
    public function __construct() {
        $this -> permissionModel = D('Permission');
    }
    public function permissionList($data) {
        $currentPage = $data['currentPage'];
        $everyPage = $data['everyPage'];
        $totalPage = $this -> permissionModel -> getPermissionMount();
        $pageNumber = ceil($totalPage / $everyPage);
        $permissions = $this -> permissionModel -> permissionList(($currentPage-1) * $everyPage, $everyPage);
        $result['pageNumber'] = $pageNumber;
        $result['permissions'] = $permissions;
        return $result;    
    }

    public function addPermission($data) {
        $data['pname'] = htmlspecialchars($data['pname']);
        $permission = $this -> permissionModel -> authPname($data['pname']);
        if (!empty($permission)) {
            $result = return_result(0, "该权限名已存在");
            return $result;
        }
        $rs = $this -> permissionModel -> addPermission($data['pname']);
        if ($rs) {
            $result = return_result(1, "添加权限成功");
        } else {
            $result = return_result(2, "添加权限失败");
        }
        return $result;
    }

    public function editPermission($data) {
        $data['name'] = htmlspecialchars($data['pname']);
        $authExist = $this -> permissionModel -> authExist($data);
        if (empty($authExist)) {
            $result = return_result(0, "该权限不存在");
            return $result;
        }
        $permission = $this -> permissionModel -> authPname($data['pname']);
        if (!empty($permission) && intval($permission['pid']) != intval($data['pid'])) {
            $result = return_result(0, "该权限名已存在");
            return $result;
        }
        $rs = $this -> permissionModel -> editPermission($data);
        if ($rs === false) {
            $result = return_result(2, "编辑权限失败");
        } else {
            $result = return_result(1, "编辑权限成功");
        }
        return $result;
    }

    public function enablePermission($data) {
        $authExist = $this -> permissionModel -> authExist($data);
        if (empty($authExist)) {
            $result = return_result(0, "该权限不存在");
            return $result;
        }
        $rs = $this -> permissionModel -> enablePermission($data);
        if ($rs) {
            $result = return_result(1, "启用权限成功");
        } else {
            $result = return_result(2, "启用权限失败");
        }
        return $result;
    }

    public function disablePermission($data) {
        $authExist = $this -> permissionModel -> authExist($data);
        if (empty($authExist)) {
            $return = return_result(0, "该权限不存在");
            return $result;
        }
        $rs = $this -> permissionModel -> disablePermission($data);
        if ($rs) {
            $result = return_result(1, "关闭权限成功");
        } else {
            $result = return_result(2, "关闭权限失败");
        }
        return $result;
    }
}
