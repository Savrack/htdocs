"use strict";

/* Базовий скріпт */
$(document).ready(function(){

  // скрипт відкриває вікно при кліку на кнопку каталогу
  $('#catalog_site_link').click(function(){
    $("nav").fadeIn(0);
    $("#white_backgraund").fadeIn(0);
  });
  $('#close_catalog_button').click(function(){
    $("nav").fadeOut(0);
    $("#white_backgraund").fadeOut(0);
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

/*скріпт відповідає за валідацію реєстрації*/
$(document).ready(function(){
  $('#reg').validate({

    //правила для перевірки
    rules:{
      reg_surname:{
        required:true
      },
      reg_name:{
        required:true
      },
      reg_email:{
        //required:true,
        email: true,
      },
      reg_pass:{
        required:true,
        minlength:6,
        maxlength:20
      },
      reg_pass_check:{
        required:true,
        minlength:6,
        maxlength:20,
        equalTo: "#reg_pass"
      },
      reg_phone:{
        required:true
      }
    },

    //сповіщення при порушенні цих правил
    messages:{
      reg_surname:{
        required:"Вкажіть Ваше Прізвище!"
      },
      reg_name:{
        required:"Вкажіть Ваше Ім'я'!"
      },
      reg_email:{
        //required:"Вкажіть Свій E-mail!",
        email:"Неправильний E-mail!",
      },
      reg_pass:{
        required:"Вкажіть Пароль!",
        minlength:"Від 6 до 20 символів!",
        maxlength:"Від 6 до 20 символів!"
      },
      reg_pass_check:{
        required:"Вкажіть Пароль!",
        minlength:"Від 6 до 20 символів!",
        maxlength:"Від 6 до 20 символів!",
        equalTo: "Паролі не збігаються!"
      },
      reg_phone:{
        required:"Вкажіть Номер Телефону!"
      }
    },
    submitHandler: function(form)
    {

      $(form).ajaxSubmit({

        success: function(data){
          console.log(data);
          if(data == 'true'){
            $("#reg").fadeOut(300, function(){
              $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Ви успішно зареєструвалися на сайті!");
              $("#regist_button").hide();
            });
          }
          else if(data == 'false'){
            $("#reg").fadeOut(300, function(){
              $("#reg_message").addClass("reg_message_bad").fadeIn(400).html("На жаль, не вдалося зареєструватися на сайті. Спробуйте ще раз.");
              $("#regist_button").hide();
            });
          }
          else{
            $("#reg_message").addClass("reg_message_bad").fadeIn(400).html("Користувач з таким email вже зареєстрований.");
          }
        }
      });
    }
  });
});
