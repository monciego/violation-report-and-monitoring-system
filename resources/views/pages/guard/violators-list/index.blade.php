<x-app-layout>
    <header class="mb-6 flex items-center justify-between">
        <h2 class="text-xl font-bold">List of Violators</h2>
        <div class="flex gap-2 items-center">
            <p>Filter by:</p>
            <div x-data="{open:false}" class="relative">
                <x-primary-button x-on:click="open = !open" class="text-xs capitalize font-normal tracking-normal"
                    type="button">
                    month<svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-primary-button>
                <!-- Dropdown menu -->
                <div x-show="open" class="absolute h-48 overflow-scroll bg-white rounded-lg shadow mt-2">
                    <ul class="py-2 overflow-y-auto text-gray-700" aria-labelledby="dropdownUsersButton">
                        <li>
                            @for ($i = 1; $i <= 12; $i++) @php $isActive=request('month')==$i &&
                                request('year')==date('Y'); @endphp <a
                                class="flex text-sm items-center px-4 py-2 text-nowrap hover:bg-gray-200 {{ $isActive ? 'bg-gray-200' : '' }}"
                                href="{{ route('violator.index', array_merge(request()->all(), ['month' => $i, 'year' => date('Y')])) }}">
                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </a>
                                @endfor
                        </li>
                    </ul>
                </div>
            </div>

            @role("superadministrator")
            <div x-data="{open:false}" class="relative">
                <x-primary-button x-on:click="open = !open" class="text-xs capitalize font-normal tracking-normal"
                    type="button">
                    department <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </x-primary-button>
                <!-- Dropdown menu -->
                <div x-show="open" class="absolute bg-white rounded-lg shadow mt-2">
                    <ul class="py-2 overflow-y-auto text-gray-700" aria-labelledby="dropdownUsersButton">
                        <li>
                            @php
                            $filters = [
                            '' => 'All Department',
                            'Information Technology Department' => 'Information Technology Department',
                            'Education Department' => 'Education Department',
                            'Business Education Department' => 'Business Education Department',
                            'Criminology Department' => 'Criminology Department',
                            ]
                            @endphp
                            @foreach ($filters as $key => $label)
                            <a href="{{ route('violator.index', ['filter' => $key]) }}"
                                class="{{ request('filter') === $key || request('filter') === null && $key === '' ? 'bg-gray-200' : '' }} flex text-sm items-center px-4 py-2 text-nowrap hover:bg-gray-200">
                                {{ $label }}
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            @endrole

            <div>
                <form action="{{ route('violator.index') }}" class="flex items-center">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 "
                            placeholder="Search...">
                    </div>
                    <button type="submit"
                        class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>

        </div>
    </header>
    @php $headers = ['Student ID', 'First Name', 'Last Name', 'Department', 'Action'];
    $data = $violators->map(function ($violator) {
    return [$violator->student_id, $violator->first_name, $violator->last_name,
    $violator->department,
    '
    <div class="flex items-center gap-2">
        <a href="' . route('violator.show', $violator) . '"
            class="inline-flex items-center gap-1 text-indigo-700 p-1 px-3 text-sm rounded">
            Show More
        </a>
    </div>
    '
    ];
    });
    @endphp
    <x-table :headers="$headers" :data="$data" :paginate="$violators" empty_message="There are no listed violators" />
</x-app-layout>