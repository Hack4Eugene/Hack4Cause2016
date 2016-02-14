#!/bin/bash

# source the creds file in our home directory
source /home/ec2-user/db_creds

LOCALFILE='/tmp/wordpress_db.sql.gz'
BUCKET='redcaps.mysql-dr'

mysqldump -u $DB_USER -p$DB_PASSWORD --all-databases | gzip > $LOCALFILE

aws s3 cp $LOCALFILE s3://$BUCKET

rm -rf $LOCALFILE
