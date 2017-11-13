<?php
require '../common.php';
use app\common\Dispatcher;
//session開始
@session_start();

//dispatch実行
$objDispatcher = new Dispatcher;
$objDispatcher->dispatch();
