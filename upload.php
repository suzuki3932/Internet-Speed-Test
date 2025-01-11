<?php
// 生成するファイルサイズ (2MB)
$fileSize = 2097152; // 2 * 1024 * 1024
// ファイル名
$fileName = 'dummy_file.txt';
// ファイルパス
$filePath = 'uploads/' . $fileName;
// ダミーデータを作成
$data = str_repeat('x', $fileSize);
// ファイルを作成
file_put_contents($filePath, $data);
// アップロード処理
if(isset($_POST["submit"])) {
    // ... (省略: 他のエラーチェックなど)
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // ファイルをアップロード
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            // ファイルの削除時間を設定
            $delete_time = time() + 600; // 10分後
            file_put_contents($target_file . '.delete_time', $delete_time);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}