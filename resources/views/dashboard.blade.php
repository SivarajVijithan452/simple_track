<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Add FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <nav>
        <div class="navbar bg-base-100 shadow-md">
            <div class="navbar-start">
                <a href="{{ route('dashboard') }}" class="btn btn-ghost normal-case text-xl font-bold text-gray-900">
                    Simple Task Tracker
                </a>
            </div>
            <div class="navbar-end flex items-center space-x-4">
                @auth
                    <!-- Display the username and logout button on the same line -->
                    <div class="flex items-center space-x-4">
                        <!-- Username with consistent padding and font size -->
                        <span class="text-sm font-medium text-gray-700 py-2 px-4 border border-gray-300 rounded-md">
                            {{ Auth::user()->name }}
                        </span>
                        <!-- Logout button with consistent sizing -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="btn btn-error btn-sm flex items-center space-x-1 py-2 px-4 rounded-md">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Login and Register buttons with consistent sizing -->
                    <a href="{{ route('login') }}"
                        class="btn btn-ghost text-gray-700 hover:text-gray-900 py-2 px-4 rounded-md">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4 rounded-md">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg border border-gray-200">
                <div class="p-6">
                    <!-- Add Customer Button -->
                    <div class="mb-4">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">
                            Add Customer
                        </a>
                    </div>
                    <!-- Table Container -->
                    <div class="overflow-x-auto">
                        <table class="table w-full border-collapse">
                            <!-- Table Header -->
                            <thead class="bg-gray-200 border-b border-gray-300">
                                <tr>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">ID</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Name</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Email</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Phone</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Address</th>
                                    <th class="px-4 py-2 text-left text-gray-600 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr class="border-b border-gray-300 hover:bg-gray-50"
                                        data-customer-id="{{ $customer->id }}">
                                        <td class="px-4 py-2">{{ $customer->id }}</td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('customers.update', $customer) }}"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{ $customer->id }}">
                                                <input type="text" class="input input-bordered w-full" name="name"
                                                    value="{{ $customer->name }}">
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" class="input input-bordered w-full" name="email"
                                                value="{{ $customer->email }}">
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" class="input input-bordered w-full" name="phone"
                                                value="{{ $customer->phone }}">
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" class="input input-bordered w-full" name="address"
                                                value="{{ $customer->address }}">
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-2">
                                                <!-- Save Button Form -->
                                                <form method="POST" action="{{ route('customers.update', $customer) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="id" value="{{ $customer->id }}">
                                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                                </form>
                                                <!-- Delete Button Form -->
                                                <form method="POST" action="{{ route('customers.destroy', $customer) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                                </form>
                                            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Flasher JS -->
    <script src="{{ asset('vendor/flasher/flasher.js') }}"></script>

    <!-- Custom JavaScript for displaying messages -->
    <script>
        // Customize Toastr options
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000", // Time in milliseconds
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Display flash messages
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @elseif (session('error'))
            toastr.error("{{ session('error') }}");
        @elseif (session('info'))
            toastr.info("{{ session('info') }}");
        @elseif (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

</body>

</html>