<?php
// まずは`var_dump($_POST);`で値を確認すること！！
// var_dump($_POST);
// exit();

// ========================
// トレーニングのめあてのデータの受け取り
// ========================

if (!empty($goal)) {
    // データ1件を1行にまとめる（最後に改行を入れる）
    $write_data3 = "{$goal}\n";

    // ファイルを開く．引数が`a`である部分に注目！
    $file3 = fopen('data/goal.txt', 'a');

    // ファイルをロックする
    flock($file3, LOCK_EX);

    // 指定したファイルに指定したデータを書き込む
    fwrite($file3, $write_data3);

    // ファイルのロックを解除する
    flock($file3, LOCK_UN);

    // ファイルを閉じる
    fclose($file3);
}


// // データの受け取り
// $goal= $_POST["goal"];

// // データ1件を1行にまとめる（最後に改行を入れる）
// $write_data3 = "{$goal}\n";

// // ファイルを開く．引数が`a`である部分に注目！
// $file3 = fopen('data/goal.txt', 'a');

// // ファイルをロックする
// flock($file3, LOCK_EX);

// // 指定したファイルに指定したデータを書き込む
// fwrite($file3, $write_data3);

// // ファイルのロックを解除する
// flock($file3, LOCK_UN);

// // ファイルを閉じる
// fclose($file3);

// ========================
// トレーニングの回数のデータの受け取り
// ========================

// var_dump($_POST);
// exit();
// データの受け取り
if($weekCount === ""){
    continue

}else{
    $weekCount= $_POST["weekCount"];
}


// データ1件を1行にまとめる（最後に改行を入れる）
$write_data4 = "{$weekCount}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file4 = fopen('data/weekCount.txt', 'a');

// ファイルをロックする
flock($file4, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file4, $write_data4);

// ファイルのロックを解除する
flock($file4, LOCK_UN);

// ファイルを閉じる
fclose($file4);

// ========================
// トレーニングのしたいところのデータの受け取り
//特にどこを鍛えたい？
// ========================

// var_dump($_POST);
// exit();
// データの受け取り
$focus= $_POST["focus"];

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data5 = "{$focus}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file5 = fopen('data/focus.txt', 'a');

// ファイルをロックする
flock($file5, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file5, $write_data5);

// ファイルのロックを解除する
flock($file5, LOCK_UN);

// ファイルを閉じる
fclose($file5);
// データ入力画面に移動する
header("Location:muscle_home_input.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
<!-- Authentication -->
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.css">

    <title>ALL for MUSCLE</title>
</head>
<body>
<main>
<!-- =============================
タイトル画面
===============================-->
<div class="top"  id="">
   <h1>ALL for MUSCLE</h1>
   <h3>〜筋トレに捧げよ〜</h3>
</div>

<div class="wrapper">
    <ul class="tab">
        <li><a href="muscle_home_input.php">home</a></li>
        <li><a href="muscle_training_input.php">training</a></li>
        <li><a href="muscle_diary_input.php">diary</a></li>
        <li><a href="muscle_tool.php">tool</a></li>
        <li><a href="muscle_link.php">link</a></li>
    </ul>

<!-- ==============================================
カウンセリング画面
==================================================== -->
<div id="home" class="area">
    <div class="tool_in">
        <div>
            <p>トレーニングのめあて</p>
            </div>

        <div>
            <p>週に何回ジムでトレーニングに行く？</p>
            <textarea name="" id="count_week_gym_text" cols="5" rows="1" value=""></textarea>
            <select name="" id="count_week_gym_list" value="">
            </select>

            <button id="count_week_gym_save_btn">決定</button>
            <button id="count_week_gym_change_btn">変更</button>
        </div>

        <div>
            <p>特にどこを鍛えたい？</p>
            <textarea name="" id="training_main_menu_text" cols="30" rows="1"></textarea>
            <button id="training_main_menu_save_btn">決定</button>
        </div>
    <!-- inner_area -->
    </div>
</div>

</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>