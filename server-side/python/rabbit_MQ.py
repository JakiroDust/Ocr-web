import pika

class RabbitMQ:
    def __init__(self,prefetch_count=1):
        # Define the connection parameters for RabbitMQ
        credentials = pika.PlainCredentials('guest', 'guest')
        parameters = pika.ConnectionParameters('localhost', 5672, '/', credentials)

        # Create a connection to RabbitMQ
        connection = pika.BlockingConnection(parameters)

        # Define the channel
        self.channel = connection.channel()
        
        #limit prefetc
        self.channel.basic_qos(prefetch_count=prefetch_count)
        
    def add_consumer(self, queue_name,func):
        # Declare the queue
        self.channel.queue_declare(queue=queue_name,durable= True)
        # Consume messages from the queue
        self.channel.basic_consume(queue=queue_name, on_message_callback=func)
    def start(self):
        print(f'Waiting for messages...')
        self.channel.start_consuming()