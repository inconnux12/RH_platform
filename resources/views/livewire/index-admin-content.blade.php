<div>
  @if (!$conges->count())
  <div class="bg-blue-100 p-5 w-full border-l-4 border-blue-500 shadow-md rounded-lg">
    <div class="flex items-center">
      <div class="flex-1  text-lg  text-blue-700">
          <i class="fas fa-info-circle pr-2"></i><span>il n y a aucunce de demande de congé a traité</span>
      </div>
    </div>
  </div>
  @else  
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
                <th class="px-4 py-3">Employer</th>
                <th class="px-4 py-3">Type de congé</th>  
                <th class="px-4 py-3">raison</th>
                <th class="px-4 py-3">Date de debut</th>
                <th class="px-4 py-3">date de retour</th>
                <th class="px-4 py-3">action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($conges as $conge)
              <tr wire:key="{{$conge->id}}" class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold">{{$conge->id}}</p>
                        </p>
                      </div>
                    </div>
                  </td>
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
                <td class="px-4 py-3 text-sm">
                  {{$conge->conge_start_date}}
                </td>
                <td class="px-4 py-3">
                  {{$conge->conge_end_date}}
                </td>
                <td class="px-4 py-3 text-md">
                    <div class="flex items-center space-x-4 text-sm">
                        <button wire:click="accord({{$conge->id}})"
                          class="flex items-center justify-between px-2 py-2 text-md bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray"
                          aria-label="Edit"
                        >
                        accordé
                        </button>
                        <button wire:click="refuse({{$conge->id}})"
                          class="flex items-center justify-between px-2 py-2 text-md font-medium bg-red-500 leading-5 text-white rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                          aria-label="Delete"
                        >
                        refusé
                        </button>
                      </div>
                </td>
              </tr>
              @if($refuseId===$conge->id)  
              <tr class="text-md font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <livewire:refuse-conge :conge="$conge" :key="$conge->id"/>
              </tr>
            @endif
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {!!$conges->links()!!}
  @endif
</div>
