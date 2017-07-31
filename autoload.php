<?php
function autoloader($name)
{
  //'\'で分割
  $arrToken = explode('\\', $name);
  //'app'部分を'/classes'に置換
  $arrToken[0] = '/classes';
  //ファイル名を作成
  $filename = BASE_DIR . implode("/", $arrToken) . '.class.php';
  //ファイルが存在するならrequireする
  if (file_exists($filename)) {
    require_once($filename);
  }
}
