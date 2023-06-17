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
<!-- ==========================
タイマー
=============================== -->
    <div id="tool" class="area">
        <div class="tool_in">
            <div id="stop_watch">
                <p>★ストップウォッチ</p>
                <p id="timer">00:00:00</p>
                <!-- 時間の表示 -->
                <button id="timer_start_btn">スタート</button>

                <button id="timer_stop_btn">ストップ</button>

                <button id="timer_reset_btn">リセット</button>
            </div>

            <div id="countdown_timer">
                <p>★カウントダウンタイマー</p>

                <select name="" id="countdown_time_list" value=""></select>

                <p id="countdown">00:00</p>
                <!-- 時間の表示 -->
                <button id="countdown_start_btn">スタート</button>

                <button id="countdown_stop_btn">ストップ</button>

                <button id="countdown_reset_btn">リセット</button>
            </div>
        <!-- tool_in -->
        </div>
    <!-- id="tool" class="area" -->
    </div>


<!-- id="training" class="area" -->
</div>

</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>