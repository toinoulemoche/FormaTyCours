@if(Auth::user()->admins == 1)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
<div class="text-gray-900 max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
    <div class="">
        <div class="font-semibold text-2xl text-gray-900 dark:text-gray-120 leading-tight py-4 text-align: center">
            <h2>Ajouter Nouvel Utilisateur</h2>
        </div>
        <div class="">
            <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('administrations.index') }}"> Retour</a>
        </div>
    </div>
</div>

<form action="{{ route('administrations.store') }}" method="POST">
    @csrf
     <div class="bg-gray-700 table-auto text-white max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12 rounded space-y-4 border">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="name" placeholder="Nom" class="text-black">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" placeholder="Email" class="text-black">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mot de passe:</strong>
                <input type="password" name="password" placeholder="Mot de passe" class="text-black">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Administrateur:</strong>
                <input type="checkbox" name="admin" placeholder="Admin" class="text-black">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-9 rounded">Créer</button>
        </div>
        @if ($errors->any())
            <div class="bg-red-200 table-auto max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-8 rounded text-black">
                <strong>ERREUR!</strong> Entrées incorrectes:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</form>
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
