<?php

namespace Home\Logic;

use Think\Model;

class UserLogic extends Model {
    protected $userModel;
    public function __construct() {
        $this -> userModel = D('User');
    }
    public function getUsers($data) {
        $currentPage = $data['currentPage'];
        $everyPage = $data['everyPage'];
        $totalPage = $this -> userModel -> getUserMount();
        $pageNumber = ceil($totalPage / $everyPage);
        $users = $this -> userModel -> getUsers(($currentPage-1) * $everyPage, $everyPage);
        $result['pageNumber'] = $pageNumber;
        $result['users'] = $users;
        return $result;
    }

    public function getAdmins($data) {
        $currentPage = $data['currentPage'];
        $everyPage = $data['everyPage'];
        $totalPage = $this -> userModel -> getAdminMount();
        $pageNumber = ceil($totalPage / $everyPage);
        $admins = $this -> userModel -> getAdmins(($currentPage-1) * $everyPage,  $everyPage);
        $result['pageNumber'] = $pageNumber;
        $result['admins'] = $admins;
        return $result;
    }

    public function addAdmin($data) {
        $data['nickname'] = htmlspecialchars($data['nickname']);
        $data['password'] = htmlspecialchars($data['password']);
        $admin = $this -> userModel -> authAdmin($data['nickname']);
        if (!empty($admin)) {
            $result = return_result(0, "该管理员昵称已存在");
            return $result;
        }
        //加密
        $admin = encrypt($data['password']);
        $admin['nickname'] = $data['nickname'];
        $admin['role'] = 1;
        $admin['registertime'] = time();

        $rs = $this -> userModel -> addAdmin($admin);
        if ($rs) {
            $result = return_result(1, "添加管理员成功");
        } else {
            $result = return_result(2, "添加管理员失败");
        }
        return $result;
 
    }
}


