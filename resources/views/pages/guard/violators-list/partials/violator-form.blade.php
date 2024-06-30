<div class="bg-white p-4 rounded shadow-sm">
    <div class="sm:flex sm:items-center gap-2 mb-6">
        <h2 class="text-xl font-bold">Register Violator's Information</h2>
        <div class="bg-indigo-600 text-xs py-1.5 px-3 text-white rounded inline-block mt-2 sm:mt-0">
            Student ID: {{ $student->student_id }}
        </div>
    </div>
    <form action="{{ route('violator.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $student->id }}" name="student_information_id">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-2">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" readonly
                    :value="old('first_name', $student->first_name)" autofocus autocomplete="first-name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div class="sm:col-span-2">
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" readonly
                    :value="old('middle_name', $student->middle_name)" autofocus autocomplete="middle-name" />
                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
            </div>
            <div class="sm:col-span-2">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" readonly
                    :value="old('last_name', $student->last_name)" autofocus autocomplete="last-name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
            <div class="sm:col-span-2">
                <x-input-label for="violation" :value="__('Violation')" />
                <x-text-input id="violation" class="block mt-1 w-full" type="text" name="violation"
                    :value="old('violation')" autofocus autocomplete="violation" />
                <x-input-error :messages="$errors->get('violation')" class="mt-2" />
            </div>
            @php
            $currentDate = now()->format('Y-m-d');
            $currentTime = now()->format('H:i');
            @endphp
            <div class="sm:col-span-2">
                <x-input-label for="violation_date" :value="__('Violation Date')" />
                <x-text-input id="violation_date" class="block mt-1 w-full" type="date" name="violation_date"
                    :value="old('violation_date', $currentDate)" autofocus autocomplete="violation_date" />
                <x-input-error :messages="$errors->get('violation_date')" class="mt-2" />
            </div>
            <div class="sm:col-span-2">
                <x-input-label for="violation_time" :value="__('Violation Time')" />
                <x-text-input id="violation_time" class="block mt-1 w-full" type="time" name="violation_time"
                    :value="old('violation_time', $currentTime)" autofocus autocomplete="violation_time" />
                <x-input-error :messages="$errors->get('violation_time')" class="mt-2" />
            </div>
            <div class="sm:col-span-full">
                <x-input-label for="comment" :value="__('Comment (optional)')" />
                <textarea id="comment" name="comment" rows="3"
                    class="block mt-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
            </div>
        </div>

        <div x-data="{open:false}">
            <x-primary-button type="button" x-on:click="open = true"
                class="mt-6 flex items-center justify-center w-full">
                {{ __('Register as violator') }}
            </x-primary-button>

            <div x-show="open" x-cloak class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-[500]"
                aria-hidden="true"></div>

            <div x-show="open" x-cloak class="fixed inset-0 w-screen overflow-y-auto z-[501]">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">

                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                Violator's Information
                            </h3>
                            <div class="grid grid-cols-1 mt-4 gap-4 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <p class="block font-medium text-sm text-gray-700">First Name</p>
                                    <div id="display1"
                                        class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm truncate">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <p class="block font-medium text-sm text-gray-700">Middle Name</p>
                                    <div id="display2"
                                        class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm truncate">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <p class="block font-medium text-sm text-gray-700">Last Name</p>
                                    <div id="display3"
                                        class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm truncate">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <p class="block font-medium text-sm text-gray-700">Violation</p>
                                    <div id="display4"
                                        class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm truncate">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <p class="block font-medium text-sm text-gray-700">Violation Date</p>
                                    <div id="display5"
                                        class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm truncate">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <p class="block font-medium text-sm text-gray-700">Violation Time</p>
                                    <div id="display6"
                                        class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm truncate">
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <p class="block font-medium text-sm text-gray-700">Comment</p>
                                    <div class="py-2 px-3 mt-1 w-full border border-gray-300  rounded-md shadow-sm"
                                        id="display7">
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="remember_me" class="flex">
                                        <input id="remember_me" type="checkbox" required
                                            class="rounded mt-1 border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ms-2 text-sm text-gray-700">{{ __('I confirm that I have
                                            thoroughly reviewed the data pertaining to violators before submission. I
                                            understand the importance of accuracy and take full responsibility for its
                                            correctness.') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">Confirm</button>
                            <button type="button" x-on:click="open = false"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
    // Get references to the input fields and display elements
        const inputs = [
            document.getElementById("first_name"),
            document.getElementById("middle_name"),
            document.getElementById("last_name"),
            document.getElementById("violation"),
            document.getElementById("violation_date"),
            document.getElementById("violation_time"),
            document.getElementById("comment"),
        ];
        const displays = [
            document.getElementById("display1"),
            document.getElementById("display2"),
            document.getElementById("display3"),
            document.getElementById("display4"),
            document.getElementById("display5"),
            document.getElementById("display6"),
            document.getElementById("display7"),
        ];

        // Initialize the data model
        var array = [];
        for (let i = 0; i < inputs.length; i++) {
            let element = inputs[i].value;
            array.push(element);
        }

        let dataModel = array;

        // Function to update the UI with the current data model values
        function updateUI() {
            for (let i = 0; i < inputs.length; i++) {
                dataModel[i] === "" ? displays[i].textContent = "No Data Entered" : displays[i].textContent = dataModel[i];
            }
        }

        // Function to update the data model with the input values
        function updateDataModel(index) {
            dataModel[index] = inputs[index].value;
            updateUI();
        }

        // Add event listeners for input changes and initial UI update
        for (let i = 0; i < inputs.length; i++) {

            inputs[i].addEventListener("input", (event) => {
                updateDataModel(i);
            });
        }

        // Initialize the UI with the current data model values
        updateUI();
</script>
