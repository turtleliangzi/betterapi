<?php

namespace Mobile\Controller;
use Think\Controller\RestController;

class UserController extends RestController {
    
    public function users() {
        switch ($this -> _method) {
            case 'get':
                $user = D('User') -> getUserByName();
                break;

            case 'put':

                break;

            case 'post':
                $response = D('User', 'Logic') -> addUser();
                break;
        }
        $this -> response($response, 'json');
    }
}
