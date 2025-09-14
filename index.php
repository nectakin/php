<?php
$x = "Ласкаво просимо";
$y = "Контактна інформація";
$texts = [
    2 => "Ласкаво просимо на наш сайт! Ми пропонуємо якісні послуги та індивідуальний підхід до кожного клієнта.",
    3 => "Головна сторінка. Тут ви знайдете основну інформацію про нашу компанію та наші пропозиції.",
    4 => "Наша місія - надавати найкращі рішення для наших клієнтів. Працюємо на ринку понад 10 років.",
    5 => "Вітаємо на нашому сайті! Ми - надійний партнер, який допоможе реалізувати ваші цілі та завдання.",
    6 => "Зв'яжіться з нами сьогодні, щоб отримати безкоштовну консультацію та дізнатися більше про наші послуги.",
    7 => "© 2023 Наша компанія. Всі права захищено. Створено з турботою про наших клієнтів."
];
$pages = [
    "index.php" => "Головна",
    "page2.php" => "Про Нас",
    "page3.php" => "Послуги",
    "page4.php" => "Галерея",
    "page5.php" => "Контакти"
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Головна - Наша компанія</title>
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
        
        /* Блок 1 - верхня частина з меню і X */
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
            font-weight: light;
        }
        
        /* Середня частина */
        .middle {
            flex: 1;
            display: flex;
            border-bottom: 2px solid #000;
        }
        
        /* Блок 2 - лівий */
        .left {
            background: #fddbc7;
            padding: 15px;
            border-right: 2px solid #000;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: light;
        }
        
        /* Центральна частина */
        .center-area {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        /* Блок 3 - верх центру */
        .top-center {
            background: #d9f0d3;
            padding: 10px;
            border-bottom: 2px solid #000;
            text-align: center;
            font-weight: light;
        }
        
        /* Блок 5 - основний центр */
        .main-center {
            background: #fff;
            padding: 15px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: light;
        }
        
        /* Права частина */
        .right-area {
            width: 200px;
            border-left: 2px solid #000;
            display: flex;
            flex-direction: column;
        }
        
        /* Блок 4 - верх права */
        .top-right {
            background: #fddbc7;
            padding: 15px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: light;
            border-bottom: 2px solid #000;
        }
        
        /* Блок 6 - низ права */
        .bottom-right {
            background: #d9f0d3;
            padding: 10px;
            /* height: 80px; */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: light;
        }
        
        /* Блок 7 - футер */
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
            font-weight: light;
        }
        
        /* Меню */
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
            font-weight: light; 
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        
        .menu a:hover {
            background-color: rgba(255,255,255,0.3);
        }
        
        /* .block-number {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(0,0,0,0.1);
            padding: 2px 6px;
            font-size: 12px;
            border-radius: 3px;
        } */
        
        .left, .top-center, .top-right, .main-center, .bottom-right {
            position: relative;
        }
    </style>
</head>

<body>
<div class="container">
    <!-- Блок 1: Header з X і меню -->
    <div class="header">
        <div class="x-box"><?= $x ?></div>
        <div class="menu">
            <ul>
                <?php foreach ($pages as $url => $label): ?>
                    <li><a href="<?= $url ?>"><?= $label ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- <div class="block-number">1</div> -->
    </div>
    
    <!-- Середня частина -->
    <div class="middle">
        <!-- Блок 2: Лівий -->
        <div class="left">
            <!-- <div class="block-number">2</div> -->
            <?= $texts[2] ?>
        </div>
        
        <!-- Центральна область -->
        <div class="center-area">
            <!-- Блок 3: Верх центру -->
            <div class="top-center">
                <!-- <div class="block-number">3</div> -->
                <?= $texts[3] ?>
            </div>
            
            <!-- Блок 5: Основний центр -->
            <div class="main-center">
                <!-- <div class="block-number">5</div> -->
                <?= $texts[5] ?>
            </div>
        </div>
        
        <!-- Права область -->
        <div class="right-area">
            <!-- Блок 4: Верх права -->
            <div class="top-right">
                <!-- <div class="block-number">4</div> -->
                <?= $texts[4] ?>
            </div>
            
            <!-- Блок 6: Низ права -->
            <div class="bottom-right">
                <!-- <div class="block-number">6</div> -->
                <?= $texts[6] ?>
            </div>
        </div>
    </div>
    
    <!-- Блок 7: Footer -->
    <div class="footer">
        <!-- <div class="block-number">7</div> -->
        <span><?= $texts[7] ?></span>
        <div class="y-box"><?= $y ?></div>
    </div>
</div>
</body>
</html>