@extends('layouts.app')
@section('content')
<div class="container">
    @if($waifus->isNotEmpty())
    <a href="{{route('my-waifu.gacha', ['sfw'])}}" class="btn btn-outline-primary mt-5">Gacha New Waifu</a>
    @endif
    <div class="row mt-5">
        @forelse($waifus as $waifu)
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-lg">
                <a href="{{route('my-waifu.show', [$waifu->slug])}}">
                    <img src="{{$waifu->photo}}" class="card-img-top" alt="">
                </a>
                <div class="card-body">
                    <span class="badge rounded-pill bg-secondary">{{$waifu->origin}}</span>
                    <h5 class="card-title"><a href="{{route('my-waifu.show', [$waifu->slug])}}" style="text-decoration: none;">{{$waifu->name}}</a></h5>
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
                    <p class="lead text-center">You don't have any waifu yet ?</p>
                    <a href="{{route('my-waifu.gacha', ['sfw'])}}" class="btn btn-outline-primary">Gacha New Waifu</a>
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