<x-admin-layout>
    <x-slot name="title">
        {{ __('Create Coupon') }}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden dark:bg-darkmode2 bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-darkmode2 bg-white text-gray-600 dark:text-darkmodetext">
                    <x-success class="mb-4" />
                    <h1 class="text-2xl font-bold dark:text-darkmodetext">{{ __('Create Coupon') }}</h1>
                    <form action="{{ route('admin.coupon.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="code">
                                    {{ __('Code') }}
                                </label>
                                <input
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    type="text" name="code" id="code" required placeholder="Coupon Code" value="{{ old('code') }}">
                            </div>
                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="type">
                                    {{ __('Type') }}
                                </label>
                                <select
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    name="type" id="type">
                                    <option value="percent">{{ __('Percent') }}</option>
                                    <option value="fixed">{{ __('Fixed') }}</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="value">
                                    {{ __('Value') }}
                                </label>
                                <input
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    type="number" name="value" id="value" required step="0.1" min="0" value="{{ old('value') }}">
                            </div>
                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="status">
                                    {{ __('Status') }}
                                </label>
                                <select
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    name="status" id="status">
                                    <option value="active" selected>{{ __('Active') }}</option>
                                    <option value="inactive">{{ __('Inactive') }}</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="uses">
                                    {{ __('Max Uses (not required)') }}
                                </label>
                                <input
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    type="number" name="uses" id="uses" step="1" min="0" value="{{ old('uses') }}">
                            </div>
                            <div class="w-full">
                                <!-- Assigned products -->
                                <label class="block dark:text-darkmodetext" for="products">
                                    {{ __('Assigned Products (not required)') }}
                                </label>
                                <select
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    name="products[]" id="products" multiple>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="start_date">
                                    {{ __('Start Date (not required)') }}
                                </label>
                                <input
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">
                            </div>

                            <div class="w-full">
                                <label class="block dark:text-darkmodetext" for="end_date">
                                    {{ __('End Date (not required)') }}
                                </label>
                                <input
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
                            </div>
                        </div>
                        <button type="submit" class="form-submit float-right m-4">
                            {{ __('Create') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>