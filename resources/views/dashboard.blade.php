<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="modal">
        <box-icon size="lg" color="#f00" name='error-alt' type='solid'></box-icon>
        <p>Do you realy want to delete this client?</p>
        <p onclick="closeModal()" class="close">X</p>

        <div class="modalButtons">
            <button onclick="closeModal()" class="button-2 flex gap-2">Don't delete
                <box-icon name='arrow-back'></box-icon>
            </button>

            <button id="confirmButton" onclick="deleteNow(this)" class="delete-button">Delete
                <box-icon color='#fff' name='trash'></box-icon>
            </button>
        </div>
    </div>
    <div id="content" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="list-header">
                        <h1 class="tittle">Clients</h1>
                        <a href="/create">Create New <box-icon color='#fff' name='user-plus'></box-icon></a>

                    </div>

                    @auth


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

                                @if (isset($users) && count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><span>Name:</span> {{ $user->name }}</td>
                                            <td><span>Email:</span>{{ $user->email }}</td>
                                            <td><span>Phone:</span>{{ $user->phone }}</td>
                                            <td class="actionButtons">
                                                <span class="flex-1">Actions:</span>
                                                <a href="/edit/{{ $user->id }}">
                                                    <button type="submit" class="edit-button">
                                                        <span>Edit</span>
                                                        <box-icon color='#147a7a' name='edit'></box-icon>
                                                    </button>
                                                </a>
                                                <form id="{{ $user->id }}" action="/delete/{{ $user->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="confirmDelete(event, {{ $user->id }})"
                                                        class="delete-button"><span>Delete</span>
                                                        <box-icon color='#fff' name='trash'></box-icon>
                                                    </button>
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <h1>Nenhum usuário registrado</h1>
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td>--</td>


                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endauth
                    @guest
                        <div>
                            <h1>You need to register and login for see users</h1>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/modal.js') }}"></script>
</x-app-layout>
