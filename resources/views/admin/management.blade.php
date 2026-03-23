<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('wtf') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex jutify-between align-center p-6 text-gray-900">
                    <div class="col-md-6 col-6">
                        <strong>Manage Characters</strong>
                    </div>
                    <div class="col-md-6 col-6 flex justify-end align-center">
                        <button class="btn btn-sm btn-primary m-0"
                        data-bs-toggle="modal"
                        data-bs-target="#createCharactersModal">Add Character</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
