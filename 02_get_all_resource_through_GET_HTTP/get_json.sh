#!/bin/bash
curl http://localhost:8000?resource_type=books 2> /dev/null | jq