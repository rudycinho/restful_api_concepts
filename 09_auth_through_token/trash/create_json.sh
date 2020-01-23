#!/bin/bash
curl -X 'POST' http://localhost:8000/books -d '{"titulo":"News","author_id":"1","genre_id":"1"}' 2> /dev/null | jq
