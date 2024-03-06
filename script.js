let menuBtn = document.querySelector(".menuLogo");
let menuSideBar = document.querySelector(".menuSideBar");
let searchBtn = document.getElementById("searchBtn");
let searchSideBar = document.querySelector(".searchSideBar");
let searchBarCloseBtn = document.querySelector(".searchSideBar__closeBtn");
let menuBarCloseBtn = document.querySelector(".menuSideBar__closeBtn");
let catBarCloseBtn = document.querySelector(".catSideBar__closeBtn");
let catBtn = document.querySelector(".categories");
let catSideBar = document.querySelector(".catSideBar");
let body = document.querySelector("body");

function toggleSidebar(sidebar) {
  if (sidebar.style.display === "block") {
    if (sidebar === catSideBar) {
      sidebar.setAttribute("transition-style", "out:wipe:left");
    } else {
      sidebar.setAttribute("transition-style", "out:wipe:left");
    }

    setTimeout(() => {
      sidebar.style.display = "none";
      body.classList.remove("no-scroll");
    }, 500);
  } else {
    if (sidebar === catSideBar) {
      sidebar.setAttribute("transition-style", "in:wipe:left");
    } else {
      sidebar.setAttribute("transition-style", "in:wipe:right");
    }
    sidebar.style.display = "block";
    body.classList.add("no-scroll");
  }
}

menuBtn.addEventListener("click", () => {
  toggleSidebar(menuSideBar);
});

searchBtn.addEventListener("click", () => {
  toggleSidebar(searchSideBar);
});

catBtn.addEventListener("click", () => {
  toggleSidebar(catSideBar);
});

menuBarCloseBtn.addEventListener("click", () => {
  toggleSidebar(menuSideBar);
});

searchBarCloseBtn.addEventListener("click", () => {
  toggleSidebar(searchSideBar);
});
catBarCloseBtn.addEventListener("click", () => {
  toggleSidebar(catSideBar);
});

let navBar = document.querySelector(".navBar");

window.addEventListener("scroll", function () {
  let navBar = document.querySelector(".navBar");
  if (window.scrollY > 0) {
    navBar.style.padding = "15px 15px";
  } else {
    navBar.style.padding = "";
  }
});

let catSideBarUl = document.getElementById("catSideBar__ul");
let catSideBarH1 = document.getElementById("catSideBar__h1");
let navHeight = navBar.clientHeight;
catSideBarUl.style.paddingTop = navHeight + "px";
catSideBarH1.style.paddingTop = navHeight + "px";
