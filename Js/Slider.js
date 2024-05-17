document.addEventListener("DOMContentLoaded", function () {
  // Запрашиваем данные из PHP-файла
  fetch("php/Slider.php")
    .then((response) => {
      // Если запрос не успешен, выбрасываем ошибку
      if (!response.ok) {
        throw new Error("HTTP error " + response.status);
      }
      // Возвращаем данные в формате JSON
      return response.json();
    })
    .then((data) => {
      // Инициализируем переменную allCardsData полученными данными
      var allCardsData = data;

      // Если в данных есть ошибка, выводим ее в консоль и прекращаем выполнение функции
      if (allCardsData.error) {
        console.error("Error from PHP file: " + allCardsData.error);
        return;
      }

      // Функция для генерации карточки
      function generateCard(data) {
        // Создаем элемент div
        var card = document.createElement("div");
        // Добавляем класс slider-card
        card.classList.add("slider-card");
        // Если карточка активна, добавляем класс slider-card
        if (data.isActive) {
          card.classList.add("slider-card");
        } else {
          // Если карточка неактивна, добавляем класс dimmed
          card.classList.add("dimmed");
        }
        // Заполняем карточку данными
        card.innerHTML = `
              <img src="${data.imgSrc}" alt="">
              <h3 data-course="${data.title}">${data.title}</h3>
              <p>${data.price} руб</p>
              <ul class="">
              <li>Холст: ${data.CanvasSize}</li>
              <li>Техника: ${data.Technique}</li>
              <li>Продолжительность: ${data.Duration} </li>
              <li>Группа до: ${data.Persons}</li>
              <li>Материалы входят в стоимость</li>
          </ul>
              <button class="Record2">Записаться</button>
          `;
        // Возвращаем готовую карточку
        return card;
      }
      // Устанавливаем активной карточку с индексом 1
      allCardsData[1].isActive = true;
      // Генерируем HTML для всех карточек и добавляем их в слайдер
      allCardsData.forEach(function (cardData) {
        var card = generateCard(cardData);
        document.querySelector(".Slider-container").appendChild(card);
      });

      // Устанавливаем индекс текущей активной карточки
      let currentIndex = 1;
      // Получаем все карточки
      var cards = document.querySelectorAll(".slider-card");

      // Функция для скрытия неактивных карточек
      function hideInactiveCards() {
        for (var i = 0; i < cards.length; i++) {
          // Если карточка активна или является соседней для активной, показываем ее
          if (
            i === currentIndex ||
            i === (currentIndex - 1 + cards.length) % cards.length ||
            i === (currentIndex + 1) % cards.length
          ) {
            cards[i].classList.remove("hidden"); // Удаляем класс hidden
            cards[i].classList.remove("dimmed");
            if (i === currentIndex) {
              // Если карточка активна, добавляем класс slider-card
              cards[i].classList.add("slider-card");
            } else {
              // Если карточка неактивна, добавляем класс dimmed
              cards[i].classList.add("slider-card");
              cards[i].classList.add("dimmed");
            }
          } else {
            // Если карточка скрыта, добавляем класс hidden
            cards[i].classList.add("hidden");
            cards[i].classList.remove("slider-card");
            cards[i].classList.remove("dimmed");
          }
        }
      }

      // Создаем элементы img для стрелок
      var leftArrow = document.createElement("img");
      leftArrow.src = "img/arrow-left.svg";
      var rightArrow = document.createElement("img");
      rightArrow.src = "img/arrow-rigth.svg";

      // Получаем кнопки слайдера
      var leftButton = document.querySelector("#slider-button-left");
      var rightButton = document.querySelector("#slider-button-right");

      // Добавляем стрелки в кнопки, если они существуют
      if (leftButton) {
        leftButton.appendChild(leftArrow);
      }

      if (rightButton) {
        rightButton.appendChild(rightArrow);
      }

      // При переключении слайдера скрываем старую активную карточку и показываем новую с задержкой
      document
        .querySelector("#slider-button-left")
        .addEventListener("click", function () {
          // Уменьшаем индекс на 1
          currentIndex = (currentIndex - 1 + cards.length) % cards.length;
          setTimeout(hideInactiveCards, 200); // Добавляем задержку перед обновлением карточек
        });

      document
        .querySelector("#slider-button-right")
        .addEventListener("click", function () {
          // Увеличиваем индекс на 1
          currentIndex = (currentIndex + 1) % cards.length;
          setTimeout(hideInactiveCards, 200); // Добавляем задержку перед обновлением карточек
        });

      // При загрузке страницы скрываем все карточки, кроме активной и двух соседних
      hideInactiveCards();
    })
    .catch((error) => {
      // Выводим ошибку в консоль, если она возникла
      console.error("Error:", error);
    });
});
