import {create_Close_button} from "./Close_button.js"
export  function cImageWithCloseButton(file)
{
    const div=cImage(file);
    create_Close_button(div);
    return div
}
export  function cImage(file)
{
  
    // create image element and set its source to the selected file
    const img = document.createElement('img');
    img.className ="submited_image"
    img.src = URL.createObjectURL(file);

    // create a div element to contain the image
    const div = document.createElement('div');
    div.className="image_cover"
    div.appendChild(img);
    return div
}
