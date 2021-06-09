@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-white">News</h1>
    </div>
</div>
<div class="container">
    <div class="card shadow-lg mt-5">
        <div class="card-body">
            <div class="row">
                @foreach($newss as $news)
                <div class="col-sm-4 col-12 mb-1">
                    <div class="card">
                        <img src="{{$news['urlToImage']}}" onerror="this.onerror=null;this.src='https://source.unsplash.com/random';" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$news['title']}}</h5>
                            <p class="card-text">{{\Illuminate\Support\Str::words($news['description'], 20)}}</p>
                            <p class="card-text">{{$news['author'] ?? 'Anonym'}} - {{\Carbon\Carbon::parse($news['publishedAt'])->diffForHumans()}}</p>
                            <a href="{{$news['url']}}" target="_blank" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        @if($page==1)
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{route('root.news')}}?page={{$page-1}}" tabindex="-1">Previous</a>
                        </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{route('root.news')}}?page={{$page+1}}" tabindex="-1">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection