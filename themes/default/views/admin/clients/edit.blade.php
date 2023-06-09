<x-admin-layout>
    <x-slot name="title">
        {{ __('Clients') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="dark:bg-darkmode2 p-6 sm:px-20 bg-white">
                    <x-success class="mb-4" />
                    <div class="dark:text-darkmodetext mt-8 text-2xl">
                        {{ __('Edit client') }}
                    </div>
                    <div class="dark:text-darkmodetext mt-6 text-gray-500">
                        {{ __('Here you can edit a client.') }}
                    </div>
                    <!-- login as client -->
                    <div class="flex justify-end mt-4 mr-4">
                        <a href="{{ route('admin.clients.loginasclient', $user->id) }}"
                            class="transition delay-400 dark:text-darkmodetext dark:bg-darkbutton dark:hover:bg-logo bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Login as client') }}
                        </a>
                    </div>
                    <div class="flex justify-end mt-4 mr-4">
                        <form action="{{ route('admin.clients.delete', $user->id) }}" method="POST" id="delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Delete client') }}
                            </button>
                        </form>
                    </div>
                    <script>
                        document.getElementById('delete').addEventListener('submit', function(e) {
                            var form = this;
                            e.preventDefault();
                            Swal.fire({
                                title: "Are you sure?",
                                text: "Once deleted, you will not be able to recover this client!",
                                icon: "warning",
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'No, cancel!',
                                showCloseButton: true,
                                showCancelButton: true,
                            }).then((willDelete) => {
                                if (willDelete.isConfirmed) {
                                    form.submit();
                                } else {
                                    swal.fire("Your client is safe!");
                                }
                            });
                        });
                    </script>

                </div>
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
                    <div class="dark:bg-darkmode2 p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold w-full">
                                <form method="POST" action="{{ route('admin.clients.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                        <div>
                                            <label for="name"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Name') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    id="name" placeholder="John Doe" autocomplete="name" required
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="email"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Email') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="email" id="email"
                                                    value="{{ $user->email }}" placeholder="jdoe@example.com"
                                                    autocomplete="email" required
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="phone"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Phone') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="phone" value="{{ $user->phone }}"
                                                    placeholder="+1-234-567-89" id="phone" autocomplete="phone"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="companynames"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Company Names') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" placeholder="Optional"
                                                    value="{{ $user->companynames }}" name="companynames"
                                                    id="companynames" autocomplete="companynames"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-6 border-b-1 border-gray-300 dark:border-gray-600" />

                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label for="address"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Address') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="address" value="{{ $user->address }}"
                                                    id="address" placeholder="Bobcat Lane" autocomplete="address"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="city"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('City') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="city" value="{{ $user->city }}"
                                                    id="city" placeholder="St. Robert" autocomplete="city"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="state"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('State') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="state" value="{{ $user->state }}"
                                                    id="state" placeholder="Missouri" autocomplete="state"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                        <div>
                                            <label for="zip"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Zip') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="zip" value="{{ $user->zip }}"
                                                    id="zip" placeholder="1234 NW" autocomplete="zip"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="country"
                                                class="dark:text-darkmodetext block text-sm font-medium text-gray-700">
                                                {{ __('Country') }}
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="country" value="{{ $user->country }}"
                                                    id="country" placeholder="United States" autocomplete="country"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm dark:bg-darkmode rounded-md">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-6 border-b-1 border-gray-300 dark:border-gray-600" />

                                    <!-- Admin toggle -->
                                    <div class="mb-3">
                                        <input type="checkbox" class="form-input w-fit peer " placeholder=" "
                                            name="admin" id="admin" {{ $user->is_admin ? 'checked' : '' }} onclick="toggleAdmin()">

                                        <label for="admin" class="form-label" style="position: unset;">
                                            {{ __('Admin') }}
                                        </label>
                                        <h3 class="text-lg text-gray-500 dark:text-darkmodetext">
                                            {{ __('Give this user admin permissions') }}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-darkmodetext">
                                            {{ __('Admins have access to all areas of the application or can be restricted to specific areas.') }}
                                            <br>
                                            {{ __('If you leave the permissions blank, the user will have access to all areas.') }}
                                        </p>
                                    </div>
                                    <p class="text-lg text-gray-500 dark:text-darkmodetext bg-logo col-span-3 rounded-sm p-1 items-center"
                                        onclick="openPermissions()" id="openPerms">
                                        {{ __('Permissions') }}
                                        <svg class="w-7 h-7 float-right" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                            id="permissionsToggleSVG" viewBox="0 0 24 24">
                                            <path d="M19 9l-7 7-7-7">
                                            </path>
                                        </svg>
                                    </p>
                                    <script>
                                        function toggleAdmin(){
                                            if(document.getElementById("admin").checked){
                                                document.getElementById("openPerms").style.display = "block";
                                            } else {
                                                document.getElementById("openPerms").style.display = "none";
                                                console.log(document.querySelectorAll(".permissions"));
                                                document.querySelectorAll(".permissions").forEach(function(element){
                                                    element.checked = false;
                                                });
                                                openPermissions();
                                            }
                                        }
                                        function openPermissions() {
                                            var x = document.getElementById("permissionsToggle");
                                            if (x.style.display === "none") {
                                                x.style.display = "grid";
                                                // Rotate the arrow
                                                document.getElementById("permissionsToggleSVG").style.transform = "rotate(180deg)";
                                            } else {
                                                x.style.display = "none";
                                                document.getElementById("permissionsToggleSVG").style.transform = "rotate(0deg)";
                                            }
                                        }
                                    </script>
                                    <div class="grid grid-cols-3 gap-4" id="permissionsToggle" style="display: none;">
                                        @php
                                            $idk = '';
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            @if ($idk != explode('.', $permission)[1])
                                                @php $idk = explode('.', $permission)[1]; @endphp
                                                <h3
                                                    class="col-span-3 text-lg font-medium text-gray-900 dark:text-darkmodetext">
                                                    {{ ucfirst(explode('.', str_replace('.', ' ', str_replace('admin.', '', $idk)))[0]) }}
                                                </h3>
                                            @endif
                                            <div class="relative">
                                                <input type="checkbox" class="form-input w-fit peer permissions" placeholder=" "
                                                    name="permissions[]" id="{{ $permission }}"
                                                    value="{{ $permission }}"
                                                    {{ $user->has($permission) ? 'checked' : '' }}>
                                                <label for="{{ $permission }}" class="form-label" style="position: unset;">
                                                    {{ str_replace('.', ' ', str_replace('admin.', '', $permission)) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr class="my-6 border-b-1 border-gray-300 dark:border-gray-600" />
                                    <div class="flex items-end justify-end mt-4">
                                        <button type="submit"
                                            class="dark:text-darkmodetext inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>