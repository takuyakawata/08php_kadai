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
                <a href="muscle_home_read.php"><p>トレーニングのめあて</p></a>
                
                <input name="goal" id="goal_text" cols="30" rows="1"></input>
                <button id="goal_text_save_btn">決定</button>
            </form>
        </div>


        <div>
             <form action="muscle_home_create.php"  method="POST">
                <a href="muscle_home_read.php"><p>週に何回ジムに行く？</p></a>
                <input name="weekCount" id="count_week_gym_text" cols="5" rows="1" value=""></input>
                <!-- <select name="" id="count_week_gym_list" value="">
                </select> -->
                <button type="submit">決定</button>
             </form>
            <!-- <button id="count_week_gym_save_btn">決定</button>
            <button id="count_week_gym_change_btn">変更</button> -->
        </div>

        <div>
             <form action="muscle_home_create.php"  method="POST">
            <a href="muscle_home_read.php"><p>特にどこを鍛えたい？</p></a>
            <input name="focus" id="training_main_menu_text" cols="30" rows="1"></input>
            <button type="button" id="training_main_menu_save_btn">決定</button>
            </form>
        </div>
    <!-- inner_area -->
    </div>
</div>

</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>