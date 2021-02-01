const navBtn = document.querySelector(".nav-open");
const navCloseBtn = document.querySelector(".close-nav")
const navWrapper1 = document.querySelector(".open-nav-icon-wrapper");
const navWrapper2 = document.querySelector(".close-nav-icon-wrapper");
const navBar = document.querySelector("nav");

console.log(navBtn)
navBtn.addEventListener("click", () => {
  navBar.classList.add("show-nav");
  navWrapper1.classList.add("hide-nav-open-icons");
  navWrapper2.classList.add("hide-nav-close-icons");
});

navCloseBtn.addEventListener("click", () => {
  navBar.classList.remove("show-nav");
  navWrapper1.classList.remove("hide-nav-open-icons");
  navWrapper2.classList.remove("hide-nav-close-icons");
});

// current year
const dynamicTime = document.querySelector(".dynamic");
const currentYear = new Date().getFullYear();
dynamicTime.innerText = currentYear;




var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});