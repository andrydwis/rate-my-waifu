@extends('layouts.app')
@section('content')
<div class="p-5 mb-4" style="background-image: url('/img/banner.jpg'); background-size: cover;">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 text-white pacifico">Detail Waifu</h1>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4 col-sm-6 col-12 mb-5">
            <div class="card">
                <img src="{{$waifu->photo}}" class="card-img-top" alt="">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{$waifu->photo}}" target="_blank" class="btn btn-dark"><i class="fas fa-arrow-down"></i> Download</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <div class="card mb-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{route('waifu.index')}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-dark"><i class="fas fa-heart"></i> {{$love_count}}</button>
                        <button class="btn btn-outline-dark"><i class="fas fa-frown"></i> {{$meh_count}}</button>
                        <a href="#review" class="btn btn-outline-dark"><i class="fas fa-comment-alt"></i> {{$reviews_count}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p><b>Name: </b> {{$waifu->name}}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Birthdate: </b>{{Carbon\Carbon::parse($waifu->birthdate)->format('M d, Y')}}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Origin: </b>{{$waifu->origin}}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Description:</b></p>
                            <p>{{$waifu->description}}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Added By: </b>{{$waifu->user->name}}</p>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        @if(!$user_rate)
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="love">
                            <button class="btn btn-outline-dark me-3" type="submit"><i class="fas fa-heart"></i> Love</button>
                        </form>
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="meh">
                            <button class="btn btn-outline-dark" type="submit"><i class="fas fa-frown"></i> Meh</button>
                        </form>
                        @else
                        @if($user_rate->type=='love')
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="love">
                            <button class="btn btn-dark me-3" type="submit"><i class="fas fa-heart"></i> Love</button>
                        </form>
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="meh">
                            <button class="btn btn-outline-dark" type="submit"><i class="fas fa-frown"></i> Meh</button>
                        </form>
                        @else
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="love">
                            <button class="btn btn-outline-dark me-3" type="submit"><i class="fas fa-heart"></i> Love</button>
                        </form>
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="meh">
                            <button class="btn btn-dark" type="submit"><i class="fas fa-frown"></i> Meh</button>
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-text">Review</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($reviews as $review)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <b>{{$review->user->name}}</b> <span class="text-muted"> - {{$review->created_at->diffForHumans()}}</span><br>
                                <p>{{$review->content}}</p>
                            </div>
                            @auth
                            @if($review->user_id==auth()->user()->id)
                            <form action="{{route('review.destroy', [$review])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-dark" type="submit"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                            @endif
                            @endauth
                        </li>
                        @empty
                        <p>No Review Found</p>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center mt-5">
                        {{$reviews->links('vendor.pagination.simple-bootstrap-4')}}
                    </div>
                    <form action="{{route('review.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('content') is-invalid @enderror" placeholder="content" id="review" name="content" style="height: 200px">{{old('content')}}</textarea>
                            <label for="content">Write Your Review</label>
                            @error('content')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-dark" type="submit"><i class="fas fa-save"></i> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection