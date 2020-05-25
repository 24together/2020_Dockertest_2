FROM php:7.2.10-fpm-stretch
WORKDIR /root

RUN apt-get update && apt-get install -y \
  # git-core\
  libicu-dev \
  libpq-dev \
  mariadb-client \
  zip \
  unzip \
  libzip-dev \
  zlib1g-dev \
  && rm -r /var/lib/apt/lists/*
# configure the php modules
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
  && docker-php-ext-install \
  intl \
  mbstring \
  pcntl \
  pdo_mysql \
  zip \
  opcache

#install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer 
RUN php -r "unlink('composer-setup.php');"
#パスにエラーが出た部分
RUN mv composer.phar /usr/local/bin/composer
RUN docker-php-ext-install intl pdo_mysql mbstring