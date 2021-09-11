<td colspan="6">
    <span>{{$user->id}}</span>
      <form action="" wire:submit.prevent="save">
          <div class="flex flex-wrap justify-center pb-3 mb-0">
            <div class="relative w-1/3 px-3 mb-0 text-md flex-grow">
                <span class="text-gray-700 dark:text-gray-400">type d'affectation</span>
                <select wire:model.defer="type" class="block appearance-none @error('type') border border-red-500 @enderror w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>choix</option>
                    <option value="1">affectation normale</option>
                    <option value="2">affectation disciplinaire</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 top-1/3 flex items-center px-6 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <div class="relative w-1/3 px-3 mb-0 text-md flex-grow">
                <span class="text-gray-700 dark:text-gray-400">zone d'affectation</span>
                <select wire:model.defer="zone" class="block appearance-none @error('zone') border border-red-500 @enderror w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>zone</option>
                    @foreach ($zones as $zone)
                        @if($zone->id!=$user->zone_id)
                            <option value="{{$zone->id}}">{{$zone->zone_name}}</option>    
                        @endif
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 top-1/3 flex items-center px-6 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <div class="relative w-1/3 px-3 mb-0 text-md flex justify-center items-center flex-grow-0"> 
              <input type="submit" value="confirmer" class="w-2/5 cursor-pointer absolute top-1/3 left-2/5 px-2 py-2 text-md bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray">
            </div>
          </div>
      </form>
  </td>
