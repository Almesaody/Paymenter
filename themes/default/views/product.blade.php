<x-app-layout>
    <x-slot name="title">
        {{ __('Products') }}
    </x-slot>
    <div class="dark:bg-darkmode dark:text-darkmodetext py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="dark:bg-darkmode2 overflow-hidden bg-white rounded-lg">
                <div class="dark:bg-darkmode2 p-6 bg-white">
                    <!-- display all categories with products -->
                    <h1 class="text-center text-2xl font-bold">{{ __('Categories') }}</h1>
                    @if ($categories->count() < 1)
                        <div class="dark:bg-darkmode px-4 py-5 sm:px-6">
                            <h3 class="dark:text-darkmodetext text-lg leading-6 font-medium text-gray-900">
                                {{ __('Categories') }}
                            </h3>
                            <p class="dark:text-darkmodetext mt-1 max-w-2xl text-sm text-gray-500">
                                {{ __('Category not found!') }}
                            </p>
                        </div>
                    @endif
                    @foreach ($categories as $category)
                        <div class="mt-4">
                            <h2 class="text-center text-xl font-bold">{{ $category->name }}</h2>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                                @foreach ($category->products as $product)
                                    <div class="p-4 transition rounded-lg delay-400 hover:shadow-lg dark:bg-darkmode">
                                        <a href="{{ route('checkout.add') }}?id={{ $product->id }}">
                                            <img class="rounded-lg" src="{{ $product->image }}"
                                                alt="{{ $product->name }}"
                                                class="object-cover object-center w-full h-64"
                                                onerror="removeElement(this);" >
                                            <script>
                                                function removeElement(element) {
                                                    element.remove();
                                                    this.error = true;
                                                }
                                            </script>
                                            <div class="mt-2">
                                                <h3
                                                    class="text-center dark:text-darkmodetext text-lg font-medium text-gray-900">
                                                    {{ $product->name }}</h3>
                                                <p
                                                    class="text-center dark:text-darkmodetext mt-1 text-sm text-gray-500">
                                                    {{ $product->description }}</p>
                                                <p
                                                    class="text-center dark:text-darkmodetext mt-1 text-sm text-gray-500">
                                                    @if ($product->price == 0)
                                                        {{ __('Free') }}
                                                    @else
                                                        {{ config('settings::currency_sign') }}{{ $product->price }}
                                                    @endif
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>