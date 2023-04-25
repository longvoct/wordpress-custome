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
});
