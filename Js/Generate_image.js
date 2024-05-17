document.addEventListener("DOMContentLoaded", function () {
  loadImages("student_works"); // Загружаем изображения для категории "Работы учеников"
});

document
  .querySelectorAll(".Photo-pagination button")
  .forEach(function (button) {
    button.addEventListener("click", function () {
      var category = this.getAttribute("data-category"); // Получаем категорию из атрибута кнопки
      loadImages(category); // Загружаем изображения для этой категории
    });
  });



  // function loadImages(category) {
  //   // Отправляем запрос на сервер для получения изображений
  //   fetch('php/GetImages.php?category=' + category)
  //     .then((response) => response.json())
  //     .then((images) => {
  //       var container = document.querySelector(".Photo-container");
  //       container.innerHTML = "";
  
  //       // Добавляем новые изображения в контейнер
  //       images.forEach((image) => {
  //         var button = document.createElement("button");
  //         button.className = "image-button"; // Добавляем класс
  //         button.dataset.category = category; // Добавляем категорию как атрибут data-category
  
  //         var img = document.createElement("img");
  //         img.src = image.url;
  //         img.alt = image.description;
  //         button.appendChild(img); // Вставляем изображение в кнопку
  //         container.appendChild(button);
  //       });
  
  //       // Добавляем обработчики событий к новым кнопкам
  //       addEventListeners(".image-button");
  //     });
  // }
  // function loadImages(category) {
  //   // Отправляем запрос на сервер для получения изображений
  //   fetch('php/GetImages.php?category=' + category)
  //     .then((response) => response.json())
  //     .then((images) => {
  //       var container = document.querySelector(".Photo-container");
  //       container.innerHTML = "";
    
  //       // Добавляем новые изображения в контейнер
  //       images.forEach((image, index) => { // Добавляем индекс в цикл forEach
  //         var button = document.createElement("button");
  //         button.className = "image-button"; // Добавляем класс
  //         button.dataset.category = category; // Добавляем категорию как атрибут data-category
  //         button.dataset.index = index; // Добавляем индекс как атрибут data-index
    
  //         var img = document.createElement("img");
  //         img.src = image.url;
  //         img.alt = image.description;
  //         button.appendChild(img); // Вставляем изображение в кнопку
  //         container.appendChild(button);
  //       });
    
  //       // Добавляем обработчики событий к новым кнопкам
  //       addEventListeners(".image-button");
  //     });
  // }
  function loadImages(category) {
    // Отправляем запрос на сервер для получения изображений
    fetch('php/GetImages.php?category=' + category)
      .then((response) => response.json())
      .then((images) => {
        var container = document.querySelector(".Photo-container");
        container.innerHTML = "";
    
        // Добавляем новые изображения в контейнер
        images.forEach((image, index) => { // Добавляем индекс в цикл forEach
          var button = document.createElement("button");
          button.className = "image-button"; // Добавляем класс
          button.dataset.category = category; // Добавляем категорию как атрибут data-category
          button.dataset.index = index; // Добавляем индекс как атрибут data-index
    
          var img = document.createElement("img");
          img.src = image.url;
          img.alt = image.description;
          button.appendChild(img); // Вставляем изображение в кнопку
          container.appendChild(button);
        });
    
        // Добавляем обработчики событий к новым кнопкам
        addEventListeners(".image-button");
      });
  }
  