@extends('layouts.app')

@section('content')
<div class="bg-blue-100 p-5 w-full border-l-4 border-blue-500 shadow-md rounded-lg">
    @if ($conges->count())
        
    
    @else
    <div class="flex items-center">
      <div class="flex-1  text-lg  text-blue-700">
          <i class="fas fa-info-circle pr-2"></i><span>vous n'avez pas de demande de congé vuillez efectuer une</span>
      </div>
      <a href="{{route('conge_add')}}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
        demande de congé
      </a>
    </div>
  </div>
  @endif
@endsection