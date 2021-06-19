@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">Gacha Waifu</h1>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-3 col-12"></div>
        <div class="col-md-6 col-12">
            <div class="card" x-data="{ open: false }" >
                <img src="{{$photo}}" class="card-img-top" alt="">
                <a href="{{route('my-waifu.index')}}" class="btn btn-dark position-absolute top-0 start-0 m-3"><i class="fas fa-arrow-left"></i> Back</a>
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="btn-group" role="group">
                            <a href="{{$photo}}" target="_blank" class="btn btn-outline-dark"><i class="fas fa-arrow-down"></i> Just Download</a>
                            @if($type=='sfw')
                            <a href="{{route('my-waifu.gacha', ['sfw'])}}" class="btn btn-outline-dark"><i class="fas fa-bullseye"></i> Gacha Again</a>
                            @elseif($type=='nsfw')
                            <a href="{{route('my-waifu.gacha', ['nsfw'])}}" class="btn btn-outline-dark"><i class="fas fa-bullseye"></i> Gacha Again</a>
                            @endif
                            <button class="btn btn-dark" @click="open = !open"><i class="fas fa-save"></i> Claim My Waifu</button>
                        </div>
                    </div>
                    <div x-show="open">
                        <form action="{{route('my-waifu.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{$type}}">
                            <input type="hidden" name="photo" value="{{$photo}}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{old('name')}}">
                                <label for="name">Name</label>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" placeholder="birthdate" value="{{old('birthdate')}}">
                                <label for="birthdate">Birthdate</label>
                                @error('birthdate')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" name="origin" placeholder="origin" value="{{old('origin')}}">
                                <label for="origin">Origin</label>
                                @error('origin')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" id="description" name="description" style="height: 200px">{{old('description')}}</textarea>
                                <label for="description">Description</label>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12"></div>
    </div>
</div>
@endsection