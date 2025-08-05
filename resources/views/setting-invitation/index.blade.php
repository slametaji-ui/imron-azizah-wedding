<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings Invitation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Display success message --}}
                    @if (session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Display error message --}}
                    @if (session('error'))
                        <div class="mb-4 text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('setting-invitation.storeOrUpdate') }}" method="POST">
                        @csrf

                        {{-- Invitation Section --}}
                        <h3 class="text-lg font-semibold mb-4">Invitation Details</h3>
                        <hr class="mb-4">

                        {{-- Invitation Name --}}
                        <div class="py-4">
                            <label for="invitation_name" class="block text-sm font-medium text-gray-700">
                                <i class="bi bi-person-lines-fill"></i> Invitation Name
                            </label>
                            <select name="invitation_name" id="invitation_name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="Wedding Invitation"
                                    {{ old('invitation_name', $invitation->invitation_name ?? '') == 'Wedding Invitation' ? 'selected' : '' }}>
                                    Wedding Invitation</option>
                                <option value="Engagement Invitation"
                                    {{ old('invitation_name', $invitation->invitation_name ?? '') == 'Engagement Invitation' ? 'selected' : '' }}>
                                    Engagement Invitation</option>
                            </select>
                            @error('invitation_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Bride and Groom Biodata Section --}}
                        <h3 class="text-lg font-semibold mb-4">Biodata Bride and Groom</h3>
                        <hr class="mb-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Bride Full Name --}}
                            <div>
                                <label for="bride_fullname" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-person-fill"></i> Bride Full Name
                                </label>
                                <input type="text" name="bride_fullname" id="bride_fullname"
                                    value="{{ old('bride_fullname', $invitation->bride_fullname ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('bride_fullname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Groom Full Name --}}
                            <div>
                                <label for="groom_fullname" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-person-fill"></i> Groom Full Name
                                </label>
                                <input type="text" name="groom_fullname" id="groom_fullname"
                                    value="{{ old('groom_fullname', $invitation->groom_fullname ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('groom_fullname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Bride Nickname --}}
                            <div>
                                <label for="bride_nickname" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-person-badge"></i> Bride Nickname
                                </label>
                                <input type="text" name="bride_nickname" id="bride_nickname"
                                    value="{{ old('bride_nickname', $invitation->bride_nickname ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('bride_nickname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Groom Nickname --}}
                            <div>
                                <label for="groom_nickname" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-person-badge"></i> Groom Nickname
                                </label>
                                <input type="text" name="groom_nickname" id="groom_nickname"
                                    value="{{ old('groom_nickname', $invitation->groom_nickname ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('groom_nickname')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Bride Instagram --}}
                            <div>
                                <label for="bride_instagram" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-instagram"></i> Bride Instagram
                                </label>
                                <input type="text" name="bride_instagram" id="bride_instagram"
                                    value="{{ old('bride_instagram', $invitation->bride_instagram ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('bride_instagram')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Groom Instagram --}}
                            <div>
                                <label for="groom_instagram" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-instagram"></i> Groom Instagram
                                </label>
                                <input type="text" name="groom_instagram" id="groom_instagram"
                                    value="{{ old('groom_instagram', $invitation->groom_instagram ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('groom_instagram')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Bride Father Name --}}
                            <div>
                                <label for="bride_father_name" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-people-fill"></i> Bride Father Name
                                </label>
                                <input type="text" name="bride_father_name" id="bride_father_name"
                                    value="{{ old('bride_father_name', $invitation->bride_father_name ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('bride_father_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Bride Mother Name --}}
                            <div>
                                <label for="bride_mother_name" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-people-fill"></i> Bride Mother Name
                                </label>
                                <input type="text" name="bride_mother_name" id="bride_mother_name"
                                    value="{{ old('bride_mother_name', $invitation->bride_mother_name ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('bride_mother_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Groom Father Name --}}
                            <div>
                                <label for="groom_father_name" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-people-fill"></i> Groom Father Name
                                </label>
                                <input type="text" name="groom_father_name" id="groom_father_name"
                                    value="{{ old('groom_father_name', $invitation->groom_father_name ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('groom_father_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Groom Mother Name --}}
                            <div>
                                <label for="groom_mother_name" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-people-fill"></i> Groom Mother Name
                                </label>
                                <input type="text" name="groom_mother_name" id="groom_mother_name"
                                    value="{{ old('groom_mother_name', $invitation->groom_mother_name ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('groom_mother_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Bride Child Number --}}
                            <div>
                                <label for="bride_child_number" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-person-plus"></i> Bride Child Number
                                </label>
                                <input type="number" name="bride_child_number" id="bride_child_number"
                                    value="{{ old('bride_child_number', $invitation->bride_child_number ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('bride_child_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Groom Child Number --}}
                            <div>
                                <label for="groom_child_number" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-person-plus"></i> Groom Child Number
                                </label>
                                <input type="number" name="groom_child_number" id="groom_child_number"
                                    value="{{ old('groom_child_number', $invitation->groom_child_number ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('groom_child_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Akad Section --}}
                        <h3 class="text-lg font-semibold mt-8 mb-4">Akad Details</h3>
                        <hr class="mb-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Akad Day --}}
                            <div>
                                <label for="akad_day" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-calendar-day"></i> Akad Day
                                </label>
                                <input type="text" name="akad_day" id="akad_day"
                                    value="{{ old('akad_day', $invitation->akad_day ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('akad_day')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Akad Date --}}
                            <div>
                                <label for="akad_date" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-calendar-date"></i> Akad Date
                                </label>
                                <input type="date" name="akad_date" id="akad_date"
                                    value="{{ old('akad_date', $invitation->akad_date ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('akad_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Akad Clock --}}
                            <div>
                                <label for="akad_clock" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-clock"></i> Akad Clock
                                </label>
                                <input type="text" name="akad_clock" id="akad_clock"
                                    value="{{ old('akad_clock', $invitation->akad_clock ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('akad_clock')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Akad Venue --}}
                            <div>
                                <label for="akad_venue" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-geo-alt-fill"></i> Akad Venue
                                </label>
                                <input type="text" name="akad_venue" id="akad_venue"
                                    value="{{ old('akad_venue', $invitation->akad_venue ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('akad_venue')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Akad Address --}}
                            <div>
                                <label for="akad_address" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-geo-fill"></i> Akad Address
                                </label>
                                <input type="text" name="akad_address" id="akad_address" value="{{ old('akad_address', $invitation->akad_address ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('akad_address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Akad Maps --}}
                            <div>
                                <label for="akad_maps" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-map"></i> Akad Maps
                                </label>
                                <input type="text" name="akad_maps" id="akad_maps"
                                    value="{{ old('akad_maps', $invitation->akad_maps ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('akad_maps')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Resepsi Section --}}
                        <h3 class="text-lg font-semibold mt-8 mb-4">Resepsi Details</h3>
                        <hr class="mb-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Resepsi Day --}}
                            <div>
                                <label for="resepsi_day" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-calendar-day"></i> Resepsi Day
                                </label>
                                <input type="text" name="resepsi_day" id="resepsi_day"
                                    value="{{ old('resepsi_day', $invitation->resepsi_day ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('resepsi_day')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Resepsi Date --}}
                            <div>
                                <label for="resepsi_date" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-calendar-date"></i> Resepsi Date
                                </label>
                                <input type="date" name="resepsi_date" id="resepsi_date"
                                    value="{{ old('resepsi_date', $invitation->resepsi_date ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('resepsi_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Resepsi Clock --}}
                            <div>
                                <label for="resepsi_clock" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-clock"></i> Resepsi Clock
                                </label>
                                <input type="text" name="resepsi_clock" id="resepsi_clock"
                                    value="{{ old('resepsi_clock', $invitation->resepsi_clock ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('resepsi_clock')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Resepsi Venue --}}
                            <div>
                                <label for="resepsi_venue" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-geo-alt-fill"></i> Resepsi Venue
                                </label>
                                <input type="text" name="resepsi_venue" id="resepsi_venue"
                                    value="{{ old('resepsi_venue', $invitation->resepsi_venue ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('resepsi_venue')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Resepsi Address --}}
                            <div>
                                <label for="resepsi_address" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-geo-fill"></i> Resepsi Address
                                </label>
                                <input type="text" name="resepsi_address" id="resepsi_address" value="{{ old('resepsi_address', $invitation->resepsi_address ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('resepsi_address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Resepsi Maps --}}
                            <div>
                                <label for="resepsi_maps" class="block text-sm font-medium text-gray-700">
                                    <i class="bi bi-map"></i> Resepsi Maps
                                </label>
                                <input type="text" name="resepsi_maps" id="resepsi_maps"
                                    value="{{ old('resepsi_maps', $invitation->resepsi_maps ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('resepsi_maps')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        {{-- Maps Iframe --}}
                        <div class="mt-4 mb-4">
                            <label for="maps_iframe" class="block text-sm font-medium text-gray-700">
                                <i class="bi bi-map-fill"></i> Maps Iframe
                            </label>
                            <textarea name="maps_iframe" id="maps_iframe" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('maps_iframe', $invitation->maps_iframe ?? '') }}</textarea>
                            @error('maps_iframe')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- Quotes Section --}}
                        <h3 class="text-lg font-semibold mt-4 mb-4">Quotes Details</h3>
                        <hr class="mb-4">

                        {{-- Quotes Source --}}
                        <div class="py-3">
                            <label for="resepsi_maps" class="block text-sm font-medium text-gray-700">
                                <i class="bi bi-quote"></i> Source
                            </label>
                            <input type="text" name="quotes_source" id="quotes_source"
                                value="{{ old('quotes_source', $invitation->quotes_source ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('quotes_source')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Quotes Content --}}
                        <div>
                            <label for="quotes_content" class="block text-sm font-medium text-gray-700">
                                <i class="bi bi-chat-square-quote"></i> Quotes
                            </label>
                            <textarea name="quotes_content" id="quotes_content" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('quotes_content', $invitation->quotes_content ?? '') }}</textarea>
                            @error('quotes_content')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
