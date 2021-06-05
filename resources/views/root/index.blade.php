@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Custom jumbotron</h1>
            <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
            <button class="btn btn-primary btn-lg" type="button">Example button</button>
        </div>
    </div>
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