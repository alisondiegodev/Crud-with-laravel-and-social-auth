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
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="actionButtons">
                                            <a href="/edit/{{ $user->id }}">
                                                <button type="submit" class="edit-button">
                                                    Edit
                                                    <box-icon color='#147a7a' name='edit'></box-icon>
                                                </button>
                                            </a>
                                            <form id="{{ $user->id }}" action="/delete/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="confirmDelete(event, {{ $user->id }})"
                                                    class="delete-button">Delete
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
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(event, id) {
            event.preventDefault();
            modal.style.display = "flex";
            content.style.filter = "blur(2px)"
            content.style.pointerEvents = "none"

            setTimeout(() => {
                modal.style.opacity = "100%";
                modal.style.transform = "translate(-50%, -50%)";
            }, 100);
            confirmButton.setAttribute("userId", id);
        }

        function deleteNow(btn) {
            const id = btn.getAttribute("userId");
            const form = document.getElementById(id)
            form.submit();
        }

        function closeModal() {
            modal.style.opacity = "0%";
            modal.style.transform = "translate(-50%, -44%)";
            content.style.filter = "blur(0px)";
            content.style.pointerEvents = "unset"

            setTimeout(() => {
                modal.style.display = "none"
            }, 500);
            confirmButton.setAttribute("userId", "");
        }
    </script>
</x-app-layout>
