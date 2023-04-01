<?php
function preReceive_FileSize_Check(){
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
}};
function preReceive_File_Check()
{
    preReceive_FileSize_Check();
}
?>