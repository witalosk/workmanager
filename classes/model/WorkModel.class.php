<?php
namespace app\model;

use app\dao\WorkDao;
/**
* WorkMode クラス
* @brief ワークモデル
*/
final class WorkModel
{
    public $id = null;
    public $user_id = null;
    public $start = null;
    public $end = null;
    public $payment = null;
    public $comment = null;
    public $created_at = null;

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
        $this->user_id = $array['user_id'];
        $this->start = $array['start'];
        $this->end = $array['end'];
        $this->payment = $array['payment'];
        $this->comment = $array['comment'];
        $this->created_at = $array['created_at'];

        return $this;
    }

    /**
    * ユーザidからワークモデルを検索するメソッド
    * @param string $id
    * @return \app\model\UserModel
    */
    public function getModelByUserId($id)
    {
        $dao = WorkDao::getDaoFromUserId($id);
        return (isset($dao[0])) ? $this->setProperty(reset($dao)) : null;
    }

    /**
    * DBを更新・DBに保存するメソッド
    * @return bool
    */
    public function save()
    {
        return WorkDao::save($this);
    }

    /**
    * ワークを新規登録する
    *
    * @return bool
    */
    public function register()
    {
        return WorkDao::insert($this);
    }
}
