document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".Enter").forEach(function (button) {
    button.addEventListener("click", function () {
      generateForm("register"); // Генерируем форму регистрации
      document.body.classList.add("modal-open"); // Добавляем класс к body
    });
  });

  function onRegistrationSuccess() {
    document.querySelector('.switch-form[data-form="login"]').click();
    alert("Регистрация прошла успешно");
  }

  function onRegistrationFormSubmit(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Создаем объект FormData из вашей формы
    var formData = new FormData(event.target);
    // Проверяем валидность формы
    if (!validateForm(event.target)) {
      return; // Если форма не валидна, прекращаем выполнение функции
    }

    fetch("php/reg-script.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json()) // Предполагаем, что ваш PHP скрипт возвращает JSON
      .then((data) => {
        if (data.success) {
          // Предполагаем, что ваш PHP скрипт возвращает объект с полем success
          onRegistrationSuccess(); // Вызываем функцию при успешной регистрации
          alert(data.message); // Отображаем сообщение об успешной регистрации
        } else {
          alert(data.message); // Отображаем сообщение об ошибке
        }
      });
  }

  function generateForm(formType) {
    // Удаляем старую форму, если она существует
    var oldForm = document.querySelector(".modal");
    if (oldForm) {
      oldForm.remove();
    }

    var formHTML = document.createElement("div");
    if (formType === "register") {
      formHTML.innerHTML = `
        <div class="modal">
            <span class="close-button">×</span>
            <div class="form-box">
                <form class="reg_auth_forms" action="php/reg-script.php" method="post" onsubmit="return validateForm(this)">
                <label class="reg_auth_label" for="Login">Login</label>
                <input class="reg_auth_input" type="text" name="Login" required>
                <label class="reg_auth_label" for="Password">Password</label>
                <input class="reg_auth_input" type="password" name="Password" required minlength="4">
                <label class="reg_auth_label" for="FIO">FIO</label>
                <input class="reg_auth_input" type="text" name="FIO" required>
                <label class="reg_auth_label" for="Phone">Phone</label>
                <input class="reg_auth_input" type="tel" name="Phone" required>
                <label class="reg_auth_label" for="Email">Email</label>
                <input class="reg_auth_input" type="email" name="Email" required>
                <button type="submit" class="reg_auth_button">Зарегестрироваться</button>
                <button type="button" class="switch-form" data-form="login">Уже есть аккаунт? Войдите</button>
                </form>
            </div>
        </div>`;
    } else if (formType === "login") {
      formHTML.innerHTML = `
        <div class="modal">
            <span class="close-button">×</span>
            <div class="form-box">
                <form class="reg_auth_forms" action="php/auth-script.php" method="post" onsubmit="return validateForm(this)">
                    <label class="reg_auth_label" for="Login">Login</label>
                    <input class="reg_auth_input" type="text" name="login" required>
                    <label class="reg_auth_label" for="Password">Password</label>
                    <input class="reg_auth_input" type="password" name="pass" required minlength="4">
                    <button type="submit" class="reg_auth_button">Войти</button>
                    <button type="button" class="switch-form" data-form="register">Нет аккаунта? Создайте</button>
                </form>
            </div>
        </div>`;
    }
    // Вставляем сгенерированный HTML в body
    document.body.appendChild(formHTML);

    // Добавляем обработчик событий для кнопки закрытия
    document
      .querySelector(".close-button")
      .addEventListener("click", function () {
        document.querySelector(".modal").remove();
        document.body.classList.remove("modal-open");
      });

    // Добавляем обработчик событий для кнопки переключения формы
    document
      .querySelector(".switch-form")
      .addEventListener("click", function () {
        var form = this.getAttribute("data-form");
        generateForm(form);
      });

    // Добавляем обработчик событий для формы регистрации
    if (formType === "register") {
      document
        .querySelector(".reg_auth_forms")
        .addEventListener("submit", onRegistrationFormSubmit);
    }
  }
});

function validateForm(form) {
  // Здесь вы можете добавить проверку ввода пользователя
  // Например, проверить, что введенный логин соответствует шаблону \w+
  var login = form.elements["Login"].value;
  if (!/\w+/.test(login)) {
    alert("Неверный формат логина");
    return false;
  }
  // Проверка пароля
  var password = form.elements["Password"].value;
  if (password.length < 4) {
    alert("Пароль должен содержать не менее 4 символов");
    return false;
  }
  // Проверка ФИО
  var fio = form.elements["FIO"].value;
  if (!/^[а-яА-ЯёЁ\s]+$/.test(fio)) {
    alert("ФИО должно содержать только кириллицу");
    return false;
  }
  
  // Проверка телефона
  var phone = form.elements["Phone"].value;
  if (!/\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}/.test(phone)) {
    alert("Неверный формат телефона");
    return false;
  }
  // Проверка email
  var email = form.elements["Email"].value;
  var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (!emailRegex.test(email)) {
    alert("Неверный формат email");
    return false;
  }
  
  // Добавьте здесь другие проверки, если они нужны
  return true;
}
