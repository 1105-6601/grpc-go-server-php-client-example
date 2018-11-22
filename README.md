### Compile to Golang

```
protoc example.proto --go_out=plugins=grpc:./go
```

- `--go_out=plugins=grpc:` is required
  - `./go` is output directory of generate result
 
### Compile to PHP

```
protoc example.proto \
  --php_out=./php \
  --grpc_out=./php \
  --plugin=protoc-gen-grpc=/grpc/bins/opt/grpc_php_plugin
```

- ` --plugin=protoc-gen-grpc=/grpc/bins/opt/grpc_php_plugin` is required

- `--php_out=`
  - Output directory of Request, Response and Metadata.
  
- `--grpc_out`
  - Output directory of Client,

### Run server

```
cd example/go/server
go run server.go
```

### Run client

```
cd example/php
php index.php
```
