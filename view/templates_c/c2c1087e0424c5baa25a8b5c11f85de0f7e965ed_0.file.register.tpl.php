<?php
/* Smarty version 3.1.32-dev-35, created on 2017-11-13 21:30:36
  from 'C:\xampp\htdocs\workmanager\view\templates\work\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5a09906c243336_41528895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2c1087e0424c5baa25a8b5c11f85de0f7e965ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\workmanager\\view\\templates\\work\\register.tpl',
      1 => 1510576228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a09906c243336_41528895 (Smarty_Internal_Template $_smarty_tpl) {
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
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['WEB']->value;?>
css/jquery.datetimepicker.css"/ >
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB']->value;?>
css/jquery.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB']->value;?>
css/jquery.datetimepicker.full.min.js"><?php echo '</script'; ?>
>
  <title>Working Manager</title>
</head>

<body>
  <header class="bg-main">
    <nav class="padding-left-10 padding-top-10">
      <h3><a href="../user/main" style="color:#FFF;">Working Manager</a></h3>
    </nav>
  </header>
  <div class="container">
    <div class="row">
      <div class="col md-3"></div>
      <div class="col md-6 text-center">
        <h2>勤務登録</h2>
        <p>コメント以外必須項目です。</p>
            <form action="" method="post">
              <div>
                <label>開始</label>
                <input id="start" class="form-control" type="text" name="start" value="<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
" placeholder="時間を選択してください..." autocomplete="off" required>
              </div>
              <div>
                <label>終了</label>
                <input id="end" class="form-control" type="text" name="end" value="<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
" placeholder="時間を選択してください..." autocomplete="off" required>
              </div>
              <div>
                <label>時給</label>
                <input class="form-control" type="text" name="payment" value="1000" required>
              </div>
              <div>
                <label>コメント</label>
                <input id="comment" class="form-control" type="text" name="comment">
              </div>
              <input class="btn" type="submit" value="Register" style="cursor: pointer;">
            </form>
      </div>
      <div class="col md-3"></div>
    </div>
  </div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">

$('#start').datetimepicker({
  step:15,
  format:'Y-m-d H:i:s'
});
$('#end').datetimepicker({
  step:15,
  format:'Y-m-d H:i:s'
});
<?php echo '</script'; ?>
>

</html>
<?php }
}
