<aside id="sidebar"
    class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64  lg:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out -translate-x-64">
    <!-- Sidebar Header -->
    <header class="flex justify-between mb-10 pr-3 sm:px-2">
        <!-- Close button -->
        <button class="lg:hidden text-slate-500 hover:text-slate-400">
            <span class="sr-only">Close sidebar</span>
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
            </svg>
        </button>
        <!-- Logo -->
        <a href="/" class="block">
            <x-application-logo class="block h-12 " />
        </a>
    </header>

    <nav class="space-y-8">
        <div>
            <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                <span class="lg:block 2xl:block">Pages</span>
            </h3>
            <ul class="mt-3">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <div class="flex items-center">
                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                            <path
                                class="fill-current {{ request()->routeIs('dashboard') ?  '!text-indigo-500' : 'text-slate-400'}}"
                                d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                            <path
                                class="fill-current {{ request()->routeIs('dashboard') ?  '!text-indigo-600' : 'text-slate-600'}}"
                                d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                            <path
                                class="fill-current {{ request()->routeIs('dashboard') ?  '!text-indigo-200' : 'text-slate-400'}}"
                                d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z">
                            </path>
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-300' }}">
                            {{ __('Dashboard') }}
                        </span>
                    </div>
                </x-nav-link>
                @role('superadministrator')
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    <div class="flex items-center">
                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                            <path
                                class="fill-current {{ request()->routeIs('register') ? 'text-indigo-600' : 'text-gray-600' }}"
                                d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                            <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z" />
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-300' }}">
                            {{ __('Register') }}
                        </span>
                    </div>
                </x-nav-link>
                @endrole
                @role(['guard', 'superadministrator'])
                <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')">
                    <div class="flex items-center">


                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                            <path
                                class="fill-current {{ request()->routeIs('students.index') ? 'text-indigo-500' : 'text-gray-600' }}"
                                d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                            <path
                                class="fill-current {{ request()->routeIs('students.index') ? 'text-indigo-300' : 'text-gray-400' }}"
                                d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                        </svg>
                        <span
                            class="text-sm font-medium ml-3 lg:opacity-100 2xl:opacity-100 duration-200 {{ request()->routeIs('students.index') ? 'text-white' : 'text-gray-300' }}">
                            {{ __('Student\'s List') }}
                        </span>
                    </div>
                </x-nav-link>
                @endrole
            </ul>
        </div>
    </nav>
</aside>
