<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Character Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @if(isset($char))
                    <!-- Back Button -->
                    <div class="p-4 border-b">
                        <a href="{{ url()->previous() }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                    
                    <!-- Profile Content -->
                    <div class="p-6 md:p-8">
                        <!-- Header with Avatar and Name -->
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-8">
                            <!-- Avatar -->
                            <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                                <img src="{{ asset('storage/' . $char->icon) }}" 
                                     alt="{{ $char->name }}"
                                     class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Name and Anime -->
                            <div class="text-center md:text-left flex-1">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $char->name }}</h1>
                                <p class="text-lg text-blue-600 font-medium mt-1">{{ $char->anime }}</p>
                            </div>
                        </div>
                        
                        <!-- Goals Section -->
                        <div class="mb-8">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Goals & Aspirations
                            </h3>
                            <div class="bg-blue-50 p-5 rounded-lg border-l-4 border-blue-500">
                                <p class="text-gray-800">{{ $char->goals }}</p>
                            </div>
                        </div>
                        
                        <!-- About Section -->
                        <div class="mb-8">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                About
                            </h3>
                            <p class="text-gray-700 leading-relaxed">{{ $char->about }}</p>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-wrap justify-end gap-3 pt-6 border-t">
                            <a href="{{ route('admin.show.character.update', $char->id) }}" 
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Edit Character
                            </a>
                        </div>
                    </div>
                @else
                    <div class="p-12 text-center">
                        <p class="text-gray-500">Character not found.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</x-app-layout>