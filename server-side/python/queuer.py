import pika
import time
from rabbit_MQ import RabbitMQ
from process_ocr import process_image
rabbitMq=RabbitMQ()
rabbitMq.add_consumer("image_processing_queue",process_image)
rabbitMq.start()