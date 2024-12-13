<?php
    include "./connection/database.php";

    if ($_SERVER['REQUEST_METHOD']==="GET") {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM products WHERE id=:id";

            $stmt = $database->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if(empty($id)) {
            die("ID не найден");
        }
    }

    if($_SERVER['REQUEST_METHOD']==='POST')  {
        $product_id = trim(htmlspecialchars($_POST['product_id']));

        $sql = "DELETE FROM products WHERE id=:id";

        $stmt = $database->prepare($sql);

        $stmt->bindValue(":id", $product_id);

        if ($stmt->execute()) {
            header("Location: /main.php");
        }
        else {
            echo "Запрос не выполнен";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Product</title>
</head>
<body>
    <style>
    * {
        padding: 0px;
        margin: 0px;
        border: none;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    /* Links */

    a, a:link, a:visited  {
        text-decoration: none;
    }

    a:hover  {
        text-decoration: none;
    }

    aside, nav, footer, header, section, main {
        display: block;
    }

    h1, h2, h3, h4, h5, h6, p {
        font-size: inherit;
        font-weight: inherit;
    }

    ul, ul li {
        list-style: none;
    }

    img, svg {
        max-width: 100%;   
    }

    address {
        font-style: normal;
    }

    /* Form */

    input, textarea, button, select {
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        background-color: transparent;
    }

    input::-ms-clear {
        display: none;
    }

    button, input[type="submit"] {
        /* display: inline-block;
        box-shadow: none;
        cursor: pointer; */
    }

    input:focus, input:active,
    button:focus, button:active {
        outline: none;
    }

    button::-moz-focus-inner {
        padding: 0;
        border: 0;
    }

    label {
        cursor: pointer;
    }

    legend {
        display: block;
    }

    /* body */

    body {
        background-color: #2D2D2D;
        font-family: "Inter", sans-serif;
        
    }

    html {
        scroll-behavior: smooth;
        
    }

    /* container */

    .container {
        display: flex;
        flex-direction: column ;
        
        padding: 36px 375px 0 375px;

        min-height: calc(100vh - 200px);
    }

    /* header 1*/

    .firstHeader {
        background-color: #000;

        padding: 20px;

        display: flex;
        align-items: center;
        gap: 50px;

        color: #fff;
        font-size: 14px;
    }

    .logo {
        height: 32px;
    }

    .logo {
        cursor: pointer;
    }

    .header__elEnd {
        align-items: center;
        display: flex;
        
        margin-left: 670px;
    }

    .header__login {
        display: flex;
    }

    .header__login_acc {
        color: #F58C19;
    }

    /* header 2 */

    .secHeader {
        color: #fff;
        font-size: 18px;
    }

    .secHeader a {
        color: #fff;
    }

    .secHeader a:hover {
        transition: all ease-in-out 0.2s;
        color: #F58C19;
    }

    .secHeader__nav_list {
        display: flex;
        flex-direction: row;
        gap: 34px;
        align-items: center;
    }

    .secHeader__nav_list_link:hover {
        transition: all ease-in-out 0.3s;
        color:#F58C19;
        cursor:pointer;
    }

    .secHeader__nav_search {
        border-radius: 12px;
        width: 370px;
        height: 38px;

        color: #000;
        font-size: 18px;
        padding: 8px 20px;

        background: #dfdfdf;
    }

    .secHeader__nav_search:hover {
        transition: all ease-in-out 0.3s;
        background-color: #fff;
        box-shadow: 0px 5px #000;
    }

    .secHeader__nav_search::placeholder {
        color: #000;
    }

    .secHeader__nav_list_cart:hover, 
    .secHeader__nav_list_fav:hover {
        cursor: pointer;
    }

    /* main */

    .main {
        display: flex;
        flex-direction: column;
        gap: 8px;

        margin-top: 100px;
        margin-bottom: 50px;
    }

    .product__card__top {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .product_title {
        font-weight: 700;
        font-size: 32px;
        color: #eee;
    }

    .product_art {
        font-weight: 400;
        font-size: 18px;
        color: rgba(255, 255, 255, 0.5);
    }

    .product__card {
        display: flex;
        gap: 54px;

        padding: 38px 8px 22px 50px;

        background-color: #fff;
        border-radius: 12px;
    }

    .product__card_img {
        width: 470px;
    }

    .product__card__info {
        display: flex;
        flex-direction: column;
        gap: 38px;
    }

    .product__card__cat {
        font-weight: 400;
        font-size: 16px;
        color: rgba(0, 0, 0, 0.5);
    }

    .product__card__descEl {
        font-weight: 400;
        font-size: 18px;

        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .product__card_rate_p {
        font-weight: 400;
        font-size: 12px;
        color: rgba(0, 0, 0, 0.5);
    }

    .product__card_description a {
        font-weight: 400;
        font-size: 18px;
        color: rgba(0, 0, 0, 0.5);
    }

    .product__card__purchEl {
        display: flex;
        gap: 10px;
    }

    .product__card__price {
        padding: 4px 80px 4px 8px;

        display: flex;
        align-items: center;

        background-color: #dbdbdb;
        border-radius: 6px;
    }

    .product__card__price h2 {
        font-weight: 700;
        font-size: 20px;
        color: #f58c19;
    }

    .product__card_fav {
        padding: 4px 12px;

        display: flex;
        align-items: center;

        border-radius: 6px;
        background-color: #dbdbdb;

        cursor: pointer;
    }

    .product__card_buy {
        border-radius: 6px;
        background: #f58c19;

        padding: 14px 16px;

        font-weight: 800;
        font-size: 16px;
        color: #fff;

        display: flex;
        align-items: center;

        cursor: pointer;
    }

    .product__card_fav:hover {
        transition: all ease-in-out 0.3s;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
        background: #fff;
    }

    .product__card_buy:hover {
        transition: all ease-in-out 0.3s;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
        background: #F9A03F;
    }

    .product__card__btns {
        display: flex;
        gap: 2px;
    }

    .product__card__btns_input {
        color: red;
        cursor: pointer;
    }

    .product_change {
        color: rgba(0, 0, 0, 0.5);
        position:relative;
        right: 0;
        bottom: 0;
    }

    /* footer */

    .footer {
        display: flex;
        align-items: center;
        justify-content: center;

        padding: 20px 0;

        background-color: #000;

        color: #fff;
    }

    .footer__nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 116px;
    }

    .footer__nav__pages__list_el h1 {
        font-weight: 700;
        font-size: 16px;
    }

    .footer__nav__pages__list, .footer__nav__help__list,
    .footer__nav__company__list,
    .footer__nav__location__list {
        display: flex;
        flex-direction: column;
        gap: 15px;

        word-break: break-all;
    }

    .footer__nav__pages__list_el {      
        overflow: hidden;
        white-space: wrap;
        text-overflow: ellipsis;
    }

    .footer__nav__pages__list_el:hover {
        cursor: pointer;    
    }
    </style>

    <div class="firstHeader">

    <img src="./assets/img/logo/long_mcquade_logo.png.png" alt="" class="logo">

    <div class="header__el">
        <ul class="header__ul">
            <li class="header__ul_li">+1 234 566 78 90</li>
            <li class="header__ul_li">+1 234 566 78 90</li>
        </ul>
    </div>

    <div class="header__el">
    <ul class="header__ul"> 
        <li class="header__ul_li">
            <p>longandmcsupport@mail.com</p>
        </li>
            <li class="header__ul_li">
                <img src="./assets/img/icons/ic_baseline-telegram.png" alt="" class="header__ul_li_link">
                <img src="./assets/img/icons/mingcute_whatsapp-fill.png" alt="" class="header__ul_li_link">
                <img src="./assets/img/icons/ri_instagram-fill.png" alt="" class="header__ul_li_link">
                <img src="./assets/img/icons/entypo-social_vk-with-circle.png" alt="" class="header__ul_li_link">
            </li>
        </ul> 
    </div>

    <div class="header__elEnd">
        <div class="header__login">
            <p class="header__login_p">Вы вошли в </p>                
            <pre> </pre>
            <p class="header__login_acc"><?="email"?></p>
        </div>

        <!-- <div class="header__lang">
            <p class="header__lang_p">Русский</p>
            <div class="header__lang_btn"><a><img src="" alt=""></a></div>
        </div>   -->
    </div>             

    </div >

    <div class="container">

        <div class="secHeader">

            <nav class="secHeader__nav">
                <ul class="secHeader__nav_list">
                    <li class="secHeader__nav_list_link"><a href="./main.php">Главная</a></li>
                    <li class="secHeader__nav_list_link"><a >Каталог</a></li>
                    <li class="secHeader__nav_list_link"><a>О нас</a></li>
                    <li class="secHeader__nav_list_link"><a>Бренды</a></li>
                    <li class="secHeader__nav_search"><input type="text" placeholder="Поиск" name="search" id=""></li>
                    <li class="secHeader__nav_list_link"><a href="./login.php">Войти</a></li>
                    <li class="secHeader__nav_list_link"><a href="./add.php">Добавить товар</a></li>
                    <li class="secHeader__nav_list_cart"><a></a><img src="./assets/img/icons/cart.png" alt=""></li>
                    <li class="secHeader__nav_list_fav"><a></a><img src="./assets/img/icons/heart.png" alt=""></li>
                </ul>
            </nav>

        </div>

        <div class="main">

            <div class="product__card__top">

                <h1 class="product_title"><?=$result['title']?></h1>

                <p class="product_art">Артикул: <?=$result['article']?></p>

            </div>

            <div class="product__card">

                <div class="product__card_img"><img src="/assets/img/products/ibanez1.jpg" alt=""></div>

                <div class="product__card__info">

                    <div class="product__card__catEl"><p class="product__card__cat"><?=$result['category']?></p></div>

                    <div class="product__card__descEl">

                        <div class="product__card_rate">
                            <?php 
                                if ($result['rating'] === 0) {
                                    echo "<p class='product__card_rate_p'>Пока нет рейтинга</p>";
                                }
                                else
                                {
                                    for ($i=0; $i < $result['rating']; $i++) { 
                                        echo "<img src='./assets/img/icons/ic_round-star.svg'>";
                                    }  
                                }
                                
                            ?>
                        </div>
                        

                        <p class="product__card_description"><?=$result['description']?></p>

                    </div>

                    <div class="product__card__purchEl">

                        <div class="product__card__price"><h2><?=number_format($result['price'], 0, '', ' ')." "?>p.</h2></div>

                        <div class="product__card_fav"><img src="/assets/img/icons/heart-outline.svg" alt=""></div>

                        <div class="product__card_buy"><input type="submit" value="Купить"></div>

                    </div>         

                    <div class="product__card__btns">
                        <a class="product_change" href="./update.php?id=<?=$id?>">Изменить</a>
                        <form action="" method="post" onsubmit="return confirm('Вы уверены, что хотите удалить товар?')">
                            <input type="hidden" name="product_id" value=<?=$result['id']?>>
                            <input type="submit" value="Удалить" class="product__card__btns_input">
                        </form>
                    </div>
                    

                </div>
                
            </div>

        </div>

    </div>

    <footer class="footer">

        <div class="footer__nav">

            <div class="footer__nav__logo">
                <img class="logo" src="/assets/img/logo/long_mcquade_logo.png.png" alt="">
            </div>

            <div class="footer__nav__pages">
                <ul class="footer__nav__pages__list">
                    <li class="footer__nav__pages__list_el"><h1>Страницы</h1></li>
                    <li class="footer__nav__pages__list_el">Главная</li>
                    <li class="footer__nav__pages__list_el">Каталог</li>
                    <li class="footer__nav__pages__list_el">Войти</li>
                </ul>
            </div>

            <div class="footer__nav__help">
                <ul class="footer__nav__help__list">
                    <li class="footer__nav__pages__list_el"><h1>Помощь</h1></li>
                    <li class="footer__nav__pages__list_el">FAQ</li>
                    <li class="footer__nav__pages__list_el">Помощь</li>
                    <li class="footer__nav__pages__list_el">Оферта</li>
                </ul>
            </div>

            <div class="footer__nav__company">
                <ul class="footer__nav__company__list">
                    <li class="footer__nav__pages__list_el"><h1>Компания</h1></li>
                    <li class="footer__nav__pages__list_el">О нас</li>
                    <li class="footer__nav__pages__list_el">Вакансии</li>
                    <li class="footer__nav__pages__list_el">Бренды</li>
                </ul>
            </div>

            <div class="footer__nav__location">
                <ul class="footer__nav__location__list">
                    <li class="footer__nav__pages__list_el"><h1>Мы здесь</h1></li>
                    <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/43/kazan/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Казань</a><a href="https://yandex.ru/maps/43/kazan/house/ulitsa_bari_galeyeva_3a/YEAYdwBmT00OQFtvfXRxcHlgYg==/?ll=49.177559%2C55.801403&utm_medium=mapframe&utm_source=maps&z=18.78" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Бари Галеева, 3А — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=49.177559%2C55.801403&mode=whatshere&whatshere%5Bpoint%5D=49.177652%2C55.801310&whatshere%5Bzoom%5D=17&z=18.78" width="180" height="90" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>                     
                </ul>
            </div>

        </div>

    </footer>

</body>
</html>