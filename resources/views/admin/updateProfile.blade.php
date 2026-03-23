<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Character Profile') }}
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
                    
                    <!-- Edit Form -->
                    <form action="{{ route('admin.update.character', $char->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="p-6 md:p-8">
                            <!-- Header with Avatar and Name -->
                            <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-8">
                                <!-- Avatar with upload -->
                                <div class="relative group">
                                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                                        <img src="{{ asset('storage/' . $char->icon) }}" 
                                             alt="{{ $char->name }}"
                                             id="avatar-preview"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <label class="absolute inset-0 flex items-center justify-center bg-black/50 rounded-full opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <input type="file" name="icon" class="hidden" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                </div>
                                
                                <!-- Name and Anime inputs -->
                                <div class="text-center md:text-left flex-1 space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                        <input type="text" name="name" value="{{ old('name', $char->name) }}" 
                                               class="w-full text-2xl md:text-3xl font-bold text-gray-800 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Anime</label>
                                        <input type="text" name="anime" value="{{ old('anime', $char->anime) }}" 
                                               class="w-full text-lg text-blue-600 font-medium border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Goals Section -->
                            <div class="mb-8">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Goals & Aspirations
                                </label>
                                <textarea name="goals" rows="4" 
                                          class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('goals', $char->goals) }}</textarea>
                            </div>
                            
                            <!-- About Section -->
                            <div class="mb-8">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    About
                                </label>
                                <textarea name="about" rows="6" 
                                          class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('about', $char->about) }}</textarea>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex flex-wrap justify-end gap-3 pt-6 border-t">
                                <a href="{{ url()->previous() }}" 
                                   class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                    Cancel
                                </a>
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Update Character
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="p-12 text-center">
                        <p class="text-gray-500">Character not found.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</x-app-layout>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>