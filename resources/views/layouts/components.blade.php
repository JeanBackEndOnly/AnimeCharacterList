<!-- Alerts -->
@if (session('success'))
    <div class="fixed top-4 right-4 z-50 flex items-center p-4 rounded-lg shadow-lg bg-green-100 border border-green-400 text-green-800" role="alert">
        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span class="font-medium">{{ session('success') }}</span>
        <button onclick="this.parentElement.remove()" class="ml-4 text-green-600 hover:text-green-800">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="fixed top-4 right-4 z-50 flex flex-col p-4 rounded-lg shadow-lg bg-red-100 border border-red-400 text-red-800 max-w-md" role="alert">
        <div class="flex items-start">
            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="flex-1">
                <span class="font-medium block mb-1">Please fix the following errors:</span>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-red-600 hover:text-red-800">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif

<!-- Modal -->
@if (auth()->user()->isAdmin())
    <div class="modal fade" id="createCharactersModal" tabindex="-1" aria-labelledby="createCharactersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="createCharactersModalLabel">Add New Character</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Body -->
                <form action="{{ route('admin.store.character') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Anime</label>
                            <input type="text" name="anime" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Goals</label>
                            <input type="text" name="goals" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">About</label>
                            <textarea name="about" rows="3" class="form-control" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Character</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
