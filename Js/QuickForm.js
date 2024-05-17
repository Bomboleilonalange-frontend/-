document.querySelectorAll(".Record").forEach(function (button) {
  button.addEventListener("click", function () {
    generateQuickForm(); // Генерируем форму без названия курса
    document.body.classList.add("modal-open"); // Добавляем класс к body
  });
});

function generateQuickForm() {
  var formHTML = document.createElement("div");
  formHTML.innerHTML = `
  <div class="modal">
  <span class="close-button">×</span>
  <div class="form-box">
      <form id="quickForm" action="php/QuickForm.php" method="post" class="styled-form">
          <h2 class="form-title">Заголовок</h2>
          <div class="form-group">
              <label for="name" class="form-label">Ваше имя</label>
              <input type="text" id="name" name="name" class="form-input">
          </div>
          <div class="form-group">
              <label for="phone" class="form-label">Ваш номер телефона</label>
              <input type="number" id="phone" name="phone" class="form-input">
          </div>
          <div class="form-group">
              <label for="course" class="form-label">Выберите курс или мастер класс</label>
              <select id="choice" name="choice" class="form-select">
                  <option value="вариант1">Вариант 1</option>
                  <option value="вариант2">Вариант 2</option>
                  <option value="вариант3">Вариант 3</option>
              </select>
          </div>
          <div class="form-group">
              <textarea id="comment" name="comment" rows="10" cols="30" class="form-textarea"></textarea>
          </div>
          <input type="submit" value="Отправить" class="form-submit">
      </form>
  </div>
</div>`;

  // Вставляем сгенерированный HTML в body
  document.body.appendChild(formHTML);

  // Добавляем обработчик событий для кнопки закрытия
  document
    .querySelector(".close-button")
    .addEventListener("click", function () {
      document.querySelector(".modal").remove();
      document.body.classList.remove("modal-open");
    });

  // Добавляем обработчик событий для формы
  // Для формы быстрой записи
  document
    .querySelector("#quickForm")
    .addEventListener("submit", function (event) {
      event.preventDefault(); // Предотвращаем перезагрузку страницы

      var formData = new FormData(this); // Создаем объект FormData из формы

      // Отправляем данные формы на сервер с помощью AJAX
      fetch("php/QuickForm.php", {
        // Указываем URL обработчика для быстрой записи
        method: this.method,
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert(data); // Показываем сообщение об ошибке
        });
    });
}
