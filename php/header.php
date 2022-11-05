<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ua' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='description' content='Перевірте свої знання зі шкільних предметів!'>
    <meta name='keywords' content='тест тести тестування перевірка контроль знань онлайн ЗНО екзамен самостійна контрольна підготовка'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="theme-color" content="#336633">
    <title>Онлайн тестування</title>
    <link rel='icon' href='/images/test-icon.ico' type='image/icon'>
    <link rel='stylesheet' href='/css/style.css' type='text/css'>
    <link rel='stylesheet' href='/fonts/CenturyGothic/centurygothic.css' type='text/css'>
    <script type='text/javascript' src='/scripts/jquery-3.3.1.min.js'></script>
    <script type='text/javascript' src='/scripts/javascript.js'></script>
  </head>
  <body>
    <header>
      <div class='container'>
        <img src='/images/test-icon.ico' alt='logo'>
        <h1>Онлайн тестування</h1>
        <div id='account'>
        <?php if(!isset($_SESSION['id'])){ ?>
          <div id='autorisation'><button id='auth_login'>Увійти</button><span class='glow'></span><button id='auth_registration'>Заре'єструватись</button></div>
        <?php } else{ ?>
          <div id='user'>
            <button><img src='/images/new-user.svg' alt='avatar'><span><?php echo $_SESSION['last_name'], ' ', $_SESSION['first_name']; ?></span></button>
            <ul>
              <li><button>Профіль</button></li>
              <li><button>Мої тести</button></li>
              <li><button>Налаштування</button></li>
              <li><button id='logout'>Вийти</button></li>
            </ul>
          </div>
        <?php } ?>
        </div>
      </div>
      <div id='alert'>
        <div id='alert_header'><h3></h3></div>
        <div id='alert_footer'><p></p><button id='alert_confirm'>Ok</button></div>
      </div>
      <div id='login'>
        <h2>Вхід</h2>
          <div class='container'>
            <form id='login_form' action='/php/login.php' method='post'>
              <div>
                <input name='email' type='email' placeholder='E-mail' minlength='3' maxlength='32' required>
                <input name='password' type='password' placeholder='Пароль' pattern='[a-zA-Z\d@#$%]+' title='Використовуйте лише латинські літери, цифри та спец.символи' minlength='6' maxlength='32' required>
              </div>
              <input type='submit' value='Увійти'>
            </form>
          </div>
        </div>
      </div>
      <div id='registration'>
        <h2>Реєстрація</h2>
          <div class='container'>
            <form id='registration_form' action='/php/registration.php' method='post'>
              <input name='last_name' type='text' placeholder='Прізвище' pattern='[a-zA-Zа-яА-ЯіїІЇ]+' title='Використовуйте лише букви' maxlength='24' required>
              <input name='first_name' type='text' placeholder="Ім'я" pattern='[a-zA-Zа-яА-ЯіїІЇ]+' title='Використовуйте лише букви' maxlength='16' required>
              <input name='email' type='text' placeholder='E-mail' minlength='3' maxlength='32' required>
              <input name='password' type='password' placeholder='Пароль' pattern='[a-zA-Z\d@#$%]+' title='Використовуйте лише латинські літери, цифри та спец.символи' minlength='6' maxlength='24' required>
              <input name='confirm_password' type='password' placeholder='Повторіть пароль' pattern='[a-zA-Z\d@#$%]+' title='Використовуйте лише латинські літери, цифри та спец.символи' minlength='6' maxlength='24' required>
              <input type='submit' value="Заре'струватись">
            </form>
          </div>
        </div>
      </div>
    </header>
    <main>
      <nav>
        <ul>
          <li><button>Математика</button>
            <ul>
              <li><button>9 Клас</button></li>
              <li><button>8 Клас</button></li>
              <li><button>7 Клас</button></li>
            </ul>
          </li>

          <li><button>Фізика</button>
            <ul>
              <li><button>9 Клас</button></li>
              <li><button>8 Клас</button></li>
              <li><button>7 Клас</button></li>
            </ul>
          </li>

          <li><button>Історія</button>
            <ul>
              <li><button>9 Клас</button></li>
              <li><button>8 Клас</button></li>
              <li><button>7 Клас</button></li>
            </ul>
          </li>

          <li><button>Укр. літ.</button>
            <ul>
              <li><button>9 Клас</button></li>
              <li><button>8 Клас</button></li>
              <li><button>7 Клас</button></li>
            </ul>
          </li>

          <li><button>Біологія</button>
            <ul>
              <li><button>9 Клас</button></li>
              <li><button>8 Клас</button></li>
              <li><button>7 Клас</button></li>
            </ul>
          </li>

          <li><button>Програмування</button>
            <ul>
              <li><button>9 Клас</button>
                <ul>
                  <li><a href='javascript:void(0)'>ДПА</a></li>
                  <li><a href='javascript:void(0)'>Pascal</a></li>
                  <li><a href='javascript:void(0)'>Python</a></li>
                </ul></li>
              <li><button>8 Клас</button>
                <ul>
                  <li><a href='javascript:void(0)'>Excel</a></li>
                  <li><a href='javascript:void(0)'>Access</a></li>
                  <li><a href='javascript:void(0)'>Basic</a></li>
                </ul></li>
              <li><button>7 Клас</button>
                <ul>
                  <li><a href='javascript:void(0)'>Scratch</a></li>
                  <li><a href='javascript:void(0)'>Word</a></li>
                  <li><a href='javascript:void(0)'>PowerPoint</a></li>
                </ul></li>
            </ul>
          </li>
        </ul>
      </nav>
