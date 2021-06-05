@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5">Top Love Waifu Rank</h1>
    <div class="list-group">
        @foreach($waifus as $waifu)
        <a href="{{route('waifu.show', [$waifu->slug])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{$waifu->name}}</div>
                {{$waifu->origin}}
            </div>
            <span class="badge bg-primary rounded-pill">{{$waifu->loves_count}}</span>
        </a>       
        @endforeach
    </div>
</div>
@endsection