document.getElementById("submit-button").addEventListener("click", function(event) {
    event.preventDefault();
    var form = document.getElementById("image-upload-form");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server
            console.log(xhr.responseText);
        }
    };
    
    xhr.open("POST", "./app/handleimages.php", true);
    
    var formData = new FormData(form);
    formData.append('token', '<?php echo CSRF::get_token(); ?>');
    
    xhr.send(formData);
});
