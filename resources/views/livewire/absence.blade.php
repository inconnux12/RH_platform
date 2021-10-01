<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Table des absences
      </h4>      
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Nom</th>  
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Poste</th>
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
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-full dark:text-white dark:bg-orange-600">{{$user->status->status_title}}</span>       
                </td>
                <td class="px-4 py-3 text-xs">
                    {{$user->poste->poste_title}}
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- {{$users->links()}} --}}
</div>
