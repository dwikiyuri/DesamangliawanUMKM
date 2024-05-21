// toogle class hamburger active
const navbarNav = document.querySelector(".navbar-nav1");
const hamburgermenu = document.querySelector("#hamburger-menu");
//onclick
// document.querySelector("#hamburger-menu").onclick = () => {
//   navbarNav.classList.toggle("active");
//   hamburgermenu.classList.toggle("active");
// };
//toggle class avtive search form
// const searchForm = document.querySelector(".search-form");
// const searchBox = document.querySelector("#search-box");

// document.querySelector("#search-button").onclick = (e) => {
//   searchForm.classList.toggle("active");
//   searchBox.focus();
//   e.preventDefault();
// };
const menuBar = document.querySelector(".menu-bar");
const menuNav = document.querySelector(".menufix");
if (menuBar) {
  menuBar.addEventListener("click", () => {
    menuNav.classList.toggle("menu-active");
  });
}

const navBar = document.querySelector(".navbarfix");
const dropdowntool = document.querySelector(".menufix-dropdown-contents");
window.addEventListener("scroll", () => {
  console.log(window.scrollY);
  const windowPosition = window.scrollY > 0;
  if (navBar && dropdowntool && dropdownitem2 && menuNav) {
    navBar.classList.toggle("scrolling-active", windowPosition);
    dropdowntool.classList.toggle("scrolling-active", windowPosition);
    dropdownitem2.classList.toggle("scrolling-active", windowPosition);
    menuNav.classList.remove("menufix-active");
  }
});
// for new navbar dropdown
const dropdownbutton = document.querySelector("#dropdown-button");
const dropdownitem = document.querySelector(".menufix-dropdown-contents");
const dropdownIcon = document.querySelector("#dropdown-icon");

const dropdownbutton2 = document.querySelector("#dropdown-button2");
const dropdownitem2 = document.querySelector(".menufix-dropdown-contents2");
const dropdownIcon2 = document.querySelector("#dropdown-icon2");
if (dropdownbutton) {
  dropdownbutton.onclick = (e) => {
    dropdownIcon.classList.toggle("fa-caret-down");
    dropdownitem.classList.toggle("actived");
    e.preventDefault();
  };
}
if (dropdownbutton2) {
  dropdownbutton2.onclick = (e) => {
    dropdownIcon2.classList.toggle("fa-caret-down");
    dropdownitem2.classList.toggle("actived");
    e.preventDefault();
  };
}
// Menambahkan event listener pada elemen dokumen (document)
document.addEventListener("click", (e) => {
  // Memeriksa apakah klik terjadi di luar elemen dropdown
  if (
    !dropdownbutton.contains(e.target) &&
    !dropdownitem.contains(e.target) &&
    !dropdownbutton2.contains(e.target) &&
    !dropdownitem2.contains(e.target)
  ) {
    dropdownIcon.classList.remove("fa-caret-down");
    dropdownitem.classList.remove("actived");
    dropdownIcon2.classList.remove("fa-caret-down");
    dropdownitem2.classList.remove("actived");
  }
});
// drop down menu navbar
// const dropdownbutton = document.querySelector("#dropdown-button");
// const dropdownbutton2 = document.querySelector("#dropdown-button2");
// const dropdownitem = document.querySelector(".dropdown-contents");
// const dropdownitem2 = document.querySelector(".dropdown-contents2");
// const dropdownIcon = document.querySelector("#dropdown-icon");
// const dropdownIcon2 = document.querySelector("#dropdown-icon2");
// if (dropdownbutton) {
//   dropdownbutton.onclick = (e) => {
//     dropdownIcon.classList.toggle("fa-caret-down");
//     dropdownitem.classList.toggle("active");
//     dropdownitem2.classList.remove("active");
//     dropdownIcon2.classList.remove("fa-caret-down");
//     e.preventDefault();
//   };
// }
// if (dropdownbutton2) {
//   dropdownbutton2.onclick = (e) => {
//     dropdownIcon2.classList.toggle("fa-caret-down");
//     dropdownitem2.classList.toggle("active");
//     dropdownitem.classList.remove("active");
//     dropdownIcon.classList.remove("fa-caret-down");
//     e.preventDefault();
//   };
// }

// const hamburger = document.querySelector("#hamburger-menu");
// const sb = document.querySelector("#search-button");
// document.addEventListener("click", function (e) {
//   if (
//     !hamburger.contains(e.target) &&
//     !navbarNav.contains(e.target) &&
//     !dropdownitem.contains(e.target)
//   ) {
//     navbarNav.classList.remove("active");
//     hamburgermenu.classList.remove("active");
//     dropdownitem.classList.remove("actived");
//     dropdownIcon.classList.remove("fa-caret-down");
//   }
// });

const modal2 = document.querySelector("#item-detail-modal1");
const modalimage = document.querySelector("#item-detail-modal2");
if (modal2) {
  window.onclick = (e) => {
    if (e.target === modal2) {
      modal2.style.display = "none";
    }
  };
}
if (modalimage) {
  window.onclick = (e) => {
    if (e.target === modalimage) {
      modalimage.style.display = "none";
    }
  };
}
// window.onclick = (e) => {
//   if (e.target === modal2) {
//     modal2.style.display = "none";
//   }
// };

const itemDetailModalumkm = document.querySelector("#item-detail-modal1");
const itemDetailButtonumkm = document.querySelector(".item-detail-button1");
const itemDetailModalumkm2 = document.querySelector("#item-detail-modal2");
const itemDetailButtonumkm2 = document.querySelector(".item-detail-button2");
// function modalumkm() {
//   itemDetailButtonumkm.addEventListener(function (e) {
//     itemDetailModalumkm.style.display = "block";
//     e.preventDefault();
//     // Tambahkan aksi lain yang diinginkan untuk halaman 1
//   });
// }
//
if (itemDetailButtonumkm) {
  itemDetailButtonumkm.addEventListener("click", function (e) {
    itemDetailModalumkm.style.display = "block";
    e.preventDefault();
  });
}
const img = document.getElementById("main-images");
const modalImg = document.getElementById("img01");
const captionText = document.getElementById("caption");
if (itemDetailButtonumkm2) {
  itemDetailButtonumkm2.addEventListener("click", function (e) {
    itemDetailModalumkm2.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
    e.preventDefault();
  });
}
//close button on modal
const closeiconmodalumkm = document.querySelector(".modalsumkm .close-icon");
const closeiconmodalimage = document.querySelector(".modal-image .close-icon");
if (itemDetailModalumkm) {
  closeiconmodalumkm.addEventListener("click", function (e) {
    itemDetailModalumkm.style.display = "none";
    e.preventDefault();
  });
}
if (itemDetailModalumkm2) {
  closeiconmodalimage.addEventListener("click", function (e) {
    itemDetailModalumkm2.style.display = "none";
    e.preventDefault();
  });
}
// document.querySelector(".modalsumkm .close-icon").onclick = (e) => {
//   itemDetailModalumkm.style.display = "none";
//   e.preventDefault();
// };

// for tabs
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// image tabs
function myFunction(imgs) {
  var expandImg = document.getElementById("main-images");
  expandImg.src = imgs.src;
  expandImg.alt = imgs.alt;
}
// for owl caraousel
/**
 * Create an arrow function that will be called when an image is selected.
 */
const previewImage = (event) => {
  /**
   * Get the selected files.
   */
  const imageFiles = event.target.files;
  /**
   * Count the number of files selected.
   */
  const imageFilesLength = imageFiles.length;
  /**
   * If at least one image is selected, then proceed to display the preview.
   */
  if (imageFilesLength > 0) {
    /**
     * Get the image path.
     */
    const imageSrc = URL.createObjectURL(imageFiles[0]);
    /**
     * Select the image preview element.
     */
    const imagePreviewElement = document.querySelector(
      "#preview-selected-image"
    );
    const labels = document.querySelector(".uploads1");
    const closeiconimage = document.querySelector("#close-icon");
    /**
     * Assign the path to the image preview element.
     */
    imagePreviewElement.src = imageSrc;
    /**
     * Show the element by changing the display value to "block".
     */
    imagePreviewElement.style.display = "block";
    labels.classList.toggle("hidden");
    closeiconimage.classList.remove("hidden");
  }
};
function removeImage() {
  const inputElement = document.querySelector("input[type='file']");
  const labels = document.querySelector(".uploads1");
  const imagePreviewElement = document.querySelector("#preview-selected-image");
  const closeiconimage = document.querySelector("#close-icon");

  inputElement.value = "";
  labels.classList.remove("hidden");
  imagePreviewElement.src = "";
  closeiconimage.classList.add("hidden");
}

const previewImage2 = (event) => {
  /**
   * Get the selected files.
   */
  const imageFiles = event.target.files;
  /**
   * Count the number of files selected.
   */
  const imageFilesLength = imageFiles.length;
  /**
   * If at least one image is selected, then proceed to display the preview.
   */
  if (imageFilesLength > 0) {
    /**
     * Get the image path.
     */
    const imageSrc = URL.createObjectURL(imageFiles[0]);
    /**
     * Select the image preview element.
     */
    const imagePreviewElement = document.querySelector(
      "#preview-selected-image2"
    );
    const labels = document.querySelector(".uploads");
    const closeiconimage2 = document.querySelector("#close-icon2");
    /**
     * Assign the path to the image preview element.
     */
    imagePreviewElement.src = imageSrc;
    /**
     * Show the element by changing the display value to "block".
     */
    imagePreviewElement.style.display = "block";
    labels.classList.toggle("hidden");
    closeiconimage2.classList.remove("hidden");
  }
};
function removeImage2() {
  const inputElement = document.querySelector("input[type='file']");
  const labels = document.querySelector(".uploads");
  const imagePreviewElement = document.querySelector(
    "#preview-selected-image2"
  );
  const closeiconimage = document.querySelector("#close-icon2");

  inputElement.value = "";
  labels.classList.remove("hidden");
  imagePreviewElement.src = "";
  closeiconimage.classList.add("hidden");
}
