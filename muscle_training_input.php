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
        <li><a href="#training">training</a></li>
        <li><a href="#diary">diary</a></li>
        <li><a href="#tool">tool</a></li>
        <li><a href="#link">link</a></li>
    </ul>

<!-- ===========================================
トレーニングの記録　
================================================ -->
<div id="training" class="area">
    <div class="inner_area">
        <p>======トレーニングの記録========</p>
        <div>
            <input id="date" type="date" list="date">
            のトレーニング
            <button id="date_input_btn">始めるよ</button>
        </div>
    <!-- ------------------------------------------
    トレーニンングの記録画面＿＿何を何回行ったか
    -------------------------------------------------->
        <section class="record" id="record1">
    
            <p>===トレーニングメニューを記録していこう===</p>
            <div class="training">
                <div class="training_menu" id="training_menu1">
                home
                <!-- トレーニングの種目の記録 -->
                <input type="text" id="input_menu_name" list="training_menu_name" placeholder="種目">
                <datalist class="training_menu_name" id="training_menu_name"></datalist>
    
                <!-- トレーニングのセット数の記録 -->
                <!-- <input type="text" id="input_menu_set_count" list="training_menu_set_count" placeholder="1セット"> -->
                <select class="training_menu_set_count" id="training_menu_set_count"></select>
    
                <!-- トレーニングの負荷の重さ -->
                <input type="text" id="input_menu_kg_count" list="training_menu_kg_count" placeholder="50kg">
                <datalist class="training_menu_kg_count" id="training_menu_kg_count" value=""></datalist>
    
                <!-- トレーニングの１セットあたりの回数 -->
                <input type="text" id="input_menu_rep_count" list="training_menu_rep_count" placeholder="10rep">
                <datalist class="training_menu_rep_count" id="training_menu_rep_count" value=""></datalist>
            <!-- class="training"> -->
            </div>

            <div>
                <button id="log_btn">記録する</button>
                <button id="finish_btn">トレーニング終了</button>
            </div>

        <!-- class="record" id="record1" -->
        </section>
    
            <div id="input_text">
                <p id="input_date"></p>
            </div>
    <!-- <div class="tool_in">-->
    </div>
<!-- id="training" class="area" -->
</div>

</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>