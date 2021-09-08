<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table des employer
      </h4>      
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap" x-data="modal()" @keydown.escape="showEModal = false">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Nom</th> 
                <th class="px-4 py-3">Poste</th>
                <th class="px-4 py-3">Zone de travail</th>
                <th class="px-4 py-3">Type de contrat</th>
                <th class="px-4 py-3">date debut du contrat</th>
                <th class="px-4 py-3">date fin du contrat</th>
                <th class="px-4 py-3">action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($users as $user)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold">{{$user->name}}</p>
                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">{{$user->poste->poste_title}}</td>
                <td class="px-4 py-3 text-sm">{{$user->zone->zone_name}}</td>
                <td class="px-4 py-3 text-xs">
                  @switch((int)($user->contrat->contrat_type??0))
                      @case(1)
                          CDD
                          @break
                      @case(2)
                          CDI
                          @break
                      @default
                          aucun
                  @endswitch
                    {{-- {{$user->contrat->contrat_type??'aucun'}} --}}
                </td>
                <td class="px-4 py-3 text-sm">
                    {{$user->contrat->contrat_start_date??'aucun'}}
                </td>
                <td class="px-4 py-3 text-sm">
                    {{$user->contrat->contrat_end_date??'aucune date de fin'}}
                </td>
                <td class="px-4 py-3" >
                    <div class="flex items-center space-x-4 text-sm">
                        @if (!isset($user->contrat->id) ||(Carbon\Carbon::createFromDate($user->contrat->contrat_end_date)->month==now()->addMonth()->month))
                        <button
                        wire:click="editId({{$user->id}})"
                          x-on:click="change({{$user->id}})" 
                          class="flex items-center justify-between px-2 py-2 text-sm bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray"
                          aria-label="Edit"
                        >
                        {{!isset($user->contrat->id)?__('ajouter un contrat'):__('renouveler contrat')}}
                        </button>    
                        @endif
                      </div>

                </td>
              </tr>
              
              @if ($t_id==$user->id)
              <tr :class="showEModal?'':'hidden'">
                <td colspan="6">
                    <livewire:form-contrat :user="$user" :key="$user->id"/>
                </td>
            </tr>    
              @endif
              
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{$users->links()}}
</div>
