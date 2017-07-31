<?php
namespace app\controller;

use \app\common\Db;

/**
* アイテムの予約をコントロールするクラス
*/
class ReserveController
{
    /**
    * 予約を登録するメソッド
    *
    * @param array $values
    * @return array
    */
    static public function registerReserve($values = array())
    {
        $sql = "INSERT INTO `reserve`(`resExhibitorId`, `resBorrowerId`, `resItemId`, `resStartDay`, `resEndDay`, `resPrice`, `resComment`) VALUES";
        $sql .= "(:exhibitorId, :borrowerId, :itemId, :startDay, :endDay, :price, :comment)";
        
        //プリペアドステートメント用
        $arr = array();
        $arr[':exhibitorId'] = $values['exhibitorId'];
        $arr[':borrowerId'] = $values['borrowerId'];
        $arr[':itemId'] = $values['itemId'];
        $arr[':startDay'] = $values['startDay'];
        $arr[':endDay'] = $values['endDay'];
        $arr[':price'] = $values['price'];
        $arr[':comment'] = $values['comment'];
        
        //トランザクション実行
        Db::transaction();
        $res = Db::insert($sql, $arr);
        Db::commit();
        return $res;
    }
    /**
    * ExhibitorユーザIDから予約を検索するメソッド
    *
    * @param int $id
    * @return array
    */
    static public function getReserveByExhibitorId($id)
    {
        $sql = "SELECT * FROM `reserve` WHERE `resExhibitorId` = :id";
        $arr[':id'] = $id;
        return Db::select($sql, $arr);
    }

    /**
    * BorrowerユーザIDから予約を検索するメソッド
    *
    * @param int $id
    * @return array
    */
    static public function getReserveByBorrowerId($id)
    {
        $sql = "SELECT * FROM `reserve` WHERE `resBorrowerId` = :id";
        $arr[':id'] = $id;
        return Db::select($sql, $arr);
    }
    
    /**
    * 予約IDから予約を返すメソッド
    *
    * @param int $id
    * @return array
    */
    static public function getReserveById($id)
    {
        $sql = "SELECT * FROM `reserve` WHERE `resId` = :id";
        $arr[':id'] = $id;
        return Db::select($sql, $arr);
    }
    
    /**
     * 予約状態をアップデートするメソッド
     * 
     * @param int $id
     * @param int $state
     * @return bool
     */
    static public function updateState($id, $state)
    {
        $sql = "UPDATE `reserve` SET `resState`=:state WHERE `resId`=:id";
        $arr = array();
        $arr[':state'] = $state;
        $arr[':id'] = $id;

        Db::transaction();
        Db::update($sql, $arr);
        Db::commit();
    }
}