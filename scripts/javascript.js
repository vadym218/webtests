var questions = ['1', '2.1', '2.2', '2.3', '2.4', '3', '4', '5.1', '5.2', '5.3', '5.4'], answers = ['2', '4', '3', '2', '1', '1', '2', '4', '1', '3', '2'], can_open;

$(function() {
  $('body').fadeIn(500);
  $('#check b:last-child').html(questions.length);

  $(window).scroll(function() {
    if($(window).width() > 712 && $(window).scrollTop() > 150) $('nav').hide(); else $('nav').show();
  });

  function info(type, title, description){
    $('#alert_header h3').html(title);
    $('#alert_footer p').html(description);
    switch(type){
      case 0: $('#alert_header').css('background-color', '#2E4053'); break;
      case 1: $('#alert_header').css('background-color', '#C0392B'); break;
      case 2: $('#alert_header').css('background-color', '#1E8449'); break;
      default: break;
    }
    if($('#login, #registration').is(":visible")) $('#alert').css('top', 14 + 'px'); else $('#alert').css('top', 60 + 'px');
    $('#login, #registration').animate({ top: '162px' });
    $('#alert').fadeIn();
  }

  function info_hide(){
    $('#alert').fadeOut();
    $('#login, #registration').animate({ top: window.innerHeight*.22 - 50 + 'px' }, function(){ $('#login, #registration').css('top', 'calc(22% - 50px)'); });
  }

  $('#alert_confirm').click(function(){ info_hide(); });

  $('#login_form').submit(function(e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '/php/login.php',
      data: $(this).serialize(),
    }).done(function(result){
      switch(Number(result)){
        case 0: info(1, 'Не варто змінювати код сторінки', 'перезавантажте сторінку'); break;
        case 1: info(1, 'Введені пошта чи пароль невірні', 'спробуйте ще раз'); $('#login_form input[name="password"]').val('').addClass('error'); break;
        case 2: $('#login_form')[0].reset(); $('#login_form input').removeClass('error'); $('#login').slideUp(); $('body').fadeOut(500, function(){ location.reload(); }); break;
        default: info(1, 'Виникла помилка при авторизації', ' спробуйте перезавантажити сторінку');
      }
    });
  });

  $('#registration_form').submit(function(e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '/php/registration.php',
      data: $(this).serialize(),
    }).done(function(result){
      switch(Number(result)){
        case 0: info(1, 'Не варто змінювати код сторінки', 'перезавантажте сторінку'); break;
        case 1: info(1, 'Введена пошта вже використовується', 'введіть іншу пошту'); $('#registration_form input').removeClass('error'); $('#registration_form input[name="email"]').val('').addClass('error'); break;
        case 2: info(1, 'Введені паролі не співпадають', 'спробуйте ще раз'); $('#registration_form input').removeClass('error'); $('#registration_form input[name="password"],[name="confirm_password"]').val('').addClass('error'); break;
        case 3: popup_hide('#autorisation'); info(2, 'Реєстрація пройшла успішно!', 'тепер ви можете авторизуватись'); $('#alert').animate({ top: '60px' }); break;
        default: info(1, 'Виникла помилка при реєстрації', ' спробуйте перезавантажити сторінку');
      }
    });
  });

  $('#logout').click(function(){
    $.ajax({ url: '/php/logout.php' }).done(function(){ $('body').fadeOut(500, function(){ location.reload(); }); });
  });

  $('#registration input, #login input').keydown(function(e){
    return e.which !== 32;
  });

  $(window).keyup(function(e){
    if(e.keyCode === 27){
      popup_hide('#autorisation');
    }
  });

  $('#auth_login').click(function(){
    if(can_open){
      $('#login').slideDown();
      $('#autorisation').fadeOut();
    }
  });

  $('#auth_registration').click(function(){
    if(can_open){
      $('#registration').slideDown();
      $('#autorisation').fadeOut();
    }
  });

  $('#user > button').click(function(){
    $('#user ul').slideToggle();
  });

  function popup_hide(open){
    can_open = false;
    $('#login, #registration').slideUp(function(){ can_open = true; $('#login_form')[0].reset(); $('#registration_form')[0].reset(); $('#login_form input, #registration_form input').removeClass('error'); });
    $(open).fadeIn();
  }

  $(window).mousedown(function(e){
    if(!$('#login, #registration, #alert').is(e.target) && $('#login, #registration, #alert').has(e.target).length === 0){ popup_hide('#autorisation'); info_hide(); }
    if(!$('#user').is(e.target) && $('#user').has(e.target).length === 0) $('#user ul').slideUp();
  });

  $('#check').click(function(){
    var c = 0;
    for(var q = 0; q < questions.length; q++){
      var test = document.getElementsByName(questions[q]);
      for(var a = 0; a < test.length; a++){
        if(test[a].checked && test[a].value==answers[q]) c++;
      }
    }
    $('#check b:first-child').html(c);
    $('#check b:last-child').html(questions.length);
    if(c < 5 && c != 0) $('#check span').html('ня'); else $('#check span').html('ь');
  });
});
