@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">Top Anime {{$season_name}} {{$season_year}}</h1>
    </div>
</div>
<div class="container">

    <div class="row mt-5">
        @foreach($animes as $anime)
        <div class="col-sm-4 col-12 d-flex align-items-stretch mb-3">
            <div class="card w-100 hvr-shrink">
                <img src="{{$anime['image_url']}}" onerror="this.onerror=null;this.src='https://source.unsplash.com/random';" class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                <span class="badge rounded-pill bg-dark position-absolute top-0 start-0 m-3"><i class="fas fa-star"></i> {{$anime['score']}}</span>
                <div class="card-body">
                    <h5 class="card-title">{{$anime['title']}}</h5>
                    @foreach($anime['genres'] as $genre)
                    <span class="badge bg-dark">{{$genre['name']}}</span>
                    @endforeach
                    <p class="card-text">Aired at {{\Carbon\Carbon::parse($anime['airing_start'])->format('M d, Y')}}</p>
                    <div class="d-grid">
                        <a href="{{$anime['url']}}" target="_blank" class="btn btn-dark"><i class="fas fa-eye"></i> Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection