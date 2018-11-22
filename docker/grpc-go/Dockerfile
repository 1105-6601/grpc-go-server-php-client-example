FROM golang:1.11.2

# Install basics
RUN apt-get update \
 && apt-get install -y vim git zip wget

# Install grpc, protoc-gen-go
RUN go get -u google.golang.org/grpc \
 && go get -u github.com/golang/protobuf/protoc-gen-go

# Install protoc
RUN wget https://github.com/protocolbuffers/protobuf/releases/download/v3.6.1/protoc-3.6.1-linux-x86_64.zip \
 && unzip protoc-3.6.1-linux-x86_64.zip -d protoc \
 && cd protoc \
 && mv bin/protoc /usr/bin

ENV PATH $PATH:$GOPATH/bin

COPY ./services.sh /etc/services.sh

RUN chmod a+x /etc/services.sh

EXPOSE 50051

RUN sed -i -e '9,13s:^#::' /root/.bashrc
