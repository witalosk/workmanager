<?php

namespace app\common;

/**
 * SystemErrorException クラス
 * @brief システムエラー用のクラス
 */
class SystemErrorException extends \Exception
{
  //コンストラクタ
  public function __construct($code, \Exception $previous = null)
  {
    $message = ExceptionCode::getMessage($code);
    self::writeLog($message);
    self::sendMail($Message);
    parent::__construct('システムエラーが発生しました。',$code.$previous);
  }

  //管理者へメール
  static private function sendMail($message){

  }

  //ログを出力
  static private function writeLog($message){

  }
}
