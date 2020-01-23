#!/bin/bash
curl http://cesar:1234@localhost:8000/books 2> /dev/null | jq
