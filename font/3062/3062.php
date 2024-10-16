<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

// Kiểm tra và yêu cầu thư viện LESS
if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}

// Tạo đối tượng LESS và biên dịch file LESS
$less = new lessc;
$less->compileFile('less/3062.less', 'css/3062.css');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Thêm link FontAwesome -->
    <link rel="stylesheet" href="css/3062.css" type="text/css">
    <title>Product Page</title>
</head>
<?php include'./3062-content.php'; ?>
</html>