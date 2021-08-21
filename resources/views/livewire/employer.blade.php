<div>
    <livewire:create-employer />
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table de vos demande de congés
      </h4>      
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap" x-data="modal()" @keydown.escape="showEModal = false">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Nom</th>  
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Poste</th>
                <th class="px-4 py-3">Date de debut</th>
                <th class="px-4 py-3">Date de fin</th>
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
                <td class="px-4 py-3 text-sm">
                  @switch((int)$user->status->status)
                    @case(1)
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-full dark:text-white dark:bg-orange-600">{{$user->status->status_title}}</span>              
                        @break
                    @case(2)
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$user->status->status_title}}</span>        
                        @break
                    @case(3)
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">{{$user->status->status_title}}</span>                    
                        @break
                    @default 
                  @endswitch
                </td>
                <td class="px-4 py-3 text-xs">
                    {{$user->poste->poste_title}}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$user->created_at}}
                </td>
                <td class="px-4 py-3">
                  {{$user->created_at}}
                </td>
                <td class="px-4 py-3" >
                    <div class="flex items-center space-x-4 text-sm">
                        <button
                        wire:click="editId({{$user->id}})"
                          x-on:click="change({{$user->id}})" 
                          class="flex items-center justify-between px-2 py-2 text-sm bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray"
                          aria-label="Edit"
                        >
                        modefier
                        </button>
                        <button
                        wire:click="deleteUser({{$user->id}})"
                          class="flex items-center justify-between px-2 py-2 text-sm font-medium bg-red-500 leading-5 text-white rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                          aria-label="Delete"
                        >
                        supprimer
                        </button>
                      </div>

                </td>
              </tr>
              
              @if ($t_id==$user->id)
              <tr :class="showEModal?'':'hidden'">
                <td colspan="6">
                    <livewire:edit-employer :user="$user" :key="$user->id"/>
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
