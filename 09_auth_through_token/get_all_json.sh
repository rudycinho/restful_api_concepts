#!/bin/bash
curl http://localhost:8000/books 2> /dev/null | jq
