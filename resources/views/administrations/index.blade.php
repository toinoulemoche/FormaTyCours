@if(Auth::user()->admins == 1)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
            <div class="font-semibold text-2xl text-gray-900 dark:text-gray-120 leading-tight py-4 text-align: center">
                <h1>Utilisateurs</h1>
            </div>
            <div class="">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('administrations.create') }}">Créer nouvel Utilisateur</a>
            </div>
        </div>
    </div>
    <table class="table-auto text-white max-w-7xl mx-auto sm:px-6 lg:px-8 mx-auto align-content: center py-12">
      <thead>
        <tr class="bg-gray-600">
            <th class="px-4 py-2">Id</th>
            <th class="px-4 py-2">Nom</th>
            <th class="px-4 py-2">Mail</th>
            <th class="px-4 py-2">Date de création</th>
            <th class="px-4 py-2">Dernière modification</th>
            <th width="280px" class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr class="bg-gray-400">
            <td class="border px-4 py-2">{{ $user->id }}</td>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            <td class="border px-4 py-2">{{ $user->created_at }}</td>
            <td class="border px-4 py-2">{{ $user->updated_at }}</td>
            <td>
                <form action="{{ route('administrations.destroy', $user->id) }}" method="POST" class="align-content: center">
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded" href="{{ route('administrations.show',$user->id) }}">Afficher</a>
                    <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded" href="{{ route('administrations.edit',$user->id) }}">Editer</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $users->links() !!}
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
