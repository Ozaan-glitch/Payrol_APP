<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        body{
            overflow:hidden;
            font-family: 'Inter', sans-serif;
        }

        .animate-blob {
            animation: blob 14s infinite ease-in-out;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        @keyframes blob {

            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(40px, -60px) scale(1.15);
            }

            66% {
                transform: translate(-30px, 30px) scale(0.92);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }

        }

    </style>

</head>

<body class="h-full bg-[#060816] flex items-center justify-center relative">

    <!-- Background Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#7c3aed22,transparent_35%),radial-gradient(circle_at_bottom_right,#06b6d422,transparent_35%)]"></div>

    <!-- Animated Background -->
    <div class="absolute top-[-120px] left-[-120px] w-[420px] h-[420px] bg-fuchsia-500 rounded-full mix-blend-screen blur-3xl opacity-30 animate-blob"></div>

    <div class="absolute top-[-100px] right-[-100px] w-[420px] h-[420px] bg-cyan-400 rounded-full mix-blend-screen blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

    <div class="absolute bottom-[-120px] left-1/3 w-[420px] h-[420px] bg-violet-500 rounded-full mix-blend-screen blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md px-6">

        <div class="relative overflow-hidden rounded-[32px] border border-white/10 bg-white/10 backdrop-blur-2xl shadow-[0_20px_80px_rgba(0,0,0,0.45)] p-8">

            <!-- Glass Highlight -->
            <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent pointer-events-none"></div>

            <!-- Logo -->
            <div class="flex flex-col items-center mb-8 relative z-10">

                <div class="w-24 h-24 rounded-[28px] bg-gradient-to-br from-fuchsia-500 via-violet-500 to-cyan-400 flex items-center justify-center text-4xl shadow-[0_10px_40px_rgba(168,85,247,0.55)] border border-white/20">
                    ✨
                </div>

                <h1 class="text-4xl font-extrabold text-white mt-6 tracking-tight">
                    Welcome Back
                </h1>

                <p class="text-gray-300 mt-2 text-sm tracking-wide">
                    Login to your payroll dashboard
                </p>

            </div>

            <!-- Error -->
            @if ($errors->any())

                <div class="mb-5 bg-red-500/10 border border-red-400/20 text-red-200 p-4 rounded-2xl backdrop-blur-lg">

                    @foreach ($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach

                </div>

            @endif

            <!-- Form -->
            <form action="{{ route('action.login') }}" method="POST" class="space-y-6 relative z-10">

                @csrf

                <!-- Email -->
                <div>

                    <label class="text-sm text-gray-200 mb-2 block font-medium tracking-wide">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                        class="w-full px-5 py-4 rounded-2xl bg-white/10 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-fuchsia-500/70 focus:border-fuchsia-400 transition-all duration-300 shadow-lg"
                    >

                </div>

                <!-- Password -->
                <div>

                    <div class="flex items-center justify-between mb-2">

                        <label class="text-sm text-gray-200 font-medium tracking-wide">
                            Password
                        </label>

                        <a href="#"
                           class="text-sm text-cyan-300 hover:text-cyan-200 transition">
                            Forgot?
                        </a>

                    </div>

                    <div class="relative">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Enter your password"
                            required
                            class="w-full px-5 py-4 rounded-2xl bg-white/10 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-violet-500/70 focus:border-violet-400 transition-all duration-300 shadow-lg"
                        >

                        <!-- Show Password -->
                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-5 top-4 text-gray-400 hover:text-cyan-300 text-xl transition"
                        >
                            👁️
                        </button>

                    </div>

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-fuchsia-500 via-violet-500 to-cyan-400 text-white font-bold text-lg shadow-[0_10px_30px_rgba(139,92,246,0.45)] hover:scale-[1.03] hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)] transition-all duration-300"
                >
                    Sign In
                </button>

            </form>

            <!-- Footer -->
            <div class="text-center mt-8 relative z-10">

                <p class="text-gray-400 text-sm tracking-wide">
                    Payroll Management System © 2026
                </p>

            </div>

        </div>

    </div>

    <!-- Script -->
    <script>

        function togglePassword() {

            const password = document.getElementById('password');

            if(password.type === 'password') {

                password.type = 'text';

            } else {

                password.type = 'password';

            }

        }

    </script>

</body>

</html>