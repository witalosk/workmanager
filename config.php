<?php
//config

//admin mailaddress
define("ADMIN_MAIL", 'admin@test.jp');

//admin hash(please create hash by passhash.php)
define("ADMIN_HASH", '$2y$10$yBkkzV7p8MprPXi2YUHoDOI1d.D0HTqX39L0m0UTq3luFiEVBj1Am');

//サーバーのページルートのディレクトリ
define('BASE_DIR', __DIR__);

//WebrootのURL
$WEB_URL = "http://localhost/";

//Webrootのパス
static $WEB_DIR = "/share/webroot/";

//デフォルトタイムゾーン
date_default_timezone_set('Asia/Tokyo');

//database
define("DSN", "mysql:dbname=%s;host=localhost;charset=utf8");
define("DBNAME", "workmanager");
define("DBUSER", "root");
define("DBPASS", "");
