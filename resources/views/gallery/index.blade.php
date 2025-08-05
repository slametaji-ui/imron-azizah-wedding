<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                        <button onclick="openModal('addModal')"
                            class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700">
                            <i class="bi bi-plus-circle"></i> {{ __('Add Photo') }}
                        </button>
                    </div>
                    <div class="table-wrapper overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="w-full bg-gray-200">
                                    <th class="px-4 py-2">{{ __('No') }}</th>
                                    <th class="px-4 py-2">{{ __('Title') }}</th>
                                    <th class="px-4 py-2">{{ __('Description') }}</th>
                                    <th class="px-4 py-2">{{ __('Image') }}</th>
                                    <th class="px-4 py-2">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $no => $gallery)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $no + $galleries->firstItem() }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $gallery->title }}</td>
                                        <td class="border px-4 py-2">{{ $gallery->description }}</td>
                                        <td class="border px-4 py-2">
                                            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                                alt="{{ $gallery->alt_text }}" class="w-20 h-20 object-cover">
                                        </td>
                                        <td class="border px-4 py-2">
                                            <div class="flex justify-center space-x-2">
                                                <button
                                                    onclick="openModal('editModal', {
                                                    id: {{ $gallery->id }},
                                                    title: '{{ $gallery->title }}',
                                                    description: '{{ $gallery->description }}',
                                                    alt_text: '{{ $gallery->alt_text }}'
                                                })"
                                                    class="inline-block px-4 py-2 bg-yellow-500 text-white font-semibold text-sm rounded-md hover:bg-yellow-700">
                                                    <i class="bi bi-pencil-square"></i> {{ __('Edit') }}
                                                </button>
                                                <button onclick="openModal('deleteModal', {{ $gallery->id }})"
                                                    class="inline-block px-4 py-2 bg-red-500 text-white font-semibold text-sm rounded-md hover:bg-red-700">
                                                    <i class="bi bi-trash3"></i> {{ __('Delete') }}
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Gallery Modal -->
    <div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button onclick="closeModal('addModal')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="bi bi-x-lg"></i>
            </button>
            <h3 class="text-lg font-semibold mb-4">{{ __('Add New Photo') }}</h3>
            <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                    <input type="text" name="title" id="title" class="mt-1 px-4 py-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                    <textarea name="description" id="description" class="mt-1 px-4 py-2 border rounded-md w-full"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Image') }}</label>
                    <input type="file" name="image" id="image" class="mt-1 px-4 py-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="alt_text" class="block text-sm font-medium text-gray-700">{{ __('Alt Text') }}</label>
                    <input type="text" name="alt_text" id="alt_text"
                        class="mt-1 px-4 py-2 border rounded-md w-full">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700 transition duration-200">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Gallery Modal -->
    <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button onclick="closeModal('editModal')" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="bi bi-x-lg"></i>
            </button>
            <h3 class="text-lg font-semibold mb-4">{{ __('Edit Photo') }}</h3>
            <form method="POST" action="" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                    <input type="text" name="title" id="editTitle" class="mt-1 px-4 py-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                    <textarea name="description" id="editDescription" class="mt-1 px-4 py-2 border rounded-md w-full"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Image') }}</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 px-4 py-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="alt_text"
                        class="block text-sm font-medium text-gray-700">{{ __('Alt Text') }}</label>
                    <input type="text" name="alt_text" id="editAltText"
                        class="mt-1 px-4 py-2 border rounded-md w-full">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700 transition duration-200">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Gallery Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button onclick="closeModal('deleteModal')"
                class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                <i class="bi bi-x-lg"></i>
            </button>
            <p class="text-sm font-medium text-gray-700 mb-4">{{ __('Are you sure you want to delete this photo?') }}
            </p>
            <form method="POST" action="" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white font-semibold text-sm rounded-md hover:bg-red-700 transition duration-200">
                        {{ __('Delete') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId, gallery = null) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
            modal.classList.add('animate-fade-in');

            if (gallery && modalId === 'editModal') {
                try {
                    // gallery object is passed directly without image_path
                    document.getElementById('editForm').action = `/gallery/${gallery.id}`;
                    document.getElementById('editTitle').value = gallery.title;
                    document.getElementById('editDescription').value = gallery.description;
                    document.getElementById('editAltText').value = gallery.alt_text;
                } catch (error) {
                    console.error("Error handling gallery object:", error);
                }
            }

            if (modalId === 'deleteModal') {
                document.getElementById('deleteForm').action = `/gallery/${gallery}`;
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

        .table-wrapper {
            overflow-x: auto; /* Enables horizontal scrolling */
            -webkit-overflow-scrolling: touch; /* For smooth scrolling on mobile */
            margin-bottom: 1rem;
        }
    </style>

</x-app-layout>
