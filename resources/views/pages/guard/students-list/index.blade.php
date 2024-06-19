<x-app-layout>
    <header class="mb-6">
        <h2 class="text-xl font-bold">List of Students</h2>
    </header>
    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4 lg:grid-cols-6">
        @foreach ($studentsInformation as $student)
        <div class="col-span-2 w-full border rounded-lg shadow bg-gray-800 border-gray-700">
            <div class="flex flex-col items-center py-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('assets/images/logo.png') }}"
                    alt="Bonnie image" />
                <h5 class="mb-1 text-xl font-medium text-white">{{ $student->first_name }} {{
                    $student->last_name }}</h5>
                <span class="text-sm text-gray-100">{{ $student->student_id }}</span>
                <span class="text-sm text-gray-400">{{ $student->department }}</span>
                <div class="flex mt-4 md:mt-6">
                    @if (Auth::user()->hasRole("superadministrator"))
                    <a href="{{ route('students.show', $student) }}"
                        class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Show more</a>
                    @else
                    <a href="{{ route('violator.create', $student->id) }}"
                        class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Add Violation
                    </a>
                    <a href="{{ route('students.show', $student) }}"
                        class="py-2 px-4 ms-2 text-xs font-medium focus:outline-none rounded-lg border  focus:z-10 focus:ring-4  focus:ring-gray-700 bg-gray-800 text-gray-300 border-gray-600 hover:text-white hover:bg-gray-700">
                        Show more</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $studentsInformation->links() }}
    </div>
</x-app-layout>
