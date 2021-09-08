<div class="">
    <section class="flex flex-wrap p-4 h-full items-center">
		<!--Overlay-->
		<div class="absolute inset-0 z-10 flex items-center justify-center" style="background-color: rgba(0,0,0,0.5)" x-show="showEModal">
			<!--Dialog-->
			<div class="overflow-auto z-40 bg-white w-11/12 md:max-w-4xl mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showEModal" @click.away="showEModal = false">

				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Ajouter un nouveaux contrat</p>
					<div class="cursor-pointer z-50" @click="showEModal = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
					</div>
				</div>

				<!-- content -->
				@if (session('status'))
                    <div class="text-md text-red-500">{{session('status')}}</div>
                @endif
                <form wire:submit.prevent="submit">
                <div class="flex flex-wrap mb-0">
                    <div class="w-1/2 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">Nom et Prenom</span>
                        <input
                        disabled="disabled"
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{$user->name}}"
                        />
                    </div>
                    <div class="w-1/2 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">Username</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{$user->username}}"
                        disabled="disabled"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap mb-0">
                    <div class="w-full px-3">
                        <span class="text-gray-700 dark:text-gray-400">Addresse personnel</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{$user->user_adrs}}"
                        disabled="disabled"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap mb-0">
                    <div class="w-1/3 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">Poste</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{$user->poste->poste_title}}"
                        disabled
                        />
                    </div>
                    <div class="relative w-1/3 px-3 mb-0 text-md">
                        <span class="text-gray-700 dark:text-gray-400">zone d'affectation</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{$user->zone->zone_name}}"
                        disabled
                        />
                    </div>
                    <div class="relative w-1/3 px-3 mb-0 text-md">
                        <span class="text-gray-700 dark:text-gray-400">role</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value=@switch((int)$user->role)
                        @case(1)
                           {{ __('Administrateur')}}
                            @break
                        @case(2)
                            {{__('RS')}}
                            @break
                        @case(3)
                            {{__('Rh')}}
                            @break
                        @case(4)
                            {{__('Employer')}}
                            @break
                        @default
                    @endswitch
                        disabled
                        />
                    </div>
                </div>
                <div x-data="contrat()" class="flex justify-evenly w-full mb-6">
                    <div>
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        type de contrat
                      </label>
                      <div class="relative">
                        <select x-on:change="display(document.querySelector('#bbb').value)" wire:model.defer="type" name="contrat_typ" id="bbb" class="block mr-6 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                          <option value="0">choix</option>
                          <option value="1">CDD</option>
                          <option value="2">CDI</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                      </div>
                    </div>
                    <div>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            date debut du contrat
                          </label>
                          <div class="block text-md">
                            <label class="text-gray-700 dark:text-gray-400" for="start">date debut du contrat:</label>
                        
                            <input type="date" id="start" name="contrat_start_date"
                                  value="{{now()}}"
                                  min="{{now()->toDateString()}} "
                                  wire:model.defer="start"
                                  >
                          </div>
                    </div>
                    <div x-show="isDisplay()">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        date fin du contrat
                      </label>
                      <div class="block text-md">
                        <label class="text-gray-700 dark:text-gray-400" for="end">date fin du contrat:</label>
                    
                        <input type="date" id="end" name="contrat_end_date"
                              value="{{now()->addMonth()}}"
                              wire:model.defer="end"
                              >
                      </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <input type="submit" value="envoyer" class="mx-auto px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                </div>
                </form>

				<!--Footer-->
				


			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</section>

</div>