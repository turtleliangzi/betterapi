<?php

return array (
    //开启路由
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array (
        'articles' => 'Article/articles',
        'users' => 'User/users',
        'users/:nickname' => 'User/users',
        'login' => 'Login/login'
    )  
);
