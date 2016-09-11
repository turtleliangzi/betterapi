<?php

/*
 *登陆控制器
 */

namespace Mobile\Controller;

use Think\Controller;

class LoginController extends Controller {
    
    public function login () {
        if (IS_POST) {
            $data = json_decode(file_get_contents('php://input'), true);
            $nickname = !empty($data['nickname']) ? htmlspecialchars($data['nickname']) : 'null';
            $password = !empty($data['password']) ? htmlspecialchars($data['password']) : '0';
            $response = D('User') -> login($nickname, $password);
            $this -> ajaxReturn($response);
        } else {
            $resposne = return_result(403, 'forbidden access');
            $this -> ajaxReturn($response);
        }
    }
}
