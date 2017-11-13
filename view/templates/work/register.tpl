<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="{$WEB}css/skyblue.min.css" type="text/css">
  <link rel="stylesheet" href="{$WEB}css/master.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="{$WEB}css/jquery.datetimepicker.css"/ >
  <script src="{$WEB}css/jquery.js"></script>
  <script src="{$WEB}css/jquery.datetimepicker.full.min.js"></script>
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
                <input id="start" class="form-control" type="text" name="start" value="{$now}" placeholder="時間を選択してください..." autocomplete="off" required>
              </div>
              <div>
                <label>終了</label>
                <input id="end" class="form-control" type="text" name="end" value="{$now}" placeholder="時間を選択してください..." autocomplete="off" required>
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
<script type="text/javascript">

$('#start').datetimepicker({
  step:15,
  format:'Y-m-d H:i:s'
});
$('#end').datetimepicker({
  step:15,
  format:'Y-m-d H:i:s'
});
</script>

</html>
