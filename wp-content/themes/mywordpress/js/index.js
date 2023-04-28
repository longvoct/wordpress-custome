// Thao tác với header
window.addEventListener("load", function () {
  var wpAdminBar = document.getElementById("wpadminbar");
  if (wpAdminBar) {
    // Nếu có #wpadminbar, đặt top cho header là 32px
    var header = document.querySelector(".header");
    header.style.top = "32px";
  } else {
    // Nếu không có #wpadminbar, đặt top cho header là 0
    var header = document.querySelector(".header");
    header.style.top = "0";
  }
});

//Slider men-product
$(document).ready(function () {
  $(".featured-products-list").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    autoplaySpeed: 1,
    // draggable: false,
    useTransform: true, // Sử dụng CSS3 transform
    cssEase: "linear", // Hiệu ứng chuyển động tuyến tính
    speed: 2000, // Tốc độ chuyển động (0.5 giây)
    swipeToSlide: true, // Cho phép vuốt để chuyển slide
  });
  slider.on("mouseenter", function () {
    slider.slick("slickSetOption", "autoplaySpeed", 5000, true);
    slider.slick("slickSetOption", "speed", 500, true);
  });

  slider.on("mouseleave", function () {
    slider.slick("slickSetOption", "autoplaySpeed", 2000, true);
    slider.slick("slickSetOption", "speed", 2000, true);
  });
});

$(document).ready(function () {
  $(".featured-products-list.two").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    autoplaySpeed: 1000,
    // draggable: false,
    useTransform: true, // Sử dụng CSS3 transform
    cssEase: "linear", // Hiệu ứng chuyển động tuyến tính
    speed: 2000, // Tốc độ chuyển động (0.5 giây)
    swipeToSlide: true, // Cho phép vuốt để chuyển slide
  });
  slider.on("mouseenter", function () {
    slider.slick("slickSetOption", "autoplaySpeed", 5000, true);
    slider.slick("slickSetOption", "speed", 500, true);
  });

  slider.on("mouseleave", function () {
    slider.slick("slickSetOption", "autoplaySpeed", 2000, true);
    slider.slick("slickSetOption", "speed", 2000, true);
  });
});

//Sider-women
$(document).ready(function () {
  $(".slider-women__slides").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    initialSlide: 0,
    prevArrow: $(".slider-women__arrow--prev"),
    nextArrow: $(".slider-women__arrow--next"),
  });
});

// Pagination
$(document).ready(function () {
  $(".pagination .page").click(function () {
    $(".pagination .page").removeClass("active");
    $(this).addClass("active");
  });

  $(".pagination .prev").click(function () {
    var prev = $(".pagination .active").prev();
    if (prev.hasClass("page")) {
      $(".pagination .active").removeClass("active");
      prev.addClass("active");
    }
  });

  $(".pagination .next").click(function () {
    var next = $(".pagination .active").next();
    if (next.hasClass("page")) {
      $(".pagination .active").removeClass("active");
      next.addClass("active");
    }
  });
});
