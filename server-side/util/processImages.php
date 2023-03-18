<?php
function saveUploadedFilesToFolder($dir,$userUUID) {
    $files = $_FILES['images'];
    $destinationFolder = $dir."\\client_file\\images\\".$userUUID;
    if (!is_dir($destinationFolder)) {
        mkdir($destinationFolder, 0755);
    }
    // Handle multiple files
    if (is_array($files['name'])) {
        $count = count($files['name']);
        for ($i = 0; $i < $count; $i++) {
            $filename = $files['name'][$i];
            $filesize = $files['size'][$i];
            $filetype = $files['type'][$i];
            $ext =strtolower( pathinfo($filename, PATHINFO_EXTENSION));
            $filetmpname = $files['tmp_name'][$i];
            
            $destination = rtrim($destinationFolder, '/') . '/' . $i.'.'.$ext;

            if (move_uploaded_file($filetmpname, $destination)) {
                // File saved successfully
            } else {
                // Error saving file
            }
        }
    } else { // Handle single file
        if (isset($files['name']) && $files['error'] === UPLOAD_ERR_OK) {
            $filename = $files['name'];
            $filetype = $files['type'];
            $filesize = $files['size'];
            $filetmpname = $files['tmp_name'];

            $destination = rtrim($destinationFolder, '/') . '/' . '0';

            if (move_uploaded_file($filetmpname, $destination)) {
                // File saved successfully
            } else {
                // Error saving file
            }
        } else {
            // No file uploaded or error occurred
        }
    }
}

function processImage(){

}


