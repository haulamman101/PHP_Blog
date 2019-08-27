<?php
var_dump($_POST);

$date = "";
$text = "";

    function setPost($val){
        if(isset($_POST[$val])){
            return $_POST[$val];
        }else{
            return "";
        }
    }
$date = setPost("date");
$text = setPost("text");


if($date !== "" && $text !== ""){
    
    // MySQLへ接続
    $link = mysqli_connect("localhost", "root", "");
    if(mysqli_connect_errno() > 0){
        die("接続失敗" . mysqli_connect_error());
    }
    // データベースの選択
    $db = mysqli_select_db($link, "cms_db");
    if (!$db){
        die("データベースの選択失敗" . mysqli_error());
    }
    // 文字化け防止
    mysqli_set_charset($link, "utf8");
    // SELECT文の発行
    $result = mysqli_query($link, "
        INSERT 
        INTO `news` (`id`, `date`, `text`) 
        VALUES (NULL, '$date', '$text');
    ");
    if (!$result) {
        die("クエリーが失敗" . mysqli_error());
    }
    // MySQLの切断
    $close = mysqli_close($link);
    if ($close){
        echo "<p>切断成功</p>";
    }
    
    
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>ニュース</h1>
    <form method="post">
        日付 ： <input type="date" name="date"><br>
        テキスト：<textarea name="text"></textarea><br>
        <button type="submit">送信</button>
    </form>
</body>
</html>