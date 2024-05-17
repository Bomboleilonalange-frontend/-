document.addEventListener("DOMContentLoaded", function () {
  // Добавляем обработчики событий для кнопок
  addEventListeners(".View");
  addEventListeners(".Howtoget");
  addEventListeners(".image-button");
});

function addEventListeners(selector) {
  document.querySelectorAll(selector).forEach(function (button) {
    button.addEventListener("click", function () {
      var category = this.getAttribute("data-category"); // Получаем категорию из атрибута кнопки
      var index = this.getAttribute("data-index"); // Получаем индекс из атрибута кнопки
      console.log(index);
      generateLightbox(category, index); // Передаем индекс в функцию generateLightbox
      document.body.classList.add("modal-open");
    });
  });
}

function generateLightbox(category, index) {
  var lightboxHTML = document.createElement("div");
  lightboxHTML.innerHTML = `
        <div class="modal">
          <span class="close-button">×</span>
          <button class ="slider-button" id="prevButton"><img src="img/Стрелка_Левая.png" alt=""></button>
          <div class="lightbox-content">
            <!-- Здесь будут изображения для lightbox -->
          </div>
          <button class ="slider-button" id="nextButton"><img src="img/Стрелка_Правая.png" alt=""></button>
        </div>`;
  // Вставляем сгенерированный HTML в body
  document.body.appendChild(lightboxHTML);

  // Добавляем обработчик событий для кнопки закрытия
  document
    .querySelector(".close-button")
    .addEventListener("click", function () {
      document.querySelector(".modal").remove();
      document.body.classList.remove("modal-open");
    });
  // Загружаем изображения для выбранной категории
  if (category === "image-button") {
    var checkImagesLoaded = setInterval(function () {
      var images = document.querySelector(".Photo-container").children;
      console.log(images); // Выводим изображения в консоль
      if (images.length > 0) {
        clearInterval(checkImagesLoaded);
        loadImagesIntoLightbox(category, index);
      }
    }, 1000);
  } else {
    loadImagesFromDatabase(category);
  }
  // Загружаем изображения для выбранной категории
  // if (category === "image-button") {
  //   loadImagesIntoLightbox(category, index);
  // } else {
  //   loadImagesFromDatabase(category);
  // }
}

async function loadImagesIntoLightbox(category, index) {
  await new Promise((resolve) => setTimeout(resolve, 1000));
  // Получаем уже загруженные изображения из контейнера
  var images = document.querySelector(".Photo-container").children;

  // Добавляем изображения в lightbox
  var lightboxContent = document.querySelector(".lightbox-content");
  for (var i = 0; i < images.length; i++) {
    if (images[i].dataset.category === category) {
      var img = images[i].cloneNode(true);
      img.style.display = "none"; // Скрываем все изображения
      lightboxContent.appendChild(img);
    }
  }
  console.log(lightboxContent.children);

  var clickedImage = lightboxContent.children[index];
  console.log(clickedImage); 
  if (clickedImage) {
    clickedImage.style.display = "block";
  }
  
  // Добавляем обработчики событий для кнопок "вперед" и "назад"
  addSliderEventListeners();
}

function loadImagesFromDatabase(category) {
  // Отправляем запрос на сервер для получения изображений
  fetch("php/GetImages.php?category=" + category)
    .then((response) => response.json())
    .then((images) => {
      var lightboxContent = document.querySelector(".lightbox-content");
      lightboxContent.innerHTML = ""; // Очищаем содержимое lightbox
      // console.log(lightboxContent);
      // Добавляем новые изображения в lightbox
      images.forEach((image) => {
        var img = document.createElement("img");
        img.src = image.url;
        img.alt = image.description;
        img.style.display = "none"; // Скрываем все изображения
        lightboxContent.appendChild(img);
      });

      // Отображаем первое изображение
      if (lightboxContent.children.length > 0) {
        lightboxContent.children[0].style.display = "block";
      }

      // Добавляем обработчики событий для кнопок "вперед" и "назад"
      addSliderEventListeners();
    });
}

function addSliderEventListeners() {
  var prevButton = document.querySelector("#prevButton");
  var nextButton = document.querySelector("#nextButton");

  prevButton.addEventListener("click", function () {
    changeImage(-1); // Переключаемся на предыдущее изображение
  });

  nextButton.addEventListener("click", function () {
    changeImage(1); // Переключаемся на следующее изображение
  });
}

function changeImage(direction) {
  var lightboxContent = document.querySelector(".lightbox-content");
  var images = Array.from(lightboxContent.children);
  var currentIndex = images.findIndex(
    (image) => image.style.display === "block"
  );

  // Скрываем текущее изображение
  images[currentIndex].style.display = "none";

  // Вычисляем индекс следующего изображения
  var nextIndex = (currentIndex + direction + images.length) % images.length;

  // Отображаем следующее изображение
  images[nextIndex].style.display = "block";
}
