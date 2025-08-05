<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                        <button onclick="openModal('addModal')"
                            class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700">
                            <i class="bi bi-plus-circle"></i> {{ __('Add Guest') }}
                        </button>
                        <form action="{{ route('guest.import') }}" method="POST" enctype="multipart/form-data"
                            class="inline-block">
                            @csrf
                            <input type="file" class="px-4 py-2 border rounded-md" name="file" required>
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-semibold text-sm rounded-md hover:bg-green-700">
                                <i class="bi bi-file-earmark-spreadsheet"></i> {{ __('Import Excel') }}
                            </button>
                        </form>
                        <div class="inline-block">
                            <input type="text" id="search" placeholder="{{ __('Search Guests') }}"
                                class="px-4 py-2 border rounded-md">
                        </div>
                    </div>
                    <div class="table-wrapper overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="w-full bg-gray-200">
                                    <th class="px-4 py-2">{{ __('No') }}</th>
                                    <th class="px-4 py-2">{{ __('Fullname') }}</th>
                                    <th class="px-4 py-2">{{ __('Address') }}</th>
                                    <th class="px-4 py-2">{{ __('Phone Number') }}</th>
                                    <th class="px-4 py-2">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guests as $no => $guest)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $no + $guests->firstItem() }}</td>
                                        <td class="border px-4 py-2">{{ $guest->fullname }}</td>
                                        <td class="border px-4 py-2">{{ $guest->address }}</td>
                                        <td class="border px-4 py-2">{{ $guest->phone_number }}</td>
                                        <td class="border px-4 py-2 ">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Copy Message Button -->
                                                <button onclick="copyMessageToClipboard('{{ $guest->fullname }}', '{{ $guest->address }}')"
                                                    class="inline-block px-4 py-2 bg-gray-500 text-white font-semibold text-sm rounded-md hover:bg-gray-700">
                                                    <i class="bi bi-clipboard"></i> {{ __('Copy Message') }}
                                                </button>

                                                <!-- Send WhatsApp Button -->
                                                <button
                                                    onclick="sendWaMessage('{{ $guest->fullname }}', '{{ $guest->phone_number }}', '{{ $guest->address }}')"
                                                    class="inline-block px-4 py-2 bg-green-500 text-white font-semibold text-sm rounded-md hover:bg-green-700">
                                                    <i class="bi bi-whatsapp"></i> {{ __('Send WA') }}
                                                </button>

                                                <!-- Edit Button -->
                                                <button onclick="openModal('editModal', JSON.parse('{{ json_encode($guest) }}'))"
    class="inline-block px-4 py-2 bg-yellow-500 text-white font-semibold text-sm rounded-md hover:bg-yellow-700">
    <i class="bi bi-pencil-square"></i> Edit
</button>


                                                <!-- Delete Button -->
                                                <button onclick="openModal('deleteModal', {{ $guest->id }})"
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
                        {{ $guests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Guest Modal -->
    <div id="addModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl mb-4">{{ __('Add Guest') }}</h2>
                <form action="{{ route('guest.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="fullname" class="block text-gray-700">{{ __('Fullname') }}</label>
                        <input type="text" name="fullname" id="fullname" class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="phone_number"
                            class="block text-gray-700">{{ __('Phone Number (WhatsApp)') }}</label>
                        <input type="text" name="phone_number" id="phone_number"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700">{{ __('Address') }}</label>
                        <textarea name="address" id="address" class="w-full px-4 py-2 border rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal('addModal')"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">{{ __('Cancel') }}</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Guest Modal -->
    <div id="editModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl mb-4">{{ __('Edit Guest') }}</h2>
                <form action="{{ route('guest.update', '') }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="guest_id" id="edit_guest_id">
                    <div class="mb-4">
                        <label for="edit_fullname" class="block text-gray-700">{{ __('Fullname') }}</label>
                        <input type="text" name="fullname" id="edit_fullname"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>
                     <div class="mb-4">
                        <label for="edit_phone_number"
                            class="block text-gray-700">{{ __('Phone Number (WhatsApp)') }}</label>
                        <input type="text" name="phone_number" id="edit_phone_number"
                            class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="edit_address" class="block text-gray-700">{{ __('Address') }}</label>
                        <textarea name="address" id="edit_address" class="w-full px-4 py-2 border rounded-md"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal('editModal')"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">{{ __('Cancel') }}</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Guest Modal -->
    <div id="deleteModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl mb-4">{{ __('Delete Guest') }}</h2>
                <p>{{ __('Are you sure you want to delete this guest?') }}</p>
                <form action="{{ route('guest.destroy', '') }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="guest_id" id="delete_guest_id">
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal('deleteModal')"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">{{ __('Cancel') }}</button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-md">{{ __('Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId, guest = null) {

            if (guest) {
                if (modalId === 'editModal') {
                    document.getElementById('edit_guest_id').value = guest.id;
                    document.getElementById('edit_fullname').value = guest.fullname;
                    document.getElementById('edit_address').value = guest.address;
                    document.getElementById('edit_phone_number').value = guest.phone_number;
                    document.getElementById('editForm').action = `/guest/${guest.id}`;
                } else if (modalId === 'deleteModal') {
                    document.getElementById('delete_guest_id').value = guest;
                    document.getElementById('deleteForm').action = `/guest/${guest}`;
                }
            }
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>

<script>
    document.getElementById('search').addEventListener('input', function() {
        let query = this.value;

        fetch(`/guest/search?search=${query}`)
            .then(response => response.json())
            .then(data => {
                let tbody = document.querySelector('tbody');
                tbody.innerHTML = ''; // Clear the current table body

                data.forEach((guest, index) => {
                    let tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td class="border px-4 py-2 text-center">${index + 1}</td>
                        <td class="border px-4 py-2">${guest.fullname}</td>
                        <td class="border px-4 py-2">${guest.address}</td>
                        <td class="border px-4 py-2">${guest.phone_number}</td>
                        <td class="border px-4 py-2 flex-1">
                            <button onclick="copyMessageToClipboard('${guest.fullname}', '${guest.address}')"
                                class="inline-block px-4 py-2 bg-gray-500 text-white font-semibold text-sm rounded-md hover:bg-gray-700">
                                <i class="bi bi-clipboard"></i> Copy Message
                            </button>
                            <button onclick="sendWaMessage('${guest.fullname}', '${guest.phone_number}', '${guest.address}')"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-semibold text-sm rounded-md hover:bg-green-700">
                                Send WA
                            </button>
                            <!-- Fix here: -->
                            <button onclick="openModal('editModal', ${JSON.stringify(guest)})"
                                class="inline-block px-4 py-2 bg-yellow-500 text-white font-semibold text-sm rounded-md hover:bg-yellow-700">
                                Edit
                            </button>
                            <button onclick="openModal('deleteModal', ${guest.id})"
                                class="inline-block px-4 py-2 bg-red-500 text-white font-semibold text-sm rounded-md hover:bg-red-700">
                                Delete
                            </button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            });
    });
</script>


    <script>
        function sendWaMessage(fullname, phone_number,address) {
            const encodedFullname = encodeURIComponent(fullname);
            const baseUrl = "https://wa.me/";
            const messageTemplate = `
Yth.
Bapak/Ibu/Saudara/i
${fullname}
${address}

Bismillaahirrahmaanirrahiim

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, untuk menghadiri acara Resepsi Pernikahan Kami

The Wedding Of Diani Maulina & Slamet Aji Suryana

Info lebih lengkap klik link dibawah ini
${window.location.origin}?to=${encodedFullname}

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Kami yang berbahagia
Diani Maulina & Slamet Aji Suryana

Mohon maaf perihal undangan hanya dibagikan melalui pesan ini.
    `;

            const encodedMessage = encodeURIComponent(messageTemplate);
            const url = `${baseUrl}${phone_number}?text=${encodedMessage}`;

            window.open(url, "_blank");
        }
    </script>

    <script>
        function copyMessageToClipboard(fullname, address = 'di tempat') {
            const encodedFullname = encodeURIComponent(fullname);
            const baseUrl = "https://wa.me/";
            const messageTemplate = `
Yth.
Bapak/Ibu/Saudara/i
${fullname}
${address}

Bismillaahirrahmaanirrahiim

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, untuk menghadiri acara Resepsi Pernikahan Kami

The Wedding Of Diani Maulina & Slamet Aji Suryana

Info lebih lengkap klik link dibawah ini
${window.location.origin}?to=${encodedFullname}

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Kami yang berbahagia
Diani Maulina & Slamet Aji Suryana

Mohon maaf perihal undangan hanya dibagikan melalui pesan ini.
`;

            // Create a temporary textarea to copy the message
            const textArea = document.createElement('textarea');
            textArea.value = messageTemplate;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            alert('Message copied to clipboard!');
        }
    </script>

    <style>
        .table-wrapper {
            overflow-x: auto;
            /* Enables horizontal scrolling */
            -webkit-overflow-scrolling: touch;
            /* For smooth scrolling on mobile */
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</x-app-layout>
