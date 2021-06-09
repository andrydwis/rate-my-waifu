@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-white">Top Love Waifu</h1>
    </div>
</div>
<div class="container">
    <h1 class="mt-5">Top Love Waifu Rank</h1>
    <div class="list-group">
        @foreach($waifus as $waifu)
        <a href="{{route('waifu.show', [$waifu->slug])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{($waifus->currentpage() - 1) * $waifus->perpage() + $loop->index + 1}}. {{$waifu->name}}</div>
                {{$waifu->origin}}
            </div>
            <span class="badge bg-dark rounded-pill"><i class="fas fa-heart"></i> {{$waifu->love_count}}</span>
        </a>       
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{$waifus->links('vendor.pagination.simple-bootstrap-4')}}
    </div>
</div>
@endsection