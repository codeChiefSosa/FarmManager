@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/animal/{{$animal->id}}" id="wrrr" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class=" mx-auto" style="border:1px solid rgba(0,0,0,0.5);background:#f0f0f0;">
                <div class="form-group row pt-3">
                    <label for="name" class="col-3 ml-4"><b>Name</b></label>
                    <input type="text" id="name" name="name" value="{{$animal -> name}}" class="col-3">
                    @error('name')
                    <div class="col-4">
                        <strong class="text-danger">{{$message}}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group row pt-3">
                    <label for="description" class="col-3 ml-4"><b>Spiece</b></label>
                    <input type="text" readonly id="description" name="description" value="{{$animal->spiece}}" class="col-3">
                </div>
            </div>
        </div>
    </form>
    <div class="pt-2 row">
        <button class="btn btn-primary col-4" form="wrrr">Save changes</button>
        <div class="col-4 offset-md-4">
            <form action="/animal/{{$animal->id}}" id="testform" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" style="width: 100%;" form="testform">Delete</button>
            </form>
        </div>

    </div>
    @endsection