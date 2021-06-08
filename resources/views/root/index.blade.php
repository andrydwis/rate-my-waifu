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
    <div class="card mt-5">
        <div class="card-header">
            <h5 class="card-text text-center">Anime News</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($newss as $news)
                <div class="col-sm-4 col-12 mb-1">
                    <div class="card">
                        <img src="{{$news['urlToImage']}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$news['title']}}</h5>
                            <p class="card-text">{{\Illuminate\Support\Str::words($news['description'], 20)}}</p>
                            <p class="card-text">{{$news['author']}} - {{\Carbon\Carbon::parse($news['publishedAt'])->diffForHumans()}}</p>
                            <a href="{{$news['url']}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection