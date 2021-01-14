@extends('layouts.app')
@section('content')

<div class="container">
    <div style="border:5px solid #0fa3ff; background:#f0f0f0;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Spiece</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->animals as $animal)
                <tr>
                    <td>{{$animal->name}}</td>
                    <td>{{$animal->spiece}}</td>
                    <td>{{$animal->points}}</td>
                    @can('update',$user)
                    <td><a href="/animal/{{$animal->id}}/edit">Edit</a></td>
                    @endcan
                <tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection