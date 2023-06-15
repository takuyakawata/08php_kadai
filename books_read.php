<?php
// books_read.php
// -----------------------------
// タイトル履歴
// データまとめ用の空文字変数
$str = '';

// ファイルを開く（読み取り専用）
$file = fopen('data/title.txt', 'r');

// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
  while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する
      $str .="<tr><td>{$line}</td></tr>";
  }
}

// ロックを解除する
flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);
// -----------------------------------------

// 著者の履歴
// データまとめ用の空文字変数
$str2 = '';

// ファイルを開く（読み取り専用）
$file2 = fopen('data/author.txt', 'r');
// ファイルをロック
flock($file2, LOCK_EX);
// fgets()で1行ずつ取得→$lineに格納
if ($file2) {
  while ($line2 = fgets($file2)) {
    // 取得したデータを`$str`に追加する
      $str2.="<tr><td>{$line2}</td></tr>";
    
  }
}

// ロックを解除する
flock($file2, LOCK_UN);
// ファイルを閉じる
fclose($file2);

// `$str`に全てのデータ（タグに入った状態）がまとまるので，HTML内の任意の場所に表示する．
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
        <a href="books_input.php">入力画面へ</a>

        <table>
        <thead>
            <th>タイトル履歴</th>
        </thead>
        <tbody>
            <?=$str?>
        </tbody>
        </table>

        <table>
        <thead>
            <th>著者履歴</th>
        </thead>
        <tbody>
            <?=$str2?>
        </tbody>
        </table>
    </fieldset>
</body>

</html>