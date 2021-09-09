@extends('layouts.app')

@section('content')
<h4
class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
>
formulaire de demande d'affectation
</h4>
<div class="px-4 py-3 mb-8 bg-white w-3/4 mx-auto rounded-lg shadow-md dark:bg-gray-800" >
<form action="{{route('affectation_add')}}" method="post">
  @csrf
  <div class="block text-md">
    <span class="text-gray-700 dark:text-gray-400">Name</span>
    <input
      class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled
      value="{{auth()->user()->name}}"
    />
  </div>
  <div class="block text-md">
    <span class="text-gray-700 dark:text-gray-400">address</span>
    <input
      class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled
      value="{{auth()->user()->user_adrs}}"
    />
  </div>
  <div class="block text-md">
    <span class="text-gray-700 dark:text-gray-400">poste</span>
    <input
      class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" disabled
      value="{{auth()->user()->poste->poste_title}}"
    />
  </div>
  <div class="flex justify-evenly w-full mb-6">
    <div>
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        zone d'affectation
      </label>
      <div class="relative">
        <select name="zone" id="bbb" class="block mr-6 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option value="0">choix</option>
          @foreach ($zones as $zone)
            @if (auth()->user()->zone_id!=$zone->id)
              <option value="{{$zone->id}}">{{$zone->zone_name}}</option> 
            @endif
          @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
  </div>
  <div class="flex w-full">
    <input type="submit" value="envoyer" class="mx-auto px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
  </div>
</form>
</div>
@endsection