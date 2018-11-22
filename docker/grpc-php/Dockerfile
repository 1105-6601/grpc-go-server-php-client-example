FROM php:7.2-cli

# Install basics, grpc, protobuf
RUN apt-get update \
 && apt-get install -y vim git zip wget automake libtool libz-dev \
 && pecl install grpc \
 && pecl install protobuf

# Install protoc
RUN wget https://github.com/protocolbuffers/protobuf/releases/download/v3.6.1/protoc-3.6.1-linux-x86_64.zip \
 && unzip protoc-3.6.1-linux-x86_64.zip -d protoc \
 && cd protoc \
 && mv bin/protoc /usr/bin

# Install grpc_php_plugin
RUN git clone -b $(curl -L https://grpc.io/release) https://github.com/grpc/grpc \
 && cd grpc \
 && git submodule update --init \
 && make grpc_php_plugin

# Install composer
RUN curl -sS https://getcomposer.org/installer | php \
 && mv composer.phar /usr/bin/composer

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./services.sh /etc/services.sh

RUN chmod a+x /etc/services.sh

RUN sed -i -e '9,13s:^#::' /root/.bashrc
