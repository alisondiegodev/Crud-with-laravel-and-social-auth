<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="list-header">
                        <h1 class="tittle">Clients</h1>
                        <a href="/create">Create New <box-icon color='#fff' name='user-plus'></box-icon></a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td class="actionButtons">
                                        <a href="/edit/{{ $user->id }}">
                                            <button class="edit-button">
                                                Edit
                                                <box-icon color='#147a7a' name='edit'></box-icon>
                                            </button>
                                        </a>
                                        <form action="/delete/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button">Delete
                                                <box-icon color='#fff' name='trash'></box-icon>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
