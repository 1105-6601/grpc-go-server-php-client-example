package main

import (
	pb "grpc-training/example/go"
	"google.golang.org/grpc/reflection"
	"google.golang.org/grpc"
	"context"
	"log"
	"net"
)

const (
	PORT = ":50051"
)

type server struct{}

func (s *server) Echo(ctx context.Context, in *pb.EchoRequest) (*pb.EchoResponse, error) {
	return &pb.EchoResponse{Message: "Hello " + in.Message}, nil
}

func main() {

	lis, err := net.Listen("tcp", PORT)
	if err != nil {
		log.Fatalf("failed to listen: %v", err)
	}

	s := grpc.NewServer()

	pb.RegisterExampleServer(s, &server{})

	// Register reflection service on gRPC server.
	reflection.Register(s)

	if err := s.Serve(lis); err != nil {
		log.Fatalf("failed to serve: %v", err)
	}
}
