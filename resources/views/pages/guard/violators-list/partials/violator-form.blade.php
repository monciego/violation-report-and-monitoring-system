<div class="bg-white p-4 rounded shadow-sm">
    <div class="flex items-center gap-2 mb-6">
        <h2 class="text-xl font-bold">Register Violator's Information</h2>
        <div class="bg-indigo-600 text-xs py-1.5 px-3 text-white rounded">
            Student ID: {{ $student->student_id }}
        </div>
    </div>
    <form action="{{ route('violator.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $student->id }}" name="student_information_id">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-2">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" readonly
                    :value="old('first_name', $student->first_name)" autofocus autocomplete="first-name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" readonly
                    :value="old('middle_name', $student->middle_name)" autofocus autocomplete="middle-name" />
                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" readonly
                    :value="old('last_name', $student->last_name)" autofocus autocomplete="last-name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="violation" :value="__('Violation')" />
                <x-text-input id="violation" class="block mt-1 w-full" type="text" name="violation"
                    :value="old('violation')" autofocus autocomplete="violation" />
                <x-input-error :messages="$errors->get('violation')" class="mt-2" />
            </div>
            @php
            $currentDate = now()->format('Y-m-d');
            $currentTime = now()->format('H:i');
            @endphp
            <div class="col-span-2">
                <x-input-label for="violation_date" :value="__('Violation Date')" />
                <x-text-input id="violation_date" class="block mt-1 w-full" type="date" name="violation_date"
                    :value="old('violation_date', $currentDate)" autofocus autocomplete="violation_date" />
                <x-input-error :messages="$errors->get('violation_date')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="violation_time" :value="__('Violation Time')" />
                <x-text-input id="violation_time" class="block mt-1 w-full" type="time" name="violation_time"
                    :value="old('violation_time', $currentTime)" autofocus autocomplete="violation_time" />
                <x-input-error :messages="$errors->get('violation_time')" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-input-label for="comment" :value="__('Comment (optional)')" />
                <textarea id="comment" name="comment" rows="3"
                    class="block mt-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
            </div>
        </div>

        <x-primary-button class="mt-6 flex items-center justify-center w-full">
            {{ __('Register as violator') }}
        </x-primary-button>
    </form>
</div>
