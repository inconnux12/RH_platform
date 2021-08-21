<div class="" x-data="{ 'showModal': @entangle('modal')}" @keydown.escape="showModal = false" x-cloak>

	<section class="flex flex-wrap p-4 h-full items-center">
        <div class="bg-blue-100 p-5 w-full border-l-4 border-blue-500 shadow-md rounded-lg">
            <div class="flex items-center">
              <div class="flex-1  text-lg  text-blue-700">
                  <i class="fas fa-info-circle pr-2"></i><span>vous pouvez ajouter des nouveaux employers</span>
              </div>
              <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full" @click="showModal = true">ajouter un employer</button>
            </div>
          </div>
		

		<!--Overlay-->
		<div class="absolute inset-0 z-10 flex items-center justify-center" style="background-color: rgba(0,0,0,0.5)" x-show="showModal">
			<!--Dialog-->
			<div class="overflow-auto z-40 bg-white w-11/12 md:max-w-4xl mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false">

				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Ajouté employer</p>
					<div class="cursor-pointer z-50" @click="showModal = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
					</div>
				</div>

				<!-- content -->
				@if (session('status'))
                    <div class="text-md text-red-500">{{session('status')}}</div>
                @endif
                <form wire:submit.prevent="submit" method="post">
                <div class="flex flex-wrap mb-0">
                    <div class="w-1/2 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">Nom et Prenom</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 @error('name') border border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{old('name')}}"
                        wire:model.defer="name"
                        />
                    </div>
                    <div class="w-1/2 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">Username</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 @error('username') border border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{old('username')}}"
                        wire:model.defer="username"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap mb-0">
                    <div class="w-full px-3">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <input
                        type="email"
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 @error('email') border border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{old('Email')}}"
                        wire:model.defer="email"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap mb-0">
                    <div class="w-1/2 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">mot de passe</span>
                        <input
                        type="password"
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 @error('password') border border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        wire:model.defer="password"
                        />
                    </div>
                    <div class="w-1/2 px-3 mb-0 text-md">
                        <span class="text-gray-700 dark:text-gray-400">confirmer mot de passe</span>
                        <input
                        type="password"
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 @error('password_confirmation') border border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        wire:model.defer="password_confirmation"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap mb-0">
                    <div class="w-full px-3">
                        <span class="text-gray-700 dark:text-gray-400">Addresse personnel</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 text-gray-700 @error('address') border border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{old('address')}}"
                        wire:model.defer="address"
                        />
                    </div>
                </div>
                <div class="flex flex-wrap mb-0">
                    <div class="w-1/2 px-3 text-md">
                        <span class="text-gray-700 dark:text-gray-400">Poste</span>
                        <input
                        class="ppearance-none block w-full bg-gray-200 @error('poste') border border-red-500 @enderror  text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                        value="{{old('poste')}}"
                        wire:model.defer="poste"
                        />
                    </div>
                    <div class="relative w-1/2 px-3 mb-0 text-md">
                        <span class="text-gray-700 dark:text-gray-400">role</span>
                        <select wire:model.defer="role" class="block appearance-none @error('role') border border-red-500 @enderror w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option>Role</option>
                            <option value="1">Administrateur</option>
                            <option value="2">RS</option>
                            <option value="3">RH</option>
                            <option value="4">Employer</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-6 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <input type="submit"  value="envoyer" class="mx-auto px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-900 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                </div>
                </form>
			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</section>

</div>