#!/bin/bash

wp dotenv init --template=.env.base --with-salts
wp dotenv set WP_SITEURL ${HTTP_SCHEME}://${WORDPRESS_FQDN}/wp
wp dotenv set WP_HOME ${WORDPRESS_FQDN}

php-fpm
