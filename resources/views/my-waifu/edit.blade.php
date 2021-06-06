@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-white">Edit Waifu</h1>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-3 col-12"></div>
        <div class="col-md-6 col-12">
            <div class="card shadow-lg">
                <img src="{{$waifu->photo}}" class="card-img-top" alt="">
                <div class="card-footer"></div>
            </div>
            <div class="card shadow-lg">
                <div class="card-header">
                    <a href="{{route('my-waifu.index')}}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('my-waifu.update', [$waifu->slug])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{old('name') ?? $waifu->name}}">
                            <label for="name">Name</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" placeholder="birthdate" value="{{old('birthdate') ?? $waifu->birthdate}}">
                            <label for="birthdate">Birthdate</label>
                            @error('birthdate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" name="origin" placeholder="origin" value="{{old('origin') ?? $waifu->origin}}">
                            <label for="origin">Origin</label>
                            @error('origin')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" id="description" name="description" style="height: 200px">{{old('description') ?? $waifu->description}}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12"></div>
    </div>
</div>
@endsection