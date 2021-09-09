@extends('layouts.app')

@section('content')
<div class="mx-6 mb-6">
    @if (session('status'))
        <div x-data="{close:true}">
            <div  x-show="close" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                <span class="text-xl inline-block mr-5 align-middle">
                    <i class="fas fa-bell"></i>
                </span>
                <span class="inline-block align-middle mr-8">
                    {{session('status')}}
                </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                    <span x-on:click="close=false">×</span>
                </button>
            </div>
        </div>
    @endif
    welcome {{auth()->user()->username}}
</div>
    
@endsection