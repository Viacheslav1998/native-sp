#!/bin/bash
# render wait 
until mysql -h db -u root -proot -e "SELECT 1;" 2>/dev/null; do
  echo "Waiting for database..."
  sleep 2
done

# import dump
mysql -h db -u root -proot hastle < /docker-entrypoint-initdb.d/db_backup.sql

# run default entrypoint MariaDB
exec docker-entrypoint.sh mysqld
