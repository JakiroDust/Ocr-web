import pika
import time

# Connect to RabbitMQ
connection = pika.BlockingConnection(pika.ConnectionParameters('localhost'))
channel = connection.channel()

# Declare the queue
channel.queue_declare(queue='image_processing_queue')

# Define the callback function to process the images
def process_image(ch, method, properties, body):
    # Simulate image processing time
    time.sleep(10)
    print("Processed image:", body.decode())
    ch.basic_ack(delivery_tag=method.delivery_tag)

# Consume messages from the queue
channel.basic_qos(prefetch_count=1)
channel.basic_consume(queue='image_processing_queue', on_message_callback=process_image)

print('Waiting for messages...')
channel.start_consuming()