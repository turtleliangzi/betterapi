<?php
/*
 *
 * md5+salt加密函数
 */
function encrypt($password){
    //生成6为随机码
    $rand = mt_rand(100000, 999999);
    $salt = strval($rand);

    $encrypt = md5(md5($password).$salt);
    $data['password'] = $encrypt;
    $data['salt'] = $salt;
    return $data;
}

/*
 * 返回结果
 */

function return_result($status, $message, $data='') {
    $result = array (
        "status" => $status,
        "message" => $message
    );   
    if (!empty($data)) {
        $result['data'] = $data;
    }
    return $result;
}

