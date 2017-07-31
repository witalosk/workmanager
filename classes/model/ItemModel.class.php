<?php
namespace app\model;

use app\dao\ItemDao;
/**
 * ItemMode クラス
 * @brief アイテムモデル
 */
final class ItemModel
{
  private $id = null;
  private $exhibitorId = null;
  private $name = null;
  private $description = null;
  private $picture = null;
  private $price = null;
  private $makerId = null;
  private $mountId = null;
  private $focus = null;
  private $type = null;
  private $fullsize = null;
  private $construction = null;
  private $bradesNumber = null;
  private $focalLength = null;
  private $maxFocalLength = null;
  private $minDistance = null;
  private $maxMagnification = null;
  private $fvalue = null;
  private $maxFvalue = null;
  private $viewAngle = null;
  private $antiShake = null;
  private $waterproof = null;
  private $maxDiameter = null;
  private $length = null;
  private $weight = null;
  private $filterDiameter = null;
  private $year = null;
  private $state = null;


  //変数を参照するメソッド
  public function getId()
  {
    return $this->id;
  }
  public function getExhibitorId()
  {
    return $this->exhibitorId;
  }
  public function getName()
  {
    return $this->name;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function getPicture()
  {
    return $this->picture;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function getMakerId()
  {
    return $this->makerId;
  }
  public function getMountId()
  {
    return $this->mountId;
  }
  public function getFocus()
  {
    return $this->focus;
  }
  public function getType()
  {
    return $this->type;
  }
  public function getFullsize()
  {
    return $this->fullsize;
  }
  public function getConstruction()
  {
    return $this->construction;
  }
  public function getBradesNumber()
  {
    return $this->bradesNumber;
  }
  public function getFocalLength()
  {
    return $this->focalLength;
  }
  public function getMaxFocalLength()
  {
    return $this->maxFocalLength;
  }
  public function getMinDistance()
  {
    return $this->minDistance;
  }
  public function getMaxMagnification()
  {
    return $this->maxMagnification;
  }
  public function getFvalue()
  {
    return $this->fvalue;
  }
  public function getMaxFvalue()
  {
    return $this->maxFvalue;
  }
  public function getViewAngle()
  {
    return $this->viewAngle;
  }
  public function getAntiShake()
  {
    return $this->antiShake;
  }
  public function getWaterproof()
  {
    return $this->waterproof;
  }
  public function getMaxDiameter()
  {
    return $this->maxDiameter;
  }
  public function getLength()
  {
    return $this->length;
  }
  public function getWeight()
  {
    return $this->weight;
  }
  public function getFilterDiameter()
  {
    return $this->filterDiameter;
  }
  public function getYear()
  {
    return $this->year;
  }
  public function getState()
  {
    return $this->state;
  }

  //変数をセットするメソッド
  public function setId($value)
  {
    $this->id = $value;
    return $this;
  }
  public function setExhibitorId($value)
  {
    $this->exhibitorId = $value;
    return $this;
  }
  public function setName($value)
  {
    $this->name = $value;
    return $this;
  }
  public function setDescription($value)
  {
    $this->description = $value;
    return $this;
  }
  public function setPicture($value)
  {
    $this->picture = $value;
    return $this;
  }
  public function setPrice($value)
  {
    $this->price = $value;
    return $this;
  }
  public function setMakerId($value)
  {
    $this->makerId = $value;
    return $this;
  }
  public function setMountId($value)
  {
    $this->mountId = $value;
    return $this;
  }
  public function setFocus($value)
  {
    $this->focus = $value;
    return $this;
  }
  public function setType($value)
  {
    $this->type = $value;
    return $this;
  }
  public function setFullsize($value)
  {
    $this->fullsize = $value;
    return $this;
  }
  public function setConstruction($value)
  {
    $this->construction = $value;
    return $this;
  }
  public function setBradesNumber($value)
  {
    $this->bradesNumber = $value;
    return $this;
  }
  public function setFocalLength($value)
  {
    $this->focalLength = $value;
    return $this;
  }
  public function setMaxFocalLength($value)
  {
    $this->maxFocalLength = $value;
    return $this;
  }
  public function setMinDistance($value)
  {
    $this->minDistance = $value;
    return $this;
  }
  public function setMaxMagnification($value)
  {
    $this->maxMagnification = $value;
    return $this;
  }
  public function setFvalue($value)
  {
    $this->fvalue = $value;
    return $this;
  }
  public function setMaxFvalue($value)
  {
    $this->maxFvalue = $value;
    return $this;
  }
  public function setViewAngle($value)
  {
    $this->viewAngle = $value;
    return $this;
  }
  public function setAntiShake($value)
  {
    $this->antiShake = $value;
    return $this;
  }
  public function setWaterproof($value)
  {
    $this->waterproof = $value;
    return $this;
  }
  public function setMaxDiameter($value)
  {
    $this->maxDiameter = $value;
    return $this;
  }
  public function setLength($value)
  {
    $this->weight = $value;
    return $this;
  }
  public function setFilterDiameter($value)
  {
    $this->filterDiameter = $value;
    return $this;
  }
  public function setYear($value)
  {
    $this->year = $value;
    return $this;
  }
  public function setState($value)
  {
    $this->state = $value;
    return $this;
  }
  
  /**
   * プロパティを配列で指定するメソッド
   * @param array $array
   * @return \app\model\ItemModel
   */
  public function setProperty($array)
  {
    $this->id = $array['itemId'];
    $this->exhibitorId = $array['itemExhibitorId'];
    $this->name = $array['itemName'];
    $this->description = $array['itemDescription'];
    $this->picture = $array['itemPicture'];
    $this->price = $array['itemPrice'];
    $this->makerId = $array['itemMakerId'];
    $this->mountId = $array['itemMountId'];
    $this->focus = $array['itemFocus'];
    $this->type = $array['itemType'];
    $this->fullsize = $array['itemFullsize'];
    $this->construction = $array['itemConstruction'];
    $this->bradesNumber = $array['itemBradesNumber'];
    $this->focalLength = $array['itemFocalLength'];
    $this->maxFocalLength = $array['itemMaxFocalLength'];
    $this->minDistance = $array['itemMinDistance'];
    $this->maxMagnification = $array['itemMaxMagnification'];
    $this->fvalue = $array['itemFvalue'];
    $this->maxFvalue = $array['itemMaxFvalue'];
    $this->viewAngle = $array['itemViewAngle'];
    $this->antiShake = $array['itemAntiShake'];
    $this->waterproof = $array['itemWaterproof'];
    $this->maxDiameter = $array['itemMaxDiameter'];
    $this->length = $array['itemLength'];
    $this->weight = $array['itemWeight'];
    $this->filterDiameter = $array['itemFilterDiameter'];
    $this->year = $array['itemYear'];
    $this->state = $array['itemState'];

    return $this;
  }

  /**
  * レンズの名前からレンズモデルを検索するメソッド
  * @param string $name
  * @return \app\model\ItemModel
  */
  public function getModelByName($name)
  {
    $dao = ItemDao::getDaoFromItemName($name);
    return (isset($dao[0])) ? $this->setProperty(reset($dao)) : null;
  }

    /**
  * レンズのidからレンズモデルを検索するメソッド
  * @param string $id
  * @return \app\model\ItemModel
  */
  public function getModelById($id)
  {
    $dao = ItemDao::getDaoFromItemId($id);
    return (isset($dao[0])) ? $this->setProperty(reset($dao)) : null;
  }

  /**
   * DBを更新・DBに保存するメソッド
   * @return bool
   */
  public function save()
  {
    return ItemDao::save($this);
  }

    /**
   * レンズを新規登録する
   * 
   * @return bool
   */
  public function register()
  {
    return ItemDao::insert($this);
  }
}
