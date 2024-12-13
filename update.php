<?php
    include "./connection/database.php";

    if ($_SERVER['REQUEST_METHOD']==="GET") {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM products WHERE id=:id";

            $stmt = $database->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch();
        }

        if(empty($id)) {
            die("ID не найден");
        }
    }

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $errors = [];

        $id = trim(htmlspecialchars($_POST['product_id']));
        $title = trim(htmlspecialchars($_POST['product_title']));
        $description = trim(htmlspecialchars($_POST['product_description']));
        $price = trim(htmlspecialchars($_POST['product_price']));
        $article = trim(htmlspecialchars($_POST['product_article']));
        $rating	= trim(htmlspecialchars($_POST['product_rating']));
        $category = trim(htmlspecialchars($_POST['product_category']));

        if (empty($title) || empty($article) || empty($descripton) || empty($price) || empty($rating) || empty($category)) {
            $errors[] = "Заполните все поля";
            return;
        }
        $sql = "UPDATE products SET title=:title, description=:description, price=:price, article=:article, rating=:rating, category=:category WHERE id=:id";
        $stmt = $database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":price", $price);
        $stmt->bindValue(":article", $article);
        $stmt->bindValue(":rating", $rating);
        $stmt->bindValue(":category", $category);

        if ($stmt->execute()) {
            header("Location: ./product.php?id={$id}");
            
        }
        else {
            $errors[]="Ошибка запроса";
            return;
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
    <title>Update</title>
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
        align-items: center;
        
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
        align-items: center;
        gap:32px;

        background-color: #fff;
        border-radius: 12px;

        margin-top: 124px;
        margin-bottom: 70px;
        padding: 40px 0px;

        box-sizing: border-box;
        width: 50%;
    }

    .update_header {
        font-family: var(--font-family);
        font-weight: 700;
        font-size: 32px;
        color: #f58c19;
    }

    .update__form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        font-size: 16px;

        box-sizing: border-box;
        width: 70%;
    }

    .update__form__inputBlock {
        display: flex;
        flex-direction: column;
    }

    .update__form__inputBlock label {
        color: rgba(0, 0, 0, 0.5);
    }

    .update__form_input {
        background: #dbdbdb;
        border-radius: 6px;
        padding: 10px;

        resize: vertical;

        scrollbar-width: 0;
    }

    .update__form_input+textarea {
        border:none;
    }

    .update__form_input:focus {
        border: 2px solid #000;
        padding: 8px;
    }

    .update__form_inputSubmit {
        padding: 10px;
        border-radius: 6px;
        background: #f58c19;
        color: #fff;
    }

    .update__form_inputSubmit:hover {
        cursor: pointer;
        background-color: rgba(245, 140, 25, 0.8);
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
        transition: all ease-in-out 0.3s;
    }

    .update_notification {
        color: red;
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

            <h1 class="update_header">Редактирование</h1>

            <form class="update__form" action="" method="post">

                <div class="update__form__inputBlock">
                    <input type="hidden" name="product_id" value="<?=$result['id']?>">
                </div> 

                <div class="update__form__inputBlock">
                    <label for="title">Название</label>
                    <input class="update__form_input" type="text" name="product_title" id="title" value="<?=$result['title'] ?>">
                </div>                    
                

                <div class="update__form__inputBlock">
                    <label for="cat">Категория</label>
                    <input class="update__form_input" type="text" name="product_category" id="cat" value="<?=$result['category'] ?>">
                </div>    


                <div class="update__form__inputBlock">
                    <label for="art">Артикул</label>
                    <input class="update__form_input" type="text" name="product_article" id="art" value="<?=$result['article'] ?>">
                </div>


                <div class="update__form__inputBlock">
                    <label for="price">Цена</label>
                    <input class="update__form_input" type="number" name="product_price" id="price" value="<?=$result['price'] ?>">
                </div>

                <div class="update__form__inputBlock">
                    <label for="price">Рейтинг</label>
                    <input class="update__form_input" type="number" name="product_rating" id="price" value="<?=$result['rating'] ?>">
                </div>


                <div class="update__form__inputBlock">
                    <label for="desc">Описание</label>
                    <textarea class="update__form_input" name="product_description" id="desc" rows="5"><?=$result['description']?></textarea>
                </div>
                

                <div class="update__form__inputBlock">
                    <input class="update__form_inputSubmit" type="submit" value="Редактировать">
                </div>
                

            </form>

            <div class="update_notification">
                <p>
                <?php
                    if(!empty($errors))
                        {
                            foreach($errors as $error)
                            {
                                echo "Ошибка: " . htmlspecialchars($error);
                            }
                        }
                ?>
                </p>
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