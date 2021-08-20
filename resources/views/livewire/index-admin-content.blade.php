<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table de vos demande de congés
      </h4>      
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table x-data="input()" class="w-full whitespace-no-wrap">
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
                        <p class="font-semibold">{{$conge->user->name}}</p>
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
                <td class="px-4 py-3 text-xs">
                    <div class="flex items-center space-x-4 text-sm">
                        <button wire:click="accord({{$conge->id}})"
                          class="flex items-center justify-between px-2 py-2 text-sm bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray"
                          aria-label="Edit"
                        >
                        accordé
                        </button>
                        <button x-on:click="changeShow({{$conge->id}})"
                          class="flex items-center justify-between px-2 py-2 text-sm font-medium bg-red-500 leading-5 text-white rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                          aria-label="Delete"
                        >
                        refusé
                        </button>
                      </div>
                </td>
              </tr>  
  
            <template x-if="inputShow({{$conge->id}})">
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <td colspan="6">
                    <form action="" x-data="{motif: @entangle('motif').defer}" @submit.prevent="$wire.refuse({{$conge->id}})">
                        <span class="text-gray-700">motif de refu</span>
                        <input x-model="motif"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 @error('motif') border border-red-500 @enderror leading-tight focus:outline-none focus:bg-white"
                        /> 
                        @error('motif')
                            <div class="text-sm text-red-500">le motif est obligatoire</div>
                        @enderror
                          <input type="submit" value="envoyer" class="flex items-center justify-between px-2 py-2 text-sm bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray">
                    </form>
                </td>
                </tr>
            </template>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {!!$conges->links()!!}
</div>
