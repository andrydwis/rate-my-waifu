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
                        <button class="btn btn-outline-primary"><i class="fas fa-heart"></i> 123</button>
                        <button class="btn btn-outline-primary"><i class="fas fa-frown"></i> 123</button>
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