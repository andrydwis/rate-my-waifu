@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Result</h1>
    <img src="{{$photo}}" alt="" width="200px">
    <a href="{{$photo}}" target="_blank" class="btn btn-outline-dark">Just Download</a>
    <a href="{{route('my-waifu.gacha', ['sfw'])}}" class="btn btn-outline-primary">Gacha Again</a>
    <button class="btn btn-primary">Claim My Waifu</button>

    <hr>

    <div class="row mt-5">
        <div class="col-md-3 col-12"></div>
        <div class="col-md-6 col-12">
            <div class="card shadow-lg">
                <div class="card-header">
                    <a href="{{route('my-waifu.index')}}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">
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