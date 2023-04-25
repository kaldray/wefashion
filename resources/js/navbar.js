document.addEventListener("DOMContentLoaded", showNavBarContent);

function showNavBarContent() {
  const navMenu = document.querySelector(".nav-menu");
  const hamburger = document.querySelector(".hamburger");
  hamburger?.addEventListener("click", () => {
    console.log("nav");
    navMenu?.classList.toggle("hidden");
    navMenu?.classList.toggle("flex");
  });
}
