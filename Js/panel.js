document.querySelectorAll(".change-status").forEach(function (link) {
  link.addEventListener("click", function (event) {
    event.preventDefault(); // Предотвращаем переход по ссылке

    var userId = this.dataset.userId; // Получаем ID пользователя

    fetch(this.href) // Отправляем запрос на сервер
      .then((response) => response.json())
      .then((data) => {
        alert(data.message); // Показываем сообщение об ошибке

        // Обновляем текст ссылки и статус пользователя
        if (data.message === "Статус пользователя успешно обновлен") {
          var statusElement = document.querySelector("#user-status-" + userId);
          var newStatus =
            statusElement.textContent === "admin" ? "user" : "admin";
          statusElement.textContent = newStatus;
          link.textContent =
            newStatus === "admin"
              ? "Лишить права администратора"
              : "Дать доступ";
        }
      });
  });
});
