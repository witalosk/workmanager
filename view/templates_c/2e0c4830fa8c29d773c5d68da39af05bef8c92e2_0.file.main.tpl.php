<?php
/* Smarty version 3.1.32-dev-35, created on 2017-11-13 22:21:20
  from 'C:\xampp\htdocs\workmanager\view\templates\owner\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5a099c50224da5_46801852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e0c4830fa8c29d773c5d68da39af05bef8c92e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\workmanager\\view\\templates\\owner\\main.tpl',
      1 => 1510578685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a099c50224da5_46801852 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/skyblue.min.css" type="text/css">
  <link rel="stylesheet" href="css/master.css" type="text/css">
  <title>Working Manager</title>
</head>
<body>
  <header class="bg-main">
    <nav class="padding-left-10 padding-top-10">
      <h3>Working Manager</h3>
    </nav>
  </header>
  <div class="row">
    <div class="col md-12 text-center">
      <h2>管理者用画面</h2>
      <a class="btn btn-error" href="../user/logout">ログアウト</a>
    </div>
  </div>
  <div class="row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
    <div class="col md-4 text-center">
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
          <table>
            <tbody>
              <tr>
                <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
              </tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value['works1'], 'work');
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
      </div>
      <div class="whitecard">
        <div style="overflow: scroll;">
          <h3><?php echo $_smarty_tpl->tpl_vars['m2']->value;?>
の勤務履歴</h3>
          <table>
            <tbody>
              <tr>
                <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
              </tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value['works2'], 'work');
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
      </div>
      <div class="whitecard">
        <div style="overflow: scroll;">
          <h3><?php echo $_smarty_tpl->tpl_vars['m3']->value;?>
の勤務履歴</h3>
          <table>
            <tbody>
              <tr>
                <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
              </tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value['works3'], 'work');
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
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

  </div>
</body>
</html>
<?php }
}
