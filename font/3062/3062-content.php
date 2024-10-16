
<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<body>

<body>
    <div class="container">
        <div class="product-info">
            <h1>Lorem ipsum dolor sit amet</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cum delectus, sunt eos esse quos dignissimos. Minima deserunt nobis voluptatum, sunt sapiente eius.</p>
            <div class="price">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cum delectus, sunt eos esse quos dignissimos. Minima deserunt nobis voluptatum, sunt sapiente eius.</p>
                <!-- <span class="amount">$9.99</span> USD -->
            </div>
            <ul class="features">
                <li><i class="fas fa-check"></i> Lorem ipsum dolor sit</li>
                <li><i class="fas fa-check"></i> Lorem ipsum dolor sit</li>
                <li><i class="fas fa-check"></i> Lorem ipsum dolor sit</li>
                <li><i class="fas fa-check"></i> Lorem ipsum dolor sit</li>
            </ul>
            <a href="#" class="learn-more">Learn More</a>
        </div>
        <div class="product-image">
            <img src="img/ảnh.png" alt="Product Image">
        </div>
    </div>
</body>

<!-- //<script src="js/scripts.js"></script> -->
</body>
</div>
</div>  