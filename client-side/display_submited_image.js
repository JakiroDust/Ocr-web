import {cImageWithCloseButton} from './util/cImage.js';
const fileInput = document.getElementById('submit-images');
const imageContainer = document.getElementById('image_container');
fileInput.addEventListener('change', (event) => {
  // loop through selected files
  for (let i = 0; i < event.target.files.length; i++) {
    const file = event.target.files[i];
    const div=cImageWithCloseButton(file);
    // add the div to the image container
    imageContainer.appendChild(div);
    // clear file input
  }
  fileInput.value = '';
});
console.log('DSI done');