window.addEventListener("load",function(){var wpAdminBar=document.getElementById("wpadminbar");if(wpAdminBar){var header=document.querySelector(".header");header.style.top="32px";}else{var header=document.querySelector(".header");header.style.top="0";}});$(document).ready(function(){$(".featured-products-list").slick({infinite:true,slidesToShow:4,slidesToScroll:1,dots:true,autoplay:true,autoplaySpeed:1,useTransform:true,cssEase:"linear",speed:2000,swipeToSlide:true,});});$(document).ready(function(){$(".pagination .page").click(function(){$(".pagination .page").removeClass("active");$(this).addClass("active");});$(".pagination .prev").click(function(){var prev=$(".pagination .active").prev();if(prev.hasClass("page")){$(".pagination .active").removeClass("active");prev.addClass("active");}});$(".pagination .next").click(function(){var next=$(".pagination .active").next();if(next.hasClass("page")){$(".pagination .active").removeClass("active");next.addClass("active");}});});$(document).ready(function(){$(".slider-women__slides").slick({slidesToShow:1,slidesToScroll:1,infinite:true,initialSlide:0,prevArrow:$(".slider-women__arrow--prev"),nextArrow:$(".slider-women__arrow--next"),});});document.querySelector(".ti-add-to-wishlist").addEventListener("click",function(){var popUp=document.createElement("div");popUp.classList.add("my-popup");popUp.innerHTML="<h2>Đã thêm vào wishlist!</h2>";document.body.appendChild(popUp);});