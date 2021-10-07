<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("Édition d'une promotion") }}
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-1/3">
                <div class="bg-white shadow-md rounded my-6">
                    <form action="{{ route('store-promotion-request') }}"  method="post" class="form-group ml-10 mr-10 pt-5 pb-16" enctype="multipart/form-data">
                        @csrf
                        <input hidden type="text" name="id" value="{{ $currentPromotion->id }}">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="libelle" class="block text-sm font-medium text-gray-700 mt-2">Nom de la promotion</label>
                            <input type="text" name="libelle" id="libelle" value="{{ $currentPromotion->Libelle }}" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="description" class="block text-sm font-medium text-gray-700 mt-2">Description</label>
                            <textarea name="description" id="description" rows="3"  autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">{{ $currentPromotion->description }}</textarea>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="code" class="block text-sm font-medium text-gray-700 mt-2">Code</label>
                            <input type="text" name="code" id="code" value="{{ $currentPromotion->Code }}" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">
                        </div>
                        <div>
                            <label for="NbUtilisation" class="block text-sm font-medium text-gray-700 mt-1">
                                Nombre d'utilisation
                            </label>
                            <div class="mt-1">
                                <input type="number" name="NbUtilisation" value="{{ $currentPromotion->NbUtilisation }}" id="NbUtilisation" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-6">
                            </div>
                        </div>

                        <div>
                            <label for="taille" class="block text-sm font-medium text-gray-700 mt-1">
                                Date de validitée
                            </label>
                            <div class="mt-1">
                                <input type="datetime-local" name="validite" value="{{ $currentPromotion->DateValidite }}" id="validite" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-2">
                            </div>
                        </div>

                        <div>
                            <label for="drop" class="block text-sm font-medium text-gray-700 mt-1">
                                Drop
                            </label>
                            <div class="mt-1">
                                <select name="drop" id="drop" value="{{ $currentPromotion->drop }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mb-2">
                                    @foreach($listeDrop as $drop)
                                        <option value="{{ $drop->id }}" @if($currentPromotion->drop_id == $drop->id) selected="selected" @endif>{{ $drop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="float-right mt-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Envoyer la modification
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
