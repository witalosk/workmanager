<?php

namespace app\controller;

use \app\model\UserModel;
use \app\dao\UserDao;
use \app\common\Db;
use \app\common\InvalidErrorException;
use \app\common\ExceptionCode;

/**
* UserController クラス
* @brief ユーザに関する処理を行う
*/
class UserController
{
    
    
    //!ログイン成功時の遷移先
    const TARGET_PAGE = 'main.php';
    
    //!セッション保存用の名前
    const LOGINUSER = 'lum';
    
    /**
    * メールアドレスとパスワードでログインする
    *
    * @return void
    */
    static public function login()
    {
        global $WEB_URL;
        //非POST時は処理中断
        if(!filter_input_array(INPUT_POST))
        {
            return;
        }
        
        //POSTから値を受け取る
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'pass');
        $redirectURL = filter_input(INPUT_GET, 'nexturl');
        
        //どちらかがからの場合は何もしない
        if($email == '' || $password == '')
        {
            return;
        }
        
        //リダイレクト先がない場合, mainPageを指定
        if (null == $redirectURL)
        {
            $redirectURL = self::TARGET_PAGE;
        }
        
        
        //トランザクション開始
        Db::transaction();
        //emailからUserModelを取得する
        $objUM = new UserModel();
        $objUM->getModelByMailAddress($email);
        
        //パスワードチェック
        if(!$objUM->checkPassword($password))
        {
            //ログイン失敗時
            Db::commit();
            throw new InvalidErrorException(ExceptionCode::INVALID_LOGIN_FAIL);
        }
        
        //ログイン成功時
        Db::commit();
        
        //セッション固定攻撃用対策
        session_regenerate_id(true);
        
        //セッションにUserModelを保存
        $_SESSION[self::LOGINUSER] = $objUM;
        
        //ページ遷移
        header(sprintf("location: %s%s", $WEB_URL, $redirectURL));
    }
    
    /**
    * ログイン状態かどうかをチェックする
    *
    * @param str ログイン後のリダイレクト先のURL
    * @param bool リダイレクトするか
    * @return void
    */
    static public function checkLogin($redirectURL = 'main.php', $redirect = true)
    {
        global $WEB_URL;
        
        $objUM = (isset($_SESSION[self::LOGINUSER])) ?
        $_SESSION[self::LOGINUSER] : null;

        if(isset($objUM))
        {
            return true;
        }
        if($redirect == true)
        {
            header('Location:'.$WEB_URL.'index.php?nexturl='.$redirectURL);
        }
        else
        {
            return false;
        }
    }
    
    /**
    * ログイン中のユーザーモデルを取得する
    *
    * @return UserModel
    */
    static public function getLoginUser()
    {
        return $_SESSION[self::LOGINUSER];
    }
    
    /**
    * ログアウトする
    *
    * @return void
    */
    static public function logout()
    {
        global $WEB_URL;
        $_SESSION = [];
        session_destroy();
        header('Location: '.$WEB_URL);
    }
    
    /**
    * メールアドレスが使われているかチェックする
    * アドレスが使われていたらtrue, 使われていなかったらfalse
    *
    * @return void
    */
    static public function checkMailAddress($email)
    {
        $dao = UserDao::getDaoFromEmail($email);
        return isset($dao[0]);
    }
}