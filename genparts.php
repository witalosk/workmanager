<?php
/*
 * シフト表示関数
 * @param array $arr
 */
function genShiftTable($arr, $deletebtn = true)
{
    $sum = 0;
    if(null == $arr)
    {
        print("<p>履歴がありません。</p>");
        return;
    }
    ?>
    <table>
    <tbody>
    <tr>
    <th>No.</th><th>開始時間</th><th>終了時間</th><th>時給</th><th>時間</th><th>単価</th><th>コメント</th>
    <?php
    if($deletebtn){
        ?>
            <th>×</th>
        <?php
    }
    ?>
    </tr>
    <?php
    foreach($arr as $shift)
    {
        $start = strtotime($shift['start']);
        $end = strtotime($shift['end']);
        $payment = $shift['payment'];
        $diff = $end - $start;
        $hours = floor( $diff / 3600 );
        $minutes = floor( ( $diff / 60 ) % 60 );

        $key = $minutes % 5;
        $minutes -= $key;
        switch($key)
        {
          case 0:
          case 1:
          case 2:
          break;
          case 3:
          case 4:
          case 5:
          $minutes +=5;
        }

        //単価計算
        switch($minutes)
        {
            case 5:
            $minutes = 0;
            break;
            case 10:
            $minutes = 15;
            break;
            case 20:
            $minutes = 15;
            break;
            case 25:
            $minutes = 30;
            break;
            case 35:
            $minutes = 30;
            break;
            case 40:
            $minutes = 45;
            break;
            case 50:
            $minutes = 45;
            break;
            case 55:
            $minutes = 0;
            $hours += 1;
            break;
        }
        $tanka = $hours * $payment + $minutes * ($payment/60);
    ?>
    <tr>
        <td><?=$shift['id']?></td>
        <td><?=$shift['start']?></td>
        <td><?=$shift['end']?></td>
        <td><?=$shift['payment']?>円</td>
        <td><?=$hours?>時間<?=$minutes?>分</td>
        <td><?=$tanka?>円</td>
        <td><?=$shift['comment']?></td>
        <?php
        if($deletebtn){
        ?>
            <td><form method="post" action="delete.php">
            <input type="hidden" name="id" value="<?=$shift['id']?>">
            <input type="submit" value="×">
            </form>
        <?php
        }
        ?>
    </tr>
    <?php
        $sum += $tanka;
    }
    ?>
    </tbody>
    </table>
    <!--<p>合計勤務時間(15分毎): <?=$shours?>時間<?=$sminutes?>分</p>-->
    <p>合計給与: <?= $sum ?>円</p>
    <?php
}
