<?php
require_once "../common.php";
use app\controller\UserController;
use app\dao\UserDao;
use app\model\UserModel;
use app\dao\WorkDao;
use app\model\WorkModel;
use app\common\Db;

session_start();

UserController::checkLogin();

//ログイン中モデルを取得
$objUM = new UserModel;
$objUM = UserController::getLoginUser();


$error_message = "";

//もしpostされていれば
if(null != $_POST)
{
    //値を受け取り空欄がないかチェック
    $start = filter_input(INPUT_POST, 'start');
    $end = filter_input(INPUT_POST, 'end');
    $comment = filter_input(INPUT_POST, 'comment');
    if(null == $start || null == $end)
    {
        $error_message = "未入力の項目があります";
    }
    else
    {
        //登録
        
        // ユーザー情報
        $arrWM = [
        'id' => null,
        'user_id' => $objUM->id,
        'start' => $start,
        'end' => $end,
        'comment' => $comment,
        'created_at' => null
        ];

        //ワークモデル
        $objWM = new WorkModel($arrWM);
        
            // 新規登録
            Db::transaction();
            $objWM->register();
            Db::commit();
            header('Location: main.php');
    }
}

?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/skyblue.min.css" type="text/css">
    <link rel="stylesheet" href="css/master.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <script type="text/javascript" src="https://unpkg.com/flatpickr"></script>
    <title>Working Manager</title>
  </head>

  <body>
    <header class="bg-main">
      <nav class="padding-left-10 padding-top-10">
        <h3><a href="main.php" style="color:#FFF;">Working Manager</a></h3>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <div class="col md-3"></div>
        <div class="col md-6 text-center">
          <h2>勤務登録</h2>
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
                  <label>開始</label>
                  <input id="start" class="form-control" type="text" name="start" placeholder="時間を選択してください..." required>
                </div>
                <div>
                  <label>終了</label>
                  <input id="end" class="form-control" type="text" name="end" placeholder="時間を選択してください..." required>
                </div>
                <div>
                  <label>コメント</label>
                  <input id="comment" class="form-control" type="text" name="comment">
                </div>
                <input class="btn" type="submit" value="Register" style="cursor: pointer;">
              </form>
        </div>
        <div class="col md-3"></div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
  flatpickr("#start", {
    enableTime: true,
    maxDate: "today"
  });
  flatpickr("#end", {
    enableTime: true,
    maxDate: "today"
  });
  </script>

  </html>