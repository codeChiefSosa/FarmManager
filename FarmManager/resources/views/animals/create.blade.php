@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/animal" method="POST">
        @csrf
        @method('POST')
        <div class="form-group row pt-3">
            <label for="name" class="col-4 text-white"><b>Animal name: </b></label>
            <input type="text" id="name" name="name" class="col-4">
            @error('name')
            <div class="text-danger pl-2" role="alert">
                <strong>{{$message}}</strong>
            </div>
            @enderror

        </div>
        <div class="form-group row pt-3">
            <label for="spiece" class="col-4 text-white"><b>Animal type</b></label>
            <input list="spieces" id="spiece" name="spiece" class="col-4">
            <datalist id="spieces">
                <option value="Cow">
                <option value="Chicken">
                <option value="Horse">
            </datalist>
            @error('spiece')
            <div class="text-danger pl-2" role="alert">
                <strong>{{$message}}</strong>
            </div>
            @enderror
        </div>
        <div class="text-center pt-2">
            <button class="btn btn-primary col-4 border border-white">Save changes</button>
            <div>
    </form>
</div>
@endsection