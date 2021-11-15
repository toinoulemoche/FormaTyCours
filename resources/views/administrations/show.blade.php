@if(Auth::user()->admins == 1)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>
    <div class="text-gray-900 max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
        <div class="">
            <div class="font-semibold text-2xl text-gray-900 dark:text-gray-120 leading-tight py-4 text-align: center">
                <h2>Utilisateur {{ $user->id }}</h2>
            </div>
            <div class="">
                <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('administrations.index') }}">Retour</a>
            </div>
        </div>
    </div>
    <div class="bg-gray-400 table-auto text-white max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12 rounded space-y-2">
        <div class="">
            <div class="">
                <strong>Nom:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de création: {{ $user->created_at }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dernières Modifications: {{ $user->updated_at }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Administrateur:</strong>
                @if ( $user->admins == 1 )
                  <strong class="text-green-400">Oui</strong>
                @else
                  <strong class="text-red-500">Non</strong>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
@else
<x-app-layout>
<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
        <div class="font-semibold text-2xl text-white dark:text-gray-120 leading-tight py-4 text-align: center">
            <h1>You're not an admin</h1>
        </div>
    </div>
</div>
</x-app-layout>
@endif
