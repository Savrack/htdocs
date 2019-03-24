"use strict";

$(document).ready(function(){

  // скрипт відкриває вікно при кліку на кнопку каталогу
  $('#catalog_site_link').click(function(){
    $("nav").fadeIn(0);
  });
  $('#close_catalog_button').click(function(){
    $("nav").fadeOut(0);
  });

  // скрип відкриває вікно з вибором мови
  $('#language_site_button').click(function(){
    $("#languages_select").toggle(0);
  });

  // скрипт відкриває вікно з реєстрацією
  $('#registration_button').click(function(){
    $('#regist').css('display', 'flex');
    $('#auto').css('display', 'none');
    $('.sign_in').addClass("not_active_block");
    $('.reg').removeClass("not_active_block");
    $("#regist_auto_site").fadeIn(0);
  });

  // скрипт відкриває вікно з авторизацыэю
  $('#autorization_button').click(function(){
    $('#auto').css('display', 'flex');
    $('#regist').css('display', 'none');
    $('.reg').addClass("not_active_block");
    $('.sign_in').removeClass("not_active_block");
    $("#regist_auto_site").fadeIn(0);
  });

  // cкрипт відкриває вікно реєстрації з авторизації
  $('.reg').click(function(){
    $('#regist').css('display', 'flex');
    $('#auto').css('display', 'none');
    $('.sign_in').addClass("not_active_block");
    $('.reg').removeClass("not_active_block");
  });

  // cкрипт відкриває вікно авторизації з реєстрації
  $('.sign_in').click(function(){
    $('#auto').css('display', 'flex');
    $('#regist').css('display', 'none');
    $('.reg').addClass("not_active_block");
    $('.sign_in').removeClass("not_active_block");
  });

  // cкрипт закриває вікна з авторизацією і реєстрацією
  $('#close_regist_auto_button').click(function(){
    $("#regist_auto_site").fadeOut(0);
    $('#auto').css('display', 'none');
    $('#regist').css('display', 'none');
    $('.reg').removeClass("not_active_block");
    $('.sign_in').removeClass("not_active_block");
  });
});
