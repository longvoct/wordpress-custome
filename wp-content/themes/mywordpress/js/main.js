// Thao tác với header
window.addEventListener("load", function () {
  //Size guide:
  const popupLink = document.getElementById("popup-link");
  popupLink.addEventListener("click", () => {
    const popupWrapper =
      '<div class="popup-wrapper"><div class="popup-image"><img src="https://converse.ca/media/cms_upload/sizeguide/New-Size-Chart_footwear_adults-EN-min.png" alt="Pop-up Image" ></div><button id="popup-close"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></button></div>';
    document.body.insertAdjacentHTML("beforeend", popupWrapper);

    const popupCloseButton = document.getElementById("popup-close");
    popupCloseButton.addEventListener("click", () => {
      console.log("click me");
      const popupWrapperRemove = document.querySelector(".popup-wrapper");
      popupWrapperRemove.parentNode.removeChild(popupWrapperRemove);
    });
  });
  // Hidden admin:
  // const wpAdminBar = document.getElementById("wpadminbar");
  // if (wpAdminBar) {
  //   // Nếu có #wpadminbar, đặt top cho header là 32px
  //   var header = document.querySelector(".header");
  //   header.style.top = "32px";
  //   // header.style.top = "0";
  // } else {
  //   // Nếu không có #wpadminbar, đặt top cho header là 0
  //   var header = document.querySelector(".header");
  //   header.style.top = "0";
  // }
  // Click vote rating
  // Lấy tất cả các radio button và icon sao
  const radioButtons = document.querySelectorAll(
    '.star-rating_list span input[type="radio"]'
  );
  const stars = document.querySelectorAll(
    ".star-rating_list span label svg path"
  );

  // Thêm sự kiện onchange vào các radio button (ngôi sao)
  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", function () {
      // Lấy giá trị của radio button được chọn
      const value = parseInt(this.value);

      // Thay đổi màu sắc của các icon sao
      for (let i = 0; i < stars.length; i++) {
        if (i < value) {
          stars[i].setAttribute("fill", "#000");
        } else {
          stars[i].setAttribute("fill", "#fff");
        }
      }
    });
  });

  //Thay đổi nội dung Wishlist --> Yêu thích
  // Lấy đối tượng thẻ <li> từ DOM
  // const wishlistLink = document.querySelector(
  //   "li.woocommerce-MyAccount-navigation-link--wishlist"
  // );
  // // Xóa nội dung bên trong thẻ
  // wishlistLink.textContent = "Yêu thích";

  //Progressbar
  const progressBar = document.querySelector(".progress-bar");

  window.addEventListener("scroll", () => {
    const scrollTop = document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight;
    const clientHeight = document.documentElement.clientHeight;

    const percentScrolled = (scrollTop / (scrollHeight - clientHeight)) * 100;

    progressBar.style.width = `${percentScrolled}%`;
  });
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
  // slider.on("mouseenter", function () {
  //   slider.slick("slickSetOption", "autoplaySpeed", 5000, true);
  //   slider.slick("slickSetOption", "speed", 500, true);
  // });

  // slider.on("mouseleave", function () {
  //   slider.slick("slickSetOption", "autoplaySpeed", 2000, true);
  //   slider.slick("slickSetOption", "speed", 2000, true);
  // });
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

// Xử lý nút tăng giảm sản phẩm
jQuery(function ($) {
  if (!String.prototype.getDecimals) {
    String.prototype.getDecimals = function () {
      var num = this,
        match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if (!match) {
        return 0;
      }
      return Math.max(
        0,
        (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
      );
    };
  }
  // Quantity "plus" and "minus" buttons
  $(document.body).on("click", ".plus, .minus", function () {
    var $qty = $(this).closest(".quantity").find(".qty"),
      currentVal = parseFloat($qty.val()),
      max = parseFloat($qty.attr("max")),
      min = parseFloat($qty.attr("min")),
      step = $qty.attr("step");

    // Format values
    if (!currentVal || currentVal === "" || currentVal === "NaN")
      currentVal = 0;
    if (max === "" || max === "NaN") max = "";
    if (min === "" || min === "NaN") min = 0;
    if (
      step === "any" ||
      step === "" ||
      step === undefined ||
      parseFloat(step) === "NaN"
    )
      step = 1;

    // Change the value
    if ($(this).is(".plus")) {
      $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
    } else {
      if (min && currentVal <= min) {
        $qty.val(min);
      } else if (currentVal > 0) {
        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
      }
    }

    // Trigger change event
    $qty.trigger("change");
    $("[name=update_cart]").prop({
      disabled: false,
      "aria-disabled": false,
    });
  });
});

//FlexSlider cho Gallery Image
$(document).ready(function () {
  $(".flexslider").flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    slideshow: true,
    itemWidth: 120,
    itemMargin: 0,
    minItems: 4,
    maxItems: 5,
    start: function (slider) {
      slider.flexAnimate(4);
    },
  });
});

//
jQuery(document).on("click", ".yith-wcan a", function (e) {
  e.preventDefault(); // Ngăn chặn trình duyệt chuyển hướng đến URL của liên kết

  var data = {
    action: "get_filtered_product_count", // Tên hành động AJAX
    filter_color: jQuery('[name="filter_color"]').val(), // Lọc theo màu sắc
    filter_size: jQuery('[name="filter_size"]').val(), // Lọc theo kích thước
  };

  // Gọi AJAX và nhận phản hồi từ trình xử lý AJAX
  jQuery.post(yith_wcan_frontend.ajaxurl, data, function (response) {
    // Cập nhật lại số lượng sản phẩm tìm thấy
    jQuery("#found-posts").html(response + " kết quả tìm thấy");
  });
});
//
jQuery(document).ready(function ($) {
  $(".remove_from_cart_button").click(function (e) {
    e.preventDefault();

    var cart_item_key = $(this).data("cart_item_key");
    var product_id = $(this).data("product_id");

    $.ajax({
      type: "POST",
      dataType: "Text",
      url: wc_cart_fragments_params.ajax_url,
      data: {
        action: "remove_cart_item",
        cart_item_key: cart_item_key,
        product_id: product_id,
      },
      success: function (response) {
        // Cập nhật giỏ hàng mini cart
        $(document.body).trigger("wc_fragment_refresh");
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });
});
