const sendEmail = require("./js/send-email.js");

// Lắng nghe sự kiện click trên nút thanh toán
document.getElementById("button-pay").addEventListener("click", function () {
  // Lấy thông tin khách hàng
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = "Xin chào " + name + ", Cảm ơn bạn đã đặt hàng!";

  // Gửi email cho khách hàng
  sendEmail(email, "Cảm ơn bạn đã đặt hàng", message);
});
