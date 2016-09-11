<?php

namespace Mobile\Model;

use Think\Model;

class UserModel extends Model {
    
    public function getUserByName() {
        $nickname = I('get.nickname', 'null', 'htmlspecialchars');
        $where = array("nickname" => $nickname);
        return M('User') -> where($where) -> find();
    }
    public function login($nickname, $password) {
        $user = M('User') -> where(array("nickname" => $nickname)) -> find();
        if (empty($user)) {
            return return_result(0, "该用户不存在");
        } else {
            $password = md5(md5($password).$user['salt']);
            if ($password === $user['password']) {
                return return_result(1, "登录成功", $user);
            } else {
                return return_result(-1, "用户名或密码错误");
            }
        }
    }

    public function authUserExist($nickname) {
        return M('User') -> where(array("nickname" => $nickname)) -> find();
    }

    public function addUser($data) {
        return M('User') -> add($data);
    }
}
