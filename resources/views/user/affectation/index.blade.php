@extends('layouts.app')

@section('content')

  @if ($affectations->count())
    @if (session('status'))
    <div x-data="{close:true}">
        <div  x-show="close" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500" >
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
      </div>
    </div>
    @endif
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Table de vos demande d'affectation
    </h4>      
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Type de d'affectation</th>  
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">zone de travail</th>
              <th class="px-4 py-3">zone d'affectation</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($affectations as $affectation)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">
                        @switch((int)$affectation->affectation_type)
                        @case(1)
                            demander par l'employer
                            @break
                        @case(2)
                            disciplinaire
                            @break
                        @default
                    @endswitch
                    </p>
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-xs">
                @switch((int)$affectation->affectation_status)
                    @case(1)
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-full dark:text-white dark:bg-orange-600">en cours</span>              
                        @break
                    @case(2)
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Apprové</span>        
                        @break
                    @case(3)
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">refusé</span>                    
                        @break
                    @default    
                @endswitch
              </td>
              <td class="px-4 py-3 text-sm">{{$affectation->user->zone->zone_name}}</td>
              <td class="px-4 py-3 text-sm">
                @foreach ($zones as $zone)
                    @if ($zone->id==$affectation->zone_affectation)
                        {{$zone->zone_name}}
                    @endif
                @endforeach
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @elseif(auth()->user()->affectation_nbr==1)
  <div class="bg-blue-100 p-5 w-full border-l-4 border-blue-500 shadow-md rounded-lg">
    <div class="flex items-center">
      <div class="flex-1  text-lg  text-blue-700">
          <i class="fas fa-info-circle pr-2"></i><span>vous n'avez pas de demande d'affectation vuillez efectuer une</span>
      </div>
      <a href="{{route('affectation_add')}}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
        demande d'affectation
      </a>
    </div>
  </div>
    @else
    <div class="bg-yellow-100 p-5 w-full border-l-4 border-yellow-500 shadow-md rounded-lg">
    <div class="flex items-center">
      <div class="flex-1  text-lg  text-yellow-700">
          <i class="fas fa-exclamation-triangle pr-2"></i><span>vous avez déja faite unde demande</span>
      </div>
    </div>
  </div>
  @endif

@endsection
