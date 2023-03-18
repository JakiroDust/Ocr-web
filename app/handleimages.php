<?php
require_once "./CSRF.php";
require_once "./util/receiverUTIL.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    CSRFcheck();
    checkFileSize();
    processImage();
    //getCheck();

}
?>