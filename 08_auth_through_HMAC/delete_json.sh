#!/bin/bash
curl -X 'DELETE' http://localhost:8000/books/1 2> /dev/null | jq
