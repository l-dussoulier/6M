<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Page d'accueil") }}
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Numero commande</th>
                            <th class="py-3 px-6 text-center">Date de commande</th>
                            <th class="py-3 px-6 text-left">Statut de la commande</th>

                            <th class="py-3 px-6 text-left">Nom</th>
                            <th class="py-3 px-6 text-left">Prénom</th>
                            <th class="py-3 px-6 text-left">Téléphone</th>
                            <th class="py-3 px-6 text-left">Ville</th>
                            <th class="py-3 px-6 text-left">Numero</th>
                            <th class="py-3 px-6 text-left">Adresse</th>
                            <th class="py-3 px-6 text-left">Code Postal</th>
                            <th class="py-3 px-6 text-left">Utilisateur</th>
                            <th class="py-3 px-6 text-left"></th>
                            <th class="py-3 px-6 text-left"></th>

                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($commandes as $commande)
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ $commande->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span class="{{ \App\Models\Statut::findOrFail($commande->statut_id)->couleur }}  text-black-600 py-1 px-3 rounded-full text-xs">{{ \App\Models\Statut::findOrFail($commande->statut_id)->libelle }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->nom }}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->prenom }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->telephone }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->ville }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->numero_adresse }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->adresse }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $commande->codePostal }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{ \App\Models\User::findOrFail($commande->user_id)->name }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{ route('edit', ['id' => $commande->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="{{ route('edit',['id' => $commande->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </div>
                </div>
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
