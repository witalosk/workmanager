<?php
require_once '../common.php';
use app\model\UserModel;
use app\controller\UserController;
session_start();

//ログイン中モデルを取得
$objUM = new UserModel;
$objUM = UserController::getLoginUser();


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
    <div class="container">
        <div class="row">
            <div class="col md-1"></div>
            <div class="col md-10 text-center">
                <h2>ようこそ！<?=$objUM->last_name?> <?=$objUM->first_name?>さん</h2>
                <a class="btn" href="work.php">勤務登録</a>
                <a class="btn btn-warning" href="">登録情報変更</a>
                <a class="btn btn-error" href="">ログアウト</a>
                <div class="whitecard">
                    <h3>登録情報</h3>
                    <table>
                        <tr>
                            <th>氏名</th>
                            <td><?=$objUM->last_name?> <?=$objUM->first_name?></td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>〒<?=$objUM->zipcode?><br><?=$objUM->address?></td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td><?=$objUM->phone?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col md-1"></div>
        </div>
    </div>
</body>
</html>