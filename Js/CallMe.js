document.querySelectorAll(".CallUs").forEach(function (button) {
  button.addEventListener("click", function () {
    generateCallForm(); // Генерируем форму без названия курса
    document.body.classList.add("modal-open"); // Добавляем класс к body
  });
});

function generateCallForm() {
  var formHTML = document.createElement("div");
  formHTML.innerHTML = `
  <div class="modal">
  <span class="close-button">×</span>
  <div class="form-box">
      <form action="php/CallMe.php" method="post" class="styled-form">
          <h3 class="form-title">Перезвоните нам</h3>
          <div class="form-group">
              <label for="name" class="form-label">Ваше имя</label>
              <input type="text" name="name" class="form-input">
          </div>
          <div class="form-group">
              <label for="phone" class="form-label">Ваш номер телефона</label>
              <input type="number" name="phone" class="form-input">
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
}
