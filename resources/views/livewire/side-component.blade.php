<div x-data="{show:false,page:$wire.currentUrl,sub:$wire.sub}">
    <span></span>
    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="relative flex-1">

                    <a x-bind:class="page=='contracts'?'border-blue-600':''" href="{{-- {{route('contracts')}} --}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='contracts'?'text-blue-600':''" class="fas fa-briefcase pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les contrats</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                   <a x-on:click="show=true" class="block py-1 w-full md:py-3 pl-1 text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='conge'?'text-blue-600':''" class="fa fa-file-contract pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs text-left	md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les congés</span>
                   </a>
                    <ul x-show="show">
                        <li>
                            <a x-bind:class="sub==''?'border-blue-600':''" href="{{route('conge')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">see</span>
                            </a>
                        </li>
                        <li>
                            <a x-bind:class="sub=='add'?'border-blue-600':''" href="{{route('conge_add')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                                <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">add</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mr-3 flex-1">
                    <a x-bind:class="page=='absences'?'border-blue-600':''" href="{{-- {{route('absences')}} --}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='absences'?'text-blue-600':''" class="fa fa-briefcase-medical pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les absences</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a x-bind:class="page=='users'?'border-blue-600':''" href="{{-- {{route('users')}} --}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='users'?'text-blue-600':''" class="fa fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les employers</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a x-bind:class="page=='users'?'border-blue-600':''" href="{{-- {{route('users')}} --}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='users'?'text-blue-600':''" class="fa fa-user-nurse pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les recrutements</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
