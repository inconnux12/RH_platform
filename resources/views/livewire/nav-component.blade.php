<div>
 <!--Nav-->
 <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-2 top-0">
    
    <div class="flex flex-wrap items-center">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <a href="{{route('dashboard')}}">
                <span class="flex justify-center"><img src="{{asset('favicon.jpeg')}}" width="55px" alt="logo"></span>
            </a>
        </div>

        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2"></div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li x-data="{open:false,showNotif:@entangle('showNotif'),nbrUnreadNotif:@entangle('nbrUnreadNotif')}" class="pr-8 relative">
                    <i x-on:click="open= !open"  wire:click="markRead" class="cursor-pointer fas fa-bell cursor-pointer text-white text-xl"></i>
                    <span x-show="showNotif" x-text="nbrUnreadNotif" class="text-white bg-red-500 rounded-full px-3 py-3 absolute left-1/4 top-1/2 h-4 w-4 flex items-center justify-center"></span>
                    <ul x-show="open" x-on:click.away="open=false" class="w-96 absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30">
                        @foreach ($notifs as $notif)
                            <li class="h-20 bg-gray-800 py-3 cursor-pointer hover:bg-gray-600 transition duration-200">{{$notif->data['employer']}} a fait une demande de congé {{$notif->data['conge_type']}}</li> 
                            
                        @endforeach
                    </ul>
                </li>
                <li class="flex-1 md:flex-none md:mr-3">
                    <div x-data="{open:false}" class="relative inline-block">
                        <button x-on:click="open= !open" class="drop-button text-white focus:outline-none"> Hi, {{auth()->user()->name}}<svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                        <ul x-show="open" x-on:click.away="open=false" id="myDropdown" class="dropdownlist w-28 absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30">
                            @auth<li><form action="{{route('logout')}}" method="POST">@csrf<button type="submit" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</button></form></li>@endauth
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>
</div>
