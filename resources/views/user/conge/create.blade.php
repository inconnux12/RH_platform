@extends('layouts.app')

@section('content')
<h4
class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
>
formulaire de demande de congé
</h4>
<div class="px-4 py-3 mb-8 bg-white w-3/4 mx-auto rounded-lg shadow-md dark:bg-gray-800" >
<form action="{{route('conge_add')}}" method="post">
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
  <div class="block text-md">
   
    <span class="text-gray-700 dark:text-gray-400">addresse de destination</span>
    <input
      class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 @error('dst_adrs') border border-red-500 @enderror leading-tight focus:outline-none focus:bg-white"
      name="dst_adrs"
      value="{{old('dst_adrs')}}"
    /> 
    @error('dst_adrs')
        <div class="text-sm text-red-500">l'addresse de destination est obligatoire</div>
    @enderror
  </div>
  <div x-data="data()" class="flex justify-evenly w-full mb-6">
    <div>
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        type de congé
      </label>
      <div class="relative">
        <select x-on:change="adde(document.querySelector('#bbb').value)" name="conge_typ" id="bbb" class="block mr-6 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option value="0">choix</option>
          <option value="1">annuel</option>
          <option value="2">exceptionnel</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    <template x-if="inpt_typ">
      <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
          durée du congé
        </label>
        <div class="relative">
          <select  disabled name="conge_dur" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option id="aze" x-bind:value="val==30?'30':'2'" x-text="val"></option>
          </select>
        </div>
      </div>
      <template x-if="val==2">
        <div>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            raison du congé exceptionnel
          </label>
          <div class="relative">
            <select name="conge_raison" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="1">naissance</option>
                <option value="2">marriage</option>
                <option value="3">un décès</option>
                <option value="4">circoncision</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </template>
    </template>
  </div>
  <div class="block text-md">
    <label class="text-gray-700 dark:text-gray-400" for="start">date de d'épart:</label>

    <input type="date" id="start" name="conge_start_date"
          value="{{now()->month<06?now()->year.'-06-01':Carbon\Carbon::parse('this sunday')->toDateString()}}"
          min="{{now()->month<06?now()->year.'-06-01':today()->toDateString()}} " max="{{(now()->year)+1}}-05-31">
  </div>
  <div class="flex w-full">
    <input type="submit" value="envoyer" class="mx-auto px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
  </div>
</form>
</div>
@endsection