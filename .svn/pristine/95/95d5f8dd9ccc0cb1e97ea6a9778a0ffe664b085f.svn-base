<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model {
    public function getUsers($limit1, $limit2){
        $users = M('User') -> where('role = 0') -> order('registertime desc') -> limit($limit1, $limit2) -> select();
        return $users;
    }

    public function getUserMount() {
        $mount = M('User') -> where('role = 0') -> count();
        return $mount;
    }

    public function getAdmins($limit1, $limit2) {
        $admins = M('User') -> where('role = 1') -> order('registertime desc') -> limit($limit1, $limit2) -> select();
        return $admins;
    }    

    public function getAdminMount(){
        $mount = M('User') -> where('role = 1') -> count();
        return $mount;
    }

    public function authAdmin($nickname) {
        $where = array(
            'role' => 1,
            'nickname' => $nickname
        );
        $admin = M('User') -> where($where) -> select();
        return $admin;
    }

    public function addAdmin($admin) {
        $rs = M('User') -> add($admin);
        return $rs;
    }
}



