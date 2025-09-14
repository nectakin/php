<?php
$x = "Наша галерея";
$y = "Запросити огляд";
$texts = [
    2 => "У нашій галереї представлені фотографії наших проектів, офісу та заходів. Подивіться, як ми працюємо.",
    3 => "Кожен проект - це унікальна історія успіху. Ми пишаємося нашими досягненнями та ділимось ними з вами.",
    4 => "Наш офіс створений для комфортної та продуктивної роботи. Сучасне обладнання та затишна атмосфера.",
    5 => "Ми регулярно проводимо корпоративні заходи та тімбілдинги. Сильна команда - запорука успішних проектів.",
    6 => "Запрошуємо вас відвідати наш офіс або ознайомитися з більшою кількістю наших робіт у повному каталозі.",
    7 => "© 2023 Наша компанія. Галерея наших робіт та життя компанії. Діліться нашими успіхами разом з нами."
];
$pages = [
    "index.php" => "Головна",
    "page2.php" => "Про Нас",
    "page3.php" => "Послуги",
    "page4.php" => "Галерея",
    "page5.php" => "Контакти"
];

// Зображення для сторінки 4
$gallery_images = [
    "images/img1.jpeg" => "",
    "images/img2.jpeg" => "",
    "images/img3.jpeg" => ""
];

// Додаткові посилання
$external_links = [
    "https://www.google.com" => "Google",
    "https://www.wikipedia.org" => "Wikipedia",
    "https://www.github.com" => "GitHub"
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Варіант 8 - Сторінка 4</title>
    <style>
        body { 
            margin: 0; 
            padding: 0;
            font-family: Arial, sans-serif; 
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            border: 2px solid #000;
        }
        
        .header {
            background: #b3cde0;
            padding: 10px;
            border-bottom: 2px solid #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .x-box {
            border: 2px solid #000;
            padding: 5px 10px;
            background: #fff;
        }
        
        .middle {
            flex: 1;
            display: flex;
            border-bottom: 2px solid #000;
        }
        
        .left {
            background: #fddbc7;
            padding: 15px;
            border-right: 2px solid #000;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .center-area {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .top-center {
            background: #d9f0d3;
            padding: 10px;
            border-bottom: 2px solid #000;
            text-align: center;
        }
        
        .main-center {
            background: #fff;
            padding: 15px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .right-area {
            width: 200px;
            border-left: 2px solid #000;
            display: flex;
            flex-direction: column;
        }
        
        .top-right {
            background: #fddbc7;
            padding: 15px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            border-bottom: 2px solid #000;
        }
        
        .bottom-right {
            background: #d9f0d3;
            padding: 10px;
            /* height: 80px; */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .footer {
            background: #b3cde0;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .y-box {
            border: 2px solid #000;
            padding: 5px 10px;
            background: #fff;
        }
        
        .menu ul { 
            list-style: none; 
            margin: 0; 
            padding: 0; 
            display: flex; 
            gap: 15px; 
        }
        
        .menu a { 
            text-decoration: none; 
            color: black; 
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        
        .menu a:hover, .menu a.active {
            background-color: rgba(255,255,255,0.5);
        }
        
        .block-number {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(0,0,0,0.1);
            padding: 2px 6px;
            font-size: 12px;
            border-radius: 3px;
        }
        
        .left, .top-center, .top-right, .main-center, .bottom-right {
            position: relative;
        }
        
        /* Стилі для списків та посилань */
        .content-list {
            margin: 10px 0;
        }
        
        .content-list ul {
            padding-left: 0px;
            list-style: none;
        }
        
        .content-list a {
            color: #0066cc;
            text-decoration: none;
        }
        
        .content-list a:hover {
            color: #004499;
        }
        
        .gallery-item {
            width: 80px;
            height: 60px;
            background: #f0f0f0;
            border: 1px solid #ccc;
            margin: 5px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #666;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="x-box"><?= $x ?></div>
        <div class="menu">
            <ul>
                <?php foreach ($pages as $url => $label): ?>
                    <li><a href="<?= $url ?>" <?= ($url == 'page4.php') ? 'class="active"' : '' ?>><?= $label ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- <div class="block-number">1</div> -->
    </div>
    
    <div class="middle">
        <div class="left">
            <!-- <div class="block-number">2</div> -->
            <div>
                <?= $texts[2] ?>
                <div class="content-list">
                    <h4>Галерея зображень:</h4>
                <ul>
                    <?php foreach ($gallery_images as $img => $alt): ?>
                    <li>
                        <img 
                src="<?= $img ?>" 
                alt="<?= $alt ?>" 
                style="width:200px; height:150px; object-fit:cover;"
                        />
                    <?= $alt ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                </div>
            </div>
        </div>
        
        <div class="center-area">
            <div class="top-center">
                <!-- <div class="block-number">3</div> -->
                <?= $texts[3] ?>
            </div>
            
            <div class="main-center">
                <!-- <div class="block-number">5</div> -->
                <div>
                    <?= $texts[5] ?>
                    <div class="content-list">
                        <h4>Зовнішні посилання:</h4>
                        <ul>
                            <?php foreach ($external_links as $url => $label): ?>
                                <li><a href="<?= $url ?>" target="_blank"><?= $label ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="right-area">
            <div class="top-right">
                <!-- <div class="block-number">4</div> -->
                <?= $texts[4] ?>
            </div>
            
            <div class="bottom-right">
                <!-- <div class="block-number">6</div> -->
                <?= $texts[6] ?>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <!-- <div class="block-number">7</div> -->
        <span><?= $texts[7] ?></span>
        <div class="y-box"><?= $y ?></div>
    </div>
</div>
</body>
</html>