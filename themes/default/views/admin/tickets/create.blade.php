<x-admin-layout>
    <x-slot name="title">
        {{ __('Create Ticket') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-success class="mb-4" />
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">{{ __('Ticket') }}</div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                {{ __('Create a new ticket.') }}
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.tickets.store') }}">
                            @csrf
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="title">
                                    {{ __('Title') }}
                                </label>
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="title"
                                    type="text" name="title" value="{{ old('title') }}" required autofocus />
                            </div>
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="description">
                                    {{ __('normal.description') }}
                                </label>
                                <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>
                            <!-- user -->
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="user">
                                    {{ __('normal.user') }}
                                </label>
                                <select id="user" name="user"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if ($user->id == old('user')) selected @endif>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- priority high/medium/low -->
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="priority">
                                    {{ __('tickets.priority') }}
                                </label>
                                <select id="priority" name="priority"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full">
                                    <option value="low" @if (old('priority') == 1) selected @endif>
                                        {{ __('tickets.priority_low') }}</option>
                                    <option value="medium" @if (old('priority') == 2) selected @endif>
                                        {{ __('tickets.priority_medium') }}</option>
                                    <option value="high" @if (old('priority') == 3) selected @endif>
                                        {{ __('tickets.priority_high') }}</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('normal.create') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>