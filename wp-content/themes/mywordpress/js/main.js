var wpAdminBar = body.querySelector("#wpadminbar");
if (wpAdminBar) {
  // Nếu có #wpadminbar, đặt top cho header là 32px
  var header = document.querySelector("header");
  header.style.top = "32px";
} else {
  // Nếu không có #wpadminbar, đặt top cho header là 0
  var header = document.querySelector("header");
  header.style.top = "0";
}
