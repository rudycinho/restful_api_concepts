#!/bin/bash
curl http://logos:1234@localhost:8000/books 2> /dev/null | jq
