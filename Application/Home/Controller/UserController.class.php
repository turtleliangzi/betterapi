<?php
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller {
    protected $userLogic;
    public function __construct() {
        $this -> userLogic = D('User', 'Logic');
    }
    public function getUsers() {
        $this -> getResponse(getUsers);
    }

    public function getAdmins() {
        $this -> getResponse(getAdmins);
    }

    public function addAdmin() {
        $this -> getResponse(addAdmin);
    }

    protected function getResponse($function) {
        
        if (IS_POST) {
            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this -> userLogic -> $function($data);
            $this -> ajaxReturn($response);
        } else {
            $this -> ajaxReturn('sorry, access denied');
        }
    }
}
