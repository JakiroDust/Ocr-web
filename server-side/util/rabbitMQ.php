<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
function  rabbitMQ_connect($dirpath,$requestId)
{
    // Connect to RabbitMQ
    $connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    $channel = $connection->channel();

    // Declare the queue
    $channel->queue_declare('image_processing_queue', false, true, false, false);

    // Generate a unique ID for the image processing request


    // Publish the image processing request to the queue
    $message = [
        'request_id' => $requestId,
        'image_path' => $dirpath."/".$requestId,
    ];
    $channel->basic_publish(new \PhpAmqpLib\Message\AMQPMessage(json_encode($message)), '', 'image_processing_queue');

    echo "Sent image processing request with ID: $requestId\n";

    $channel->close();
    $connection->close();
}
?>