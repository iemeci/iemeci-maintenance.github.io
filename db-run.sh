#!/usr/bin/env bash
/usr/local/bin/docker run \
-d --name postgres-container \
-v /opt/docker/postgresql:/var/lib/postgresql/data \
-p 15432:5432 \
-e POSTGRES_USER=dev \
-e POSTGRES_PASSWORD=password \
postgres:12-alpine
