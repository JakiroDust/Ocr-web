<?php 
require_once "./server-side/session_security/CSRF.php";
?>
<head>

<div id="alerter"> </div>
<link rel="stylesheet" href="./style.css">
</head>
<h2>Upload Multiple Images</h2>
<form id="image-upload-form" enctype="multipart/form-data">
    <?php CSRF::create_token();?>
    <br>
    <input type="file" id="submit-images" name="images[]" multiple accept=".jpg,.png">
    <br>
    <input type="button" id="submit-button" value="Upload">
</form>
<div id="image_container" name=""></div>

<script>
var default_function
</script>
<script  src="./client-side/summit_form.js"></script>

<script type= "module" src="./client-side/display_submited_image.js">
</script>
<script>

</script>