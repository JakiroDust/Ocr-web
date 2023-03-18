<?php
function checkFileSize(){
// Get the total size of the incoming request
$content_length = (int) $_SERVER['CONTENT_LENGTH'];

// Get the maximum allowed file size in bytes (in this example, 5 MB)
$max_file_size = 5 * 1024 * 1024;

// Check if the incoming request size exceeds the maximum allowed file size
if ($content_length > $max_file_size) {
    // Send an error response and terminate the upload
    header($_SERVER['SERVER_PROTOCOL'] . ' 413 Payload Too Large', true, 413);
    echo 'File size exceeds the maximum limit of 5 MB';
    exit;
}
else
{
    //echo $_SERVER['CONTENT_LENGTH'];
}}
function processImage(){
    //processing image
    if(isset($_FILES['images']) && !empty($_FILES['images']['name'])){
        $file_count = count($_FILES['images']['name']);
        for($i=0;$i<$file_count;$i++){
            $file_size = $_FILES['images']['size'][$i];
            $file_name = $_FILES['images']['name'][$i];
            $ext =strtolower( pathinfo($file_name, PATHINFO_EXTENSION));
            if($file_size==0)
                throw new Exception('Received no image');
            if(!($ext=="png"||$ext=="jpg"))
                throw new Exception('Error file type');
        }
    }
    else
    {
        throw new Exception('Received no image');
    }
}
function CSRFcheck(){
    if(CSRF::validate($_POST['token']))
    {
        //Do nothing
    } else 
    {
        throw new Exception('Failed to validate the token');
    }
}
function getCheck(){
    if (isset($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
        echo "File uploaded successfully!";
    } else {
        echo 'Error uploading file';
    }
    
}
