#!/bin/bash
curl http://localhost:8000/books -H 'X-HASH: 21d2c5d68cb32031d17d4ab7578f9d9b35d68645' -H 'X-UID: 1' -H 'X-TIMESTAMP: 1579731277' 2> /dev/null| jq