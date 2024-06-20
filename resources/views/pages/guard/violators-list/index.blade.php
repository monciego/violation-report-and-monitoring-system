<x-app-layout>
    <header class="mb-6">
        <h2 class="text-xl font-bold">List of Violators</h2>
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
