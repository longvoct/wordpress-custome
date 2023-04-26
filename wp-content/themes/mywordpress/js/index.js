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

// Lấy biểu tượng yêu thích
// Sử dụng jQuery để thêm sự kiện click vào phần tử
// $(document).ready(function () {
//   $(".my-favorite").click(function () {
//     // Thay đổi nội dung của phần tử từ svg thành text
//     if ($(this).hasClass("active")) {
//       $(this).html(
//         '<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 2.93125L8.19365 2.14542C6.29876 0.298738 2.82841 0.936208 1.5754 3.25636C0.986101 4.34755 0.853594 5.92263 1.92858 7.93341C2.9639 9.87001 5.11613 12.1882 9 14.7142C12.8839 12.1882 15.0361 9.87001 16.0714 7.93341C17.1464 5.92263 17.0139 4.34755 16.4246 3.25636C15.1716 0.936208 11.7012 0.298738 9.80635 2.14542L9 2.93125ZM9 16C-8.24977 5.19297 3.6886 -3.24359 8.80236 1.21929C8.86944 1.27783 8.93535 1.3386 9 1.4016C9.06465 1.3386 9.13055 1.27784 9.19763 1.2193C14.3114 -3.2436 26.2498 5.19296 9 16Z" fill="#575757"/></svg>'
//       );
//       $(this).removeClass("active");
//     } else {
//       $(this).html(
//         '<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 2.93125L8.19365 2.14542C6.29876 0.298738 2.82841 0.936208 1.5754 3.25636C0.986101 4.34755 0.853594 5.92263 1.92858 7.93341C2.9639 9.87001 5.11613 12.1882 9 14.7142C12.8839 12.1882 15.0361 9.87001 16.0714 7.93341C17.1464 5.92263 17.0139 4.34755 16.4246 3.25636C15.1716 0.936208 11.7012 0.298738 9.80635 2.14542L9 2.93125ZM9 16C-8.24977 5.19297 3.6886 -3.24359 8.80236 1.21929C8.86944 1.27783 8.93535 1.3386 9 1.4016C9.06465 1.3386 9.13055 1.27784 9.19763 1.2193C14.3114 -3.2436 26.2498 5.19296 9 16Z"fill="#575757" /><path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.4016C13.9932 -3.46453 26.4761 5.0512 9 16C-8.47606 5.0512 4.00684 -3.46453 9 1.4016Z" fill="#212121" /></svg>'
//       );
//       $(this).addClass("active");
//     }
//   });
// });
