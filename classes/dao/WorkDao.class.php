<?php

namespace app\dao;

use app\common\Db;
use app\model\WorkModel;

/**
* WorkDao クラス
* @brief ワークに関する処理のSQL文をつくる
*/
class WorkDao
{
    
    /**
    * ユーザIDから配列を取得する
    * @param int $userId
    * @return array
    */
    public static function getDaoFromUserId($id)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `work` ";
        $sql .= "WHERE `user_id` = :id ";
        
        $arr = array();
        $arr[':id'] = $id;
        
        return Db::select($sql, $arr);
    }

    /**
    * ワークIDから配列を取得する
    * @param int $userId
    * @return array
    */
    public static function getDaoFromId($id)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `work` ";
        $sql .= "WHERE `id` = :id ";
        
        $arr = array();
        $arr[':id'] = $id;
        
        return Db::select($sql, $arr);
    }
        
    /**
    * 更新する
    * @param UserModel $objUM
    * @return bool
    */
    public static function save(UserModel $objWM)
    {
        $sql = "UPDATE `work` SET ";
        $sql .= "`user_id`= :user_id, ";
        $sql .= "`start`= :start, ";
        $sql .= "`end`= :end";
        $sql .= "`comment`= :comment";
        $sql .= "`created_at`= :created_at, ";
        $sql .= "WHERE `id` = :id ";
        
        $arr = array();
        $arr[':user_id'] = $objWM->user_id;
        $arr[':start'] = $objWM->start;
        $arr[':end'] = $objWM->end;
        $arr[':comment'] = $objWM->comment;
        $arr[':created_at'] = $objWM->created_at;
        $arr[':id'] = $objWM->id;

        return Db::update($sql, $arr);
    }
    
    /**
    * 新規作成する
    * @return int
    */
    public static function insert(WorkModel $objWM)
    {
        $sql = "INSERT INTO `work` VALUES (";
        $sql .= "NULL ";
        $sql .= ", :user_id ";
        $sql .= ", :start ";
        $sql .= ", :end ";
        $sql .= ", :comment ";
        $sql .= ", :created_at ";
        $sql .= ")";
        
        $arr = array();
        $arr[':user_id'] = $objWM->user_id;
        $arr[':start'] = $objWM->start;
        $arr[':end'] = $objWM->end;
        $arr[':comment'] = $objWM->comment;
        $arr[':created_at'] = $objWM->created_at;
        
        return Db::insert($sql, $arr);
    }
    
}