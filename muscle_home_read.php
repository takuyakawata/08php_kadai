<?php
// まずは`var_dump($_POST);`で値を確認すること！！
// var_dump($_POST);
// exit();

// ========================
// トレーニングのめあてのデータの反映
// ========================
//  データまとめ用の空文字変数
$strGoal = '';

// ファイルを開く（読み取り専用）
$file = fopen('data/goal.txt', 'r');

// ファイルをロック
flock($file, LOCK_EX);

function getLatestGoal() {
    $lines = file('data/goal.txt'); // "goal.txt"の内容を配列として読み込む
    $latestGoal = end($lines); // 配列の最後の要素を取得
    return $latestGoal;
}

$strGoal = "<tr><td>" . getLatestGoal() . "</td></tr>";

// ロックを解除する
flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);


// ---------------------------------------
// 週に何回ジムに行く？ データの反映
$strWeekCount ='';


// ファイルを開く（読み取り専用）
$file2 = fopen('data/weekCount.txt', 'r');

// ファイルをロック
flock($file2, LOCK_EX);

function getLatestWeekCount() {
    $lines2 = file('data/WeekCount.txt'); // "goal.txt"の内容を配列として読み込む
    $latestWeekCount = end($lines2); // 配列の最後の要素を取得
    return $latestWeekCount;
}

$strWeekCount = "<tr><td>" . getLatestWeekCount() . "</td></tr>";

// ロックを解除する
flock($file2, LOCK_UN);

// ファイルを閉じる
fclose($file2);

// ------------------------------
// 特にどこを鍛えたい？ データの反映
$strFocus ='';

// ファイルを開く（読み取り専用）
$file3 = fopen('data/focus.txt', 'r');

// ファイルをロック
flock($file3, LOCK_EX);

function getLatestFocus() {
    $lines3 = file('data/focus.txt'); // "goal.txt"の内容を配列として読み込む
    $latestFocus = end($lines3); // 配列の最後の要素を取得
    return $latestFocus;
}

$strFocus = "<tr><td>" . getLatestFocus() . "</td></tr>";

// ロックを解除する
flock($file3, LOCK_UN);

// ファイルを閉じる
fclose($file3);

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
   <h3>~筋トレに捧げよ〜</h3>
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
目標入力画面
==================================================== -->
<div id="home" class="area">
    <div class="tool_in">
        <div>
            <form action="muscle_home_create.php"  method="POST">
                <p>トレーニングのめあて</p>
                <h3> <?=$strGoal?></h3>
        </div>

        <div>
            <p>週に何回ジムに行く？</p>
            <h3><?=$strWeekCount?></h3>
        </div>

        <div>
            <p>特にどこを鍛えたい？</p>
            <h3><?=$strFocus?></h3>
        </div>

        <a href=""muscle_home_input.php" "><p>内容変更</p></a>
    <!-- inner_area -->
    </div>
</div>

</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>