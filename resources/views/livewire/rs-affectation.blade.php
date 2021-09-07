<div>
    @if (!$users->count())
    <div class="bg-blue-100 p-5 w-full border-l-4 border-blue-500 shadow-md rounded-lg">
      <div class="flex items-center">
        <div class="flex-1  text-lg  text-blue-700">
            <i class="fas fa-info-circle pr-2"></i><span>il n y a aucunce de demande de d'affectation a traité</span>
        </div>
      </div>
    </div>
    @else  
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
          Table des demandes d'affectation
        </h4>      
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table x-data="input()" class="w-full whitespace-no-wrap">
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
                        <button x-on:click="changeShow({{$user->id}})"
                            class="flex items-center justify-between px-2 py-2 text-md font-medium bg-red-500 leading-5 text-white rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                          >
                          faire une affectation
                          </button>
                        </div>
                  </td>
                </tr> 
                <template x-if="inputShow({{$user->id}})">
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <td colspan="6">
                        <form action="" x-data="{zone: @entangle('zone'),type:@entangle('type')}" @submit.prevent="$wire.affecter({{$user->id}})">
                            <div class="flex flex-wrap mb-0">
                                <div class="relative w-1/2 px-3 mb-0 text-md">
                                    <span class="text-gray-700 dark:text-gray-400">type d'affectation</span>
                                    <select x-model="type" class="block appearance-none @error('type') border border-red-500 @enderror w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option>choix</option>
                                        <option value="1">affectation normale</option>
                                        <option value="2">affectation disciplinaire</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-6 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                                <div class="relative w-1/2 px-3 mb-0 text-md">
                                    <span class="text-gray-700 dark:text-gray-400">zone d'affectation</span>
                                    <select x-model="zone" class="block appearance-none @error('zone') border border-red-500 @enderror w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option>zone</option>
                                        @foreach ($zones as $zone)
                                            @if($zone->id!=$user->zone_id)
                                                <option value="{{$zone->id}}">{{$zone->zone_name}}</option>    
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-6 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                              <input x-on:click="$parent.initShow()" type="submit" value="confirmer" class="flex items-center justify-between px-2 py-2 text-md bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray">
                        </form>
                    </td>
                    </tr>
                </template> 
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {!!$users->links()!!}
    @endif
  </div>
  