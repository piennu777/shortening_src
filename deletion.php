<?php
// 削除フォームから送信されたデータを取得
$directory = $_POST['link']; // ディレクトリ名
$deleteKey = $_POST['directory']; // 削除キー

// ディレクトリに移動
$targetDir = $_SERVER['DOCUMENT_ROOT'] . '/' . $directory;

// ディレクトリが存在するか確認
if (!file_exists($targetDir)) {
    header("Location: index.php?no=削除するディレクトリが見つかりませんでした。");
    exit();
}

// パスワードファイルを読み込み、キーを取得
$passwordFile = $targetDir . '/password.txt';
if (!file_exists($passwordFile)) {
    header("Location: index.php?no=パスワードファイルが見つかりませんでした。");
    exit();
}
$encryptedKey = file_get_contents($passwordFile);
$decryptedKey = openssl_decrypt($encryptedKey, 'aes-256-cbc', $deleteKey, 0, $deleteKey);

// キーが一致するか確認
if ($deleteKey !== $decryptedKey) {
    header("Location: index.php?no=削除キーが正しくありません。");
    exit();
}

// ディレクトリを削除
$success = deleteDirectory($targetDir);
if ($success) {
    header("Location: index.php?ok=削除が完了しました。");
} else {
    header("Location: index.php?no=削除中にエラーが発生しました。");
}
exit();

// ディレクトリを再帰的に削除する関数
function deleteDirectory($dir) {
    if (!is_dir($dir)) return false;
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? deleteDirectory("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}
?>
