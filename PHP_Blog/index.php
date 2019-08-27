<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="wrapper">
        <header>
            <img src="images/logo.png" alt="logo">
            <nav>
                <ul>
                    <li><a href="#"><img src="images/navi_01.png" alt="nav"></a></li>
                    <li><a href="#"><img src="images/navi_02.png" alt="nav"></a></li>
                    <li><a href="#"><img src="images/navi_03.png" alt="nav"></a></li>
                    <li><a href="#"><img src="images/navi_04.png" alt="nav"></a></li>
                    <li><a href="#"><img src="images/navi_05.png" alt="nav"></a></li>
                </ul>
            </nav>
            <div class="keyimg">
                <img src="images/key_image.png" alt="keyimg">
            </div>
        </header>

        <main>
            <div class="side">
                <h2>
                    <img src="images/main_sub_title.png" alt="subtitle">
                </h2>
                <ul>
                    <li><a href="#"><img src="images/s_navi_01.png" alt="sidenav"></a></li>
                    <li>
                    </li>
                    <li><a href="#"><img src="images/s_navi_02.png" alt="sidenav"></a></li>
                    <li><a href="#"><img src="images/s_navi_03.png" alt="sidenav"></a></li>
                    <li><a href="#"><img src="images/s_navi_04.png" alt="sidenav"></a></li>
                    <li><a href="#"><img src="images/s_navi_05.png" alt="sidenav"></a></li>
                </ul>
            </div>

            <div class="main">

                <div class="area-1">
                    <h2>
                        <img src="images/main_title.png" alt="maintitle">
                    </h2>
                    <div class="content">
                        <img src="images/sub_key_image.png" alt="subkeyimg">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dicta, beatae. Aperiam mollitia nisi laborum ipsam dolore, placeat possimus, quod dolores repellat dolorum provident illo vitae deleniti aspernatur doloribus temporibus.</p>
                    </div>
                </div>

                <div class="area-2">
                    <h2>
                        <img src="images/main_title.png" alt="maintitle">
                    </h2>

                    <div class="content">
<?php
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
$result = mysqli_query($link, "SELECT * FROM `main`");
if (!$result) {
    die("クエリーが失敗" . mysqli_error());
}
// データの取得及び取得データの表示
while ($row = mysqli_fetch_assoc($result)) {
    
    echo '<div class="items">';
    echo '<h3>' . $row["title"] . '</h3>';
    echo '<img src="' . $row["img"]. '" alt="samimg">';
    echo '<p>' . $row["text"] . '</p>';
    echo '</div>';
    
}
    // MySQLの切断
    $close = mysqli_close($link);
    if ($close){
        //echo "<p>切断成功</p>";
    }
?>
                        <!-- div class="items">
                            <h3>title</h3>
                            <img src="images/sample_img.png" alt="samimg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus laborum beatae ducimus animi est tenetur nemo nihil ratione, repellendus perferendis velit, sit libero voluptatibus quam enim vel exercitationem at laboriosam.</p>
                        </div -->

                        

                    </div>
                </div>

                <div class="area-3">
                    <h2>
                        <img src="images/main_title.png" alt="maintitle">
                    </h2>
                    <div class="content">
                        <div class="items">
                            <img src="images/item_img.png" alt="itemimg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="items">
                            <img src="images/item_img.png" alt="itemimg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="items">
                            <img src="images/item_img.png" alt="itemimg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="items">
                            <img src="images/item_img.png" alt="itemimg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

                <div class="area-4">
                    <h2>
                        <img src="images/main_title.png" alt="maintitle">
                    </h2>
                    <div class="content">
                        <dl>
<?php
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
$result = mysqli_query($link, "SELECT * FROM `news` ORDER BY `news`.`date` DESC");
if (!$result) {
    die("クエリーが失敗" . mysqli_error());
}
// データの取得及び取得データの表示
while ($row = mysqli_fetch_assoc($result)) {
    echo "<dt>".date("Y年m月d日", strtotime($row["date"]))."</dt>";
    echo "<dd>".$row["text"]."</dd>";
}
    // MySQLの切断
    $close = mysqli_close($link);
    if ($close){
        //echo "<p>切断成功</p>";
    }
?>                     
                           
                            
                            
                        </dl>
                    </div>
                </div>
            </div>

            <div class="sub">
                <h2>
                    <img src="images/side_title.png" alt="subtitle">
                </h2>
                <div class="content">
                    <ul>
                        <li><a href="#"><img src="images/banner_01.png" alt="banner"></a></li>
                        <li><a href="#"><img src="images/banner_02.png" alt="banner"></a></li>
                        <li><a href="#"><img src="images/banner_03.png" alt="banner"></a></li>
                    </ul>
                </div>
            </div>
        </main>

        <footer>
           <div class="footer">
            <ul>
                <li><a href="#">MENU01</a></li>
                <li>|</li>
                <li><a href="#">MENU02</a></li>
                <li>|</li>
                <li><a href="#">MENU03</a></li>
                <li>|</li>
                <li><a href="#">MENU04</a></li>
                <li>|</li>
                <li><a href="#">MENU05</a></li>
            </ul>
            <br>
            <p>
                copyright @ copyright
            </p>
            </div>
        </footer>
    </div>

</body>

</html>
