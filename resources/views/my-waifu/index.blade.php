@extends('layouts.app')
@section('content')
<div class="container">
    @if($waifus->isNotEmpty())
    <a href="{{route('my-waifu.create')}}" class="btn btn-outline-primary mt-5">Add New Waifu</a>
    @endif
    <div class="row mt-5">
        @forelse($waifus as $waifu)
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-lg">
                <img src="{{ asset('storage/'.$waifu->photo) }}" class="card-img-top" alt="">
                <div class="card-body">
                    <span class="badge rounded-pill bg-secondary">{{$waifu->origin}}</span>
                    <h5 class="card-text">{{$waifu->name}}</h5>
                    <p class="lead">{{Illuminate\Support\Str::limit($waifu->description, 20)}}</p>
                    <div class="d-flex justify-content-evenly">
                        <p><i class="fas fa-heart"></i> 456565</p>
                        <p><i class="fas fa-frown"></i> 456565</p>
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
                    <a href="{{route('my-waifu.create')}}" class="btn btn-outline-primary">Add New Waifu</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12"></div>
        @endforelse
    </div>
</div>
@endsection