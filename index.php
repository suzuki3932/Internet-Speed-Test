<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>インターネット速度テスト</title>
<?php
// 見出し
// ダウンロード速度
$url = 'netspeed-downloadtestfile.html'; // テスト用の大容量ファイルのURL
$start = microtime(true);
$file = file_get_contents($url);
$end = microtime(true);
$time = $end - $start;
$size = strlen($file);
$speed = $size / $time; // bytes/sec
echo '<div class="row mx-auto" style="position: relative;width: 35vw;height: 60vh;border-radius: 15px;background-color: #f0f8ff;top: 20%;">';
echo '<h1>インターネット速度テスト</h1>';
echo '
<div class="pie-chart-2">
ダウンロード<br>'.round($speed / 1024 / 1024, 2).'MB/s'
.'</div>'
;
echo '
<style>
.pie-chart-2 {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70%;
    height: 200px;
    margin: 0 auto;
    border-radius: 50%;
    background-image: radial-gradient(#fff 55%, transparent 55%), conic-gradient(#2589d0 40%, #f2f2f2 calc(40'.round($speed / 1024 / 1024, 2).'% / 700) 100%);
    font-weight: 600;
}
</style>';
// 改行
echo '<br>';
// アップロード速度
$url = 'upload.php'; // アップロード処理を行うスクリプトのURL
$data = str_repeat('x', 1024 * 1024); // 1MBのデータを生成
$start = microtime(true);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_exec($ch);
$end = microtime(true);
$time = $end - $start;
$speed = (1024 * 1024) / $time; // bytes/sec
echo '
<div class="pie-chart-3">
アップロード<br>'.round($speed / 1024 / 1024, 2).'MB/s'
.'</div>'
;
echo '
<style>
.pie-chart-3 {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70%;
    height: 200px;
    margin: 0 auto;
    border-radius: 50%;
    background-image: radial-gradient(#fff 55%, transparent 55%), conic-gradient(#2589d0 40%, #f2f2f2 calc(40'.round($speed / 1024 / 1024, 2).'% / 700) 100%);
    font-weight: 600;
}
</style>';
echo '<br><button type="button" class="btn btn-primary" onclick="window.location.reload();">再測定</button>';
echo '</div>';
// BootstrapのJavascript読み込み
echo '
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
';
?>