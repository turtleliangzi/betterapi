<?php
/*
 *app下载控制器
 */

namespace Mobile\Controller;

use Think\Controller;

class DownloadController extends Controller {
    
    public function index() {
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            $this->display('download');
        } else {
            header("Location: http://turtletl.com/zkb.apk");
        }   
        
    }

}
