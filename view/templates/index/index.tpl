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
    <div class="container">
        <div class="row">
            <div class="col md-3"></div>
            <div class="col md-6 text-center whitecard">
                <h2>Login</h2>
                <p>勤怠管理システムにログインします。</p>
                <form action="user/login" method="post">
                    <div>
                        <label>E-mail</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div>
                        <label>Password</label>
                        <input class="form-control" type="password" name="pass">
                    </div>
                    <a class="btn btn-success" href="user/register">New account</a>
                    <input class="btn" type="submit" value="Login" style="cursor: pointer;">
                </form>
            </div>
            <div class="col md-3"></div>
        </div>
        <div class="row">
          <div class="col md-3"></div>
          <div class="col md-6 text-center whitecard">
            <ul>
              <li>2017/11/13 試験的にViewを導入しました。また日付が入れやすくなりました。</li>
            </ul>
          </div>
          <div class="col md-3"></div>
        </div>
    </div>
</body>
</html>
