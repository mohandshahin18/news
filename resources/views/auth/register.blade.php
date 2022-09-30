@extends('news.parent')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>
        </x-slot>


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!--First Name -->
            <div>
                <x-label for="firstname" :value="__('First name')" />

                <x-input id="firstname" class="block mt-1 w-full register" type="text" name="firstname" :value="old('firstname')" required autofocus />
            </div>

             <!--Last Name -->
             <div class="mt-4">
                <x-label for="lastname" :value="__('Last Name')" />

                <x-input id="lastname" class="block mt-1 w-full register" type="text" name="lastname" :value="old('lastname')" required autofocus />
            </div>


             <!--Date of birth -->
             <div class="mt-4">
                <x-label for="date_of_birth" :value="__('Date of birth')" />

                <x-input id="date_of_birth" class="block mt-1 w-full register" type="date" name="date_of_birth" :value="old('date_of_birth')" required autofocus />
            </div>

             <!--Phone -->
             <div class="mt-4">
                <x-label for="mobile" :value="__('Phone')" />

                <x-input id="mobile" class="block mt-1 w-full register" type="text" name="mobile" :value="old('mobile')" required autofocus />
            </div>

            <div class="mt-4">
                {{-- <label for="gender">Gender</label> --}}
                <x-label for="gender" :value="__('Gender')" />

                <select class="form-control" name="gender" id="gender" style="box-shadow: 0 .125rem .25remrgba(0,0,0,.075)!important;" >
                           <option value="">All</option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                </select>

                </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full register" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full register"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full register"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <br>
            <br>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
