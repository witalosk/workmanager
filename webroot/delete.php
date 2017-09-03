<?php
require "../common.php";
use app\common\Db;

$work_id = filter_input(INPUT_POST, 'id');

$sql = "DELETE FROM `work` WHERE `id` = :id";
$arr[':id'] = $work_id;
Db::transaction();
Db::delete($sql, $arr);
Db::commit();
header("Location: main.php");