<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,500&display=swap" rel="stylesheet">

    <title>Регистрация</title>
  </head>
  <body>
  <?php include("header.php") ?>

    <section class="registration center">
      <p class="reg__title">Регистрация</p>

      <form class="reg__form" action="regDB.php" method="POST" novalidate>
        <div class="form__item">
          <div class="form__item">
            <label for="" class="form__item_label"
              >Введите номер телефона</label
            >
            <input
              type="text"
              class="form__item_inputs"
              name="telephone"
              pattern="[0-9-]+"
              placeholder="telephone"
              required
            />
            <div class="form__item_error hidden"></div>
          </div>

        <div class="form__item">
          <label for="" class="form__item_label">Введите имя</label>
          <input
            type="text"
            class="form__item_inputs"
            name="name"
            pattern="[а-яА-ЯЁё-]+"
            placeholder="Иван"
            required
          />
          <div class="form__item_error hidden"></div>
        </div>

        <div class="form__item">
          <label for="" class="form__item_label">Введите фамилию</label>
          <input
            type="text"
            class="form__item_inputs"
            name="surname"
            pattern="[а-яА-яЁё-]+"
            placeholder="Иванов"
            required
          />
          <div class="form__item_error hidden"></div>
        </div>

        <div class="form__item">
          <label for="" class="form__item_label">Введите пароль</label>
          <input
            type="password"
            minlength="6"
            class="form__item_inputs password"
            name="password"
            placeholder="password"
            required
          />
          <div class="form__item_error hidden repeat_error"></div>
        </div>

        <div class="form__item">
          <label for="" class="form__item_label">Повторите пароль</label>
          <input
            type="password_repeat"
            minlength="6"
            class="form__item_inputs password_repeat"
            name="password_repeat"
            placeholder="password"
            required
          />
          <div class="form__item_error hidden repeat_error"></div>
        </div>

        <div class="form__item">
          <div class="form__item_checkbox">
            <input
              type="checkbox"
              id="chechbox"
              class="form__item_inputs chechbox"
              name="checkbox"
              required
            />
            <label for="chechbox" class="form__item_label"
              >Я согласен с правилами регистрации</label
            >
          </div>
          <div class="form__item_error hidden"></div>
        </div>

        <button class="form__button">Зарегистрироваться</button>
      </form>
    </section>

    <?php include("footer.php") ?>
    <script src="./js/validation.js"></script>
  </body>
</html>
