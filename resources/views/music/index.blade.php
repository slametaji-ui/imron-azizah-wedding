<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                        <button onclick="openModal('addModal')"
                            class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700">
                            <i class="bi bi-plus-circle"></i> {{ __('Add Music') }}
                        </button>
                    </div>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b">{{ __('Filename') }}</th>
                                <th class="px-4 py-2 border-b">{{ __('Status') }}</th>
                                <th class="px-4 py-2 border-b">{{ __('Actions') }}</th>
                                <th class="px-4 py-2 border-b">{{ __('Play') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($musicFiles as $musicFile)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $musicFile->filename }}</td>
                                    <td class="px-4 py-2 border-b">
                                        {{ $musicFile->status ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                        <button onclick="openModal('toggleStatusModal', {{ $musicFile->id }})"
                                            class="px-2 py-1 bg-yellow-500 text-white font-semibold text-xs rounded-md hover:bg-yellow-700">
                                            {{ $musicFile->status ? 'Deactivate' : 'Activate' }}
                                        </button>
                                        <button onclick="openModal('deleteModal', {{ $musicFile->id }})"
                                            class="px-2 py-1 bg-red-500 text-white font-semibold text-xs rounded-md hover:bg-red-700">
                                            Delete
                                        </button>
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                        <audio controls class="w-full">
                                            <source src="{{ asset('storage/' . $musicFile->path) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $musicFiles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Music Modal -->
    <div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button onclick="closeModal('addModal')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="bi bi-x-lg"></i>
            </button>
            <h3 class="text-lg font-semibold mb-4">{{ __('Add New Music') }}</h3>
            <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">{{ __('Music File') }}</label>
                    <input type="file" name="file" id="file" class="mt-1 px-4 py-2 border rounded-md w-full" accept="audio/mp3" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700 transition duration-200">
                        {{ __('Upload') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Music Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button onclick="closeModal('deleteModal')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="bi bi-x-lg"></i>
            </button>
            <p class="text-sm font-medium text-gray-700 mb-4">{{ __('Are you sure you want to delete this music file?') }}</p>
            <form method="POST" action="" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold text-sm rounded-md hover:bg-red-700 transition duration-200">
                        {{ __('Delete') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Toggle Status Modal -->
    <div id="toggleStatusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button onclick="closeModal('toggleStatusModal')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="bi bi-x-lg"></i>
            </button>
            <p class="text-sm font-medium text-gray-700 mb-4">{{ __('Are you sure you want to change the status of this music file?') }}</p>
            <form method="POST" action="" id="statusForm">
                @csrf
                @method('PATCH')
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700 transition duration-200">
                        {{ __('Change Status') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId, id = null) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
            modal.classList.add('animate-fade-in');

            if (modalId === 'deleteModal') {
                document.getElementById('deleteForm').action = `/music/${id}`;
            }

            if (modalId === 'toggleStatusModal') {
                document.getElementById('statusForm').action = `/music/${id}/toggle-status`;
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('animate-fade-in');
            modal.classList.add('animate-fade-out');

            setTimeout(() => {
                modal.style.display = 'none';
                modal.classList.remove('animate-fade-out');
            }, 300);
        }
    </script>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        .animate-fade-out {
            animation: fadeOut 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(0.95);
            }
        }
    </style>
</x-app-layout>
