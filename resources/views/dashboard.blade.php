<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1><strong>You're logged in! Welcome {{Auth::user()->name}} :)</strong></h1>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Profile</h1><br>
                    Name: {{Auth::user()->name}}<br>
                    Email: {{Auth::user()->email}}<br>
                    Administrator: @if (Auth::user()->admins == 1) <strong>Yes</strong> @else <strong>No</strong>@endif
                    <br>
                    @csrf
                    <a href="{{route('confirm.edit', ['confirm' => Auth::user()->id])}}">Change credentials</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
