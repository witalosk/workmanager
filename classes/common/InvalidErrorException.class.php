<?php

namespace app\common;
require_once __DIR__."/../../common.php";

/**
 * InvaildErrorException クラス
 * @brief 無効エラー用のクラス
 */
class InvalidErrorException extends \Exception
{
  public function __construct($code, \Exception $previous = null)
  {
    $message = ExceptionCode::getMessage($code);

    //エラーページ生成
    print <<< EOS
<html>
  <head>
    <meta charset="utf-8">
    <title>エラー - Lens</title>
    <style type="text/css">
    <!--
@import url(http://fonts.googleapis.com/earlyaccess/notosansjp.css);
  #wrapper {
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    justify-content: -webkit-center;
    padding: 10px; }
  #wrapper main {
    display: block;
    width: 80vw;
    max-width: 900px;
    min-width: 300px; }
  @media screen and (max-width: 1220px) {
    #wrapper {
      flex-wrap: wrap; } }
  @media screen and (min-width: 1220px) {
    #wrapper {
      flex-direction: row; } }
  #wrapper h1 {
    font-family: 'Noto Sans JP', sans-serif;
    padding-bottom: 5px;
    margin-bottom: 0;
    border-bottom: solid 2px #009cff;
    font-weight: 300; }
    -->
    </style>
  </head>
  <body>
    <div id="wrapper">
      <main>
        <h1>{$message}</h1>
        <p>操作をよくお確かめください。</p>
        <p>{$code}</p>
      </main>
    </div>
  </body>
</html>
EOS;
    parent::__construct( $message, $code, $previous);
  }
}
