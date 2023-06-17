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

<!-- ==================================
link画面　リンクのアイコンを押したら、ホームページにとぶことができる。
======================================= -->
    <div id="link" class="area">
    <div class="inner_area">
         <div>
            
            <a href="https://www.instagram.com/anytime_yamaguchiyoshiki/" target="_blank"><img class="img_instagram"src="tool/Instagram_Glyph_White.png" alt="anytime"></a>
                
                <p>インスタグラム</p>
        </div>


        <div>
            <a href="https://www.anytimefitness.co.jp/yamaguchi-yoshiki/" target="_blank"><img src="tool/black_dumbbell.png"alt="anytimefitness"></a>
            <p>エニタイムフィットネス<br> 山口吉敷店HP</p>
        </div>
    </div>
    </div>

<!-- id="training" class="area" -->
</div>

</main>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="index.js"></script>

</body>

</html>