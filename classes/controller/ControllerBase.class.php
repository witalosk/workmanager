<?php
namespace app\controller;
use \app\common\Request;
use \Smarty;

abstract class ControllerBase
{
    protected $controller = 'index';
    protected $action = 'index';
    protected $view;
    protected $request;
    protected $templatePath;

    // コンストラクタ
    public function __construct()
    {
        $this->request = new Request();
    }

    // コントローラーとアクションの文字列設定
    public function setControllerAction($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    // 処理実行
    public function run()
    {
        try {
            // ビューの初期化
            $this->initializeView();
            // 共通前処理
            $this->preAction();
            // アクションメソッド
            $methodName = sprintf('%sAction', $this->action);
            $this->$methodName();
            //WEB_URLの展開
            global $WEB_URL;
            $this->view->assign('WEB', $WEB_URL);

            // 表示
            $this->view->display($this->templatePath);
        } catch (Exception $e) {
            // ログ出力等の処理を記述
        }
    }

    // ビューの初期化
    protected function initializeView()
    {
        $this->view = new Smarty();
        $this->view->template_dir = sprintf('%s/view/templates/', BASE_DIR);
        $this->view->compile_dir = sprintf('%s/view/templates_c/', BASE_DIR);

        $this->templatePath = sprintf('%s/%s.tpl', $this->controller, $this->action);
    }

    // 共通前処理（オーバーライド前提）
    protected function preAction()
    {
    }
}
