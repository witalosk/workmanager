<?php

namespace app\controller;

use \app\model\UserModel;
use \app\dao\UserDao;
use \app\dao\WorkDao;
use \app\common\Db;
use \app\common\InvalidErrorException;
use \app\common\ExceptionCode;
use \app\common\Request;

/**
* UserController クラス
* @brief ユーザに関する処理を行う
*/
class UserController extends ControllerBase
{
  //!ログイン成功時の遷移先
  const TARGET_PAGE = 'user/main';

  //!セッション保存用の名前
  const LOGINUSER = 'lum';

  /**
  * メインアクション
  */
  public function mainAction()
  {
    global $WEB_URL;

    //ログイン中モデルを取得
    $objUM = new UserModel;
    $objUM = UserController::getLoginUser();

    //結果
    $res = [];

    //全シフトを取得
    $works = WorkDao::getDaoFromUserId($objUM->id);

    //今月について
    $strmonth = date('Y-m');
    $works1 = [];
    foreach($works as $item)
    {
        if(strstr($item['start'], $strmonth))
        {
            array_push($works1, $item);
        }
    }
    [$res1, $sum1] = WorkController::makeShiftArray($works1);
    $this->view->assign('works1', $res1);
    $this->view->assign('m1', date('Y年m月'));
    $this->view->assign('sum1', $sum1);


    //先月について
    $strmonth = date('Y-m', strtotime('-1 month'));
    $works2 = [];
    foreach($works as $item)
    {
        if(strstr($item['start'], $strmonth))
        {
            array_push($works2, $item);
        }
    }
    [$res2, $sum2] = WorkController::makeShiftArray($works2);
    $this->view->assign('works2', $res2);
    $this->view->assign('m2', date('Y年m月', strtotime('-1 month')));
    $this->view->assign('sum2', $sum2);

    //先々月について
    $strmonth = date('Y-m', strtotime('-2 month'));
    $works3 = [];
    foreach($works as $item)
    {
        if(strstr($item['start'], $strmonth))
        {
            array_push($works3, $item);
        }
    }
    [$res3, $sum3] = WorkController::makeShiftArray($works3);
    $this->view->assign('works3', $res3);
    $this->view->assign('m3', date('Y年m月', strtotime('-2 month')));
    $this->view->assign('sum3', $sum3);

    $this->view->assign('WEB', $WEB_URL);
    $this->view->assign('user', (array)$objUM);
  }

  /**
  *ユーザ登録
  */
  public function registerAction()
  {
    //もしpostされていれば
    if(null != $_POST)
    {
        //値を受け取り空欄がないかチェック
        $email = filter_input(INPUT_POST, 'email');
        $pass = filter_input(INPUT_POST, 'pass');
        $family_name = filter_input(INPUT_POST, 'family_name');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $zipcode = filter_input(INPUT_POST, 'zipcode');
        $address = filter_input(INPUT_POST, 'address');
        $phone = filter_input(INPUT_POST, 'phone');
        if(null == $email || null == $pass || null == $family_name || null == $first_name || null == $address || null == $phone)
        {
            throw new InvalidErrorException(ExceptionCode::INVALID_FORM);
        }
        else
        {
            //登録

            // ユーザー情報
            $arrUM = [
            'id' => null,
            'email' => $email,
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'permissions' => null,
            'last_login' => null,
            'first_name' => $first_name,
            'last_name' => $family_name,
            'zipcode' => $zipcode,
            'address' => $address,
            'phone' => $phone,
            'created_at' => null,
            'updated_at' => time()
            ];

            //ユーザモデル
            $objUM = new UserModel($arrUM);

            // 登録済みかを確認
            if (!UserController::checkMailAddress($email)) {
                // 存在しない場合は、新規登録
                Db::transaction();
                $objUM->register();
                Db::commit();
                header('Location: /');
            }
        }
    }

  }

  /**
  * メールアドレスとパスワードでログインする
  *
  * @return void
  */
  static public function loginAction()
  {
    global $WEB_URL;
    //非POST時は処理中断
    if(!filter_input_array(INPUT_POST))
    {
      header("Location: /");
    }

    //POSTから値を受け取る
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'pass');
    $redirectURL = filter_input(INPUT_GET, 'nexturl');

    //どちらかがからの場合は何もしない
    if($email == '' || $password == '')
    {
      header("Location: /");
    }

    //ADMIN用処理
    if($email == ADMIN_MAIL)
    {
      if(password_verify($password, ADMIN_HASH))
      {
        Db::transaction();
        $objUM = new UserModel();
        $objUM->getModelById(1);
        //ログイン成功時
        $objUM->last_login = date('Y-m-d H:i:s');
        $objUM->save();
        Db::commit();

        //セッション固定攻撃用対策
        session_regenerate_id(true);

        //セッションにUserModelを保存
        $_SESSION[self::LOGINUSER] = $objUM;

        //ページ遷移
        header("location: /main_manage.php");
      }
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
    $objUM->last_login = date('Y-m-d H:i:s');
    $objUM->save();
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
  static public function checkLogin($redirectURL = 'index.php', $redirect = true)
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
  static public function logoutAction()
  {
    global $WEB_URL;
    $_SESSION = [];
    session_destroy();
    header('Location: /');
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
