<?php



require (dirname(__FILE__).'/functions/Calender.php');

require (dirname(__FILE__).'/fuctions/DB.php');

//require 'Calender_testcode.php';



function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
}


function convert_enc($str){
    $from_enc = 'utf-8';
    $to_enc = 'utf-8';

    return mb_convert_encoding($str, $to_enc, $from_enc);
}


$cal = new \Myapp\Calender();

/* DB 操作 */
try {
    $pdo = new PDO(
        DSN,
        DB_USERNAME,
        DB_PASSWORD
    );
    

    /*[debug] todosDBの中身を見る */
    $sql_all="select*from todos3";

}catch (PDOException $e) {
    $error = $e->getMessage();
}

//htmlでlogを表示する為
$pdos=$pdo->query($sql_all);

$pdo=null;



?>
    <!doctype html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>Welcome Endo calnedar</title>
        <link rel="stylesheet" href="\css\styles_calendar.css">
    </head>

    <body>
       <center>
        <h1>遠藤カレンダー</h1>
        </center>
       
        <table border="1">
            <!--前月翌月へのリンク -->
            <thead>
                <tr>
                    <th><a href="/calendar/?t=<?php echo h($cal->prev); ?>">&laquo;</a></th>
                    <th colspan="5"><?php echo h($cal->yearMonth); ?></th>
                    <th><a href="/calendar/?t=<?php echo h($cal->next); ?>">&raquo;</a></th>
                </tr>
            </thead>
            <tbody>
                <!-- 曜日  -->
                <tr>
                    <td>Sun</td>
                    <td>Mon</td>
                    <td>Tue</td>
                    <td>Wed</td>
                    <td>Thu</td>
                    <td>Fri</td>
                    <td>Sat</td>
                </tr>
                <!-- カレンダ  -->
                <?php echo $cal->show(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="today" colspan="7"><a href="/calendar/">Today</a></th>
                </tr>
                <tr>
                    <th colspan="7">見たいカレンダーの年月を選択してください。</th>
                </tr>
                <tr>
                  <th colspan="7">
                   <form action="" method="get">
                    <input type="month" name='t' >
                    <input type="submit" value="表示">
                   </form>
                    </th>
                </tr>
            </tfoot>
        </table>
        
        <h2>
            <a href="/calendar/note">更新履歴を見る</a>
        </h2>
        
        <h2>
            <a href="/calendar/note_log">操作履歴を見る(工事中)</a>
        </h2>
        
        

    </body>
    </html>