<x-app-layout>
    <h2 class="text-center text-xl font-bold">Register an account</h2>
    <div class="flex items-center justify-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form x-data="{ role: '{{ old('role_id') }}' }" method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-input-label for="role_id" :value="__('Register as:')" />
                    <select x-model="role" name="role_id" id="role_id"
                        class="border-gray-300 mt-1 focus:border-indigo-500 w-full focus:ring-indigo-500 rounded-md shadow-sm text-sm">
                        <option value="" selected disabled>Choose</option>
                        <option value="guard">Guard/Marshall</option>
                        <option value="college_dean">College Dean</option>
                        <option value="encoder">Encoder</option>
                    </select>
                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                </div>

                <!-- Department -->
                <div x-show="role === 'encoder' || role === 'college_dean'" x-cloak class="mt-4">
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

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>


                <x-primary-button class="mt-4 flex items-center justify-center w-full">
                    {{ __('Register') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
