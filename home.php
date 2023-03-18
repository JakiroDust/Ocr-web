<?php 
require_once "./server-side/CSRF.php";
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

<div id="progress-bar">
  <div id="progress"></div>
</div>

<script src="./client-side/form.js"></script>

