<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crud System') }}
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
                        @auth
                            <h1 class="tittle">Welcome!</h1>
                        @endauth
                    </div>

                    @auth
                        <h1>Go to <a class="button-2" href="/dashboard">Dashboard</a> </h1>
                    @endauth
                    @guest
                        <div class="guestWelcome">
                            <h1>You need to be registered and logged in to see users </h1>
                            @guest
                                <div><a class="button-2" href="/register">Register</a>
                                    <a class="button-2" href="/login">Login</a>
                                </div>
                            @endguest
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
