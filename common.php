<?php
require 'config.php';
require 'genparts.php';

//smartyオートローダ
require_once realpath(__DIR__)."/classes/smarty/Autoloader.php";
Smarty_Autoloader::register();

//オートローダの設定
require_once BASE_DIR.'/autoload.php';
spl_autoload_register('autoloader');
