<?php
$x = "Контактна інформація";
$y = "Написати нам";
$texts = [
    2 => "Наша адреса: м. Київ, вул. Головна, 123, офіс 45. Працюємо з понеділка по п'ятницю з 9:00 до 18:00.",
    3 => "Зв'яжіться з нами зручним для вас способом. Ми завжди раді відповісти на ваші запитання та проконсультувати.",
    4 => "Для швидкого зв'язку ви можете скористатися формою зворотного зв'язку на сайті або зателефонувати нам.",
    5 => "Наші менеджери готові допомогти вам у вирішенні будь-яких питань. Чекаємо на ваші звернення та пропозиції!",
    6 => "Заповніть форму на сайті або надішліть нам email, і ми обов'язково зв'яжемося з вами протягом робочого дня.",
    7 => "© 2023 Наша компанія. Зв'яжіться з нами сьогодні, і ми допоможемо реалізувати ваші ідеї в життя."
];
$pages = [
    "index.php" => "Головна",
    "page2.php" => "Про Нас",
    "page3.php" => "Послуги",
    "page4.php" => "Галерея",
    "page5.php" => "Контакти"
];

// Контактна інформація для сторінки 5
$contacts = [
    "email" => "contact@example.com",
    "phone" => "+380 44 123-45-67",
    "address" => "Київ, вул. Хрещатик, 1"
];

// Соціальні мережі
$social_networks = [
    "Facebook" => "https://facebook.com/example",
    "Twitter" => "https://twitter.com/example",
    "Instagram" => "https://instagram.com/example"
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Варіант 8 - Сторінка 5</title>
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
            padding-left: 20px;
            list-style-type: none;
        }
        
        .content-list a {
            color: #0066cc;
            text-decoration: none;
        }
        
        .content-list a:hover {
            color: #004499;
        }
        
        .contact-info {
            margin: 10px 0;
            font-size: 12px;
        }
        
        .contact-info p {
            margin: 3px 0;
        }
        
        .final-message {
            text-align: center;
            padding: 10px;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
            margin: 10px 0;
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
                    <li><a href="<?= $url ?>" <?= ($url == 'page5.php') ? 'class="active"' : '' ?>><?= $label ?></a></li>
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
                <div class="contact-info">
                    <h4>Контакти:</h4>
                    <p>Email: <?= $contacts['email'] ?></p>
                    <p>Телефон: <?= $contacts['phone'] ?></p>
                    <p>Адреса: <?= $contacts['address'] ?></p>
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
                    <div class="final-message">
                        <h3>Дякуємо за перегляд!</h3>
                        <p>Це заключна сторінка нашого веб-сайту</p>
                    </div>
                    <div class="content-list">
                        <h4>Соціальні мережі:</h4>
                        <ul>
                            <?php foreach ($social_networks as $name => $url): ?>
                                <li><a href="<?= $url ?>" target="_blank"><?= $name ?></a></li>
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