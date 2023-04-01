import time
def process_image(ch, method, properties, body):
    # Simulate image processing time
    time.sleep(10)
    print("Processed image:", body.decode())
    ch.basic_ack(delivery_tag=method.delivery_tag)