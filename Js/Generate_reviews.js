document.addEventListener("DOMContentLoaded", function () {
  function loadReviews() {
    fetch("php/get_reviews.php")
      .then((response) => response.json())
      .then((reviews) => {
        // Очищаем контейнер отзывов перед добавлением новых
        document.getElementById("reviews-container").innerHTML = '';
        reviews.forEach((review) => {
          addReview(
            review.Avatar,
            review.Login,
            review.Text,
            review.Id,
            review.status === "admin"
          );
        });
      })
      .catch((error) => console.error("Error:", error));
  }

  function addReview(userAvatar, userName, reviewText, reviewId) {
    var reviewElement = document.createElement("div");
    reviewElement.innerHTML = `
            <div class="review" data-review-id="${reviewId}">
              <img src="${userAvatar}" alt="${userName}'s avatar" class="avatar">
              <div>
              <h4 class="username">${userName}</h4>
              <span class="review-text">${reviewText}</span>
              </div>
              <button class="delete-review">Удалить</button>
            </div>
          `;
    document.getElementById("reviews-container").appendChild(reviewElement);
  }

  function onReviewFormSubmit(event) {
    event.preventDefault();
    var formData = new FormData(event.target);

    fetch("php/reviews.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        if (data.success) {
          alert(data.message);
          loadReviews();
        } else {
          alert(data.message);
        }
      })
      .catch((error) => {
        console.error(
          "There has been a problem with your fetch operation:",
          error
        );
      });
  }

  document
    .getElementById("reviews-container")
    .addEventListener("click", function (event) {
      if (event.target.classList.contains("delete-review")) {
        var reviewElement = event.target.parentElement;
        var reviewId = reviewElement.dataset.reviewId;

        fetch("php/delete_review.php?review_id=" + reviewId)
          .then((response) => response.json())
          .then((data) => {
            alert(data.message);
            if (data.success) {
              reviewElement.remove();
            }
          })
          .catch((error) => console.error("Error:", error));
      }
    });

  window.onload = loadReviews;
  document
    .getElementById("review-form")
    .addEventListener("submit", onReviewFormSubmit);
});
