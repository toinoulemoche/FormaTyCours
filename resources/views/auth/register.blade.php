<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div>
            <h1><strong>Finish the new formator's credentials.</strong></h1><br>
            The new formator has for name <strong>{{$name}}</strong> and for email <strong>{{$email}}</strong>.<br>
            Ignore this mail if you don't want to give this user the formator role.
        </div>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('')" />

                <x-input id="name" class="block mt-1 w-full" type="hidden" name="name" :value="old('name', $name)" required autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('')" />

                <x-input id="email" class="block mt-1 w-full" type="hidden" name="email" :value="old('email', $email)" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

                <!-- Administrateur -->
                <div class="mt-4">
                    <x-label for="admins" :value="__('Is admin?')" />

                    <x-input id="admins" class="block mt-1" type="checkbox" name="admins" autofocus />
                </div>
                <x-button class="ml-4 mt-5">
                    {{ __('Finish registration') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
