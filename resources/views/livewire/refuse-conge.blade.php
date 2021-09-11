<td colspan="6">
    <form action="" wire:submit.prevent="save">
        <span class="text-gray-700">motif de refu</span>
        <input wire:model.defer="conge.motif"
        class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 @error('motif') border border-red-500 @enderror leading-tight focus:outline-none focus:bg-white"
        /> 
        @error('motif')
            <div class="text-md text-red-500">le motif est obligatoire</div>
        @enderror
          <input type="submit" value="envoyer" class="flex items-center justify-between px-2 py-2 text-md bg-green-500 font-medium leading-5 text-white rounded-lg  focus:outline-none focus:shadow-outline-gray">
    </form>
</td>