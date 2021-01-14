@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/user/{{$user->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="col-10 mx-auto" style="border:1px solid rgba(0,0,0,0.5);background:#f0f0f0;">
            <div class="form-group row pt-3">
                <label for="name" class="col-4"><b>Username</b></label>
                <input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="col-4">
            </div>
            <div class="form-group row pt-3">
                <label for="description" class="col-4"><b>Description</b></label>
                <input type="text" id="description" name="description" value="{{$user->description}}" class="col-4">
            </div>
            <div class="form-group row pt-3">
                <label for="image" class="col-4"><b>Profile image</b></label>
                <input type="file" id="image" name="image" class="col-4 pl-0">
            </div>
        </div>
        <div class="text-center pt-2">
            <button class="btn btn-primary col-4">Save changes</button>
            <div>
    </form>
</div>
@endsection