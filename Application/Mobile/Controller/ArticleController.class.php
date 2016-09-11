<?php

namespace Mobile\Controller;
use Think\Controller\RestController;

class ArticleController extends RestController {
    Public function articles() {
        switch ($this->_method){
        case 'get': 
            $article = D('Article') -> getShareArticles();
            $this -> response($article, 'json');
            break;
        case 'put': 
            break;
        case 'post': 
            break;
        }
    }
}
