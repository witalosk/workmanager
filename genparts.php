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
    <th>No.</th><th>開始時間</th><th>終了時間</th><th>時間</th><th>コメント</th>
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
        $diff = $end - $start;
        $hours = floor( $diff / 3600 );
        $minutes = floor( ( $diff / 60 ) % 60 );
    ?>
    <tr>
        <td><?=$shift['id']?></td>
        <td><?=$shift['start']?></td>
        <td><?=$shift['end']?></td>
        <td><?=$hours?>時間<?=$minutes?>分</td>
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
        $sum += $diff;
        $shours = floor( $sum / 3600 );
        $sminutes = floor( ( $sum / 60 ) % 60 );
        switch($sminutes)
        {
            case 5:
            $sminutes = 0;
            break;
            case 10:
            $sminutes = 15;
            break;
            case 20:
            $sminutes = 15;
            break;
            case 25:
            $sminutes = 30;
            break;
            case 35:
            $sminutes = 30;
            break;
            case 40:
            $sminutes = 45;
            break;
            case 50:
            $sminutes = 45;
            break;
            case 55:
            $sminutes = 0;
            $shours += 1;
            break;
        }
    }
    ?>
    </tbody>
    </table>
    <p>合計勤務時間(15分毎): <?=$shours?>時間<?=$sminutes?>分</p>
    <p>合計給与: <?= $shours * 1000 + $sminutes * (50/3) ?>円</p>
    <?php
}