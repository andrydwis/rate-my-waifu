@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-white">Search Waifu</h1>
    </div>
</div>
<div class="container">
    <div class="card shadow-lg mt-5">
        <div class="card-body">
            <form action="{{route('waifu.search')}}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control @error('keyword') is-invalid @enderror" name="keyword" placeholder="Search Waifu">
                    <button class="btn btn-outline-primary" type="subit"><i class="fas fa-search"></i></button>
                    @error('keyword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <p class="lead">Search result of {{$keyword}} :</p>
        @forelse($waifus as $waifu)
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-lg">
                <a href="{{route('waifu.show', [$waifu->slug])}}">
                    <img src="{{$waifu->photo}}" class="card-img-top" alt="">
                </a>
                <div class="card-body">
                    <span class="badge rounded-pill bg-secondary">{{$waifu->origin}}</span>
                    <h5 class="card-title"><a href="{{route('waifu.show', [$waifu->slug])}}" style="text-decoration: none;">{{$waifu->name}}</a></h5>
                    <div class="d-flex justify-content-evenly">
                        <p><i class="fas fa-heart"></i> {{$waifu->rates->where('type', 'love')->count()}}</p>
                        <p><i class="fas fa-frown"></i> {{$waifu->rates->where('type', 'meh')->count()}}</p>
                        <p><i class="fas fa-comment-alt"></i> {{$waifu->reviews->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-3 col-12"></div>
        <div class="col-md-6 col-12">
            <div class="card shadow-lg">
                <div class="card-body d-flex flex-column align-items-center">
                    <img src="{{asset('img/empty.svg')}}" width="250px" alt="">
                    <p class="lead text-center">Oops, no waifu found in here. are you sure right spelling her name ?</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12"></div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{$waifus->links('vendor.pagination.simple-bootstrap-4')}}
    </div>
</div>
@endsection