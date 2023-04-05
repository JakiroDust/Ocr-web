@echo off

start cmd /k "conda activate web-python && python ./server-side/python/queuer_ocr.py"
start cmd /k "php -S localhost:8000 -c ./server-side/etc/php.ini"

echo All terminal windows have been launched.
