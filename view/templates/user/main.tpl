<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="{$WEB}css/skyblue.min.css" type="text/css">
  <link rel="stylesheet" href="{$WEB}css/master.css" type="text/css">
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
        <h2>ようこそ！{$user.last_name} {$user.first_name}さん</h2>
        <a class="btn" href="../work/register">勤務登録</a>
        <!-- <a class="btn btn-warning" href="">登録情報変更</a> -->
        <a class="btn btn-error" href="logout">ログアウト</a>
        <div class="whitecard">
          <h3>{$user.last_name} {$user.first_name}さんの登録情報</h3>
          <table>
            <tr>
              <th>氏名</th>
              <td>{$user.last_name} {$user.first_name}</td>
            </tr>
            <tr>
              <th>住所</th>
              <td>〒{$user.zipcode}<br>{$user.address}</td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td>{$user.phone}</td>
            </tr>
          </table>
        </div>
        <br>
        <div class="whitecard">
          <div style="overflow: scroll;">
            <h3>{$m1}の勤務履歴</h3>
            <table>
              <tbody>
                <tr>
                  <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
                </tr>
                {foreach $works1 as $work}
                <tr>
                  <td>{$work.number}</td>
                  <td>{$work.start}</td>
                  <td>{$work.end}</td>
                  <td>{$work.time}</td>
                  <td>{$work.payment}</td>
                  <td>{$work.price}</td>
                  <td>{$work.comment}</td>
                  <td>
                    <form method="post" action="../work/delete">
                    <input type="hidden" name="id" value="{$work.number}">
                    <input type="submit" value="×">
                    </form>
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
            <p>合計:{$sum1}</p>
          </div>
          <div style="overflow: scroll;">
            <h3>{$m2}の勤務履歴</h3>
            <table>
              <tbody>
                <tr>
                  <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
                </tr>
                {foreach $works2 as $work}
                <tr>
                  <td>{$work.number}</td>
                  <td>{$work.start}</td>
                  <td>{$work.end}</td>
                  <td>{$work.time}</td>
                  <td>{$work.payment}</td>
                  <td>{$work.price}</td>
                  <td>{$work.comment}</td>
                  <td>
                    <form method="post" action="../work/delete">
                    <input type="hidden" name="id" value="{$work.number}">
                    <input type="submit" value="×">
                    </form>
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
            <p>合計:{$sum2}</p>
          </div>
          <div style="overflow: scroll;">
            <h3>{$m3}の勤務履歴</h3>
            <table>
              <tbody>
                <tr>
                  <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>時給</th><th>単価</th><th>コメント</th><th>×</th>
                </tr>
                {foreach $works3 as $work}
                <tr>
                  <td>{$work.number}</td>
                  <td>{$work.start}</td>
                  <td>{$work.end}</td>
                  <td>{$work.time}</td>
                  <td>{$work.payment}</td>
                  <td>{$work.price}</td>
                  <td>{$work.comment}</td>
                  <td>
                    <form method="post" action="../work/delete">
                    <input type="hidden" name="id" value="{$work.number}">
                    <input type="submit" value="×">
                    </form>
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
            <p>合計:{$sum3}</p>
          </div>

        </div>
      </div>
      <div class="col md-1"></div>
    </div>
  </div>
</body>
</html>
