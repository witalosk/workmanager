<?php

namespace app\dao;

use app\common\Db;
use app\model\UserModel;

/**
* UserDao クラス
* @brief ユーザに関する処理のSQL文をつくる
*/
class UserDao
{
    
    /**
    * ユーザーIDから配列を取得する
    * @param int $userId
    * @return array
    */
    public static function getDaoFromId($id)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `user` ";
        $sql .= "WHERE `id` = :id ";
        
        $arr = array();
        $arr[':id'] = $id;
        
        return Db::select($sql, $arr);
    }
    
    /**
    * メールアドレスから配列を取得する
    * @param string $email
    * @return array
    */
    public static function getDaoFromEmail($email)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `user` ";
        $sql .= "WHERE `email` = :email";
        
        $arr = array();
        $arr[':email'] = $email;
        
        return Db::select($sql, $arr);
    }
    
    /**
    * 更新する
    * @param UserModel $objUM
    * @return bool
    */
    public static function save(UserModel $objUM)
    {
        $sql = "UPDATE `user` SET ";
        $sql .= "`email`= :email, ";
        $sql .= "`password`= :password, ";
        $sql .= "`permissions`= :permissions, ";
        $sql .= "`last_login`= :last_login, ";
        $sql .= "`first_name`= :first_name, ";
        $sql .= "`last_name`= :last_name, ";
        $sql .= "`zipcode`= :zipcode, ";
        $sql .= "`address`= :address, ";
        $sql .= "`phone`= :phone, ";
        $sql .= "`created_at`= :created_at, ";
        $sql .= "`updated_at`= :updated_at ";
        $sql .= "WHERE `id` = :id ";
        
        $arr = array();
        $arr[':email'] = $objUM->email;
        $arr[':password'] = $objUM->password;
        $arr[':permissions'] = $objUM->permissions;
        $arr[':last_login'] = $objUM->last_login;
        $arr[':first_name'] = $objUM->first_name;
        $arr[':last_name'] = $objUM->last_name;
        $arr[':zipcode'] = $objUM->zipcode;
        $arr[':address'] = $objUM->address;
        $arr[':phone'] = $objUM->phone;
        $arr[':created_at'] = $objUM->created_at;
        $arr[':updated_at'] = $objUM->updated_at;
        $arr[':id'] = $objUM->id;

        return Db::update($sql, $arr);
    }
    
    /**
    * 新規作成する
    * @return int
    */
    public static function insert(UserModel $objUM)
    {
        $sql = "INSERT INTO `user` VALUES (";
        $sql .= "NULL ";
        $sql .= ", :email ";
        $sql .= ", :password ";
        $sql .= ", :permissions ";
        $sql .= ", :last_login ";
        $sql .= ", :first_name ";
        $sql .= ", :last_name ";
        $sql .= ", :zipcode ";
        $sql .= ", :address ";
        $sql .= ", :phone ";
        $sql .= ", :created_at ";
        $sql .= ", :updated_at ";
        $sql .= ")";
        
        $arr = array();
        $arr[':email'] = $objUM->email;
        $arr[':password'] = $objUM->password;
        $arr[':permissions'] = $objUM->permissions;
        $arr[':last_login'] = $objUM->last_login;
        $arr[':first_name'] = $objUM->first_name;
        $arr[':last_name'] = $objUM->last_name;
        $arr[':zipcode'] = $objUM->zipcode;
        $arr[':address'] = $objUM->address;
        $arr[':phone'] = $objUM->phone;
        $arr[':created_at'] = $objUM->created_at;
        $arr[':updated_at'] = $objUM->updated_at;
        
        return Db::insert($sql, $arr);
    }
    
}