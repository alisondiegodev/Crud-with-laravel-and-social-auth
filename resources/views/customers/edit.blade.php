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

                    <h1 class="tittle">Edit </h1>

                    @if (isset($user))
                        <div class="form">
                            <form method="POST" action="/update/{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{ $user->name }}" type="text" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{ $user->email }}" type="email" onchange="validarEmail(this)"
                                        id="email" name="email" required>
                                    <p id="valid" class="valid">Insert valid email.</p>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input value="{{ $user->phone }}" type="text" maxlength="16" id="phone"
                                        name="phone" required>
                                    <p id="validTel" class="valid">Insert valid number.</p>

                                </div>

                                <button type="submit" class="submitButton">Submit</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/validatePhone.js') }}"></script>
    <script src="{{ asset('/validateEmail.js') }}"></script>
</x-app-layout>
