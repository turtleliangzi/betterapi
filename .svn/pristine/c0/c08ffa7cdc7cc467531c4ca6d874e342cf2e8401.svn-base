<?php

namespace Mobile\Controller;

use Think\Controller;

class PermissionController extends Controller {
    
    public function getPermission() {
        $article = M('Article') -> where(array("share" => 1)) -> select();
        foreach ($article as $k => $a) {
            $article[$k]['member'] = M('User') -> where(array("uid" => $a['uid'])) -> find();
            $article[$k]['content'] = html_entity_decode($a['content']);
            $article[$k]['content'] = stripslashes($article[$k]['content']);
        }
        //dump($article);
        $this -> ajaxReturn($article);
    }
}
