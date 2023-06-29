@if(!$dropdown)
    <a href="{{ route($route) }}" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-gray-200 font-bold text-[15px]">
        <i class="{{ $icon }} mr-4 dark:text-white w-4"></i>
        {{ $slot }}
    </a>
@else
    <a href="{{ route($route) }}" class="p-2.5 mt-2 flex items-center rounded-md duration-300 cursor-pointer hover:bg-blue-600 text-gray-200 font-bold text-sm">
        <i class="{{ $icon }} mr-4 ml-1 dark:text-white w-4"></i>
        {{ $slot }}
    </a>
@endif