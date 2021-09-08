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
                <li class="flex-1 md:flex-none md:mr-3">
                    <div x-data="{open:false}" class="relative inline-block">
                        <button x-on:click="open=true" class="drop-button text-white focus:outline-none"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, {{auth()->user()->name}}<svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                        <ul x-show="open" x-on:click.away="open=false" id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30">
                            @auth<li><form action="{{route('logout')}}" method="POST">@csrf<button type="submit" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</button></form></li>@endauth
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>
</div>
