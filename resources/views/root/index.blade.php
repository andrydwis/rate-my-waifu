@extends('layouts.app')
@section('content')
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" style="background-image: url('/img/cover.jpg'); background-size: cover;">
    <div class="p-5 mb-4">
        <div class="container-fluid py-5">
            <h1 class="display-5 text-white pacifico hvr-skew">Rate My Waifu</h1>
            <p class="col-md-8 fs-4 text-white">Come join with our {{$user_count}} other member's and rate {{$waifu_count}} waifus in this platform.</p>
            <a href="{{route('register')}}" class="btn btn-light btn-lg hvr-shrink" type="button">Register</a>
        </div>
        <div class="container-fluid py-5">
            <audio autoplay loop>
                <source src="{{asset('song/bgm.mp3')}}" type="audio/mp3">
            </audio>
        </div>
    </div>
</div>
@endsection