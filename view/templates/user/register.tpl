<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="{$WEB}css/skyblue.min.css" type="text/css">
  <link rel="stylesheet" href="{$WEB}css/master.css" type="text/css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
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
      <div class="col md-3"></div>
      <div class="col md-6 text-center">
        <h2>新しいアカウントの作成</h2>
        <p>すべて必須項目です</p>
        <form action="" method="post">
          <div>
            <label>メールアドレス</label>
            <input class="form-control" type="text" name="email">
          </div>
          <div>
            <label>パスワード</label>
            <input class="form-control" type="password" name="pass">
          </div>
          <div>
            <label>氏名</label>
            <input class="form-control" type="text" name="family_name" placeholder="Family name">
            <input class="form-control" type="text" name="first_name" placeholder="First name">
          </div>
          <div>
            <label>郵便番号</label>
            <input class="form-control" type="text" name="zipcode" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" placeholder="e.g. 100-0001">
          </div>
          <div>
            <label>住所</label>
            <input class="form-control" type="text" name="address" placeholder="e.g. 東京都千代田区千代田1-1 日本ビル103">
          </div>
          <div>
            <label>電話番号</label>
            <input class="form-control" type="text" name="phone" placeholder="e.g. 080 1234 5678">
          </div>
          <input class="btn" type="submit" value="Register" style="cursor: pointer;">
        </form>
      </div>
      <div class="col md-3"></div>
    </div>
  </div>
</body>

</html>
