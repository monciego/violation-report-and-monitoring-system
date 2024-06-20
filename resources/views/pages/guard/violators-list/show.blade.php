<x-app-layout>
    <div>
        <div class="px-4 sm:px-0">
            <div class="flex items-center gap-2">
                <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $violator->first_name}} {{
                    $violator->last_name }} Information
                </h3>
                <div class="bg-red-600 text-xs py-1.5 px-3 text-white rounded">
                    Violator
                </div>
            </div>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal informations of violator.</p>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Student ID</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $violator->student_id }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{
                        $violator->first_name }} {{ $violator->middle_name }} {{
                        $violator->last_name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Sex</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $violator->sex
                        }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Year & Course</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{
                        $violator->year_course }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Department</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{
                        $violator->department }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{
                        $violator->address }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Contact Number</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $violator->contact_number }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Birthdate</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ Carbon\Carbon::parse($violator->birthdate )->format('F j, Y') }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Age</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ Carbon\Carbon::parse($violator->birthdate )->age }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Guardian's Name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $violator->name_of_guardian }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Guardian's Contact Number</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $violator->guardian_contact_number }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Violation Count</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $violator->violators->count()}}
                    </dd>
                </div>
            </dl>
        </div>

        <h2 class="my-4 text-lg font-bold">Violations:</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-2">
            @foreach ($violator->violators as $violation)
            <div class="md:col-span-1">
                <div class="sm:px-0 relative bg-[#F3F1C9] border-black border-2 z-[50]  h-full rounded-[10px]">
                    @if ($violation->status === "pending")
                    <span
                        class="stamp text-xl is-nope absolute top-[50%] text-center flex items-center justify-center left-2/4 transform  -translate-x-2/4 -translate-y-2/4">
                        Pending
                    </span>
                    @elseif ($violation->status === "resolved")
                    <span
                        class="stamp text-2xl is-approved absolute top-[50%] text-center flex items-center justify-center left-2/4 transform  -translate-x-2/4 -translate-y-2/4">
                        Resolved
                    </span>
                    @endif
                    <div class="p-6 sm:col-span-6 lg:col-span-4 w-full pb-3">
                        <div class="border-b-2 border-black border-dashed">
                            <h5 class="mb-2 text-2xl font-extrabold tracking-tight text-black">
                                {{ $violator->first_name }} {{ $violator->last_name }}
                            </h5>
                            <div class="mb-4 flex items-center justify-between">
                                <div>
                                    <p class="font-normal text-black">Violation Date</p>
                                    <p class="text-md font-mono font-semibold text-gray-900">
                                        {{
                                        \Carbon\Carbon::parse($violation->violation_date)->isoFormat('MMM
                                        D
                                        YYYY')}}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-normal text-black">Violation Time</p>
                                    <p class="text-md font-mono font-semibold text-gray-900">
                                        {{
                                        \Carbon\Carbon::parse($violation->violation_time)->format('H:i')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="border-black border-2 mt-4">
                            <div class="bg-black text-center p-4">
                                <h2 class="text-[#F3F1C9] font text-lg font-black">
                                    {{ $violation->violation }}
                                </h2>
                            </div>
                            <div class="p-3 border-black border-b-2">
                                <p class="text-xs">Student ID</p>
                                <p class="font-semibold text-base">
                                    {{ $violator->student_id}}
                                </p>
                            </div>
                            <div class="p-3 border-black border-b-2">
                                <p class="text-xs">Contact Number</p>
                                <p class="font-semibold text-base">
                                    {{ $violator->contact_number }}
                                </p>
                            </div>
                            <div class="p-3">
                                <p class="text-xs">Comments</p>
                                <p class="font-semibold text-sm">
                                    {{ $violation->comment }}
                                </p>
                            </div>
                        </div>
                        <span class="text-[.6rem] font-medium uppercase">This violation ticket is confidential and
                            intended solely for the recipient.</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>


<style>
    .stamp {
        transform: rotate(12deg);
        color: #555;
        font-weight: 700;
        border: 0.25rem solid #555;
        display: inline-block;
        padding: 0.25rem 1rem;
        text-transform: uppercase;
        border-radius: 1rem;
        font-family: 'Courier';
        -webkit-mask-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/grunge.png');
        -webkit-mask-size: 944px 604px;
        mix-blend-mode: multiply;
    }

    .is-nope {
        color: #D23;
        border: 0.5rem double #D23;
        transform: rotate(3deg);
        -webkit-mask-position: 2rem 3rem;
        font-size: 2rem;
    }

    .is-approved {
        color: #0A9928;
        border: 0.5rem solid #0A9928;
        -webkit-mask-position: 13rem 6rem;
        transform: rotate(-14deg);
        border-radius: 0;
    }

    .is-draft {
        color: #C4C4C4;
        border: 1rem double #C4C4C4;
        transform: rotate(-5deg);
        font-size: 6rem;
        font-family: "Open sans", Helvetica, Arial, sans-serif;
        border-radius: 0;
        padding: 0.5rem;
    }
</style>
