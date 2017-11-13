<?php
namespace app\common;
use \Smarty;
use \app\common\Request;

class Dispatcher
{
  public function dispatch()
  {
    // パラメーター取得（末尾の / は削除）
    $param = preg_replace('/\/?$/', '', $_SERVER['REQUEST_URI']);
    $param = trim($param, '/');
    $param = preg_replace('/\?.+/', '', $param);
    $params = [];
    if('' != $param && '/' != $param)
    {
      //URIが空じゃなかったら[/]で分割
      $params = explode('/',  $param);
    }
    //１番目のパラメータからコントローラを取得
    $controller = 'index';
    if(DIR_NUM < count($params))
    {
      $controller = $params[DIR_NUM];
    }

    //クラスインスタンス作成
    $objController = $this->getControllerInstance($controller);

    //2番目のパラメータをアクションとして取得
    $action = 'index';
    if(DIR_NUM+1 < count($params))
    {
      $action = $params[DIR_NUM+1];
    }

    // アクションメソッドの存在確認
    if (false == method_exists($objController, $action . 'Action')) {
      header("HTTP/1.0 404 Not Found");
      exit;
    }

    // コントローラー初期設定
    $objController->setControllerAction($controller, $action);
    // 処理実行
    $objController->run();
  }

  // コントローラークラスのインスタンスを取得
  private function getControllerInstance($controller)
  {
    // 一文字目のみ大文字に変換＋"Controller"
    $className = ucfirst(strtolower($controller)) . 'Controller';
    // コントローラーファイル名
    $controllerFileName = sprintf('%s/classes/controller/%s.class.php', BASE_DIR, $className);
    // ファイル存在チェック
    if (false == file_exists($controllerFileName)) {
      return null;
    }
    // クラスファイルを読込
    require_once $controllerFileName;

    //名前空間付きのクラス名
    $namespaceClass = "\\app\\controller\\".$className;

    // クラスが定義されているかチェック
    if (false == class_exists($namespaceClass)) {
      return null;
    }
    // クラスインスタンス生成
    $objController = new $namespaceClass();

    return $objController;
  }


}
