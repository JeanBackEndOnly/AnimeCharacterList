<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <!-- Characters Grid -->
                <div class="p-6">
                    @if(isset($characters) && count($characters) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($characters as $char)
                                <a href="{{ route('admin.show.character', $char->id) }}" 
                                class="group bg-white rounded-lg border border-gray-200 overflow-hidden 
                                        transform transition-all duration-300 
                                        hover:-translate-y-2 hover:shadow-2xl hover:border-blue-400">

                                    <!-- Character Icon -->
                                    <div class="aspect-square bg-gray-100 overflow-hidden">
                                        <img src="{{ asset('storage/' . $char->icon) }}" 
                                            alt="{{ $char->name }}"
                                            class="w-full h-full object-cover 
                                                    transition-transform duration-300 
                                                    group-hover:scale-110">
                                    </div>
                                    
                                    <!-- Character Info -->
                                    <div class="p-4 transition-colors duration-300 group-hover:bg-blue-50">
                                        <h3 class="font-bold text-lg text-gray-800 
                                                group-hover:text-blue-600 transition-colors">
                                            {{ $char->name }}
                                        </h3>

                                        <p class="text-sm text-blue-600 font-medium mb-2">
                                            {{ $char->anime }}
                                        </p>
                                        
                                        @if(isset($char->goals))
                                        <div class="mt-2 pt-2 border-t">
                                            <span class="text-xs font-semibold text-gray-500">GOALS</span>
                                            <p class="text-sm text-gray-700 line-clamp-2">
                                                {{ $char->goals }}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <p class="text-gray-500">No characters found. Click "Add Character" to create one.</p>
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>