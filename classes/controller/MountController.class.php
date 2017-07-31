<?php
/**
 * マウントをコントロールするクラス
 */

namespace app\controller;

use \app\common\Db;
use \app\common\InvalidErrorException;
use \app\common\ExceptionCode;

class MountController
{
    /**
     * マウント一覧をidとともに配列で返すメソッド
     *
     * @return array
     */
    static public function getMounts()
    {
        $sql = 'select * from mount';
        return Db::select($sql);
    }

    /**
     * IDからマウントの名前を返すメソッド
     * 
     * @return str mountName
     */
    static public function getMountName($id)
    {
        $sql = 'select * from mount';
        $res = Db::select($sql);
        return $res[$id - 1]["mountName"];
    }
}