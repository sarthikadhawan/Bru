import sys, json

# Load the data that PHP sent us


# Generate some data to send to PHP
result = {'status': 'Yes!'}

# Send it to stdout (to PHP)
print json.dumps(result)