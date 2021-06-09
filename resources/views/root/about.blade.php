@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">About</h1>
    </div>
</div>
<div x-data="{ open: false }" @mouseleave="open = false" class="d-flex flex-column justify-content-center">
    <button @mouseover="open = true" class="btn btn-outline-light mx-auto"><i class="fas fa-exclamation-circle"></i> Don't Click This</button>
    <div x-show="open">
        <div class="d-flex justify-content-center mt-5">
            <a href="{{route('my-waifu.gacha', ['nsfw'])}}" class="btn btn-danger"><i class="fas fa-heart"></i> DWYOR</a>
        </div>
    </div>
</div>
@endsection