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
