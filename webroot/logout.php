<?php
require_once "../common.php";
use \app\controller\UserController;

//セッション
session_start();

//ログアウトする
UserController::logout();