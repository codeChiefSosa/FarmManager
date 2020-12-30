@extends('layouts.app')

@section('content')
<input type="text" value="{{$user->id}}" />
<input type="text" value="{{$user->name}}" />
@can('update',$user)
<h1>can update</h1>
@endcan
@endsection