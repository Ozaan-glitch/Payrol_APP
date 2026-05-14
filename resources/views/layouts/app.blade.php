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

<body class="bg-[#0f172a] min-h-screen overflow-hidden text-white">

<!-- Background -->
<div class="fixed inset-0 overflow-hidden -z-10">

    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-fuchsia-500/30 blur-3xl rounded-full"></div>

    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-cyan-500/30 blur-3xl rounded-full"></div>

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-violet-500/20 blur-3xl rounded-full"></div>

</div>

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-72 bg-white/10 backdrop-blur-2xl border-r border-white/10 shadow-2xl text-white transform -translate-x-full md:translate-x-0 transition duration-300 z-50">

        <!-- Logo -->
        <div class="p-7 border-b border-white/10">

            <h1 class="text-3xl font-black tracking-wide bg-gradient-to-r from-fuchsia-400 via-violet-400 to-cyan-400 bg-clip-text text-transparent">
                ✨ Payroll
            </h1>

            <p class="text-sm text-gray-300 mt-2">
                Modern Management Dashboard
            </p>

        </div>

        <!-- Menu -->
        <nav class="mt-6 space-y-3 px-4">

            <a href="/admin"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-white/5 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-cyan-500 transition duration-300 shadow-lg hover:scale-[1.02]">

                🏠 Dashboard

            </a>

            <a href="/user"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-white/5 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-cyan-500 transition duration-300 shadow-lg hover:scale-[1.02]">

                👤 Users

            </a>

            <a href="/position"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-white/5 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-cyan-500 transition duration-300 shadow-lg hover:scale-[1.02]">

                📌 Position

            </a>

            <a href="/employee"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-white/5 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-cyan-500 transition duration-300 shadow-lg hover:scale-[1.02]">

                👨‍💼 Employee

            </a>

            <a href="/payroll"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-white/5 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-cyan-500 transition duration-300 shadow-lg hover:scale-[1.02]">

                💰 Payroll

            </a>

            <a href="/admin/attendance"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-white/5 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-cyan-500 transition duration-300 shadow-lg hover:scale-[1.02]">

                📅 Attendance

            </a>

            <a href="/logout"
               class="flex items-center gap-3 py-3.5 px-5 rounded-2xl bg-red-500/10 hover:bg-red-500 transition duration-300 text-red-300 hover:text-white shadow-lg hover:scale-[1.02]">

                🚪 Logout

            </a>

        </nav>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col md:ml-72">

        <!-- Navbar -->
        <header class="bg-white/10 backdrop-blur-2xl border-b border-white/10 shadow-xl px-6 py-5 flex items-center justify-between">

            <!-- Left -->
            <div class="flex items-center gap-4">

                <button onclick="toggleSidebar()"
                        class="md:hidden text-white text-2xl">

                    ☰

                </button>

                <div>

                    <h1 class="text-3xl font-bold text-white">
                        Dashboard
                    </h1>

                    <p class="text-sm text-gray-300 mt-1">
                        Welcome back 👋
                    </p>

                </div>

            </div>

            <!-- Right -->
            <div class="flex items-center gap-4 bg-white/10 border border-white/10 px-4 py-2 rounded-2xl shadow-2xl backdrop-blur-xl">

                <div class="text-right">

                    <h1 class="font-semibold text-white">
                        {{ Auth::user()->name }}
                    </h1>

                    <p class="text-xs text-gray-300">
                        {{ Auth::user()->email }}
                    </p>

                </div>

                <img
                    src="https://i.pravatar.cc/150?img=12"
                    class="w-12 h-12 rounded-full border-2 border-cyan-400 shadow-lg"
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

        background: '#111827',
        color: '#ffffff',

        confirmButtonColor: '#8b5cf6',

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

        background: '#111827',
        color: '#ffffff',

        confirmButtonColor: '#ef4444'

    })

</script>

@endif

</body>

</html>