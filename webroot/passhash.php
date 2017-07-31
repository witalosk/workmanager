<?php
$hash = "";
$pass = filter_input(INPUT_POST, "pass");
if(null != $pass)
{
    $hash = password_hash($pass, PASSWORD_DEFAULT);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/skyblue.min.css" type="text/css">
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
                <h2>password to hash</h2>
                <p>for admin</p>
                <form action="" method="post">
                    <div>
                        <label>Password</label>
                        <input class="form-control" type="password" name="pass">
                    </div>
                    <input class="btn" type="submit" value="password_hash" style="cursor: pointer;">
                </form>
                <pre><?=$hash?></pre>
            </div>
            <div class="col md-3"></div>
        </div>
    </div>
</body>
</html>