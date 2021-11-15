<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>
    <div class="text-gray-900 max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
        <div class="">
            <div class="font-semibold text-2xl text-gray-900 dark:text-gray-120 leading-tight py-4 text-align: center">
                <h2>Modify your profile</h2>
            </div>
            <div class="">
                <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('dashboard') }}"> Retour</a>
            </div>
        </div>
    </div>
    <form action="{{ route('confirm.update', ['confirm' => Auth::user()->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-gray-700 table-auto text-white max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12 rounded space-y-4 border">
            <div class="">
                <div class="">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="text-black" placeholder="Nom">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Mail:</strong>
                    <input class="text-black" value="{{ Auth::user()->email }}" name="email" placeholder="Adresse Mail" type="email">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Password:</strong>
                    <input class="text-black" type="password" name="password" placeholder="Mot de passe">
                </div>
            </div>
            <div class="">
                <div class="">
                    <strong>Confirm:</strong>
                    <input class="text-black" type="password" name="password_confirmation" placeholder="Confirmer mot de passe">
                </div>
            </div>
            <div class="">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-9 rounded">Modifier</button>
            </div>
            @if ($errors->any())
                <div class="bg-red-200 table-auto max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-8 rounded text-black">
                    <strong>ERROR!</strong> Wrong Entries:<br><br>
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
