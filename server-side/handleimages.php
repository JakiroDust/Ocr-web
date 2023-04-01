<?php
foreach (glob("./handle_user_upload/*.php") as $filename) {
    require_once $filename;
}
preReceive_File_Check();

require_once "./session_security/CSRF.php";
require_once  './vendor/autoload.php';
use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    CSRFcheck();
    
    receive_file_check();

    $uuid = Uuid::uuid4()->toString();
    saveUploadedFilesToFolder(__DIR__."\\client_file\\images\\",$uuid);
    rabbitMQ_connect(__DIR__."\\client_file\\images\\",$uuid);
    echo json_encode(array('uuid' => $uuid));
}
?>