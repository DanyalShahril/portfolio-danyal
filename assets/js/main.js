document.addEventListener("DOMContentLoaded", function() {
    const yearElement = document.getElementById("year");
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }
window.addEventListener("scroll", function() {
  const header = document.querySelector(".header");

  if (window.scrollY > 50) {
    header.style.background = "rgba(11,17,32,0.95)";
  } else {
    header.style.background = "rgba(15,23,42,0.75)";
  }
});

