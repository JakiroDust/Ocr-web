
      
      ////File Validation
      //Check file amount
      // try
      // {
      //   const files=document.getElementById("submit-images").files;
      //   if (files.length ==0) {
      //     alert("No Image Uploaded");
      //     return;
      //   }     
      //   if (files.length > 5) {
      //     alert("Maximum of 5 images can be uploaded.");
      //     return;
      //   }
      //   // Check the size of each file
      //   for (let i = 0; i < files.length; i++) {
      //     const file = files[i];
      //     if (file.size > 5 * 1024 * 1024) {
      //       alert("File size exceeds the maximum limit of 5 MB.");
      //       return;
      //     }
      //   }
        
      // }
      // catch(err)
      // {
      //   showMsg("Receive no file.");
      //   return;
      // }

document.getElementById("submit-button").addEventListener("click", function(event) 
{
      event.preventDefault();
  
      



      ////Uploader
      const form = document.getElementById("image-upload-form");
      //for Loading bar
      const loadingBar = document.getElementById("progress");
      loadingBar.style.width = "0%"; // initially set the width to 0%

      fetch('./app/handleimages.php', {
        method: 'POST',
        body: new FormData(form),
        onUploadProgress: function(progressEvent) {
          const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
          loadingBar.style.width = percentCompleted + "%";
      }
      })
      //.then(response => response.json())
      .then(response => {
        if (response.status === 413) {
            throw new Error('File size exceeds the maximum limit of 5 MB.');
        }
        return response.text();
      })
      .then(data => {
        console.log(data);
      })
      .catch(error => {
        console.error(error);
        console.log(response);
      });
    });

function showMsg(txt){
  const alerter = document.querySelector("#alerter");
  alerter.textContent = txt;
  alerter.style.display = "block";
  alerter.style.opacity = 0;
  alerter.style.transition = "opacity 0.25s ease-in-out";
  setTimeout(() => {
    alerter.style.opacity = 1;
  }, 0);
  setTimeout(() => {
    alerter.style.opacity = 0;
  }, 1000);
  setTimeout(() => {
    alerter.style.display = "none";
  }, 1750);
    }