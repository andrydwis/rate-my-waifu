@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-white">Rate My Waifu</h1>
        <p class="col-md-8 fs-4 text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, suscipit.</p>
        <button class="btn btn-light btn-lg" type="button">Register</button>
    </div>
</div>
<div class="container mt-5">

    <div class="row">
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="text-center">{{$user_count}} Users</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="text-center">{{$waifu_count}} Wafius</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection