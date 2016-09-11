<?php

namespace Mobile\Model;
use Think\Model;

class ArticleModel extends Model {
    
    protected $tableName = 'Article';
    public function getShareArticles() {
        $article =  M('Article') -> where(array("share" => 1)) -> select();
        foreach ($article as $k => $a) {
            $article[$k]['member'] = M('User') -> where(array("uid" => $a['uid'])) -> find();
            $article[$k]['content'] = html_entity_decode($a['content']);
            $article[$k]['content'] = stripslashes($article[$k]['content']);
        }
        return $article;

    }
}
