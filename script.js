const header = document.querySelector(".header");
const btnClose = document.querySelector(".btn--close--account");
// const openAcocunt = document.querySelector(".header--features--btn");
// const hidelogin = document.querySelector(".openAccount--div");

// const message = document.createElement("div");
// message.classList.add("cookie-message");
// message.innerHTML =
//   'We use cookies for improved functionality anaytics. <button class= "btn btn--close--cookie">Got it!</button>';
// header.after(message);
// console.log(message);
// document
//   .querySelector(".btn--close--cookie")
//   .addEventListener("click", function () {
//     message.remove();
//   });
// message.style.backgroundColor = "#37383d";
// message.style.width = "100%";
// console.log(getComputedStyle(message).height);
// message.style.height =
//   Number.parseFloat(getComputedStyle(message).height, 10) + 10 + "px";

const logo = document.querySelector(".header--pic--logo");
const section1 = document.querySelector(".section--1");
const btnScroll = document.querySelector(".scroll-btn");

btnScroll.addEventListener("click", function (e) {
  const s1cords = section1.getBoundingClientRect();
  ////old Way
  // window.scrollTo({
  //   left: s1cords.left + pageXOffset,
  //   top: s1cords.top + window.pageYOffset,
  //   behavior: "smooth",
  // });
  ////new way
  section1.scrollIntoView({ behavior: "smooth" });
});

// const ranodmNumber = (min, max) =>
//   Math.floor(Math.random() * (max - min + 1) + min);
// const randomColor = () =>
//   `rgb(${ranodmNumber(0, 255)},${ranodmNumber(0, 255)},${ranodmNumber(
//     0,
//     255
//   )})`;

// document.querySelectorAll(".link").forEach(function (el) {
//   el.addEventListener("click", function (e) {
//     e.preventDefault();
//     const id = el.getAttribute("href");
//     document.querySelector(id).scrollIntoView({ behavior: "smooth" });
//   });
// });
// const logoutButton = document.querySelector(".header--features--btn");
// console.log(logoutButton); // Check if this logs the correct button element

document.querySelector(".header--link").addEventListener("click", function (e) {
  e.preventDefault();
  if (e.target.classList.contains("link")) {
    const id = e.target.getAttribute("href");
    document.querySelector(id).scrollIntoView({ behavior: "smooth" });
  }
});
// document.querySelectorAll(".link").forEach(function (el) {
//   el.addEventListener("click", function (e) {
//     this.style.backgroundColor = randomColor();
//   });
// });
// document
//   .querySelector(".header--features")
//   .addEventListener("click", function (e) {
//     this.style.backgroundColor = randomColor();
//   });
// document.querySelector(".header--nav").addEventListener("click", function (e) {
//   this.style.backgroundColor = randomColor();
// });

// const h1 = document.querySelector(".h1");
// console.log(h1.childNodes);
// console.log(h1.parentElement);
// console.log(h1.parentNode);
// console.log(h1.closest(".header"));
// console.log(h1.previousElementSibling);
// console.log(h1.nextElementSibling);
// console.log(h1.parentElementChildren);
// h1.firstElementChild.style.color = "white";

const nav = document.querySelector(".header--nav");
const tabsContainer = document.querySelector(".section--2--btns");
const operationContent = document.querySelectorAll(".operation-contents");
const activeBtn = document.querySelectorAll(".btn");
tabsContainer.addEventListener("click", function (e) {
  const clicked = e.target.closest(".btn");
  if (!clicked) return;
  console.log(clicked.dataset.tab);
  activeBtn.forEach((t) => t.classList.remove("button-active"));
  operationContent.forEach((t) =>
    t.classList.remove("operation--content--active")
  );
  clicked.classList.add("button-active");
  // clicked.classList.add("button-active");
  // console.log(clicked);
  document
    .querySelector(`.section--2--descriptions--${clicked.dataset.tab}`)
    .classList.add("operation--content--active");
});

const handlehover = function (e) {
  if (e.target.classList.contains("link")) {
    const link = e.target;
    const siblings = link.closest(".header--nav").querySelectorAll(".link");
    const logo = link.closest(".header--nav").querySelector("img");
    siblings.forEach((el) => {
      if (el !== link) el.style.opacity = this;
    });
    logo.style.opacity = this;
  }
};
nav.addEventListener("mouseover", handlehover.bind(0.5));
nav.addEventListener("mouseout", handlehover.bind(1));

const navHeight = nav.getBoundingClientRect().height;

const sticky = function (entries) {
  const [entry] = entries;
  if (!entry.isIntersecting) nav.classList.add("nav--sticky");
  else nav.classList.remove("nav--sticky");
};
const headerObserver = new IntersectionObserver(sticky, {
  root: null,
  threshold: 0,
  rootMargin: `-${navHeight}px`,
});
headerObserver.observe(header);

const allSections = document.querySelectorAll(".section");
const revealSection = function (entries, observer) {
  const [entry] = entries;
  if (!entry.isIntersecting) return;
  entry.target.classList.remove("section--hidden");
  observer.unobserve(entry.target);
};
const observeSection = new IntersectionObserver(revealSection, {
  root: null,
  threshold: 0.15,
});
allSections.forEach(function (section) {
  observeSection.observe(section);
  section.classList.add("section--hidden");
});

const allImage = document.querySelectorAll("img[data-src]");
const loadImg = function (entries, observer) {
  const [entry] = entries;
  if (!entry.isIntersecting) return;
  entry.target.src = entry.target.dataset.src;
  entry.target.addEventListener("load", function (e) {
    entry.target.classList.remove("lazy--img");
  });
  observer.unobserve(entry.target);
};
const imageLoad = new IntersectionObserver(loadImg, {
  root: null,
  threshold: 0,
  rootMargin: "200px",
});
allImage.forEach((img) => imageLoad.observe(img));

const slider = document.querySelector(".slider");
const slides = document.querySelectorAll(".slide");
const btnLeft = document.querySelector(".section--3--btn--left");
const btnRight = document.querySelector(".section--3--btn--right");
const dotsContainer = document.querySelector(".dots");
const dots = document.querySelectorAll(".dots_dot");
let curSlide = 0;
const maxSlide = slides.length;

const createDots = function () {
  slides.forEach(function (_, i) {
    dotsContainer.insertAdjacentHTML(
      "beforeend",
      `<button class ='dots_dot' data-slide ='${i}'></button> `
    );
  });
};
// createDots();

const activateDot = function (slide) {
  document
    .querySelectorAll(".dots_dot")
    .forEach((dot) => dot.classList.remove("active--dot"));
  document
    .querySelector(`.dots_dot[data-slide="${slide}"]`)
    .classList.add("active--dot");
};
// activateDot(0);

const gotoSlide = function (slide) {
  slides.forEach((s, i) => {
    s.style.transform = `translateX(${100 * (i - slide)}%)`;
  });
};

const nextSlide = function () {
  if (curSlide === maxSlide - 1) {
    curSlide = 0;
  } else {
    curSlide++;
  }
  gotoSlide(curSlide);
  activateDot(curSlide);
};

const previousSlide = function () {
  if (curSlide === 0) {
    curSlide = maxSlide - 1;
  } else {
    curSlide--;
  }
  gotoSlide(curSlide);
  activateDot(curSlide);
};
const init = function () {
  gotoSlide(0);
  createDots();
  activateDot(0);
};
init();
btnLeft.addEventListener("click", previousSlide);
btnRight.addEventListener("click", nextSlide);

document.addEventListener("keydown", function (e) {
  if (e.key === "ArrowLeft") previousSlide();
  e.key === "ArrowRight" && nextSlide();
});

dotsContainer.addEventListener("click", function (e) {
  if (e.target.classList.contains("dots_dot")) {
    const { slide } = e.target.dataset;
    activateDot(slide);
    gotoSlide(slide);
  }
});

document.addEventListener("DOMContentLoaded", function (e) {
  console.log("the content has been parsed", e);
});
window.addEventListener("load", function (e) {
  console.log("Page fully loaded ", e);
});

window.addEventListener("beforeunload", function (e) {
  e.preventDefault();
  console.log(e);
  e.returnValue = "";
});
