<?php

namespace Home\Model;

use Think\Model\RelationModel;

class UserGroupModel extends RelationModel {
    
    protected $_link = array(
        
        'User' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'User',
            'foreign_key'  => 'uid',
            'mapping_name' => 'user', 
            'as_fields'    => 'nickname,realname'
        ),
        'Permission' => array(
            'mapping_type' => self::MANY_TO_MANY,
            'class_name'   => 'Permission',
            'mapping_name' => 'permissions',
            'foreign_key'  => 'gid',
            'relation_foreign_key' => 'pid',
            'relation_table' => 'bl_group_permission'
        )
    );

    public function groupList($limit1, $limit2) {
        $Usergroup = D('UserGroup');
        $grouplist = $Usergroup -> relation(true) ->limit($limit1, $limit2)  -> select();
        return $grouplist;
    }

    public function getGroupMount() {
        $mount = M('UserGroup') -> count();
        return $mount;
    }

}
