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

                    <h1 class="tittle">Create</h1>

                    <div class="form">
                        <form method="POST" action="/store">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input placeholder="insert name" type="text" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input placeholder="exemple@gmail.com" onchange="validarEmail(this)" type="email"
                                    id="email" name="email" required>
                                <p id="valid" class="valid">Insert valid email.</p>

                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input placeholder="Insert a valid phone number" maxlength="16" id="phone"
                                    type="text" name="phone" required>
                                <p id="validTel" class="valid">Insert valid number.</p>

                            </div>

                            <button type="submit" class="submitButton">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/validatePhone.js') }}"></script>
    <script src="{{ asset('/validateEmail.js') }}"></script>
</x-app-layout>
