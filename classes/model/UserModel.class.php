<?php
namespace app\model;

use app\dao\UserDao;
/**
* UserMode クラス
* @brief ユーザモデル
*/
final class UserModel
{
    public $id = null;
    public $email = null;
    public $password = null;
    public $permissions = null;
    public $last_login = null;
    public $first_name = null;
    public $last_name = null;
    public $zipcode = null;
    public $address = null;
    public $phone = null;
    public $created_at = null;
    public $updated_at = null;
    
    /**
    * コンストラクタ
    * @param array $array
    * @return \app\model\UserModel
    */
    public function __construct($array = array())
    {
        if(null != $array)
        {
            $this->setProperty($array);
        }
    }
    
    /**
    * プロパティを配列で指定するメソッド
    * @param array $array
    * @return \app\model\UserModel
    */
    public function setProperty($array)
    {
        $this->id = $array['id'];
        $this->email = $array['email'];
        $this->password = $array['password'];
        $this->permissions = $array['permissions'];
        $this->last_login = $array['last_login'];
        $this->first_name = $array['first_name'];
        $this->last_name = $array['last_name'];
        $this->zipcode = $array['zipcode'];
        $this->address = $array['address'];
        $this->phone = $array['phone'];
        $this->created_at = $array['created_at'];
        $this->updated_at = $array['updated_at'];
        
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
        $dao = UserDao::getDaoFromId($id);
        return (isset($dao[0])) ? $this->setProperty(reset($dao)) : null;
    }
    
    /**
    * パスワードが一致しているかどうかを判定するメソッド
    * @param string $password
    * @return bool
    */
    public function checkPassword($password)
    {
        $hash = $this->password;
        return password_verify($password, $hash);
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