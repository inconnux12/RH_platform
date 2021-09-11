<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table des demandes d'affectation
      </h4>      
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Employer</th>
                <th class="px-4 py-3">poste</th>  
                <th class="px-4 py-3">addresse personnel</th>
                <th class="px-4 py-3">zone de travail</th>
                <th class="px-4 py-3">affecter</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($users as $user)
              <tr wire:key="{{$user->id}}" class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold">{{$user->name}}</p>
                        </p>
                      </div>
                    </div>
                  </td>
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold">{{$user->poste->poste_title}}</p>
                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">{{$user->user_adrs}}</td>
                <td class="px-4 py-3 text-sm">
                  {{$user->zone->zone_name}}
                </td>
                <td class="px-4 py-3 text-md">
                    <div class="flex items-center space-x-4 text-sm">
                      <button wire:click="affecter({{$user->id}})"
                          class="flex items-center justify-between px-2 py-2 text-md font-medium bg-red-500 leading-5 text-white rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                          aria-label="Delete"
                        >
                        faire une affectation
                        </button>
                      </div>
                </td>
              </tr> 
              @if($editId === $user->id)
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <livewire:affectation-form :user="$user" :key="$user->id" />
                  </tr>
              @endif
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {!!$users->links()!!}
  </div>
  