@extends('layouts.app')

@section('content')
<div class="mx-6 my-6">
    welcome {{auth()->user()->username}}
    @admin
        <a href="{{route('admin')}}">click admin</a>
    @endadmin
</div>
    
@endsection