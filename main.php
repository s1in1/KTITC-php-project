<?php
    include "./connection/database.php";

    $sql = "SELECT * FROM products";
    $stmt = $database->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Landing</title>
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

/* container */

.container {
    display: flex;
    flex-direction: column ;
    justify-content: center;
    padding: 36px 375px 0 375px;
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
    color:#fff;
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

/* content */

.content {
    margin-top: 132px;
    display: flex;
    flex-direction: row;
    gap: 30px;
    margin-bottom: 52px;
}

/* left sidebar */

.content__sideBar {
    display: flex;
    flex-direction: column;
    gap: 72px;
}

.content__sideBar_categories {
    display: flex;
    flex-direction: column;
    gap: 30px;

    background-color: #fff;
    border-radius: 12px;

    padding: 18px;
    width: 300px;
}

.content__sideBar_categories_title {
    font-weight: 700;
    font-size: 24px;
    color: #000;
}

.content__sideBar_categories_list {
    display: flex;
    flex-direction: column;
    gap: 22px;
}

.content__sideBar_categories_list_catName {
    font-weight: 400;
    font-size: 20px;
    color: #000;
}

.content__sideBar_categories_list_type {
    color: rgba(0, 0, 0, 0.5);
    cursor: pointer;
}

.content__sideBar_subscription {
    display: flex;
    flex-direction: column;

    padding: 18px;

    border-radius: 12px;
    width: 300px;
    height: 291px;

    background: #f58c19;
}

.content__sideBar_subscription_title {
    font-weight: 700;
    font-size: 20px;
    color: #fff;
    padding-right: 10px;

    margin-bottom: 24px;
}

.content__sideBar_subscription_email {
    border-radius: 12px;

    background-color: #dfdfdf;

    padding: 10px;

    margin-bottom: 12px;
}

.content__sideBar_subscription_email::placeholder {  
    color: #000;
}

.content__sideBar_subscription_btn {
    border-radius: 12px;

    background-color: #dfdfdf;

    padding: 10px 82px;   
}

.content__sideBar_subscription_btn::placeholder {  
    color: #F58C19;
}

.content__sideBar_subscription_notification {
    font-weight: 400;
    font-size: 12px;
    color: #fff;
}

.content__sideBar_subscription_email:hover, .content__sideBar_subscription_btn:hover {
    transition: all ease-in-out 0.3s;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
    background: #fff;
}

/* main */

.content__main {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.content__main__sort {
    display: flex;
    gap:8px;

    padding: 15px 20px;

    background-color: #fff;
    border-radius: 12px;
    width: 840px;
    height: 52px;
}

.content__main__sort_a {
    cursor: default;
    color:#F58C19;
}

.content__main__sort_btn {
    cursor: pointer;
}

.content__main__products {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    color: #000;
}

.content__main__products_card {
    border-radius: 12px;
    width: 260px;
    height: 368px;

    padding: 12px 24px;

    background: #fff;

    position: relative;

    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.content__main__products_card_img {
    margin-bottom: 12px;

    position: relative;
}

.content__main__products_card_title {
    font-weight: 400;
    font-size: 16px;
    
}

.content__main__products_card_title::after {
    content: '';
    position: absolute;
    inset: 0;
}

.content__main__products_card a {
    color: #000;
}

.content__main__products_cardBottom {
    display: flex;
    justify-content: space-between;
}

.content__main__products_card_priceBlock {
    padding: 6px 40px 6px 6px;
    width: 60%;
    border-radius: 8px;

    background: #dbdbdb;

    display: flex;
    align-items: center;

    position: relative;
}

.content__main__products_card_price {
    font-weight: 600;
    font-size: 16px;

    white-space: nowrap;
}

.content__main__products_card_favBlock {
    border-radius: 8px;

    display: flex;
    justify-content: center;
    align-items: center;

    background: #dbdbdb;

    padding: 0px 6px;

    position: relative;
}

.content__main__products_card_cartBlock {
    border-radius: 8px;
    background-color: #f58c19;

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 0px 6px;

    position: relative;
}

.content__main__products_card_favBlock:hover {
    cursor: pointer;

    transition: all ease-in-out 0.3s;

    background-color: #fff;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
}

.content__main__products_card_cartBlock:hover {
    cursor: pointer;

    transition: all ease-in-out 0.3s;

    background-color: rgba(245, 140, 25, 0.8);
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
}

.content__main__downloadMore {
    text-align: center;
}

.content__main__downloadMore a{
    color:#F58C19;
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
                <p class="header__login_p">Вы вошли в</p>      
                <pre> </pre>          
                <p class="header__login_acc">emaildfsasfasfsf</p>
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
                    <li class="secHeader__nav_list_link"><a>Каталог</a></li>
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

        <div class="content">

            <div class="content__sideBar">

                <div class="content__sideBar_categories">

                    <h1 class="content__sideBar_categories_title">Категории</h1>

                    <ul class="content__sideBar_categories_list">
                        <li class="content__sideBar_categories_list_catName">Гитары</li>
                        <li class="content__sideBar_categories_list_type"><a>Акустические гитары</a></li>
                        <li class="content__sideBar_categories_list_type"><a>Электро-гитары</a></li>
                        <li class="content__sideBar_categories_list_type"><a>Классические гитары</a></li>
                    </ul>

                    <ul class="content__sideBar_categories_list">
                        <li class="content__sideBar_categories_list_catName">Ударные инструменты</li>
                        <li class="content__sideBar_categories_list_type"><a>Акустические установки</a></li>
                        <li class="content__sideBar_categories_list_type"><a>Электронные установки</a></li>
                        <li class="content__sideBar_categories_list_type"><a>Барабанные палочки</a></li>
                    </ul>

                    <ul class="content__sideBar_categories_list">
                        <li class="content__sideBar_categories_list_catName">Микрофоны</li>
                        <li class="content__sideBar_categories_list_type"><a>Динамические микрофоны</a></li>
                        <li class="content__sideBar_categories_list_type"><a>Конденсаторные микрофоны</a></li>
                        <li class="content__sideBar_categories_list_type"><a>Инструментальные микрофоны</a></li>
                    </ul>

                </div>

                <div class="content__sideBar_subscription">

                    <h1 class="content__sideBar_subscription_title">Подпишитесь на рассылку, чтобы узнавать о новых поступлениях</h1>

                    <input class="content__sideBar_subscription_email" type="email" placeholder="Email" name="" id="">
                    <input class="content__sideBar_subscription_btn" type="submit" placeholder="Отправить" name="" id="">

                    <p class="content__sideBar_subscription_notification">*нажимая, вы соглашаетесь с Пользовательским соглашением</p>

                </div>

            </div>

            <div class="content__main">

                <div class="content__main__sort">

                    <p class="content__main__sort_p">Сортировать:</p>
                    <a href="" class="content__main__sort_a">сначала недорогие</a>
                    <img src="./assets/img/icons/downArrow.png" alt="" class="content__main__sort_btn">

                </div>

                <div class="content__main__products">

                <?php
                    foreach($result as $item) {
                ?>

                    <div class="content__main__products_card">

                        <div class="content__main__products__cardTop">
                            <img class="content__main__products_card_img" src="./assets/img/products/ibanez1.jpg" alt="">

                            <a href="./product.php?id=<?=$item["id"]?>"><h1 class="content__main__products_card_title"><?=$item["title"] ?></h1></a>
                        </div>

                        <div class="content__main__products_cardBottom">

                            <div class="content__main__products_card_priceBlock">
                            <p class="content__main__products_card_price"><?=number_format($item["price"], 0, '', ' ')?> p.</p>
                            </div>

                            <div class="content__main__products_card_favBlock">
                            <img class="content__main__products_card_addToFav" src="./assets/img/icons/heart-outline.svg" alt="">
                            </div>

                            <div class="content__main__products_card_cartBlock">
                            <img class="content__main__products_card_addToCart" src="./assets/img/icons/cart-outline.svg" alt="">
                            </div>

                        </div>                  

                    </div>

                    <?php
                    }
                    ?>

                </div>

                <!-- <div class="content__main__downloadMore">
                    <a href="">Загрузить ещё</a>
                </div> -->

            </div>       

        </div>

    </div>

    <footer class="footer">

        <div class="footer__nav">

            <div class="footer__nav__logo">
                <img class="footer__nav__logo_img" src="/assets/img/logo/long_mcquade_logo.png.png" alt="">
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