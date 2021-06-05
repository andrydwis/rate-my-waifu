@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card shadow-lg">
                <img src="{{ asset('storage/'.$waifu->photo) }}" class="card-img-top" alt="">
                <div class="card-footer d-flex justify-content-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('my-waifu.edit', [$waifu->slug])}}" class="btn btn-outline-primary">Edit</a>
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-12">
            <div class="card shadow-lg mb-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{route('my-waifu.index')}}" class="btn btn-primary">Back</a>
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary"><i class="fas fa-heart"></i> {{$love_count}}</button>
                        <button class="btn btn-outline-primary"><i class="fas fa-frown"></i> {{$meh_count}}</button>
                        <a href="#review" class="btn btn-outline-primary"><i class="fas fa-comment-alt"></i> {{$reviews_count}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <p><b>Name: </b> {{$waifu->name}}</p>
                    <p><b>Birthdate: </b>{{Carbon\Carbon::parse($waifu->birthdate)->format('M d, Y')}}</p>
                    <p><b>Origin: </b>{{$waifu->origin}}</p>
                    <p><b>Description:</b></p>
                    <p>{{$waifu->description}}</p>
                    <p class="mt-5"><b>Added By: </b>{{$waifu->user->name}}</p>
                    <div class="d-flex justify-content-center">
                        @if(!$user_rate)
                        <form action="{{route('rate.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="waifu_id" value="{{$waifu->id}}">
                            <input type="hidden" name="type" value="love">
                            <button class="btn btn-outline-primary me-3" type="submit"><i class="fas fa-heart"></i> Love</button>
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
                            <button class="btn btn-primary me-3" type="submit"><i class="fas fa-heart"></i> Love</button>
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
                            <button class="btn btn-outline-primary me-3" type="submit"><i class="fas fa-heart"></i> Love</button>
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
                                <p>{{$review->content}}</p>
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
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Waifu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete your waifu ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{route('my-waifu.destroy', [$waifu->slug])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection