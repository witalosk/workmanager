<?php
namespace app\controller;
use app\model\UserModel;
use app\model\WorkModel;
use app\common\InvalidErrorException;
use app\common\ExceptionCode;
use app\common\Db;

class WorkController extends ControllerBase
{
  public function registerAction()
  {
    global $WEB_URL;
    UserController::checkLogin();

    //ログイン中モデルを取得
    $objUM = new UserModel;
    $objUM = UserController::getLoginUser();

    //もしpostされていれば
    if(null != $_POST)
    {
      //値を受け取り空欄がないかチェック
      $start = filter_input(INPUT_POST, 'start');
      $end = filter_input(INPUT_POST, 'end');
      $payment = filter_input(INPUT_POST, 'payment');
      $comment = filter_input(INPUT_POST, 'comment');
      if(null == $start || null == $end || null == $payment)
      {
        throw new InvalidErrorException(ExceptionCode::INVALID_FORM);
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
          'payment' => $payment,
          'comment' => $comment,
          'created_at' => null
        ];

        //ワークモデル
        $objWM = new WorkModel($arrWM);

        // 新規登録
        Db::transaction();
        $objWM->register();
        Db::commit();
        header('Location: /user/main');
      }
    }

    $this->view->assign('WEB', $WEB_URL);
    $this->view->assign('now', date('Y-m-d H:i').':00');
  }

  public function deleteAction()
  {
    $work_id = filter_input(INPUT_POST, 'id');

    $sql = "DELETE FROM `work` WHERE `id` = :id";
    $arr[':id'] = $work_id;
    Db::transaction();
    Db::delete($sql, $arr);
    Db::commit();
    header("Location: /user/main");
  }

  static public function makeShiftArray($works)
  {
    $count = 0;
    $sum = 0;
    $res = [];
    foreach($works as $shift)
    {
      $res[$count]['number'] = $shift['id'];
      $res[$count]['start'] = $shift['start'];
      $res[$count]['end'] = $shift['end'];
      $res[$count]['payment'] = $shift['payment'];
      $res[$count]['comment'] = $shift['comment'];

      $start = strtotime($shift['start']);
      $end = strtotime($shift['end']);
      $payment = (int)$shift['payment'];

      $diff = $end - $start;
      $hours = floor( $diff / 3600 );
      $minutes = floor( ( $diff / 60 ) % 60 );

      $key = $minutes % 5;
      $minutes -= $key;
      switch($key)
      {
        case 0:
        case 1:
        case 2:
        break;
        case 3:
        case 4:
        case 5:
        $minutes +=5;
      }

      //単価計算
      switch($minutes)
      {
        case 5:
        $minutes = 0;
        break;
        case 10:
        $minutes = 15;
        break;
        case 20:
        $minutes = 15;
        break;
        case 25:
        $minutes = 30;
        break;
        case 35:
        $minutes = 30;
        break;
        case 40:
        $minutes = 45;
        break;
        case 50:
        $minutes = 45;
        break;
        case 55:
        $minutes = 0;
        $hours += 1;
        break;
      }
      $tanka = $hours * $payment + $minutes * ($payment/60);

      $res[$count]['price'] = $tanka."円";
      $res[$count]['time'] = $hours.'時間'.$minutes.'分';
      $sum += $tanka;
      $count++;
    }
    return [$res, $sum.'円'];
  }
}
