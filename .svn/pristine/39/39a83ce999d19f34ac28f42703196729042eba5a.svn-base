<?php

namespace Home\Logic;

use Think\Model;

class UserGroupLogic extends Model {
    protected $userGroupModel;
    public function __construct() {
        $this -> userGroupModel = D('UserGroup');
    }
    public function groupList($data) {
        $currentPage = $data['currentPage'];
        $everyPage = $data['everyPage'];
        $totalPage = $this -> userGroupModel -> getGroupMount();
        $pageNumber = ceil($totalPage / $everyPage);
        $grouplist = $this -> userGroupModel -> groupList(($currentPage-1) * $everyPage, $everyPage);
        $result['pageNumber'] = $pageNumber;
        $result['groupList'] = $grouplist;
        return $result;
    }
}
