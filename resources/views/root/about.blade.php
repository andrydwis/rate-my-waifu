@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">About</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-12"></div>
        <div class="col-md-4 col-12">
            <div class="card w-100 hvr-shrink">
                <img src="https://i.waifu.pics/pgLtw5E.jpg" onerror="this.onerror=null;this.src='https://source.unsplash.com/random';" class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-center">Andry Dwi S</h5>
                    <div class="d-flex flex-row justify-content-between">
                        <p class="card-text"><i class="fab fa-github"></i> <a href="https://github.com/andrydwis" target="_blank" class="text-dark text-decoration-none">Github</a></p>
                        <p class="card-text"><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/andry-dwi-suharmanto-09a964127/" target="_blank" class="text-dark text-decoration-none">LinkedIn</a></p>
                        <p class="card-text"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/6285156058404" target="_blank" class="text-dark text-decoration-none">Whatsapp</a></p>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="mailto:andry.dwi.s@gmail.com" target="_blank" class="btn btn-dark"><i class="fas fa-envelope"></i> Email Me</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
        </div>
    </div>
</div>
<div x-data="{ open: false }" @mouseleave="open = false" class="d-flex flex-column justify-content-center mt-5">
    <button @mouseover="open = true" class="btn btn-outline-light mx-auto"><i class="fas fa-exclamation-circle"></i> Don't Click This</button>
    <div x-show="open">
        <div class="d-flex justify-content-center mt-5">
            <a href="{{route('my-waifu.gacha', ['nsfw'])}}" class="btn btn-danger"><i class="fas fa-heart"></i> DWYOR</a>
        </div>
    </div>
</div>
@endsection