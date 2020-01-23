#!/bin/bash
curl -X 'PUT' http://localhost:8000/books/1 -d '{"titulo":"Celephais","author_id":"4","genre_id":"4"}' 2> /dev/null | jq
