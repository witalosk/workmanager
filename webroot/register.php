<?php
require_once "../common.php";
use Cartalyst\Sentinel\Native\Facades\Sentinel as Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;
use app\common\Db;


$error_message = "";

//もしpostされていれば
if(null != $_POST)
{
    //値を受け取り空欄がないかチェック
    $email = filter_input(INPUT_POST, 'email');
    $pass = filter_input(INPUT_POST, 'pass');
    $family_name = filter_input(INPUT_POST, 'family_name');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');
    if(null == $email || null == $pass || null == $family_name || null == $first_name || null == $address || null == $phone)
    {
        $error_message = "未入力の項目があります";
    }
    else
    {
        //登録
        
        // ユーザー情報
        $credentials = [
        'email' => $email,
        'password' => $pass,
        'first_name' => $first_name,
        'last_name' => $family_name,
        ];
        
        // 登録済みかを確認
        $user = Sentinel::getUserRepository()->findByCredentials($credentials);
        if (is_null($user)) {
            // 存在しない場合は、新規登録
            $user = Sentinel::register($credentials);
            $id = $user->attribute['id'];
            var_dump($id);
        }
    }
}

?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/skyblue.min.css" type="text/css">
    <title>Working Manager</title>
  </head>

  <body>
    <header class="bg-main">
      <nav class="padding-left-10 padding-top-10">
        <h3>Working Manager</h3>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <div class="col md-3"></div>
        <div class="col md-6 text-center">
          <h2>Create new account</h2>
          <p>すべて必須項目です</p>
          <?php
if(null != $error_message)
{
    ?>
            <a class="btn btn-empty btn-error">
              <?=$error_message?>
            </a>
            <?php
}
?>
              <form action="" method="post">
                <div>
                  <label>メールアドレス</label>
                  <input class="form-control" type="text" name="email">
                </div>
                <div>
                  <label>パスワード</label>
                  <input class="form-control" type="password" name="pass">
                </div>
                <div>
                  <label>氏名</label>
                  <input class="form-control" type="text" name="family_name" placeholder="Family name">
                  <input class="form-control" type="text" name="first_name" placeholder="First name">
                </div>
                <div>
                  <label>住所</label>
                  <input class="form-control" type="text" name="address" placeholder="e.g. 東京都千代田区千代田1-1 日本ビル103">
                </div>
                <div>
                  <label>電話番号</label>
                  <input class="form-control" type="text" name="phone" placeholder="e.g. 080 1234 5678">
                </div>
                <input class="btn" type="submit" value="Register" style="cursor: pointer;">
              </form>
        </div>
        <div class="col md-3"></div>
      </div>
    </div>
  </body>

  </html>