#!/bin/bash
curl http://localhost:8000/books -H 'X-HASH: 21d2c5d68cb32031d17d4ab7578f9d9b35d6864' -H 'X-UID: 1' -H 'X-TIMESTAMP: 157973128' 2> /dev/null| jq