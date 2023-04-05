import time
import json

#get path
import os
import itertools as it, glob

def process_image(ch, method, properties, body):
    # Simulate image processing time
    #time.sleep()
    data=json.loads(body.decode())
    dir_path=data['image_path']
    request_id=data['request_id']
    results=[]
    images_path=glob.glob(os.path.join(dir_path, '*.jpg'))+glob.glob(os.path.join(dir_path, '*.png'))
    # Iterate through all the image files in the directory
    for file_path in images_path:
        # Process the image file
        print(f"Processing file {file_path}")
        results.append(os.path.getsize(file_path))

    #write json file
    user_json={f'{i}':j for i, j in enumerate(results)}
    with open(dir_path+f"\{request_id}.json", "w") as outfile:
        json.dump(user_json, outfile)
        
    #remove all image
    for file_path in images_path:
        os.remove(file_path)
    ch.basic_ack(delivery_tag=method.delivery_tag)