var filterTitles = document.querySelectorAll(".filter-title");
filterTitles.forEach((filterTitle) => {
  filterTitle.addEventListener("click", function () {
    console.log("click me");
    var filterContent = this.nextElementSibling;
    filterTitle.classList.toggle("collapsed");
    filterContent.classList.toggle("active");
  });
});
