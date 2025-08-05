<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                        <div class="inline-block">
                            <input type="text" id="search" placeholder="{{ __('Search messages') }}"
                                class="px-4 py-2 border rounded-md">
                        </div>
                    </div>
                    <div class="table-wrapper overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="w-full bg-gray-200">
                                    <th class="px-4 py-2">{{ __('No') }}</th>
                                    <th class="px-4 py-2">{{ __('Fullname') }}</th>
                                    <th class="px-4 py-2">{{ __('Message') }}</th>
                                    <th class="px-4 py-2">{{ __('Date') }}</th>
                                    <th class="px-4 py-2">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $no => $message)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $no + $messages->firstItem() }}</td>
                                        <td class="border px-4 py-2">{{ $message->name }}</td>
                                        <td class="border px-4 py-2">{{ $message->message }}</td>
                                        <td class="border px-4 py-2">{{ $message->created_at->format('d M Y H:i') }}</td>
                                        <td class="border px-4 py-2 ">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Delete Button -->
                                                <button onclick="openModal('deleteModal', {{ $message->id }})"
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
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete message Modal -->
    <div id="deleteModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-semibold mb-4">{{ __('Delete message') }}</h2>
                <p class="mb-6">{{ __('Are you sure you want to delete this message? This action cannot be undone.') }}</p>
                <form action="{{ route('message.destroy', '') }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="message_id" id="delete_message_id">
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="closeModal('deleteModal')"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md">{{ __('Cancel') }}</button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700">{{ __('Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            let query = this.value;

            fetch(`/message/search?search=${query}`)
                .then(response => response.json())
                .then(data => {
                    let tbody = document.querySelector('tbody');
                    tbody.innerHTML = ''; // Clear the current table body

                    data.forEach((message, index) => {
                        let tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td class="border px-4 py-2 text-center">${index + 1}</td>
                            <td class="border px-4 py-2">${message.name}</td>
                            <td class="border px-4 py-2">${message.message}</td>
                            <td class="border px-4 py-2">${new Date(message.created_at).toLocaleDateString('en-US', {
                                day: '2-digit',
                                month: 'short',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit'
                            })}</td>
                            <td class="border px-4 py-2 flex-1">
                                <button onclick="openModal('deleteModal', ${message.id})"
                                    class="inline-block px-4 py-2 bg-red-500 text-white font-semibold text-sm rounded-md hover:bg-red-700">
                                    Delete
                                </button>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                });
        });

        function openModal(modalId, id = null) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
            modal.classList.add('animate-fade-in');

            if (modalId === 'deleteModal') {
                document.getElementById('deleteForm').action = `/message/${id}`;
                document.getElementById('delete_message_id').value = id;
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
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        /* Modal fade-in and fade-out animations */
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        .animate-fade-out {
            animation: fadeOut 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</x-app-layout>
