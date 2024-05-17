document.querySelectorAll(".Question").forEach(function (button) {
    button.addEventListener("click", function () {
      this.nextElementSibling.classList.toggle('show'); // Показываем или скрываем ответ
      this.querySelector('.icon').textContent = this.nextElementSibling.classList.contains('show') ? '-' : '+'; // Меняем текст иконки
    });
  });
  



//   window.onload = function() {
//     document.querySelectorAll(".Question").forEach(function (button) {
//         button.addEventListener("click", function () {
//             this.nextElementSibling.classList.toggle('show'); // Показываем или скрываем ответ
//             this.querySelector('.icon').textContent = this.nextElementSibling.classList.contains('show') ? '-' : '+'; // Меняем текст иконки
//         });
//     });
// }
