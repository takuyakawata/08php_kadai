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

<!-- =================================== -->
<!-- トレーニンングの日誌 -->
<!-- =================================== -->
    <div id="diary" class="area">
        <!-- モーダル機能で記録する場所 -->
        <div class="wrapper1">
            <!-- tabタブの設定  -->
            <ul class="tab1">
                <li><a href="#Monday">記録①</a></li>
                <li><a href="#Tuesday">記録②</a></li>
                <li><a href="#Wednesday">記録③</a></li>
                <li><a href="#Thursday">記録④</a></li>
                <li><a href="#Friday">記録⑤</a></li>
                <!-- <li><a href="#Saturday">記録⑥</a></li>
                <li><a href="#Sunday">記録⑦</a></li> -->
            </ul>

            <div id="Monday" class="area1">
                <textarea name="" id="training_diary_Monday" cols="50" rows="10">
                </textarea>
                <button id="training_diary_Monday_save_btn">保存</button>
                <button id="training_diary_Monday_clear_btn">消す</button>
                <!--/area-->
            </div>

            <div id="Tuesday" class="area1">
                <textarea name="" id="training_diary_Tuesday" cols="50" rows="10">
                    </textarea>
                <button id="training_diary_Tuesday_save_btn">保存</button>
                <button id="training_diary_Tuesday_clear_btn">消す</button>

                <!--/area-->
            </div>

            <div id="Wednesday" class="area1">
                <textarea name="" id="training_diary_Wednesday" cols="50" rows="10">
                    </textarea>
                <button id="training_diary_Wednesday_save_btn">保存</button>
                <button id="training_diary_Wednesday_clear_btn">消す</button>
                <!--/area-->
            </div>

            <div id="Thursday" class="area1">
                <textarea name="" id="training_diary_Thursday" cols="50" rows="10">
                    </textarea>
                <button id="training_diary_Thursday_save_btn">保存</button>
                <button id="training_diary_Thursday_clear_btn">消す</button>
                <!--/area-->
            </div>

            <div id="Friday" class="area1">
                <textarea name="" id="training_diary_Friday" cols="50" rows="10">
                    </textarea>
                <button id="training_diary_Friday_save_btn">保存</button>
                <button id="training_diary_Friday_clear_btn">消す</button>
                <!--/area-->
            </div>

            <div id="Saturday" class="area1">
                <textarea name="" id="training_diary_Saturday" cols="50" rows="10">
                    </textarea>
                <button id="training_diary_Saturday_save_btn">保存</button>
                <button id="training_diary_Saturday_clear_btn">消す</button>
                <!--/area-->
            </div>

            <div id="Sunday" class="area1">
                <textarea name="" id="training_diary_Sunday" cols="50" rows="10">
                    </textarea>
                <button id="training_diary_Sunday_save_btn">保存</button>
                <button id="training_diary_Sunday_clear_btn">消す</button>
                <!--/area-->
            </div>
          <!--wrapper-->
        </div>
    
    </div>


</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>