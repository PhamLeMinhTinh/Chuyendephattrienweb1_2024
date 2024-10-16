
<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<body>

<div class="header">
    <h1>Departments</h1>
    <div class="nav">
        <a href="#">Home</a> / Departments
    </div>
</div>

<div class="container">
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <div class="card">
            <span><i class="fas fa-tools"></i></span>
            <h3>Departments <?= $i ?></h3>
            <p>Aenean ullamcorper, leo id rutrum convallis, velit mauris porttitor.</p>
            <a href="#">READ MORE</a>
        </div>
    <?php endfor; ?>
</div>

<div class="footer">
    <p>&copy; 2024 Your Company</p>
    <p>EN</p>
</div>

<!-- //<script src="js/scripts.js"></script> -->
</body>
</div>
</div>  