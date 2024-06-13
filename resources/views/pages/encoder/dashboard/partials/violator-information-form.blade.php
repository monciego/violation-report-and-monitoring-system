<div class="bg-white p-4 rounded shadow-sm">
    <h2 class="mb-6 text-xl font-bold">Register Student's Information</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-2">
                <x-input-label for="student_id" :value="__('Student ID')" />
                <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id"
                    :value="old('student_id')" autofocus autocomplete="student-id" />
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" autofocus autocomplete="first-name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                    :value="old('middle_name')" autofocus autocomplete="middle-name" />
                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" autofocus autocomplete="last-name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="sex" :value="__('Sex')" />
                <select name="sex" id="sex"
                    class="border-gray-300 mt-1 focus:border-indigo-500 w-full focus:ring-indigo-500 rounded-md shadow-sm text-sm">
                    <option value="" selected disabled>Choose</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <x-input-error :messages="$errors->get('sex')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="department" :value="__('Department')" />
                <select name="department" id="department"
                    class="border-gray-300 mt-1 focus:border-indigo-500 w-full focus:ring-indigo-500 rounded-md shadow-sm text-sm">
                    <option value="" selected disabled>Choose</option>
                    <option value="Education Department">Education Department</option>
                    <option value="Information Technology Department">Information Technology Department</option>
                    <option value="Business Education Department">Business Education Department</option>
                    <option value="Crimonology Department">Crimonology Department</option>
                </select>
                <x-input-error :messages="$errors->get('department')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="year_course" :value="__('Year & Course')" />
                <x-text-input id="year_course" class="block mt-1 w-full" type="text" name="year_course"
                    :value="old('year_course')" autofocus autocomplete="year_course" />
                <x-input-error :messages="$errors->get('year_course')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" class="block mt-1 w-full" type="number" name="contact_number"
                    :value="old('contact_number')" autofocus autocomplete="contact-number" />
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="birthdate" :value="__('Birthdate')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                    :value="old('birthdate')" autofocus autocomplete="birthdate" />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>
            {{-- <div class="col-span-2">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" autofocus
                    autocomplete="age" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div> --}}
            <div class="col-span-2">
                <x-input-label for="name_of_guardian" :value="__('Guardian\'s Name')" />
                <x-text-input id="name_of_guardian" class="block mt-1 w-full" type="text" name="name_of_guardian"
                    :value="old('name_of_guardian')" autofocus autocomplete="name_of_guardian" />
                <x-input-error :messages="$errors->get('name_of_guardian')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <x-input-label for="guardian_contact_number" :value="__('Guardian\'s Contact Nuber')" />
                <x-text-input id="guardian_contact_number" class="block mt-1 w-full" type="number"
                    name="guardian_contact_number" :value="old('guardian_contact_number')" autofocus
                    autocomplete="guardian_contact_number" />
                <x-input-error :messages="$errors->get('guardian_contact_number')" class="mt-2" />
            </div>
        </div>


        <x-primary-button class="mt-6 flex items-center justify-center w-full">
            {{ __('Register') }}
        </x-primary-button>
    </form>
</div>
