<?php

/**
 * Created by PhpStorm.
 * User: zcong
 * Date: 2017/2/23
 * Time: 上午12:10
 */
namespace App\Utils;

class Utils
{
    /**
     * success json data helper
     * @param $msg
     * @param int $status
     * @return array
     */
    public static function suc($msg, $status = 1)
    {
        return ['status' => $status, 'msg' => $msg];
    }

    /**
     * err json data helper
     * @param $msg
     * @param int $status
     * @return array
     */
    public static function err($msg, $status = 0)
    {
        return ['status' => $status, 'msg' => $msg];
    }

    public static function userId()
    {
        return session('user_id');
    }
}
