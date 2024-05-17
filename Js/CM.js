document.addEventListener("click", function (event) {
  if (event.target.matches(".Record2")) {
    var courseName = event.target.parentElement
      .querySelector("h3")
      .getAttribute("data-course"); // Получаем название курса
    generateClassForm(courseName); // Генерируем форму с этим названием курса
    document.body.classList.add("modal-open"); // Добавляем класс к body
  }
});
function generateClassForm(courseName) {
  var formHTML = document.createElement("div");
  formHTML.innerHTML = `
  <div class="modal">
  <span class="close-button">×</span>
  <div class="form-box">
      <form id="classForm" action="php/CM.php" method="post" class="styled-form">
          <h3 class="form-title">${courseName}</h3>
          <div class="form-group">
              <label for="name" class="form-label">Ваше имя</label>
              <input type="text" name="name" class="form-input">
          </div>
          <div class="form-group">
              <label for="phone" class="form-label">Ваш номер телефона</label>
              <input type="number" name="phone" class="form-input">
          </div>
          <div class="form-group">
              <textarea rows="10" cols="30" name="comment" class="form-textarea"></textarea>
          </div>
          <input type="hidden" name="choice" value="${courseName}">
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
  document
    .querySelector("#classForm")
    .addEventListener("submit", function (event) {
      event.preventDefault(); // Предотвращаем перезагрузку страницы

      var formData = new FormData(this); // Создаем объект FormData из формы

      // Отправляем данные формы на сервер с помощью AJAX
      fetch("php/CM.php", {
        // Указываем URL обработчика для курсов и мастер-классов
        method: this.method,
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert(data); // Показываем сообщение об ошибке
        });
    });
}
