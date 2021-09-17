<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("Création d'article") }}
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-1/3">
                <div class="bg-white shadow-md rounded my-6">
                    <form action="blabla" method="post" class="form-group ml-10 mr-10 pt-5 pb-16" enctype="multipart/form-data">
                        @csrf
                        <div class="col-span-6 sm:col-span-3">
                            <label for="titre" class="block text-sm font-medium text-gray-700 mt-2">Nom de l'article</label>
                            <input type="text" name="titre" id="titre" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mt-1">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md mb-6" placeholder="Description de l'article mise en vente"></textarea>
                            </div>
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 mt-1">
                                Stock
                            </label>
                            <div class="mt-1">
                                <input type="number" name="stock" id="stock" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">
                            </div>
                        </div>

                        <div>
                            <label for="taille" class="block text-sm font-medium text-gray-700 mt-1">
                                Taille
                            </label>
                            <div class="mt-1">
                                <input type="text" name="taille" id="taille" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-2">
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
