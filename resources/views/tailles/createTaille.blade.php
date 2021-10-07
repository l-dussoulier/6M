<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("Création de taille") }}
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-1/3">
                <div class="bg-white shadow-md rounded my-6">
                    <form action="{{ route('store-taille-request') }}" method="post" class="form-group ml-10 mr-10 pt-5 pb-16" enctype="multipart/form-data">
                        @csrf
                        <div class="col-span-6 sm:col-span-3">
                            <label for="titre" class="block text-sm font-medium text-gray-700 mt-2">Nom de la taille</label>
                            <input type="text" name="libelle" id="libelle" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">
                        </div>

                        <div>
                            <label for="article" class="block text-sm font-medium text-gray-700 mt-1">
                                Article
                            </label>
                            <div class="mt-1">
                                <select name="article" id="drop" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-2">
                                    @foreach($listeArticles as $art)
                                        <option value="{{ $art->id }}">{{ $art->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 mt-1">
                                Stock
                            </label>
                            <div class="mt-1">
                                <input type="number" step="1" name="stock" id="prix" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-2">
                            </div>
                        </div>



                        <button type="submit" class="float-right mt-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Envoyer la demande
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
