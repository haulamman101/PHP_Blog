<?php
var_dump($_POST);
var_dump($_FILES);

$title = "";
$text = "";

    function setPost($val){
        if(isset($_POST[$val])){
            return $_POST[$val];
        }else{
            return "";
        }
    }

$title = setPost("title");
$text = setPost("text");

if(
    $title !== "" && 
    $text !== "" && 
    $_FILES['file']['tmp_name'] !== ""
){
    // 画像の処理
    $img = "";
    //一字ファイルができているか（アップロードされているか）チェック
    if(is_uploaded_file($_FILES['file']['tmp_name'])){

        //一字ファイルを保存ファイルにコピーできたか
        $img = "./images/" . $_FILES['file']['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'],$img)){

            //正常
            echo "uploaded";

        }else{

            //コピーに失敗（だいたい、ディレクトリがないか、パーミッションエラー）
            echo "error while saving.";
        }

    }else{

        //そもそもファイルが来ていない。
        echo "file not uploaded.";

    }
    // DB 処理
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
    INTO `main` (`id`, `title`, `img`, `text`) 
    VALUES (NULL, '$title', '$img', '$text');
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
    <title>main</title>
</head>
<body>
    <h1>メイン記事</h1>
    <form method="post" enctype="multipart/form-data">
        <p>タイトル <br><input type="text" name="title"></p>
        <p>画像 <br><input type="file" name="file"></p>
        <p>
            テキスト<br>
            <textarea name="text"></textarea>
        </p>
        <p><button type="submit">送信</button></p>
    </form>
    
    
</body>
</html>