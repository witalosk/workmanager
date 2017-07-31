<?php

namespace app\dao;

use app\common\Db;
use app\model\ItemModel;
use app\controller\MakerController;

/**
 * ItemDao クラス
 * @brief アイテムに関する処理のSQL文をつくる
 */
class ItemDao
{

  /**
  * アイテムIDから配列を取得する
  * @param int $itemId
  * @return array
  */
    public static function getDaoFromItemId($itemId)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `item` ";
        $sql .= "WHERE `itemId` = :itemId ";

        $arr = array();
        $arr[':itemId'] = $itemId;

        return Db::select($sql, $arr);
    }

    public static function getDaoFromItemName($itemName)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `item` ";
        $sql .= "WHERE `itemName` LIKE '%:itemName%' ";

        $arr = array();
        $arr[':itemName'] = $itemName;

        return Db::select($sql, $arr);
    }

  /**
   * 出品者のIDからレンズ情報を取得する
   *
   * @param int $exhibitorId
   * @return array
   */
    public static function getDaoFromExhibitorId($exhibitorId)
    {
        $sql = "SELECT ";
        $sql .= "* ";
        $sql .= "FROM `item` ";
        $sql .= "WHERE `itemExhibitorId`=".$exhibitorId;

        return Db::select($sql);
    }

  /**
  * 更新する
  * @param ItemModel $objIM
  * @return bool
  */
    public static function save(ItemModel $objIM)
    {
        $sql = "UPDATE `item` SET ";
        $sql .= "`itemExhibitorId`= :itemExhibitorId, ";
        $sql .= "`itemName`= :itemName, ";
        $sql .= "`itemDescription`= :itemDescription, ";
        $sql .= "`itemPicture`= :itemPicture, ";
        $sql .= "`itemPrice`= :itemPrice, ";
        $sql .= "`itemMakerId`= :itemMakerId, ";
        $sql .= "`itemMountId`= :itemMountId, ";
        $sql .= "`itemFocus`= :itemFocus, ";
        $sql .= "`itemType`= :itemType, ";
        $sql .= "`itemFullsize`= :itemFullsize, ";
        $sql .= "`itemConstruction`= :itemConstruction, ";
        $sql .= "`itemBradesNumber`= :itemBradesNumber, ";
        $sql .= "`itemFocalLength`= :itemFocalLength, ";
        $sql .= "`itemMaxFocalLength`= :itemMaxFocalLength, ";
        $sql .= "`itemMinDistance`= :itemMinDistance, ";
        $sql .= "`itemMaxMagnification`= :itemMaxMagnification, ";
        $sql .= "`itemFvalue`= :itemFvalue, ";
        $sql .= "`itemMaxFvalue`= :itemMaxFvalue, ";
        $sql .= "`itemViewAngle`= :itemViewAngle, ";
        $sql .= "`itemAntiShake`= :itemAntiShake, ";
        $sql .= "`itemWaterproof`= :itemWaterproof, ";
        $sql .= "`itemMaxDiameter`= :itemMaxDiameter, ";
        $sql .= "`itemLength`= :itemLength, ";
        $sql .= "`itemWeight`= :itemWeight, ";
        $sql .= "`itemFilterDiameter`= :itemFilterDiameter, ";
        $sql .= "`itemYear`= :itemYear, ";
        $sql .= "`itemState`= :itemState ";
        $sql .= "WHERE `itemId` = :itemId ";

        $arr = array();
        $arr[':itemExhibitorId'] = $objIM->getExhibitorId();
        $arr[':itemName'] = $objIM->getName();
        $arr[':itemDescription'] = $objIM->getDescription();
        $arr[':itemPicture'] = $objIM->getPicture();
        $arr[':itemPrice'] = $objIM->getPrice();
        $arr[':itemMakerId'] = $objIM->getMakerId();
        $arr[':itemMountId'] = $objIM->getMountId();
        $arr[':itemFocus'] = $objIM->getFocus();
        $arr[':itemType'] = $objIM->getType();
        $arr[':itemFullsize'] = $objIM->getFullsize();
        $arr[':itemConstruction'] = $objIM->getConstruction();
        $arr[':itemBradesNumber'] = $objIM->getBradesNumber();
        $arr[':itemFocalLength'] = $objIM->getFocalLength();
        $arr[':itemMaxFocalLength'] = $objIM->getMaxFocalLength();
        $arr[':itemMinDistance'] = $objIM->getMinDistance();
        $arr[':itemMaxMagnification'] = $objIM->getMaxMagnification();
        $arr[':itemFvalue'] = $objIM->getFvalue();
        $arr[':itemMaxFvalue'] = $objIM->getMaxFvalue();
        $arr[':itemViewAngle'] = $objIM->getViewAngle();
        $arr[':itemAntiShake'] = $objIM->getAntiShake();
        $arr[':itemWaterproof'] = $objIM->getWaterproof();
        $arr[':itemMaxDiameter'] = $objIM->getMaxDiameter();
        $arr[':itemLength'] = $objIM->getLength();
        $arr[':itemWeight'] = $objIM->getWeight();
        $arr[':itemFilterDiameter'] = $objIM->getFilterDiameter();
        $arr[':itemYear'] = $objIM->getYear();
        $arr['itemState'] = $objIM->getState();
        $arr[':itemId'] = $objIM->getId();

        return Db::update($sql, $arr);
    }

  /**
  * 新規作成する
  * @return int
  */
    public static function insert(ItemModel $objIM)
    {
        $sql = "INSERT INTO ";
        $sql .= "`item` ";
        $sql .= "(";
        $sql .= "`itemId`";
        $sql .= ", `itemExhibitorId`";
        $sql .= ", `itemName`";
        $sql .= ", `itemDescription`";
        $sql .= ", `itemPicture`";
        $sql .= ", `itemPrice`";
        $sql .= ", `itemMakerId`";
        $sql .= ", `itemMountId`";
        $sql .= ", `itemFocus`";
        $sql .= ", `itemType`";
        $sql .= ", `itemFullsize`";
        $sql .= ", `itemConstruction`";
        $sql .= ", `itemBradesNumber`";
        $sql .= ", `itemFocalLength`";
        $sql .= ", `itemMaxFocalLength`";
        $sql .= ", `itemMinDistance`";
        $sql .= ", `itemMaxMagnification`";
        $sql .= ", `itemFvalue`";
        $sql .= ", `itemMaxFvalue`";
        $sql .= ", `itemViewAngle`";
        $sql .= ", `itemAntiShake`";
        $sql .= ", `itemWaterproof`";
        $sql .= ", `itemMaxDiameter`";
        $sql .= ", `itemLength`";
        $sql .= ", `itemWeight`";
        $sql .= ", `itemFilterDiameter`";
        $sql .= ", `itemYear`";
        $sql .= ", `itemState`";

        $sql .= ") VALUES (";

        $sql .= "NULL ";
        $sql .= ", :itemExhibitorId ";
        $sql .= ", :itemName ";
        $sql .= ", :itemDescription ";
        $sql .= ", :itemPicture ";
        $sql .= ", :itemPrice ";
        $sql .= ", :itemMakerId ";
        $sql .= ", :itemMountId ";
        $sql .= ", :itemFocus ";
        $sql .= ", :itemType ";
        $sql .= ", :itemFullsize ";
        $sql .= ", :itemConstruction ";
        $sql .= ", :itemBradesNumber ";
        $sql .= ", :itemFocalLength ";
        $sql .= ", :itemMaxFocalLength ";
        $sql .= ", :itemMinDistance ";
        $sql .= ", :itemMaxMagnification ";
        $sql .= ", :itemFvalue ";
        $sql .= ", :itemMaxFvalue ";
        $sql .= ", :itemViewAngle ";
        $sql .= ", :itemAntiShake ";
        $sql .= ", :itemWaterproof ";
        $sql .= ", :itemMaxDiameter ";
        $sql .= ", :itemLength ";
        $sql .= ", :itemWeight ";
        $sql .= ", :itemFilterDiameter ";
        $sql .= ", :itemYear ";
        $sql .= ", :itemState";
        $sql .= ")";

        $arr = array();
        $arr[':itemExhibitorId'] = $objIM->getExhibitorId();
        $arr[':itemName'] = $objIM->getName();
        $arr[':itemDescription'] = $objIM->getDescription();
        $arr[':itemPicture'] = $objIM->getPicture();
        $arr[':itemPrice'] = $objIM->getPrice();
        $arr[':itemMakerId'] = $objIM->getMakerId();
        $arr[':itemMountId'] = $objIM->getMountId();
        $arr[':itemFocus'] = $objIM->getFocus();
        $arr[':itemType'] = $objIM->getType();
        $arr[':itemFullsize'] = $objIM->getFullsize();
        $arr[':itemConstruction'] = $objIM->getConstruction();
        $arr[':itemBradesNumber'] = $objIM->getBradesNumber();
        $arr[':itemFocalLength'] = $objIM->getFocalLength();
        $arr[':itemMaxFocalLength'] = $objIM->getMaxFocalLength();
        $arr[':itemMinDistance'] = $objIM->getMinDistance();
        $arr[':itemMaxMagnification'] = $objIM->getMaxMagnification();
        $arr[':itemFvalue'] = $objIM->getFvalue();
        $arr[':itemMaxFvalue'] = $objIM->getMaxFvalue();
        $arr[':itemViewAngle'] = $objIM->getViewAngle();
        $arr[':itemAntiShake'] = $objIM->getAntiShake();
        $arr[':itemWaterproof'] = $objIM->getWaterproof();
        $arr[':itemMaxDiameter'] = $objIM->getMaxDiameter();
        $arr[':itemLength'] = $objIM->getLength();
        $arr[':itemWeight'] = $objIM->getWeight();
        $arr[':itemFilterDiameter'] = $objIM->getFilterDiameter();
        $arr[':itemYear'] = $objIM->getYear();
        $arr['itemState'] = $objIM->getState();

        return Db::insert($sql, $arr);
    }

  /**
   * レンズを削除する
   *
   * @param int $id
   */
    public static function removeItemById($id)
    {
      $sql = "DELETE FROM item WHERE itemId=:id";
      $arr = array();
      $arr[':id'] = $id;

      Db::transaction();
      Db::delete($sql, $arr);
      Db::commit();
    }


  /**
   * レンズを複数の語から検索する
   *
   * @param array $words 語群
   * @return array
   */
    public static function searchItemByWords($words)
    {
        //メーカー一覧を取得
        $makers = MakerController::getMakers();

        //条件のリスト
        $whereList = array();
        //プリペアードステートメント用リスト
        $prepareList = array();

        //入力をスペース(全角・半角)で分割して配列にする
        $temp = explode(' ', $words);
        $res = array();
        foreach ($temp as $value) {
            $res = array_merge($res, explode('　', $value));
        }
        $words = $res;

        //SQL
        $sql = "SELECT * FROM item WHERE ";


        //リストに条件を追加
        foreach ($words as $key => $word) {
            //メーカーが含まれていたかどうか
            $makerFlag = 0;

            //検索ワードにメーカーが含まれている場合
            foreach ($makers as $id => $maker) {
                if (in_array($word, $maker)) {
                    $makerFlag = 1;
                    $id++;
                    array_push($whereList, "(itemMakerId={$id} OR itemName LIKE :value{$key} OR itemDescription LIKE :value{$key})");
                    $prepareList[":value{$key}"] = "%{$word}%";
                }
            }

            //検索ワードにメーカーが含まれていない場合
            if ($makerFlag == 0) {
                array_push($whereList, "(itemName LIKE :value{$key} OR itemDescription LIKE :value{$key} OR itemType LIKE :value{$key} OR itemWaterproof LIKE :value{$key})");
                $prepareList[":value{$key}"] = "%{$word}%";
            }
        }

        //リストをANDでつなぎSQLとつなぐ
        $strWhereList = implode(" AND ", $whereList);
        $sql .= $strWhereList;

        //SQL実行
        return Db::select($sql, $prepareList);
    }
}
