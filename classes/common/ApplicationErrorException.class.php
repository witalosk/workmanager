<?php

namespace app\common;

/**
 * ApplicationErrorException クラス
 * @brief アプリケーションエラー用のクラス
 */
class ApplicationErrorException extends \Exception
{
  //コンストラクタ
  public function __construct($code, \Exception $previous = null)
  {
    $message = ExceptionCode::getMessage($code);
    self::writeLog($message);
    parent::__construct('アプリケーションエラーが発生しました。', $code, $previous);
  }

  //ログを書く
  static private function writeLog($message)
  {

  }
}
