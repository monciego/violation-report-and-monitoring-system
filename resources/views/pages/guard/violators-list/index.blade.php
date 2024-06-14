<x-app-layout>
    <header class="mb-6">
        <h2 class="text-xl font-bold">List of Violators</h2>
    </header>
    @php $headers = ['Student ID', 'First Name', 'Last Name', 'Department', 'Action'];
    $data = $violators->map(function ($violator) {
    return [$violator->student->student_id, $violator->student->first_name, $violator->student->last_name,
    $violator->student->department,
    '
    <div class="flex items-center gap-2">
        <a href="' . route('violator.index') . '"
            class="inline-flex items-center gap-1 text-indigo-700 p-1 px-3 text-sm rounded">
            Show More
        </a>
        <a href="' . route('violator.index') . '"
            class="inline-flex items-center gap-1 bg-indigo-500 hover:bg-indigo-600 text-white p-1 px-3 text-sm rounded">
            Resolve
        </a>
    </div>
    '
    ];
    });
    @endphp
    <x-table :headers="$headers" :data="$data" :paginate="$violators" empty_message="There are no listed violators" />
</x-app-layout>