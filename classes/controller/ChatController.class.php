<?php
/**
 * チャットをコントロールするクラス
 */

namespace app\controller;

use \app\common\Db;
use \app\common\InvalidErrorException;
use \app\common\ExceptionCode;

class ChatController
{
    public static function sendMessage($resId, $saidId, $message)
    {
        if (null == $message) {
            throw new InvalidErrorException(ExceptionCode::INVALID_URL);
        }
        
        //タイムゾーンを指定
        date_default_timezone_set('Asia/Tokyo');

        $sql = "INSERT INTO `chat`(`chatResId`, `chatSaidId`, `chatTime`, `chatText`) VALUES";
        $sql .= "(:resId, :saidId, :dtime, :text)";
        $arr = array();
        $arr[':resId'] = $resId;
        $arr[':saidId'] = $saidId;
        $arr[':dtime'] = date("Y/m/d H:i");
        $arr[':text'] = $message;
        Db::transaction();
        $res = Db::insert($sql, $arr);
        Db::commit();

        return $res;
    }

    public static function getMessages($resId)
    {
        if (null == $resId) {
            throw new InvaildErrorException(ExceptionCode::INVALID_URL);
        }
        $sql = "SELECT * from chat WHERE chatResId=:resid";
        $arr[':resid'] = $resId;

        return Db::select($sql, $arr);
    }
}
