#!/usr/bin/env bash

set -e

mysql-ping-host 10

#mysql-import-dump demo path/to/demo.sql

mysql-import-dump ipcc /var/www/common/sql/ipcc.sql
mysql-import-dump black_list /var/www/common/sql/blacklist.sql