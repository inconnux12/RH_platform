@extends('layouts.app')

@section('content')

  @if ($conges->count())
    @if (session('status'))
    <div class="flex justify-center">
      <div class="bg-green-100 p-5 w-1/2 border-l-4 border-green-500 shadow-md rounded-lg">
        {{session('status')}}
      </div>
    </div>
    @endif
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Table de vos demande de congés
    </h4>      
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Type de congé</th>  
              <th class="px-4 py-3">raison</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Date de debut</th>
              <th class="px-4 py-3">date de retour</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($conges as $conge)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">{{$conge->conge_type}}</p>
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                @switch((int)$conge->conge_raison)
                    @case(0)
                      annuel                        
                        @break
                    @case(1)
                      naissance
                        @break
                    @case(2)
                      marriage
                        @break
                    @case(3)
                      décès
                        @break
                    @case(4)
                      circoncision
                        @break
                    @default
                @endswitch
              </td>
              <td class="px-4 py-3 text-xs">
                @switch((int)$conge->conge_status)
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
              <td class="px-4 py-3 text-sm">
                {{$conge->conge_start_date}}
              </td>
              <td class="px-4 py-3">
                {{$conge->conge_end_date}}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @elseif(auth()->user()->conge_nbr==1)
  <div class="bg-blue-100 p-5 w-full border-l-4 border-blue-500 shadow-md rounded-lg">
    <div class="flex items-center">
      <div class="flex-1  text-lg  text-blue-700">
          <i class="fas fa-info-circle pr-2"></i><span>vous n'avez pas de demande de congé vuillez efectuer une</span>
      </div>
      <a href="{{route('conge_add')}}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
        demande de congé
      </a>
    </div>
  </div>
    @else
    <div class="bg-yellow-100 p-5 w-full border-l-4 border-yellow-500 shadow-md rounded-lg">
    <div class="flex items-center">
      <div class="flex-1  text-lg  text-yellow-700">
          <i class="fas fa-exclamation-triangle pr-2"></i><span>vous avez déja consomer votre conger annuel, vous pourez demandez un congé exceptionnel</span>
      </div>
      <a href="{{route('conge_add')}}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-yellow">
        demande de congé
      </a>
    </div>
  </div>
  @endif

@endsection
