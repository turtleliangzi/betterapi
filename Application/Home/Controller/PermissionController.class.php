<?php
namespace Home\Controller;

use Think\Controller;

class PermissionController extends Controller {
    protected $permissionLogic;
    public function __construct() {
        $this -> permissionLogic = D('Permission', 'Logic');
    }
    public function permissionList() {
        $this -> getResponse(permissionList);
    }

    public function getPermission () {
        $permission = M('Permission') -> select();
        $this -> ajaxReturn($permission);
    }

    public function addPermission() {
        $this -> getResponse(addPermission);
    }

    public function editPermission() {
        $this -> getResponse(editPermission);
    }

    public function enablePermission() {
        $this -> getResponse(enablePermission);
    }

    public function disablePermission() {
        $this -> getResponse(disablePermission);
    }

    protected function getResponse($function) {
        if (IS_POST) {
            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this -> permissionLogic -> $function($data);
            $this -> ajaxReturn($response);
        } else {
            $this -> ajaxReturn('sorry, access denied');
        }
    }


}
