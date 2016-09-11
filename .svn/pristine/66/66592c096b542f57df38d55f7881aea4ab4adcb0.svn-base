<?php

namespace Home\Model;

use Think\Model;

class PermissionModel extends Model {
    
    public function permissionList($limit1, $limit2) {
        $permissions = M('Permission') -> limit($limit1, $limit2) -> select();
        return $permissions;
    }

    public function getPermissionMount() {
        $mount  = M('Permission') -> count();
        return $mount;
    }

    public function authPname($pname) {
        $where['pname'] = $pname;
        $permission = M('Permission') -> where($where) -> select();
        return $permission;
    }

    public function addPermission($pname) {
        $data['pname'] = $pname;
        $rs = M('Permission') -> add($data);
        return $rs;
    }

    public function editPermission($data) {
        $rs = M('Permission') -> save($data);
        return $rs;
    }

    public function authExist($data) {
        $where['pid'] = $data['pid'];
        $rs = M('Permission') -> where($where) -> select();
        return $rs;
    }

    public function enablePermission($data) {
        $data['status'] = 1;
        $rs = M('Permission') -> save($data);
        return $rs;
    }

    public function disablePermission($data) {
        $data['status'] = 0;
        $rs = M('Permission') -> save($data);
        return $rs;
    }
}
