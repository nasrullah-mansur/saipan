$(document).ready(function () {
  "use strict";

  $('.header .main-menu .main-menu-content .mobile').on('click', function() {
    $('.header .main-menu .main-menu-content .list').slideToggle(250);
  })

  $(".slider-area").on("init", function () {
      $(".slider-area .slick-active .slider-content").addClass("active");
      $(".slider-area .slick-active .slider-content h2, .slider-area .slick-active .slider-content p, .slider-area .slick-active .slider-content a").addClass("animated fadeInUp");
  });

  $(".slider-area").on("beforeChange", function () {
      $(".slider-area .slick-active .slider-content h2, .slider-area .slick-active .slider-content p, .slider-area .slick-active .slider-content a").removeClass("animated fadeInUp");
      $(".slider-area .slick-active .slider-content").removeClass("active");

      setTimeout(() => {
          $(".slider-area .slick-active .slider-content").addClass("active");
          $(".slider-area .slick-active .slider-content h2, .slider-area .slick-active .slider-content p, .slider-area .slick-active .slider-content a").addClass("animated fadeInUp");
      }, 500);
  });

  $(".slider-area").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
  });

  $(".review-slide").slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        }
      ]
  });

  // Date time picker;
  $(".saipan-select").select2({
      placeholder: "Select saipan",
      width: "100%",
  });

  $(".taxi-pickup").select2({
      placeholder: "Pick-up location",
      width: "100%",
  });

  $(".taxi-drop").select2({
      placeholder: "Drop-off location",
      width: "100%",
  });

  $(".taxi-select").select2({
      placeholder: "Select Taxi",
      width: "100%",
  });

  $(".date_time").datetimepicker();
  $(".date").datetimepicker({
    timepicker: false,
  });

  new WOW().init();

  $('.checkbox-area').on('click', 'label', function() {
    let inputElem = $(this).prev();
    let checkChecked = inputElem.is(":checked");
    if(checkChecked) {
      inputElem.prop("checked", false);
    } else {
      inputElem.prop("checked", true);
    }
  })

  // Taxi modal customize;
  $('.taxi-item').on('click', function() {
    let id = $(this).attr('data-id');
    let title = $(this).attr('data-title');
    $('#taxiModalTitle').html(title);
    $('#taxiItemId').val(id);
  })

  // Saipan modal customize;
  $('.saipan-item').on('click', function() {
    let id = $(this).attr('data-id');
    let title = $(this).attr('data-title');
    $('#saipanModalTitle').html(title);
    $('#saipanItemId').val(id);
  })

  if($('.my-image-links').length > 0) {
    new VenoBox({
      selector: ".my-image-links"
  })
  }

});
