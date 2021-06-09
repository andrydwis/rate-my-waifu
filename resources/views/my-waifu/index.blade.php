@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">My Waifu</h1>
    </div>
</div>
<div class="container">
    @if($waifus->isNotEmpty())
    <a href="{{route('my-waifu.gacha', ['sfw'])}}" class="btn btn-outline-light"><i class="fas fa-bullseye"></i> Gacha New Waifu</a>
    @endif
    <div class="row mt-5">
        @forelse($waifus as $waifu)
        <div class="col-md-4 col-sm-6 col-12 mb-3">
            <div class="card w-100 hvr-shrink">
                <a href="{{route('my-waifu.show', [$waifu->slug])}}">
                    <img src="{{$waifu->photo}}" class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                    <span class="badge rounded-pill bg-dark position-absolute top-0 start-0 m-3">{{$waifu->origin}}</span>
                </a>
                <div class="card-body">
                    <h5 class="card-title text-dark text-center">{{$waifu->name}}</h5>
                    <div class="d-grid gap-2">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-dark"><i class="fas fa-heart"></i> {{$waifu->rates->where('type', 'love')->count()}}</button>
                            <button type="button" class="btn btn-outline-dark"><i class="fas fa-frown"></i> {{$waifu->rates->where('type', 'meh')->count()}}</button>
                            <button type="button" class="btn btn-outline-dark"><i class="fas fa-comment-alt"></i> {{$waifu->reviews->count()}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-3 col-12"></div>
        <div class="col-md-6 col-12">
            <div class="d-flex flex-column align-items-center">
                <img src="{{asset('img/empty.svg')}}" width="250px" alt="">
                <p class="lead text-white">You don't have any waifu yet ?</p>
                <a href="{{route('my-waifu.gacha', ['sfw'])}}" class="btn btn-outline-light"><i class="fas fa-bullseye"></i> Gacha New Waifu</a>
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