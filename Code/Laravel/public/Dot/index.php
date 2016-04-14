<?php

//ファイルを開く
$dateFile = 'bbs.dat';
//ファイルの転送方式check && message Chaeck $$ user check

//CSRF対策
session_start(); //sessionスタート

//Tokenを造る。
function setToken(){
    //passwordhashを生成第一引数に乱数を,第二引数にTRUE が指定された場合、sha1 ダイジェストは 20 バイト長のバイナリ形式で返されます。
    $token = sha1(uniqid(mt_rand(),true));
    $_SESSION['token'] = $token;
}

//Tokenを確認する。
function checkToken(){
    if(empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])){
        echo "不正なPOSTが行われました!";
        exit;
    }
    
}

//エスケープ処理
function h($s){
    return htmlspecialchars($s,ENT_QUOTES,'UTF-8');
    
}

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['message']) && isset($_POST['user'])){
        
    //tokenをcheckする。
    checkToken();
    
    //データ受け取り
    //空白文字を消します
    $message = trim($_POST['message']);
    $user = trim($_POST['user']);
    
    
    if($message !== ''){
        
        //もし$userが空だったら名無しの遠藤を入れます。そうでなければ$userを入れます。
        $user = ($user === '') ?'名無しの遠藤' :$user;
        
        //tabaを入力されたら半角空白にする。
        
        $message =str_replace("\t", ' ',$message);
        $user =str_replace("\t", ' ',$user);
        $postesAt=date('Y-m-d H:i:s');
        
        //datに書き込む内容。
        $newDate = $message ."\t".$user."\t".$postesAt."\n";

        //aモードでファイルを開く
        $fp =fopen($dateFile,'a');
        fwrite($fp,$newDate);
        fclose($fp);
    }
} else{
    setToken();
}

$posts=file($dateFile,FILE_IGNORE_NEW_LINES);

//逆ソートで値を表示する。
$posts = array_reverse($posts);

?>



    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
        <title>簡易掲示板</title>
    </head>

    <body>
        <div class="container">
            <h1>簡易掲示板</h1>
            <form action="" method="post">
                message:
                <input type="text" name="message"> user :
                <input type="text" name="user">
                <input type="submit" value="投稿">
                <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>" >
                <h4>userに何も入力が無ければ「名無しの遠藤」で投稿されます。</h4>
                
            </form>
            <h2>投稿一覧 (<?php echo count($posts); ?>件)</h2>
            <ul>
                <?php if (count($posts)) : ?>
                    <?php foreach ($posts as $post) :?>
                       <!-- 受け取った値を文字を区切る-->
                       <?php list($message,$user,$postesAt)=explode("\t",$post); ?>
                       
                       <li><?php echo h($message); ?> <?php echo h($user); ?>-<?php echo h($postesAt); ?></li>
                        
                    <?php endforeach; ?>

                <?php else : ?>
                    <li>投稿はまだありません</li>
                <?php endif; ?>
            </ul>
        </div>


    </body>

    </html>