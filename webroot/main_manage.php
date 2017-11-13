<?php
require_once '../common.php';
use app\model\UserModel;
use app\controller\UserController;
use app\dao\WorkDao;
use app\common\Db;
session_start();

//ログイン中モデルを取得
$objUM = new UserModel;
$objUM = UserController::getLoginUser();

//ユーザを取得
$sql = "SELECT * FROM `user`";
$users = Db::select($sql);

//全シフトを取得
$arr = WorkDao::getDaoFromUserId($objUM->id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/skyblue.min.css" type="text/css">
    <link rel="stylesheet" href="css/master.css" type="text/css">
    <title>Working Manager</title>
</head>
<body>
    <header class="bg-main">
        <nav class="padding-left-10 padding-top-10">
            <h3>Working Manager</h3>
        </nav>
    </header>
        <div class="row">
            <div class="col md-12 text-center">
                <h2>管理者用画面</h2>
                <a class="btn btn-error" href="user/logout">ログアウト</a>
            </div>
        </div>
        <div class="row">
            <?php foreach($users as $user)
            {
                if($user['id']!=1)
                {
                //全シフトを取得
                $arr = WorkDao::getDaoFromUserId($user['id']);
            ?>
                <div class="col md-4 text-center">
                <div class="whitecard">
                    <h3><?=$user['last_name']?> <?=$user['first_name']?></h3>
                    <table>
                        <tr>
                            <th>氏名</th>
                            <td><?=$user['last_name']?> <?=$user['first_name']?></td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>〒<?=$user['zipcode']?><br><?=$user['address']?></td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td><?=$user['phone']?></td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><?=$user['email']?></td>
                        </tr>
                    </table>
                    <br>
                    <h3>勤務履歴</h3>
                    <!-- 今月 -->
                    <div class="scroll">
                    <h4><?=date('Y年m月')?></h4>
                    <?php
                    $strmonth = date('Y-m');
                    $arr1 = [];

                    foreach($arr as $item)
                    {
                        if(strstr($item['start'], $strmonth))
                        {
                            array_push($arr1, $item);
                        }
                    }
                    genShiftTable($arr1, false);
                    ?>
                    </div>
                    <br>
                    <!-- 先月 -->
                    <div class="scroll">
                    <h4><?=date('Y年m月', strtotime('-1 month'))?></h4>
                    <?php
                    $strmonth = date('Y-m', strtotime('-1 month'));
                    $arr1 = [];

                    foreach($arr as $item)
                    {
                        if(strstr($item['start'], $strmonth))
                        {
                            array_push($arr1, $item);
                        }
                    }
                    genShiftTable($arr1, false);
                    ?>
                    </div>
                    <br>
                    <!-- 先々月 -->
                    <div class="scroll">
                    <h4><?=date('Y年m月', strtotime('-2 month'))?></h4>
                    <?php
                    $strmonth = date('Y-m', strtotime('-2 month'));
                    $arr1 = [];

                    foreach($arr as $item)
                    {
                        if(strstr($item['start'], $strmonth))
                        {
                            array_push($arr1, $item);
                        }
                    }
                    genShiftTable($arr1, false);
                    ?>
                    </div>
                </div>
            </div>

            <?php
                }
            }
            ?>
        </div>
</body>
</html>
