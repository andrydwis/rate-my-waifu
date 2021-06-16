@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">Top Couple</h1>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        @foreach($couples as $couple)
        <div class="col-sm-4 col-12 d-flex align-items-stretch mb-3">
            <div class="card w-100 hvr-shrink">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="{{$couple->thumbnails[0]}}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col">
                            <img src="{{$couple->thumbnails[1]}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                    <h5 class="card-title text-center mt-3">{{$couple->rank}}. {{$couple->couple_name}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="alert alert-light" role="alert">
        <h4 class="alert-heading">{{$season}}</h4>
        <p>This Top Couple Chart show Top 20 of the list and was voted at {{$date}}</p>
        <hr>
        <p class="mb-0">Source : <a href="https://anitrendz.net/charts/couple-ship/">anitrendz.net</a></p>
    </div>
</div>
@endsection