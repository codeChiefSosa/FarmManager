@extends('layouts.app')

@section('content')
<h1>{{$user-> id}}</h1>
<h1>{{$user -> name}}</h1>
@can('update',$user)
<h1>can update</h1>
@endcan
@endsection