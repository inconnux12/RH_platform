<div x-data="{show:@entangle('show'),show2:@entangle('show2'),page:$wire.currentUrl,sub:$wire.sub,fun:$wire.keepOpen}" x-on:click.away="show=false">
    <span></span>
    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <div class="relative">
                        <a x-on:click="show=show?false:true" class="flex py-1 cursor-pointer w-full md:py-3 pl-1 text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                            <i x-bind:class="page=='conge'?'text-blue-600':''" class="fa fa-file-contract pr-0 md:pr-3"></i>
                            <span class="pb-1 md:pb-0 text-xs text-left	md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les congés</span>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2"><i :class="show?'fa fa-arrow-alt-circle-down':'fas fa-arrow-alt-circle-up'" class="text-gray-400"></i></div>
                        </a>
                    </div>
                    <div x-show="show" x-transition.duration.500ms>
                        <ul  class="bg-gray-900 ml-2">
                            @emuser
                            <li>
                                <a x-bind:class="sub==''&& page=='conge'?'border-blue-600':''" href="{{route('conge')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">vos demande de congé</span>
                                </a>
                            </li>
                            <li>
                                <a x-bind:class="sub=='add' && page=='conge'?'border-blue-600':''" href="{{route('conge_add')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">formulaire de congé</span>
                                </a>
                            </li>
                            @endemuser
                            @rsuser
                            <li>
                                <a x-bind:class="sub=='list' && page=='conge'?'border-blue-600':''" href="{{route('indexAdminconge')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">liste des demande de congés</span>
                                </a>
                            </li>
                            @endrsuser
                        </ul>
                    </div>
                </li>
                <li class="mr-3 flex-1">
                    <div class="relative">
                        <a x-on:click="show2=show2?false:true" class="flex py-1 cursor-pointer w-full md:py-3 pl-1 text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                            <i x-bind:class="page=='recrute'?'text-blue-600':''" class="fa fa-user-nurse pr-0 md:pr-3"></i>
                            <span class="pb-1 md:pb-0 text-xs text-left	md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les affectations</span>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2"><i :class="show2?'fa fa-arrow-alt-circle-down':'fas fa-arrow-alt-circle-up'" class="text-gray-400"></i></div>
                        </a>
                    </div>
                    <div x-show="show2" x-transition.duration.500ms>
                        <ul  class="bg-gray-900 ml-2">
                            @emuser
                            <li>
                                <a x-bind:class="sub==''&& page=='affectation'?'border-blue-600':''" href="{{route('affectation')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">vos demande d'affectations</span>
                                </a>
                            </li>
                            <li>
                                <a x-bind:class="sub=='add' && page=='affectation'?'border-blue-600':''" href="{{route('affectation_add')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">formulaire d'affectations</span>
                                </a>
                            </li>
                            @endemuser
                            @rsuser
                            <li>
                                <a x-bind:class="sub=='list' && page=='affectation'?'border-blue-600':''" href="{{route('indexAdminaffectation')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">liste des demande d'affectations</span>
                                </a>
                            </li>
                            @endrsuser
                            @rhuser
                            <li>
                                <a x-bind:class="sub=='users' && page=='affectation'?'border-blue-600':''" href="{{route('rs_affectation')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-900 hover:border-purple-500">
                                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">effectuer une affectation</span>
                                </a>
                            </li> 
                            @endrhuser                           
                        </ul>
                    </div>
                </li>
                @rsuser
                <li class="mr-3 flex-1">
                    <a x-bind:class="page=='absences'?'border-blue-600':''" href="{{route('absences')}}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='absences'?'text-blue-600':''" class="fa fa-briefcase-medical pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les absences</span>
                    </a>
                </li>
                @endrsuser
                @admin
                <li class="mr-3 flex-1">
                    <a x-bind:class="page=='employer'?'border-blue-600':''" href="{{route('users')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='employer'?'text-blue-600':''" class="fa fa-users pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les employers</span>
                    </a>
                </li>
                @endadmin
                @rhuser
                <li class="relative flex-1">
                    <a x-bind:class="page=='contrats'?'border-blue-600':''" href="{{route('contracts')}} " class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                        <i x-bind:class="page=='contrats'?'text-blue-600':''" class="fas fa-briefcase pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">les contrats</span>
                    </a>
                </li>
                @endrhuser
            </ul>
        </div>
    </div>
</div>
