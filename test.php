<?php

require_once "./server-side/CSRF.php";

$token = "hvhvfgcgcfgcdhdjhmwr"; #this is a random text
echo "<pre>";
var_dump(CSRF::validate($token));
echo "</pre>";

?>