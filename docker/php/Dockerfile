ARG PHP_VERSION
FROM php:${PHP_VERSION}-fpm

ARG UID
ARG GID

RUN apt-get update && apt-get install -y --no-install-recommends \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
		libonig-dev \
		libcurl4-openssl-dev \
		libedit-dev \
		libzip-dev \
		libmagickwand-dev \
		unzip \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd \
         mbstring \
	 mysqli \
	 curl \
	 opcache \
	 intl \
	 pdo_mysql \
	 soap \
	 xml \
	 zip

RUN pecl install imagick \
 && docker-php-ext-enable imagick

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN groupadd wordpress --gid $GID
RUN useradd wordpress --uid $UID --gid $GID -d /var/www
COPY ./zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
RUN chown -R wordpress:wordpress /usr/local/etc/php /usr/local/etc/php-fpm.d /var/www/

COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

USER wordpress
WORKDIR /var/www
RUN composer create-project roots/bedrock
WORKDIR /var/www/bedrock
RUN composer require wp-cli/wp-cli aaemnnosttv/wp-cli-dotenv-command
ENV PATH="./vendor/bin/:${PATH}"

ENTRYPOINT ["/entrypoint.sh"]