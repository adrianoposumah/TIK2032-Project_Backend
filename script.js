const root = document.documentElement;
let isColorChanged = false;
const originalColor = getComputedStyle(root).getPropertyValue("--primary");
const originalColortrans = getComputedStyle(root).getPropertyValue("--primarytrans");
const originalColor2 = getComputedStyle(root).getPropertyValue("--primarydark");
const originalColor3 = getComputedStyle(root).getPropertyValue("--primarylight");
const originalColor4 = getComputedStyle(root).getPropertyValue("--secondarydark");
const originalColor5 = getComputedStyle(root).getPropertyValue("--secondarybg");
const originalBg = getComputedStyle(root).getPropertyValue("--bg-image");

function toggleColor() {
  if (isColorChanged) {
    root.style.setProperty("--primary", originalColor);
    root.style.setProperty("--primarytrans", originalColortrans);
    root.style.setProperty("--primarydark", originalColor2);
    root.style.setProperty("--primarylight", originalColor3);
    root.style.setProperty("--secondarydark", originalColor4);
    root.style.setProperty("--secondarybg", originalColor5);
    root.style.setProperty("--bg-image", originalBg);
  } else {
    const newPrimary = "#eeb777";
    root.style.setProperty("--primary", newPrimary);
    const newPrimarytrans = "rgba(238, 182, 119, 0.548)";
    root.style.setProperty("--primarytrans", newPrimarytrans);
    const newPrimarydark = "#ffffff";
    root.style.setProperty("--primarydark", newPrimarydark);
    const newPrimarylight = "#24252A";
    root.style.setProperty("--primarylight", newPrimarylight);
    const newSecondarydark = "#ebebeb";
    root.style.setProperty("--secondarydark", newSecondarydark);
    const newSecondarybg = "#eeb777";
    root.style.setProperty("--secondarybg", newSecondarybg);
    const newBg = "url(image/bg-4.jpg)";
    root.style.setProperty("--bg-image", newBg);
  }
  isColorChanged = !isColorChanged;

  const Lightmode = document.querySelector(".lightmode");
  const Darkmode = document.querySelector(".darkmode");

  Lightmode.classList.toggle("theme-non-active");
  Darkmode.classList.toggle("theme-non-active");
}

function toggleNav() {
  var navBars = document.querySelector(".nav-bars");
  var navbar = document.querySelector(".navbar");

  if (navbar.classList.contains("nav-active")) {
    navbar.classList.remove("nav-active");
    navbar.classList.add("nav-not-active");
    navBars.classList.remove("nav-active");
    navBars.classList.add("nav-not-active");
  } else {
    navbar.classList.remove("nav-not-active");
    navbar.classList.add("nav-active");
    navBars.classList.remove("nav-not-active");
    navBars.classList.add("nav-active");
  }
}
