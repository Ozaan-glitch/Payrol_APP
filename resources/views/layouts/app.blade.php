<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        function toggleSidebar() {

            document
            .getElementById('sidebar')
            .classList
            .toggle('-translate-x-full');

        }

    </script>

</head>

<body class="bg-gradient-to-br from-pink-100 via-blue-100 to-purple-200 min-h-screen overflow-hidden">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-72 bg-white/70 backdrop-blur-xl border-r border-white/40 shadow-2xl text-gray-700 transform -translate-x-full md:translate-x-0 transition duration-300 z-50">

        <!-- Logo -->
        <div class="p-6 border-b border-gray-200">

            <h1 class="text-3xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent">
                ✨ Payroll
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Management Dashboard
            </p>

        </div>

        <!-- Menu -->
        <nav class="mt-6 space-y-2 px-4">

            <a href="/admin"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transition duration-300">

                🏠 Dashboard

            </a>

            <a href="/user"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transition duration-300">

                👤 Users

            </a>

            <a href="/position"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transition duration-300">

                📌 Position

            </a>

            <a href="/employee"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transition duration-300">

                👨‍💼 Employee

            </a>

            <a href="/payroll"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transition duration-300">

                💰 Payroll

            </a>

            <a href="/admin/attendance"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transition duration-300">

                📅 Attendance

            </a>

            <a href="/logout"
               class="flex items-center gap-3 py-3 px-4 rounded-2xl hover:bg-red-500 hover:text-white text-red-500 transition duration-300">

                🚪 Logout

            </a>

        </nav>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col md:ml-72">

        <!-- Navbar -->
        <header class="bg-white/60 backdrop-blur-xl border-b border-white/40 shadow-sm p-5 flex items-center justify-between">

            <!-- Left -->
            <div class="flex items-center gap-4">

                <button onclick="toggleSidebar()"
                        class="md:hidden text-gray-700 text-2xl">

                    ☰

                </button>

                <div>

                    <h1 class="text-2xl font-bold text-gray-800">
                        Dashboard
                    </h1>

                    <p class="text-sm text-gray-500">
                        Welcome back 👋
                    </p>

                </div>

            </div>

            <!-- Right -->
            <div class="flex items-center gap-4 bg-white/70 px-4 py-2 rounded-2xl shadow">

                <div class="text-right">

                    <h1 class="font-semibold text-gray-700">
                        {{ Auth::user()->name }}
                    </h1>

                    <p class="text-xs text-gray-500">
                        {{ Auth::user()->email }}
                    </p>

                </div>

                <img
                    src="https://i.pravatar.cc/150?img=12"
                    class="w-12 h-12 rounded-full border-2 border-pink-300 shadow-md"
                >

            </div>

        </header>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">

            @yield('content')

        </main>

    </div>

</div>

<!-- Sweet Alert Success -->
@if(session('success'))

<script>

    Swal.fire({

        icon: 'success',
        title: 'Success 🎉',
        text: '{{ session('success') }}',
        confirmButtonColor: '#a855f7',
        timer: 3000,
        showConfirmButton: false

    })

</script>

@endif


<!-- Sweet Alert Error -->
@if(session('error'))

<script>

    Swal.fire({

        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
        confirmButtonColor: '#ef4444'

    })

</script>

@endif

</body>

</html>