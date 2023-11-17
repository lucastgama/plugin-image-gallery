jQuery(function ($) {
  let carousels = $(".carousel-container");

  carousels.each(function (i, carousel) {
    let slideOptionString = $(carousel).find(".slide-option");
    let carouselItems = $(carousel).find(".carousel-item");

    let slideOption = JSON.parse(slideOptionString.val());

    let currentIndex = 0;
    let totalItems = carouselItems.length;
    let slideNavigation = slideOption.slide_navigation ? true : false;
    let showPagination = slideOption.slide_show_pagination ? true : false;
    let autoPlay = true;
    let stopOnHover = slideOption.slide_stop_on_hover ? true : false;
    let slideDuration = slideOption.slide_duration
      ? slideOption.slide_duration * 1000
      : 2000;
    let slideAmount = slideOption.slide_amount ? slideOption.slide_amount : 1;

    // Set the flex property for each carousel item
    carouselItems.css("flex", `0 0 ${100 / slideAmount}%`);

    if (slideNavigation) {
      $(carousel).append(
        '<button class="prev-btn">&lt;</button><button class="next-btn">&gt;</button>'
      );
    }

    if (showPagination) {
      var paginationDots = "";
      for (var i = 0; i < Math.ceil(totalItems / slideAmount); i++) {
        console.log(Math.ceil(totalItems / slideAmount));
        paginationDots +=
          '<div class="pagination-dot" data-index="' + i + '"></div>';
      }
      $(carousel).find(".pagination").html(paginationDots);
    }

    $(carousel)
      .find(".pagination-dot")
      .on("click", function () {
        currentIndex = $(this).data("index");
        updateCarousel();
      });

    $(carousel)
      .find(".next-btn")
      .on("click", function (e) {
        e.preventDefault();
        if (currentIndex < totalItems - 1 * slideAmount) {
          currentIndex++;
        } else {
          currentIndex = 0;
        }
        updateCarousel();
      });

    $(carousel)
      .find(".prev-btn")
      .on("click", function (e) {
        e.preventDefault();
        if (currentIndex > 0) {
          currentIndex--;
        } else {
          currentIndex = totalItems - 1 * slideAmount;
        }
        updateCarousel();
      });

    let autoPlayInterval;
    if (autoPlay) {
      autoPlayInterval = setInterval(function () {
        if (currentIndex < totalItems - 1 * slideAmount) {
          currentIndex++;
        } else {
          currentIndex = 0;
        }
        updateCarousel();
      }, slideDuration);
    }

    if (stopOnHover) {
      $(carousel)
        .on("mouseenter", function () {
          clearInterval(autoPlayInterval);
        })
        .on("mouseleave", function () {
          if (autoPlay) {
            autoPlayInterval = setInterval(function () {
              if (currentIndex < totalItems - slideAmount) {
                currentIndex += slideAmount;
              } else {
                currentIndex = 0;
              }
              updateCarousel();
            }, slideDuration);
          }
        });
    }

    function updateCarousel() {
      var newTransformValue = -currentIndex * (100 / slideAmount) + "%";
      $(carousel)
        .find(".carousel")
        .css("transform", "translateX(" + newTransformValue + ")");

      $(carousel).find(".pagination-dot").removeClass("active");
      $(carousel)
        .find('.pagination-dot[data-index="' + currentIndex + '"]')
        .addClass("active");
    }
  });
});
