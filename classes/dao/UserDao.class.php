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
  public static function getDaoFromUserId($userId)
  {
    $sql = "SELECT ";
    $sql .= "* ";
    $sql .= "FROM `user` ";
    $sql .= "WHERE `userId` = :userId ";

    $arr = array();
    $arr[':userId'] = $userId;

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
    $sql .= "WHERE `userMailAddress` = :email";

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
    $sql .= "`userNickName`= :userNickName, ";
    $sql .= "`userMailAddress`= :userMailAddress, ";
    $sql .= "`userHash`= :userHash, ";
    $sql .= "`userSalt`= :userSalt, ";
    $sql .= "`userFamilyName`= :userFamilyName, ";
    $sql .= "`userFamilyNameRuby`= :userFamilyNameRuby, ";
    $sql .= "`userFirstName`= :userFirstName, ";
    $sql .= "`userFirstNameRuby`= :userFirstNameRuby, ";
    $sql .= "`userZipcodeTop`= :userZipcodeTop, ";
    $sql .= "`userZipcodeBottom`= :userZipcodeBottom, ";
    $sql .= "`userPrefecture`= :userPrefecture, ";
    $sql .= "`userCity`= :userCity, ";
    $sql .= "`userAddress`= :userAddress, ";
    $sql .= "`userBuilding`= :userBuilding, ";
    $sql .= "`userPhone1`= :userPhone1, ";
    $sql .= "`userPhone2`= :userPhone2, ";
    $sql .= "`userSex`= :userSex, ";
    $sql .= "`userBirthday`= :userBirthday, ";
    $sql .= "`userToken`= :userToken ";
    $sql .= "WHERE `userId` = :userId ";

    $arr = array();
    $arr[':userNickName'] = $objUM->getNickName();
    $arr[':userMailAddress'] = $objUM->getMailAddress();
    $arr[':userHash'] = $objUM->getHash();
    $arr[':userSalt'] = $objUM->getSalt();
    $arr[':userFamilyName'] = $objUM->getFamilyName();
    $arr[':userFamilyNameRuby'] = $objUM->getFamilyNameRuby();
    $arr[':userFirstName'] = $objUM->getFirstName();
    $arr[':userFirstNameRuby'] = $objUM->getFirstNameRuby();
    $arr[':userZipcodeTop'] = $objUM->getZipcodeTop();
    $arr[':userZipcodeBottom'] = $objUM->getZipcodeBottom();
    $arr[':userPrefecture'] = $objUM->getPrefecture();
    $arr[':userCity'] = $objUM->getCity();
    $arr[':userAddress'] = $objUM->getAddress();
    $arr[':userBuilding'] = $objUM->getBuilding();
    $arr[':userPhone1'] = $objUM->getPhone1();
    $arr[':userPhone2'] = $objUM->getPhone2();
    $arr[':userSex'] = $objUM->getSex();
    $arr[':userBirthday'] = $objUM->getBirthday();
    $arr[':userToken'] = $objUM->getToken();
    $arr[':userId'] = $objUM->getId();

    return Db::update($sql, $arr);
  }

  /**
  * 新規作成する
  * @return int
  */
  public static function insert(UserModel $objUM)
  {
    $sql = "INSERT INTO ";
    $sql .= "`user` ";
    $sql .= "(";
    $sql .= "`userId`";
    $sql .= ", `userNickName`";
    $sql .= ", `userMailAddress`";
    $sql .= ", `userHash`";
    $sql .= ", `userSalt`";
    $sql .= ", `userFamilyName`";
    $sql .= ", `userFamilyNameRuby`";
    $sql .= ", `userFirstName`";
    $sql .= ", `userFirstNameRuby`";
    $sql .= ", `userZipcodeTop`";
    $sql .= ", `userZipcodeBottom`";
    $sql .= ", `userPrefecture`";
    $sql .= ", `userCity`";
    $sql .= ", `userAddress`";
    $sql .= ", `userBuilding`";
    $sql .= ", `userPhone1`";
    $sql .= ", `userPhone2`";
    $sql .= ", `userSex`";
    $sql .= ", `userBirthday`";
    $sql .= ", `userToken`";

    $sql .= ") VALUES (";

    $sql .= "NULL ";
    $sql .= ", :userNickName ";
    $sql .= ", :userMailAddress ";
    $sql .= ", :userHash ";
    $sql .= ", :userSalt ";
    $sql .= ", :userFamilyName ";
    $sql .= ", :userFamilyNameRuby ";
    $sql .= ", :userFirstName ";
    $sql .= ", :userFirstNameRuby ";
    $sql .= ", :userZipcodeTop ";
    $sql .= ", :userZipcodeBottom ";
    $sql .= ", :userPrefecture ";
    $sql .= ", :userCity ";
    $sql .= ", :userAddress ";
    $sql .= ", :userBuilding ";
    $sql .= ", :userPhone1 ";
    $sql .= ", :userPhone2 ";
    $sql .= ", :userSex ";
    $sql .= ", :userBirthday ";
    $sql .= ", :userToken ";
    $sql .= ")";

    $arr = array();
    $arr[':userNickName'] = $objUM->getNickName();
    $arr[':userMailAddress'] = $objUM->getMailAddress();
    $arr[':userHash'] = $objUM->getHash();
    $arr[':userSalt'] = $objUM->getSalt();
    $arr[':userFamilyName'] = $objUM->getFamilyName();
    $arr[':userFamilyNameRuby'] = $objUM->getFamilyNameRuby();
    $arr[':userFirstName'] = $objUM->getFirstName();
    $arr[':userFirstNameRuby'] = $objUM->getFirstNameRuby();
    $arr[':userZipcodeTop'] = $objUM->getZipcodeTop();
    $arr[':userZipcodeBottom'] = $objUM->getZipcodeBottom();
    $arr[':userPrefecture'] = $objUM->getPrefecture();
    $arr[':userCity'] = $objUM->getCity();
    $arr[':userAddress'] = $objUM->getAddress();
    $arr[':userBuilding'] = $objUM->getBuilding();
    $arr[':userPhone1'] = $objUM->getPhone1();
    $arr[':userPhone2'] = $objUM->getPhone2();
    $arr[':userSex'] = $objUM->getSex();
    $arr[':userBirthday'] = $objUM->getBirthday();
    $arr[':userToken'] = $objUM->getToken();

    return Db::insert($sql, $arr);
  }

}
