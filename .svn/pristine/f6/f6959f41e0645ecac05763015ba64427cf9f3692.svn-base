<?php

namespace Home\Controller;

use Think\Controller;

class UsergroupController extends Controller {
    
    protected $userGroupLogic;
    public function __construct() {
        $this -> userGroupLogic = D('UserGroup', 'Logic');
    }
    protected function groupList() {
        if (IS_POST) {
            $data = json_decode(file_get_contents('php://input'), true);
            $response = $this -> userGroupLogic -> groupList($data);
            $this -> ajaxReturn($response);
        } else {
            $this -> ajaxReturn('sorry, access denied');
        }   
    
    }
}
