<?php
/*
 * 用户业务逻辑层
 */

namespace Mobile\Logic;

use Think\Model;

class UserLogic extends Model {

    protected $userModel;

    public function _initialize() {
        $this -> userModel = D('User');
    }

    public function addUser() {
        $data = json_decode(file_get_contents('php://input'), true);
        if (empty($data['nickname']) || !isset($data['nickname'])) {
            return return_result('400', "用户名不能为空");
        }   
        if (empty($data['password']) || !isset($data['password'])) {
            return return_result('400', "密码不能为空");
        }   
        if ($data['password'] != $data['repassword']) {
            return return_result('400', '两次输入的密码不相同');
        }
        $data['nickname'] = htmlspecialchars($data['nickname']);
        $user['password'] = htmlspecialchars($data['password']);
        $userExist = $this -> userModel -> authUserExist($data['nickname']);
        if (!empty($userExist)) {
            return return_result('409', "该用户名已存在");
        }
        $user = encrypt($user['password']);
        $user['nickname'] = $data['nickname'];
        $user['registertime'] = time();

        $rs = $this -> userModel -> addUser($user);
        if ($rs) {
            return return_result('200', "用户注册成功");
        } else {
            return return_result('404', "用户注册失败");
        }
    }


}
