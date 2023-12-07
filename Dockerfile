FROM php:8.2-fpm

WORKDIR /var/www

# prepare for adding deps
RUN apt-get update && apt-get install -y gnupg nodejs npm

RUN apt-get install -y zlib1g-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev

# Install Node.js and npm
RUN apt-get update \
    && apt-get install -y gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# install other deps for imagic, mbstring, ldap, zip
RUN apt-get install -y \
    libmagickwand-dev \
    libonig-dev \
    libldb-dev libldap2-dev \
    libzip-dev \
    libodbc1 \
    odbcinst1debian2

RUN docker-php-ext-install gd
RUN docker-php-ext-install mbstring
#RUN docker-php-ext-install json
RUN docker-php-ext-install ldap
RUN docker-php-ext-install xml
RUN docker-php-ext-install zip
RUN docker-php-ext-install soap
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . .

# Copy existing application directory permissions
COPY --chown=www:www . .

# Change current user to www
USER www

EXPOSE 9000
ENTRYPOINT ["php-fpm", "-F", "-R"]
