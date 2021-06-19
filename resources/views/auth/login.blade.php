@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 col-12 d-flex justify-content-center align-items-center mb-5">
            <h1 class="display-5 fw-bold text-white">Login</h1>
        </div>
        <div class="col-md-6 col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{route('login')}}" method="post">
                        @csrf
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
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                            <a href="{{route('register')}}" class="btn btn-outline-dark"><i class="fas fa-user-plus"></i> Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection