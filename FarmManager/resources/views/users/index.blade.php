@extends('layouts.app')

@section('content')
<!--<h1>{{$user-> id}}</h1>
<h1>{{$user -> name}}</h1>
@can('update',$user)
<h1>can update</h1>
@endcan-->
<div class="container">
    <div class="row col-10 mx-auto p-5" style="border:3px solid rgba(0,0,0,0.5); background:#f0f0f0;">
        <div class="row">
            <div class="col-4 pl-0">
                <img src="/storage/{{$user->image ?? 'uploads/default_avatar.png'}}" class="w-75" style="border:2px solid #0fa3ff; border-radius:10px" />
            </div>
            <div class="col-8">
                <div class="pl-3"><b>Name:</b> {{$user -> name}}</div>
                <div class="mt-2 pl-3"><b>Description:</b> {{$user -> description ?? 'User didnt provide description.'}}</div>
                <div class="pl-3 mt-2">
                    <strong><a href="/user/{{$user->id}}/animals">Click here to view animal collection!</a><strong>
                </div>
                <div class="row mt-5">
                    <div class="col align-self-start d-flex">
                        <img src="/svg/chicken.svg" class="ml-3" height="75px" alt="">
                        <h1 class="mt-4">0</h1>
                    </div>
                    <div class="col align-self-center d-flex">
                        <img src="/svg/cow.svg" class="ml-3" height="75px" alt="">
                        <h1 class="mt-4">{{$user->getCowCount()}}</h1>
                    </div>
                    <div class="col align-self-end d-flex">
                        <img src="/svg/horse.svg" class="ml-3" height=75px alt="">
                        <h1 class="mt-4">0</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection