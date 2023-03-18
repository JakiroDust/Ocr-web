<?php
function receive_file_check()
{
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
?>