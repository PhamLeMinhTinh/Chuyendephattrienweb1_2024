<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_uri = '/' . addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\') . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = str_replace('\\', '/', $url_host . $matches[1][0]);

// Check and require LESS library
if (!class_exists('lessc')) {
    require_once(dirname($_SERVER['SCRIPT_FILENAME']) . '/libs/lessc.inc.php');
}

// Compile LESS file
$less = new lessc;
$less->compileFile('less/3046.less', 'css/3046.css');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="css/3046.css"> <!-- Compiled CSS -->
</head>
<body>

    <?php include'./3046-content.php'; ?>

   
</body>
</html>