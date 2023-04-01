<?php
require_once "./session_security/CSRF.php";

if(isset($_POST['login']))
{
    if(CSRF::validate($_POST['token']))
    {
        echo "Continue CSRF token is valid";
    }else 
    {
        exit("Failed to validate the token");
    }
}