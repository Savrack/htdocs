<?php

// Конфігурація сайту (налаштування)
Config::set('site_name', 'Меблі для вашого дому');
Config::set('languages', array('ua', 'ru', 'en'));

Config::set('controllers', array('index', 'goods', 'good', 'cart', 'profile', 'search'));
Config::set('actions', array(
  'index'   => 'view_index',
  'goods'   => 'view_goods',
  'good'    => 'view_good',
  'cart'    => 'view_cart',
  'profile' => 'view_profile',
  'search'  => 'view_search',
));

Config::set('default_language', 'ua');
Config::set('default_controller', 'index');
Config::set('default_action', 'view_index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'admin');
Config::set('db.password', '201170');
Config::set('db.db_name', 'mvc');
?>
