<?php
// books_create.php
// まずは`var_dump($_POST);`で値を確認すること！！
// var_dump($_POST);
// exit();

// ========================
// 検索のデータの受け取り
// ========================
// ---------------------------
// タイトル検索
// ---------------------------
// データの受け取り
$title = $_POST["title"];

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$title}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/title.txt', 'a');

// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:books_input.php");

// ---------------------------
// 著者で検索
// ---------------------------
$author = $_POST["author"];

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data2 = "{$author}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file2 = fopen('data/author.txt', 'a');

// ファイルをロックする
flock($file2, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file2, $write_data2);

// ファイルのロックを解除する
flock($file2, LOCK_UN);

// ファイルを閉じる
fclose($file2);

// データ入力画面に移動する
header("Location:books_input.php");

// =============================
// 読んだ本の感想
// =============================

// -----------------------------
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/books.css">

    <script src="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/yamazakidaisuke/BmapQuery/js/BmapQuery.js"></script>

    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.css" />

    <title>本検索アプリ</title>
</head>

<body>
    <main>
        <h1>GOOGLE BOOKS</h1>

        <form class="btns" action="books_create.php" method="POST">
            <div class="btn">
            <p>本の名前を入力してね！</p>
            <a href="books_read.php">タイトル履歴</a>
            <input  name="title" id="keyword" width="30" height="20"></input>
            <button id="send" class="search">タイトルで検索</button>
            </div>
        </form>

        <form class="btns"  action="books_create.php" method="POST">
            <div class="btn">
                <p>本の著者を入力してね！</p>
                <a href="books_read.php">著者履歴</a>
                <input  name="author" id="keyh" width="30" height="20"></input>
                <button id="sendh" class="search">著者で検索</button>
            </div>
        </form>

            <div class="btn near_lib">
                <p>近くのと図書館にあるかな？</p>
                <div id="lib_result">     </div>
                <button id="lib_btn" class="search">図書館検索</button>
                <button id="lib2_btn" class="search">蔵書検索</button>
            </div>
        </div>
        
        <!-- 検索結果が出る場所 -->
        <h1>検索結果</h1>
        <section class="result">
            <div class="img">
            <p>表紙</p>
            </div>
            <div class="title">
                <p>題名</p>
            </div>
            <div class="description">
                <p>あらすじ</p>
            </div>
            <div class="author">
                <p>著者</p>
            </div>
            <div class="link">
                    <p>リンク</p>
            </div>
        </section>
        
        <section id="output">

            <!-- <div >　jsで検索ができた後に挿入される
                <section class="result">
                    <div class="img">
                    <img src="${response.data.items[i].volumeInfo.imageLinks.smallThumbnail}">
                    </div>
                    <div class="title">
                        <p>題名${response.data.items[i].volumeInfo.title}</p>
                    </div>
                    <div class="author">
                        <p>${response.data.items[i].volumeInfo.authors}</p>
                    </div>
                    <div class="link">
                        <a href="${response.data.items[i].volumeInfo.infoLink}">
                        <p>詳細</p>
                    </div>
                    </section>
            </div> -->

            </section>
            </a>
        </div>
<!-- 地図の表示 bingMap-->
    <h1>MAP</h1>
<div>
    <div id="map"></div>
</div>

</main>

</body>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- googleBooksAPI -->
<script type="text/javascript" src="https://www.google.com/books/jsapi.js"></script>

<!-- bingMap -->
<script
    src="https://www.bing.com/api/maps/mapcontrol?mkt=ja-jp&key=AqcwE4abAtRFTiK8xl_Hcl35LxP0D8YT8NptLKATGrPItDqV-1yxYGNN8nXN-Tis"></script>

<!-- firebase -->
<script type="module">
    // 必要なFirebaseライブラリを読み込み
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js";

    import {
            getFirestore,
            collection,
            addDoc,
            serverTimestamp,
            doc,
            setDoc,
            getDoc,
            query,
            orderBy,
            onSnapshot
        }from "https://www.gstatic.com/firebasejs/9.22.1/firebase-firestore.js";

    import {
        getAuth,
        signInWithEmailAndPassword,
        signInWithPopup,
        GoogleAuthProvider,
        signOut,
        onAuthStateChanged }
        from "https://www.gstatic.com/firebasejs/9.22.1/firebase-auth.js";

    // Firebase configuration KEYを取得して設定
    const firebaseConfig = {
        apiKey: "AIzaSyAQoEKFxrOMca-0FHiyYJrv98WBoFwwWSo",

        authDomain: "api-work1.firebaseapp.com",
        projectId: "api-work1",
        storageBucket: "api-work1.appspot.com",
        messagingSenderId: "624449799032",
        appId: "1:624449799032:web:7772911d6af65d29343e8d"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);
// =============================================
    //GoogleAuth認証用、ユーザーの認証情報を取得
    const provider = new GoogleAuthProvider();
    provider.addScope("https://www.googleapis.com/auth/contacts.readonly");
    const auth = getAuth();

// -------------------------------------------------
    function redirectToIndexPage() {
        // エラーが発生した場合はindex.htmlにページ遷移する
        window.location.href = "login.html";
    }

// =============================================
// GoogleBooksAPI
// =============================================
// 記述がされたら、テキストエリアに書かれたことをvalで取得
// 検索したいキーワードがurlのintitle以降に入る
// タイトル
let word = "";
$("#keyword").on('input', function () {
    word = $("#keyword").val();
    console.log(word);
});
// 著者
let h = "";
$("#keyh").on('input', function () {
    h = $("#keyh").val();
    console.log(h);
});

// -----------------------------------
// タイトルでの検索
// -----------------------------------
// ボタンを押したら、テキストエリアに書かれたことをvalで取得
// APIにリクエストを送信している
$("#send").on('click',function(){
const url = `https://www.googleapis.com/books/v1/volumes?q=intitle:${word}&maxResults=10`
console.log(url);

$("#output").html("");

    axios.get(url)
        .then(function (response) {
            // リクエスト成功時の処理（responseに結果が入っている）
            console.log(response.data.items[1].volumeInfo.title);
            console.log(response.data.items[1].volumeInfo.authors);
            console.log(response.data.items[1].volumeInfo.publishedDate);
            console.log(response.data.items[1].volumeInfo.description);
            console.log(response.data.items[1].volumeInfo.imageLinks.smallThumbnail);
            console.log(response.data.items[1].volumeInfo.pageCount);

            const array =[];
            for(let i = 0; i<response.data.items.length; i++){

            array.push(
                `   <div>
                <section class="result">
                    <div class="img">
                    <img src="${response.data.items[i].volumeInfo.imageLinks.smallThumbnail}">
                    </div>
                    <div class="title">
                        <p>${response.data.items[i].volumeInfo.title}</p>
                    </div>
                    <div class="description">
                        <p>${response.data.items[i].volumeInfo.description}</p>
                    </div>
                    <div class="author">
                        <p>${response.data.items[i].volumeInfo.authors}</p>
                    </div>
                    <div class="link">
                        <a href="${response.data.items[i].volumeInfo.infoLink}">
                        <p>詳細</p>
                    </div>
                    </section>
            </div>`);
                $("#output").html(array);
            };

            console.log(array);

        })
        .catch(function (error) {
            // リクエスト失敗時の処理（errorにエラー内容が入っている）
            console.log(error);
        })
        .finally(function () {
            // 成功失敗に関わらず必ず実行
            console.log("done!");
        });
    });

// -----------------------------------
// 著者での検索
// -----------------------------------
$("#sendh").on('click', function () {
    const url2 = `https://www.googleapis.com/books/v1/volumes?q=inauthor:${h}&maxResults=10`
    console.log(url2);

      $("#output").html("");

    axios.get(url2)
        .then(function (response) {
            // リクエスト成功時の処理（responseに結果が入っている）
            console.log(response.data.items[1].volumeInfo.title);
            console.log(response.data.items[1].volumeInfo.authors);
            console.log(response.data.items[1].volumeInfo.publishedDate);
            console.log(response.data.items[1].volumeInfo.description);
            console.log(response.data.items[1].volumeInfo.imageLinks.smallThumbnail);
            console.log(response.data.items[1].volumeInfo.pageCount);

            const array2 = [];
            for (let i = 0; i < response.data.items.length; i++) {

                array2.push(
                     `   <div >
                <section class="result">
                    <div class="img">
                    <img src="${response.data.items[i].volumeInfo.imageLinks.smallThumbnail}">
                    </div>
                    <div class="title">
                        <p>${response.data.items[i].volumeInfo.title}</p>
                    </div>
                    <div class="description">
                        <p>${response.data.items[i].volumeInfo.description}</p>
                    </div>
                    <div class="author">
                        <p>${response.data.items[i].volumeInfo.authors}</p>
                    </div>
                    <div class="link">
                        <a href="${response.data.items[i].volumeInfo.infoLink}">
                        <p>詳細</p>
                    </div>
                    </section>
            </div>`);
                $("#output").html(array2);
            };

            console.log(array2);

        })
        .catch(function (error) {
            // リクエスト失敗時の処理（errorにエラー内容が入っている）
            console.log(error);
        })
        .finally(function () {
            // 成功失敗に関わらず必ず実行
            console.log("done!");
        });
});
</script>

<script type="text/javascript">
    google.books.load();

    function initialize() {
        var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
        viewer.load('ISBN:0738531367');
    }

    google.books.setOnLoadCallback(initialize);
</script>

<!-- 図書館機能 -->
<script>
    'use strict';
    // 検索をかける

$("#lib_btn").on('click',function(){

  const libUrl =
        "https://api.calil.jp/library?appkey={da280c479ff3323463183ff2c51aa5f5}&pref=山口県&city=山口市&limit=10";

    axios.get(libUrl)
        .then(function (response) {
            // リクエスト成功時の処理（responseに結果が入っている）
            console.log(response);
            console.log(response);
            console.log(response);

        })
        .catch(function (error) {
            // リクエスト失敗時の処理（errorにエラー内容が入っている）
            console.log(error);
        })
        .finally(function () {
            // 成功失敗に関わらず必ず実行
            console.log("done!");
        });
});

// 蔵書検索を行う
$("#lib2_btn").on('click', function(){
    const libUrl2 =
        "http://api.calil.jp/check?appkey={da280c479ff3323463183ff2c51aa5f5}&isbn=4834000826&systemid=Aomori_Pref&format=json";
});
</script>

<script>
// ==========================
// bingMapAPIのコード記述
// ==========================

// マップ情報格納用の変数（APIによっては必要ないこともあるかも、bingmapは必要になる。
    let map;
    // 位置情報の取得に成功した場合に実行される関数 成功したとき
    function showPosition(position) {
        console.log(position);
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        console.log(lat, lng);
    };

    // 位置情報の取得を失敗したとき
    function showError(error) {
        const errorMessages = [
            "位置情報が許可されてません",
            "現在位置を特定できません",
            "位置情報を取得する前にタイムアウトになりました",
        ];
        alert(`error:${errorMessages[error.code - 1]}`);
    };

    const option = {
        enableHighAccuracy: true,
        maximumAge: 20000,
        timeout: 1000000,
    };

    // この後マップ表示の処理を書き込む
    function mapsInit(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        map = new Microsoft.Maps.Map("#map", {
            center: {
                latitude: lat,
                longitude: lng,
            },
            zoom: 15,
        });
    };

    // 位置情報取得処理
    window.onload = function () {
        navigator.geolocation.getCurrentPosition(mapsInit, showError, option);
    };

    function pushPin(lat, lng, map) {
            const location = new Microsoft.Maps.Location(lat, lng);
            const pin = new Microsoft.Maps.Pushpin(location, {
                color: "navy",
                visible: true,
            });
            map.entities.push(pin);
        }

    // geo_and_map.html

        function mapsInit(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            map = new Microsoft.Maps.Map("#map", {
                center: {
                    latitude: lat,
                    longitude: lng,
                },
                zoom: 15,
            });
            pushPin(lat, lng, map);
        }
</script>

</html>