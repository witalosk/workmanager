<?php
/**
 * メーカーをコントロールするクラス
 */

namespace app\controller;

use \app\common\Db;
use \app\common\InvalidErrorException;
use \app\common\ExceptionCode;

class MakerController
{
    /**
     * メーカー一覧をidとともに配列で返すメソッド
     *
     * @return array
     */
    static public function getMakers()
    {
        $sql = 'select * from maker';
        return Db::select($sql);
    }

    /**
     * IDからメーカーの名前を返すメソッド
     * 
     * @return str makerName
     */
    static public function getMakerName($id)
    {
        $sql = 'select * from maker';
        $res = Db::select($sql);
        return $res[$id - 1]["makerName"];
    }
}