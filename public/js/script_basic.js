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

$(document).ready(function($){
	var $form_modal =             $('.user-modal'),                                // все вікно з реєстрацією, авторизацією відновленням паролю

		  $form_login =             $form_modal.find('#box_login'),                      // вікно з авторизацією
		  $form_signup =            $form_modal.find('#box_signup'),                     // вікно з реєстрацією
		  $form_forgot_password =   $form_modal.find('#box_reset_password'),             // вікно з відновленням паролю

		  $form_modal_tab =         $('.switcher'),                                  // вікно з вибором вікна

  		$tab_login =              $form_modal_tab.children('a').eq(0), // кнопка входу
      $tab_signup =             $form_modal_tab.children('a').eq(1), // кнопка реєстрації
  		$tab_reset_password =     $form_modal_tab.children('a').eq(2), // кнопка відновлення паролю

  		$main_nav =               $('.main-nav'); // вікно з вибором форми


	// відкрити модальне вікно
	$main_nav.on('click', function(event){

    // делегування подій
		if($(event.target).is($main_nav)) {

			// відкриття на мобільних підменю
			$(this).children('ul').toggleClass('is-visible');
		}
    else {

			// закриття підменю на мобільних
			$main_nav.children('ul').removeClass('is-visible');

			// показати модальний шар
			$form_modal.addClass('is-visible');

			// показати вибрану форму
      if($(event.target).is('.signin')){
        login_selected();
      }
      else{
        signup_selected();
      }
		}

	});

	// закрити модальне вікно
	$('.user-modal').on('click', function(event){
		if($(event.target).is('.modal-close-form') ) {
			$form_modal.removeClass('is-visible');
		}
	});

	// закрити модальне вікно нажавши клавішу Esc
	$(document).keyup(function(event){
    	if(event.which == '27'){
    		$form_modal.removeClass('is-visible');
	    }
    });

	// переключання від вкладки до вкладки
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();

    // вибір вкладки
    if($(event.target).is($tab_login)){
      login_selected();
    }
    else if($(event.target).is($tab_signup)){
      signup_selected();
    }
    else{
      forgot_password_selected();
    }
	});

	// сховати чи показати пароль
	$('.hide-password').on('click', function(){
		var $this = $(this),
			$password_field = $this.prev('input');

		('password' == $password_field.attr('type')) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		('Сховати' == $this.text()) ? $this.text('Показати') : $this.text('Сховати');

		// фокус і переміщення курсора в кінець поля вводу
		$password_field.putCursorAtEnd();
	});

  // функції, які відповідають за певний вигляд вікон
	function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
    $tab_reset_password.removeClass('selected');
	}
	function signup_selected(){
    $form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
    $tab_reset_password.removeClass('selected');
	}
	function forgot_password_selected(){
    $form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.removeClass('selected');
    $tab_reset_password.addClass('selected');
	}
});
