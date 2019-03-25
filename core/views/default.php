<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= __('title');?></title>

    <!-- підключаємо стилі -->
    <link type = "text/css" rel = "stylesheet" href = "/css/style_basic.css">

    <script src = "/js/script_jquery.js"></script> <!-- Підключаємо бібліотеку jquery 3.2.1 -->
    <script src = "/js/script_basic.js" ></script> <!-- Підключаємо базові скріпти сайту    <script src = "http://malsup.github.com/jquery.form.js"></script> -->

  </head>
  <body>
    <!-- Вікно реєстрації і авторизації -->
    <div id = "regist_auto_site">
      <div id = "close_regist_auto_button">X</div>
      <div id = "regist_auto_block">
        <div id = "regist_block">
          <a href = "#" id = "title_block" class = "sign_in ">Вхід</a>
        </div>
        <div id = "auto_block">
          <a href = "#" id = "title_block" class = "reg ">Реєстрація</a>
        </div>
      </div>
      <div id = "auto">
        <form method = "post">
          <input class = "regist_auto_field_auto" type = "text" name = "email" placeholder = "Ваший E-mail"/>
          <input class = "regist_auto_field_auto" type = "password" name = "password" placeholder = "Пароль"/>
          <input type = "button" id = "regist_auto_button" value = "Підтвердити">
        </form>
      </div>
      <div id = "regist">
        <form method = "post">
          <input class = "regist_auto_field_reg" type = "text" name = "last_name" placeholder = "Прізвище"/>
          <input class = "regist_auto_field_reg" type = "text" name = "first_name" placeholder = "Ім'я"/>
          <input class = "regist_auto_field_reg" type = "text" name = "email" placeholder = "E-mail"/>
          <input class = "regist_auto_field_reg" type = "password" name = "password" placeholder = "Пароль"/>
          <input class = "regist_auto_field_reg" type = "password" name = "cheak_password" placeholder = "Повторіть пароль"/>
          <input class = "regist_auto_field_reg" type = "text" name = "phone_number" placeholder = "Телефон"/>
          <input class = "regist_auto_field_reg" type = "text" name = "adress" placeholder = "Адреса доставки"/>

          <input type = "button" id = "regist_auto_button" value = "Підтвердити">
        </form>
      </div>
    </div>

    <!-- поле яке дозволяє вибрати мову -->
    <div id = "languages_select">
      <a href = "/ua/<?= App::getRouter()->getController();?>/<?= App::getRouter()->getAction();?>" id = "language_select_site_button">
        <img src = "/public/img/ua.png" id = "language_select_site_img"> UA
      </a>
      <a href = "/ru/<?= App::getRouter()->getController();?>/<?= App::getRouter()->getAction();?>" id = "language_select_site_button">
        <img src = "/public/img/ru.png" id = "language_select_site_img"> RU
      </a>
      <a href = "/en/<?= App::getRouter()->getController();?>/<?= App::getRouter()->getAction();?>" id = "language_select_site_button">
        <img src = "/public/img/en.png" id = "language_select_site_img"> EN
      </a>
    </div>

    <!-- поле, в якому є навігація по сайту -->
    <nav>
      <div id="close_catalog_button">X</div>
      <div id = "catalog_site_links">
        <div id = "item_catalog">
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_flowerpots/" id = "catalog_links">
            <img src = "/public/img/flowerpot.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/flowerpot_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_flowerpots');?>
            </div>
          </a>
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_tables/" id = "catalog_links">
            <img src = "/public/img/table.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/table_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_tables');?>
            </div>
          </a>
          <ul class="beads">
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_tables/"><?= __('nav_tables_journalistic');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_tables/"><?= __('nav_tables_playing');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_tables/"><?= __('nav_tables_cooking');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_tables/"><?= __('nav_tables_comp_writ');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_tables/"><?= __('nav_tables_servicing');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_tables/"><?= __('nav_tables_for_break');?></a></li>
          </ul>
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_chairs/" id = "catalog_links">
            <img src = "/public/img/chair.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/chair_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_chairs');?>
            </div>
          </a>
          <ul class="beads">
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_chairs/"><?= __('nav_chairs_bancettes');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_chairs/"><?= __('nav_chairs_puffs');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_chairs/"><?= __('nav_chairs_bench');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_chairs/"><?= __('nav_chairs_for_baby');?></a></li>
          </ul>
        </div>
        <div id = "item_catalog">
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_wardrobes/" id = "catalog_links">
            <img src = "/public/img/wardrobe.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/wardrobe_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_wardrobes');?>
            </div>
          </a>
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_shelfs/" id = "catalog_links">
            <img src = "/public/img/shelf.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/shelf_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_shelfs');?>
            </div>
          </a>
          <ul class="beads">
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_shelfs/"><?= __('nav_shelfs_wall');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_shelfs/"><?= __('nav_shelfs_console');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_shelfs/"><?= __('nav_shelfs_floor');?></a></li>
          </ul>
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_hangers/" id = "catalog_links">
            <img src = "/public/img/hanger.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/hanger_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_hangers');?>
            </div>
          </a>
          <ul class="beads">
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_hangers/"><?= __('nav_hangers_room');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_hangers/"><?= __('nav_hangers_hallway');?></a></li>
          </ul>
          <a href = "<?= App::getRouter()->getLanguage();?>/goods/view_candles/" id = "catalog_links">
            <img src = "/public/img/candle.png" id = "catalog_links_not_active_img">
            <img src = "/public/img/candle_blue_white.png" id = "catalog_links_active_img">
            <div id = "catalog_links_text">
              <?= __('nav_candles');?>
            </div>
          </a>
          <ul class="beads">
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_candles/"><?= __('nav_candles_lectern');?></a></li>
            <li><a href="<?= App::getRouter()->getLanguage();?>/goods/view_candles/"><?= __('nav_candles_icons');?></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- шапка сайту -->
    <header>
      <div id = "name_site_block">
        <a href = "/<?= App::getRouter()->getLanguage();?>" id = "name_site_link"><h1><span id = "name_before_ua">Mebelka</span><span id = "name_ua">.ua</span></h1></a>
      </div>
      <div id = "catalog_site_block">
        <a href = "#" id = "catalog_site_link"><?= __('header_catalog_button');?></a>
      </div>
      <div id = "search_site_block">
        <form id = "search_form"  action = "#">
          <input id = "search" placeholder = "<?= __('header_search_field');?>" type = "text">
          <input value = "<?= __('header_search_button');?>" id = "search_button" type = "submit">
        </form>
      </div>
      <div id = "about_site_block">
        <a href = "" id = "info_site"><?= __('header_about_us_link');?></a>
        <a href = "" id = "info_site1"><?= __('header_contacts_link');?></a>
        <a href = "" id = "info_site"><?= __('header_pay_del_link');?></a>
      </div>
      <div id = "language_site_block">
        <a href = "#" id = "language_site_button">
          <img src = "/public/img/lang_active.png" id = "language_site_active">
          <img src = "/public/img/lang_not_active.png" id = "language_site_not_active">
          <img src = "/public/img/<?= App::getRouter()->getLanguage();?>.png" id = "language_site_img">
        </a>
      </div>
      <div id = "reg_auto_site_block">
        <a href = "#" id = "registration_button"><?= __('header_registr_link');?></a>
        <input type = "button" id = "autorization_button" class = "autorization_button" value = "<?= __('header_autoris_button');?>">
      </div>
    </header>
  </body>
</html>
