@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 col-12 d-flex justify-content-center align-items-center mb-5">
            <h1 class="display-5 fw-bold text-white">Register</h1>
        </div>
        <div class="col-md-6 col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{old('name')}}">
                            <label for="name">Name</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" value="{{old('email')}}">
                            <label for="email">Email</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password_confirmation">
                            <label for="password_confirmation">Password Confirmation</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-user-plus"></i> Register</button>
                            <a href="{{route('login')}}" class="btn btn-outline-dark"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection