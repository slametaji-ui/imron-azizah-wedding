<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('users.create') }}"
                            class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-700">
                            {{ __('Add User') }}
                        </a>
                    </div>

                    <!-- Add overflow-x-auto to make the table scrollable on small screens -->
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $no => $user)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user) }}" class="btn-view">
                                                {{ __('View') }}
                                            </a>
                                            <a href="{{ route('users.edit', $user) }}" class="btn-edit">
                                                {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-wrapper {
            overflow-x: auto; /* Enables horizontal scrolling */
            -webkit-overflow-scrolling: touch; /* For smooth scrolling on mobile */
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

        .btn-view,
        .btn-edit,
        .btn-delete {
            padding: 6px 12px;
            font-size: 14px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-view {
            background-color: #4caf50; /* Green */
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #ffa500; /* Orange */
            margin-right: 5px;
        }

        .btn-delete {
            background-color: #f44336; /* Red */
        }

        .form-delete {
            display: inline-block;
        }
    </style>
</x-app-layout>
