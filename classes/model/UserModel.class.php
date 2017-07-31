<?php
namespace app\model;

use app\dao\UserDao;
/**
* UserMode クラス
* @brief ユーザモデル
*/
final class UserModel
{
    private $id = null;
    private $nickName = null;
    private $mailAddress = null;
    private $hash = null;
    private $salt = null;
    private $familyName = null;
    private $familyNameRuby = null;
    private $firstName = null;
    private $firstNameRuby = null;
    private $zipcodeTop = null;
    private $zipcodeBottom = null;
    private $prefecture = null;
    private $city = null;
    private $address = null;
    private $building = null;
    private $phone1 = null;
    private $phone2 = null;
    private $sex = null;
    private $birthday = null;
    private $token = null;
    
    
    //変数を参照するメソッド
    public function getId()
    {
        return $this->id;
    }
    public function getNickName()
    {
        return $this->nickName;
    }
    public function getMailAddress()
    {
        return $this->mailAddress;
    }
    public function getHash()
    {
        return $this->hash;
    }
    public function getSalt()
    {
        return $this->salt;
    }
    public function getFamilyName()
    {
        return $this->familyName;
    }
    public function getFamilyNameRuby()
    {
        return $this->familyNameRuby;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getFirstNameRuby()
    {
        return $this->firstNameRuby;
    }
    public function getZipcodeTop()
    {
        return $this->zipcodeTop;
    }
    public function getZipcodeBottom()
    {
        return $this->zipcodeBottom;
    }
    public function getPrefecture()
    {
        return $this->prefecture;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getBuilding()
    {
        return $this->building;
    }
    public function getPhone1()
    {
        return $this->phone1;
    }
    public function getPhone2()
    {
        return $this->phone2;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getBirthday()
    {
        return $this->birthday;
    }
    public function getToken()
    {
        return $this->token;
    }
    
    //変数をセットするメソッド
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }
    public function setNickName($value)
    {
        $this->nickName = $value;
        return $this;
    }
    public function setMailAddress($value)
    {
        $this->mailAddress = $value;
        return $this;
    }
    public function setHash($value)
    {
        $this->hash = $value;
        return $this;
    }
    public function setSalt($value)
    {
        $this->salt = $value;
        return $this;
    }
    public function setFamilyName($value)
    {
        $this->familyName = $value;
        return $this;
    }
    public function setFamilyNameRuby($value)
    {
        $this->familyNameRuby = $value;
        return $this;
    }
    public function setFirstName($value)
    {
        $this->firstName = $value;
        return $this;
    }
    public function setFirstNameRuby($value)
    {
        $this->firstNameRuby = $value;
        return $this;
    }
    public function setZipcodeTop($value)
    {
        $this->zipcodeTop = $value;
        return $this;
    }
    public function setZipcodeBottom($value)
    {
        $this->zipcodeBottom = $value;
        return $this;
    }
    public function setPrefecture($value)
    {
        $this->prefecture = $value;
        return $this;
    }
    public function setCity($value)
    {
        $this->city = $value;
        return $this;
    }
    public function setAddress($value)
    {
        $this->address = $value;
        return $this;
    }
    public function setBuilding($value)
    {
        $this->building = $value;
        return $this;
    }
    public function setPhone1($value)
    {
        $this->phone1 = $value;
        return $this;
    }
    public function setPhone2($value)
    {
        $this->phone2 = $value;
        return $this;
    }
    public function setSex($value)
    {
        $this->sex = $value;
        return $this;
    }
    public function setBirthday($value)
    {
        $this->birthday = $value;
        return $this;
    }
    public function setToken($value)
    {
        $this->token = $value;
        return $this;
    }
    
    /**
    * プロパティを配列で指定するメソッド
    * @param array $array
    * @return \app\model\UserModel
    */
    public function setProperty($array)
    {
        $this->id = $array['userId'];
        $this->nickName = $array['userNickName'];
        $this->mailAddress = $array['userMailAddress'];
        $this->hash = $array['userHash'];
        $this->salt = $array['userSalt'];
        $this->familyName = $array['userFamilyName'];
        $this->familyNameRuby = $array['userFamilyNameRuby'];
        $this->firstName = $array['userFirstName'];
        $this->firstNameRuby = $array['userFirstNameRuby'];
        $this->zipcodeTop = $array['userZipcodeTop'];
        $this->zipcodeBottom = $array['userZipcodeBottom'];
        $this->prefecture = $array['userPrefecture'];
        $this->city = $array['userCity'];
        $this->address = $array['userAddress'];
        $this->building = $array['userBuilding'];
        $this->phone1 = $array['userPhone1'];
        $this->phone2 = $array['userPhone2'];
        $this->sex = $array['userSex'];
        $this->birthday = $array['userBirthday'];
        $this->token = $array['userToken'];
        
        return $this;
    }
    
    /**
    * メールアドレスからユーザモデルを検索するメソッド
    * @param string $mailAddress
    * @return \app\model\UserModel
    */
    public function getModelByMailAddress($mail)
    {
        $dao = UserDao::getDaoFromEmail($mail);
        return (isset($dao[0])) ? $this->setProperty(reset($dao)) : null;
    }
    /**
    * ユーザidからユーザモデルを検索するメソッド
    * @param string $id
    * @return \app\model\UserModel
    */
    public function getModelById($id)
    {
        $dao = UserDao::getDaoFromUserId($id);
        return (isset($dao[0])) ? $this->setProperty(reset($dao)) : null;
    }
    
    /**
    * パスワードが一致しているかどうかを判定するメソッド
    * @param string $password
    * @return bool
    */
    public function checkPassword($password)
    {
        $hash = $this->getHash();
        $salt = $this->getSalt();
        return password_verify($password.$salt, $hash);
    }
    
    /**
    * DBを更新・DBに保存するメソッド
    * @return bool
    */
    public function save()
    {
        return UserDao::save($this);
    }
    
    /**
    * ユーザを新規登録する
    *
    * @return bool
    */
    public function register()
    {
        return UserDao::insert($this);
    }
}