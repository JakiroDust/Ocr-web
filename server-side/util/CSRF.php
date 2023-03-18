<?php
function CSRFcheck(){
    if(CSRF::validate($_POST['token']))
    {
        //Do nothing
    } else 
    {
        throw new Exception('Failed to validate the token');
    }
}
?>