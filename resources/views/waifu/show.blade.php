@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-lg">
                <img src="{{ asset('storage/'.$waifu->photo) }}" class="card-img-top" alt="">
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <div class="card shadow-lg mb-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{route('waifu.index')}}" class="btn btn-primary">Back</a>
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary"><i class="fas fa-heart"></i> 123</button>
                        <button class="btn btn-outline-primary"><i class="fas fa-frown"></i> 123</button>
                        <a href="#review" class="btn btn-outline-primary"><i class="fas fa-comment-alt"></i> {{$reviews_count}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="lead"><b>Name: </b> {{$waifu->name}}</p>
                    <p class="lead"><b>Birthdate: </b>{{Carbon\Carbon::parse($waifu->birthdate)->format('M d, Y')}}</p>
                    <p class="lead"><b>Origin: </b>{{$waifu->origin}}</p>
                    <p class="lead"><b>Description:</b></p>
                    <p class="lead">{{$waifu->description}}</p>
                    <p class="lead mt-5"><b>Added By: </b>{{$waifu->user->name}}</p>
                </div>
            </div>
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-text">Review</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse($reviews as $review)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <b>{{$review->user->name}}</b><br>
                                <p class="text-sm text-muted">{{$review->created_at->diffForHumans()}}</p>
                                <p class="lead">{{$review->content}}</p>
                            </div>
                            @if($review->user_id==auth()->user()->id)
                            <form action="{{route('review.destroy', [$review])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-primary" type="submit">Delete</button>
                            </form>
                            @endif
                        </li>
                        @empty
                        <p class="lead">No Review Found</p>
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
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection