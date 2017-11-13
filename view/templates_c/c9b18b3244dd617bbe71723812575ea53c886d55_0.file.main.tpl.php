<?php
/* Smarty version 3.1.32-dev-35, created on 2017-11-14 00:05:41
  from 'C:\xampp\htdocs\workmanager\view\templates\user\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5a09b4c5885ee5_31813692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9b18b3244dd617bbe71723812575ea53c886d55' => 
    array (
      0 => 'C:\\xampp\\htdocs\\workmanager\\view\\templates\\user\\main.tpl',
      1 => 1510585359,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a09b4c5885ee5_31813692 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB']->value;?>
css/skyblue.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB']->value;?>
css/master.css" type="text/css">
  <title>Working Manager</title>
</head>
<body>
  <header class="bg-main">
    <nav class="padding-left-10 padding-top-10">
      <h3>Working Manager</h3>
    </nav>
  </header>
  <div class="container">
    <div class="row">
      <div class="col md-1"></div>
      <div class="col md-10 text-center">
        <h2>ようこそ！<?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
さん</h2>
        <a class="btn" href="../work/register">勤務登録</a>
        <!-- <a class="btn btn-warning" href="">登録情報変更</a> -->
        <a class="btn btn-error" href="logout">ログアウト</a>
        <div class="whitecard">
          <h3><?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
さんの登録情報</h3>
          <table>
            <tr>
              <th>氏名</th>
              <td><?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
</td>
            </tr>
            <tr>
              <th>住所</th>
              <td>〒<?php echo $_smarty_tpl->tpl_vars['user']->value['zipcode'];?>
<br><?php echo $_smarty_tpl->tpl_vars['user']->value['address'];?>
</td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
</td>
            </tr>
          </table>
        </div>
        <br>
        <div class="whitecard">
          <div style="overflow: scroll;">
            <h3><?php echo $_smarty_tpl->tpl_vars['m1']->value;?>
の勤務履歴</h3>
            <table style="white-space: nowrap;">
              <tbody>
                <tr>
                  <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['works1']->value, 'work');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['work']->value) {
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['number'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['start'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['end'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['time'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['payment'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['price'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['comment'];?>
</td>
                  <td>
                    <form method="post" action="../work/delete">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['work']->value['number'];?>
">
                    <input type="submit" value="×">
                    </form>
                  </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              </tbody>
            </table>
            <p>合計:<?php echo $_smarty_tpl->tpl_vars['sum1']->value;?>
</p>
          </div>
          <div style="overflow: scroll;">
            <h3><?php echo $_smarty_tpl->tpl_vars['m2']->value;?>
の勤務履歴</h3>
            <table style="white-space: nowrap;">
              <tbody>
                <tr>
                  <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['works2']->value, 'work');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['work']->value) {
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['number'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['start'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['end'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['time'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['payment'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['price'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['comment'];?>
</td>
                  <td>
                    <form method="post" action="../work/delete">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['work']->value['number'];?>
">
                    <input type="submit" value="×">
                    </form>
                  </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              </tbody>
            </table>
            <p>合計:<?php echo $_smarty_tpl->tpl_vars['sum2']->value;?>
</p>
          </div>
          <div style="overflow: scroll;">
            <h3><?php echo $_smarty_tpl->tpl_vars['m3']->value;?>
の勤務履歴</h3>
            <table style="white-space: nowrap;">
              <tbody>
                <tr>
                  <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['works3']->value, 'work');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['work']->value) {
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['number'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['start'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['end'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['time'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['payment'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['price'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['work']->value['comment'];?>
</td>
                  <td>
                    <form method="post" action="../work/delete">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['work']->value['number'];?>
">
                    <input type="submit" value="×">
                    </form>
                  </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              </tbody>
            </table>
            <p>合計:<?php echo $_smarty_tpl->tpl_vars['sum3']->value;?>
</p>
          </div>

        </div>
      </div>
      <div class="col md-1"></div>
    </div>
  </div>
</body>
</html>
<?php }
}
