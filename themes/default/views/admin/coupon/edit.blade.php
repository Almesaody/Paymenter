<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Coupon') }}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden dark:bg-darkmode2 bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-darkmode2 bg-white border-b border-gray-200 dark:border-gray-800">
                    <h1 class="text-2xl font-bold dark:text-darkmodetext">{{ __('Edit Coupon') }}</h1>
                    <x-success class="mb-4" />
                    <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="mt-4">
                                <label for="code" class="block dark:text-darkmodetext">
                                    {{ __('Code') }}
                                </label>
                                <input type="text" name="code" id="code" value="{{ $coupon->code }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    required />
                            </div>
                            <div class="mt-4">
                                <label for="type" class="block dark:text-darkmodetext">
                                    {{ __('Type') }}
                                </label>
                                <select name="type" id="type"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    required>
                                    <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>
                                        {{ __('Fixed') }}
                                    </option>
                                    <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>
                                        {{ __('Percent') }}
                                    </option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <label for="value" class="block dark:text-darkmodetext">
                                    {{ __('Value') }}
                                </label>
                                <input type="number" name="value" id="value" value="{{ $coupon->value }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    required />
                            </div>
                            <div class="mt-4">
                                <label for="status" class="block dark:text-darkmodetext">
                                    {{ __('Status') }}
                                </label>
                                <select name="status" id="status"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"
                                    required>
                                    <option value="active" {{ $coupon->status == 'active' ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="inactive" {{ $coupon->status == 'inactive' ? 'selected' : '' }}>
                                        {{ __('Inactive') }}
                                    </option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <label for="start_date" class="block dark:text-darkmodetext">
                                    {{ __('Start Date') }}
                                </label>
                                <input type="date" name="start_date" id="start_date"
                                    value="{{ $coupon->start_date }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md" />
                            </div>
                            <div class="mt-4">
                                <label for="end_date" class="block dark:text-darkmodetext">
                                    {{ __('End Date') }}
                                </label>
                                <input type="date" name="end_date" id="end_date" value="{{ $coupon->end_date }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md"/>
                            </div>
                            <div class="mt-4">
                                <label for="products" class="block dark:text-darkmodetext">
                                    {{ __('Assigned Products') }}
                                    
                                </label>
                                <select name="products[]" id="products" multiple
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ in_array($product->id, $coupon->products) ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>