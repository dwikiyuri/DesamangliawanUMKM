const navbarNav = document.querySelector(".navbar-nav1");
const hamburgermenu = document.querySelector("#hamburger-menu");

const menuBar = document.querySelector(".menu-bar");
const menuNav = document.querySelector(".menufix");
if (menuBar) {
  menuBar.addEventListener("click", () => {
    menuNav.classList.toggle("menu-active");
  });
}

const navBar = document.querySelector(".navbarfix");
window.addEventListener("scroll", () => {
  console.log(window.scrollY);
  const windowPosition = window.scrollY > 0;
  if (navBar && menuNav) {
    navBar.classList.toggle("scrolling-active", windowPosition);
    menuNav.classList.remove("menufix-active");
  }
});
// for new navbar dropdown

// Menambahkan event listener pada elemen dokumen (document)

// pendaftaran
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
  imagePreviewElement.style.display = "none";
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
  imagePreviewElement.style.display = "none";
}
// modal
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
function myFunction(imgs) {
  var expandImg = document.getElementById("main-images");
  expandImg.src = imgs.src;
  expandImg.alt = imgs.alt;
}
