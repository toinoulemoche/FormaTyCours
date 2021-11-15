@if(Auth::user()->admins == 1)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    <div class="text-gray-900 max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
        <div class="">
            <div class="font-semibold text-2xl text-gray-900 dark:text-gray-120 leading-tight py-4 text-align: center">
                <h2>Modifier utilisateur n°{{$user->id}}</h2>
            </div>
            <div class="">
                <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('administrations.index') }}"> Retour</a>
            </div>
        </div>
    </div>
    <form action="{{ route('administrations.update', ['administration' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="bg-gray-700 table-auto text-white max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12 rounded space-y-4 border">
            <div class="">
                <div class="">
                    <strong>Nom:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="text-black" placeholder="Nom">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Email:</strong>
                    <input class="text-black" value="{{ $user->email }}" name="email" placeholder="Adresse Mail" type="email">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Mot de passe:</strong>
                    <input class="text-black" type="password" name="password" placeholder="Mot de passe">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Confirmation Mot de passe:</strong>
                    <input class="text-black" type="password" name="password_confirmation" placeholder="Confirmer mot de passe">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Administrateur:</strong>
                    <input type="checkbox" @if($user->admins == 1) checked @endif name="admins" placeholder="Email">
                </div>
            </div>
            <div class="">
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-9 rounded">Modifier</button>
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
