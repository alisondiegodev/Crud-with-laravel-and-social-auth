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
                    <h1 class="tittle">Usuários</h1>

                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th class="actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Maria</td>
                                <td>maria@example.com</td>
                                <td>(22) 9876-5432</td>
                                <td class="actionButtons">
                                    <button class="edit-button">
                                        Editar
                                        <box-icon color='#147a7a' name='edit'></box-icon>
                                    </button>
                                    <button class="delete-button">Excluir
                                        <box-icon color='#fff' name='trash'></box-icon>
                                    </button>
                                </td>
                            </tr>
                            <!-- Adicione mais linhas conforme necessário -->
                        </tbody>
                    </table>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
