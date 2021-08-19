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
      class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
      name="dst_adrs"
      value="{{old('dst_adrs')}}"
    />
  </div>
  <div x-data="data()" class="flex justify-left w-8/12  mb-6 md:mb-0">
    <div>
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        type de congé
      </label>
      <div class="relative">
        <select x-on:change="adde(document.querySelector('#bbb').value)" name="conge_typ" id="bbb" class="block mr-6 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option value="0">choix</option>
          <option value="1">annual</option>
          <option value="2">exceptionnel</option>
        </select>
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
    </template>
  </div>
  <div class="block text-md">
    <label class="text-gray-700 dark:text-gray-400" for="start">date de d'épart:</label>

    <input type="date" id="start" name="conge_start_date"
          value="{{Carbon\Carbon::parse('this sunday')->toDateString()}}"
          min="{{now()->month<06?now()->year.'-06-01':today()->toDateString()}} " max="{{(now()->year)+1}}-05-31">
  </div>
  <div class="flex w-full">
    <input type="submit" value="envoyer" class="mx-auto px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
  </div>
  {{-- <div class="mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Account Type
    </span>
    <div class="mt-2">
      <label
        class="inline-flex items-center text-gray-600 dark:text-gray-400"
      >
        <input
          type="radio"
          class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="accountType"
          value="personal"
        />
        <span class="ml-2">Personal</span>
      </label>
      <label
        class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
      >
        <input
          type="radio"
          class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="accountType"
          value="busines"
        />
        <span class="ml-2">Business</span>
      </label>
    </div>
  </div>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Requested Limit
    </span>
    <select
      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
    >
      <option>$1,000</option>
      <option>$5,000</option>
      <option>$10,000</option>
      <option>$25,000</option>
    </select>
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Multiselect
    </span>
    <select
      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
      multiple
    >
      <option>Option 1</option>
      <option>Option 2</option>
      <option>Option 3</option>
      <option>Option 4</option>
      <option>Option 5</option>
    </select>
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">Message</span>
    <textarea
      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
      rows="3"
      placeholder="Enter some long form content."
    ></textarea>
  </label>

  <div class="flex mt-6 text-sm">
    <label class="flex items-center dark:text-gray-400">
      <input
        type="checkbox"
        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
      />
      <span class="ml-2">
        I agree to the
        <span class="underline">privacy policy</span>
      </span>
    </label>
  </div> --}}
</form>
</div>
@endsection