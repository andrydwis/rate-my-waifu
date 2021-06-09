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
            <ul class="list-group list-group-flush">
                @foreach($newss as $news)
                <li class="list-group-item d-flex flex-column flex-sm-row">
                    <img src="{{$news['urlToImage']}}" alt="" class="img-thumbnail m-1" style="width: 200px; height:150px; object-fit: cover;">
                    <div class="f-flex flex-column">
                        <h5>{{$news['title']}}</h5>
                        <p>{{$news['author'] ?? 'Anonym'}} - {{\Carbon\Carbon::parse($news['publishedAt'])->diffForHumans()}}</p>
                        <p>{{\Illuminate\Support\Str::words($news['description'], 20)}}</p>
                        <p><a href="{{$news['url']}}" target="_blank">Read More</a></p>
                    </div>
                </li>
                @endforeach
            </ul>
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