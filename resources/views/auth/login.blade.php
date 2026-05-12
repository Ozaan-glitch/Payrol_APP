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
        }

        .animate-blob {
            animation: blob 10s infinite;
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
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }

        }

    </style>

</head>

<body class="h-full bg-gradient-to-br from-pink-100 via-blue-100 to-purple-200 flex items-center justify-center relative">

    <!-- Animated Background -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>

    <div class="absolute top-0 right-0 w-96 h-96 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>

    <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md px-8">

        <div class="backdrop-blur-xl bg-white/60 border border-white/50 shadow-2xl rounded-3xl p-8">

            <!-- Logo -->
            <div class="flex flex-col items-center mb-8">

                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 flex items-center justify-center text-3xl shadow-lg">
                    ✨
                </div>

                <h1 class="text-4xl font-bold text-gray-800 mt-5">
                    Welcome Back
                </h1>

                <p class="text-gray-600 mt-2 text-sm">
                    Login to your payroll dashboard
                </p>

            </div>

            <!-- Error -->
            @if ($errors->any())

                <div class="mb-5 bg-red-100 border border-red-300 text-red-600 p-4 rounded-2xl">

                    @foreach ($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach

                </div>

            @endif

            <!-- Form -->
            <form action="{{ route('action.login') }}" method="POST" class="space-y-6">

                @csrf

                <!-- Email -->
                <div>

                    <label class="text-sm text-gray-700 mb-2 block font-medium">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                        class="w-full px-5 py-4 rounded-2xl bg-white/70 border border-white/60 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-400 transition duration-300 shadow-sm"
                    >

                </div>

                <!-- Password -->
                <div>

                    <div class="flex items-center justify-between mb-2">

                        <label class="text-sm text-gray-700 font-medium">
                            Password
                        </label>

                        <a href="#"
                           class="text-sm text-pink-500 hover:text-pink-600 transition">
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
                            class="w-full px-5 py-4 rounded-2xl bg-white/70 border border-white/60 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-400 transition duration-300 shadow-sm"
                        >

                        <!-- Show Password -->
                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-5 top-4 text-gray-500 hover:text-purple-500 text-xl"
                        >
                            👁️
                        </button>

                    </div>

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-bold text-lg hover:scale-105 hover:shadow-2xl transition duration-300"
                >
                    Sign In
                </button>

            </form>

            <!-- Footer -->
            <div class="text-center mt-8">

                <p class="text-gray-500 text-sm">
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