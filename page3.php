<?php
$x = "Наші послуги";
$y = "Замовити консультацію";
$texts = [
    2 => "Ми пропонуємо широкий спектр послуг для бізнесу та приватних клієнтів. Кожен проект отримує індивідуальний підхід.",
    3 => "Наші фахівці мають глибокі знання та досвід у своїх галузях. Ми використовуємо сучасні технології та методики.",
    4 => "Всі послуги надаються з гарантією якості. Ми працюємо на результат та завжди дотримуємося узгоджених термінів.",
    5 => "Обираючи нас, ви отримуєте надійного партнера, який візьме на себе вирішення ваших завдань професійно та ефективно.",
    6 => "Зв'яжіться з нами для безкоштовної консультації та отримання детальної інформації про наші послуги та ціни.",
    7 => "© 2023 Наша компанія. Професійні послуги для вашого бізнесу. Якість, перевірена часом."
];
$pages = [
    "index.php" => "Головна",
    "page2.php" => "Про Нас",
    "page3.php" => "Послуги",
    "page4.php" => "Галерея",
    "page5.php" => "Контакти"
];

// Нумерований список для сторінки 3
$ordered_list = [
    "Перший пункт важливої інформації",
    "Другий пункт з детальним описом",
    "Третій пункт з додатковими відомостями",
    "Четвертий пункт з висновками"
];

// Карта посилань
$image_map = [
   "src" => "images/img3.jpeg",
    "coords" => "10,10,100,100",
    "href" => "page4.php",
    "alt" => "Перехід до сторінки 4"
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Варіант 8 - Сторінка 3</title>
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
        
        .content-list ol {
            padding-left: 20px;
            margin: 10px 0;
        }
        
        .content-list ol li {
            margin: 5px 0;
        }
        
        .image-map {
            margin: 10px 0;
        }
        
        .image-placeholder {
            width: 120px;
            height: 120px;
            background: #f0f0f0;
            border: 2px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
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
                    <li><a href="<?= $url ?>" <?= ($url == 'page3.php') ? 'class="active"' : '' ?>><?= $label ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- <div class="block-number">1</div> -->
    </div>
    
    <div class="middle">
        <div class="left">
            <!-- <div class="block-number">2</div> -->
            <?= $texts[2] ?>
        </div>
        
        <div class="center-area">
            <div class="top-center">
                <!-- <div class="block-number">3</div> -->
                <div>
                    <?= $texts[3] ?>
                    <div class="image-map">
    <img src="images/img3.jpeg" usemap="#imagemap" alt="Інтерактивне зображення" width="100px" height="100px">
    <map name="imagemap">
        <area shape="rect" coords="<?= $image_map['coords'] ?>" href="<?= $image_map['href'] ?>" alt="<?= $image_map['alt'] ?>">
    </map>
</div>

                </div>
            </div>
            
            <div class="main-center">
                <!-- <div class="block-number">5</div> -->
                <div>
                    <?= $texts[5] ?>
                    <div class="content-list">
                        <h4>Нумерований список:</h4>
                        <ol>
                            <?php foreach ($ordered_list as $item): ?>
                                <li><?= $item ?></li>
                            <?php endforeach; ?>
                        </ol>
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