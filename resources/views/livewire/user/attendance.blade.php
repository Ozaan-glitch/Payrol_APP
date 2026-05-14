<div>

    @livewireStyles

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Animate CSS -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <div class="min-h-screen bg-[#060816] relative overflow-hidden">

        <!-- Background Glow -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#7c3aed22,transparent_30%),radial-gradient(circle_at_bottom_right,#06b6d422,transparent_30%)]"></div>

        <!-- Navbar -->
        <nav class="relative z-10 bg-white/10 backdrop-blur-2xl border-b border-white/10 shadow-2xl">

            <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

                <div>

                    <h1 class="text-3xl font-extrabold text-white tracking-tight">
                        Payroll Attendance
                    </h1>

                    <p class="text-gray-400 text-sm mt-1 tracking-wide">
                        Modern Attendance Dashboard
                    </p>

                </div>

                <div class="flex items-center gap-5">

                    <div class="text-right">

                        <p class="text-sm text-gray-400">
                            Welcome Back 👋
                        </p>

                        <h2 class="text-white font-bold text-lg">
                            {{ Auth::user()->name }}
                        </h2>

                    </div>

                    <!-- Profile -->
                    <img
                        src="https://i.pravatar.cc/150?img=12"
                        class="w-14 h-14 rounded-2xl border border-white/20 shadow-[0_10px_30px_rgba(6,182,212,0.35)]"
                    >

                    <!-- Logout -->
                    <a
                        href="{{ route('logout') }}"
                        class="bg-red-500/15 border border-red-400/20 hover:bg-red-500 text-red-300 hover:text-white px-5 py-3 rounded-2xl shadow-lg font-semibold transition-all duration-300"
                    >
                        Logout
                    </a>

                </div>

            </div>

        </nav>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto p-6">

            <!-- Form Card -->
            <div class="bg-white/10 backdrop-blur-2xl border border-white/10 rounded-[32px] shadow-[0_20px_80px_rgba(0,0,0,0.45)] p-8 mb-8">

                <div class="mb-8">

                    <div class="w-20 h-20 rounded-[28px] bg-gradient-to-br from-fuchsia-500 via-violet-500 to-cyan-400 flex items-center justify-center text-3xl shadow-[0_10px_40px_rgba(168,85,247,0.55)] border border-white/20 mb-5">
                        📅
                    </div>

                    <h2 class="text-4xl font-extrabold text-white tracking-tight">
                        Attendance Form
                    </h2>

                    <p class="text-gray-400 mt-3">
                        Silahkan pilih status kehadiran hari ini.
                    </p>

                </div>

                <div class="flex flex-col md:flex-row gap-4">

                    <select
                        wire:model="status"
                        class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
                    >

                        <option value="" class="bg-[#111827]">
                            --- Pilih Status ---
                        </option>

                        <option value="present" class="bg-[#111827]">
                            ✅ Hadir
                        </option>

                        <option value="absent" class="bg-[#111827]">
                            ❌ Tidak Hadir
                        </option>

                        <option value="permit" class="bg-[#111827]">
                            📄 Izin
                        </option>

                        <option value="sick" class="bg-[#111827]">
                            🤒 Sakit
                        </option>

                    </select>

                    <button
                        wire:click="save"
                        class="bg-gradient-to-r from-cyan-400 via-violet-500 to-fuchsia-500 text-white font-bold px-8 py-4 rounded-2xl shadow-[0_10px_30px_rgba(139,92,246,0.45)] hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)] transition-all duration-300"
                    >
                        🚀 Simpan
                    </button>

                </div>

            </div>

            <!-- Table -->
            <div class="bg-white/10 backdrop-blur-2xl border border-white/10 rounded-[32px] shadow-[0_20px_80px_rgba(0,0,0,0.45)] overflow-hidden">

                <div class="p-8 border-b border-white/10 bg-white/5">

                    <h2 class="text-3xl font-bold text-white">
                        Attendance Data
                    </h2>

                    <p class="text-gray-400 mt-2">
                        Daftar kehadiran seluruh user
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left">

                        <!-- Head -->
                        <thead class="bg-white/10 text-gray-300 uppercase tracking-widest text-xs">

                            <tr>

                                <th class="p-5">#</th>
                                <th class="p-5">Nama</th>
                                <th class="p-5">Tanggal</th>
                                <th class="p-5">Status</th>
                                <th class="p-5 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <!-- Body -->
                        <tbody class="divide-y divide-white/10">

                            @forelse($attendances as $item)

                                <tr class="hover:bg-white/5 transition duration-300">

                                    <!-- No -->
                                    <td class="p-5 text-gray-300">
                                        {{ $loop->iteration }}
                                    </td>

                                    <!-- User -->
                                    <td class="p-5">

                                        <div class="flex items-center gap-4">

                                            <img
                                                src="https://i.pravatar.cc/150?img={{ $loop->iteration + 10 }}"
                                                class="w-12 h-12 rounded-2xl border border-cyan-400/20 shadow-lg"
                                            >

                                            <div>

                                                <h1 class="font-semibold text-white text-base">
                                                    {{ $item->user->name ?? 'User' }}
                                                </h1>

                                                <p class="text-xs text-gray-400">
                                                    Employee
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- Date -->
                                    <td class="p-5 text-gray-300 font-medium">
                                        {{ $item->date }}
                                    </td>

                                    <!-- Status -->
                                    <td class="p-5">

                                        @if($item->status == 'present')

                                            <span class="bg-green-500/15 border border-green-400/20 text-green-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                                ✅ Hadir
                                            </span>

                                        @elseif($item->status == 'absent')

                                            <span class="bg-red-500/15 border border-red-400/20 text-red-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                                ❌ Tidak Hadir
                                            </span>

                                        @elseif($item->status == 'permit')

                                            <span class="bg-yellow-500/15 border border-yellow-400/20 text-yellow-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                                📄 Izin
                                            </span>

                                        @else

                                            <span class="bg-cyan-500/15 border border-cyan-400/20 text-cyan-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                                🤒 Sakit
                                            </span>

                                        @endif

                                    </td>

                                    <!-- Delete -->
                                    <td class="p-5 text-center">

                                        <button
                                            wire:click="delete({{ $item->id }})"
                                            onclick="confirm('Yakin mau hapus data ini?') || event.stopImmediatePropagation()"
                                            class="bg-red-500/15 border border-red-400/20 hover:bg-red-500 text-red-300 hover:text-white px-5 py-2 rounded-2xl shadow-lg transition-all duration-300"
                                        >
                                            Hapus
                                        </button>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center p-14 text-gray-400">

                                        Belum ada data absensi.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    @livewireScripts

    <!-- Welcome SweetAlert -->
    <script>

        window.onload = function(){

            Swal.fire({

                title: 'Halo 👋 {{ Auth::user()->name }}',
                text: 'Selamat datang kembali di sistem absensi',
                icon: 'success',

                background: '#111827',

                color: '#ffffff',

                confirmButtonColor: '#8b5cf6',

                timer: 3000,

                showConfirmButton: false,

                showClass: {
                    popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                    `
                },

                hideClass: {
                    popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                    `
                }

            });

        }

    </script>

    <!-- Livewire SweetAlert -->
    <script>

        document.addEventListener('livewire:init', () => {

            Livewire.on('swal', (data) => {

                Swal.fire({

                    icon: data[0].icon ?? 'success',

                    title: data[0].title ?? 'Berhasil!',

                    text: data[0].text ?? '',

                    background: '#111827',

                    color: '#ffffff',

                    showConfirmButton: false,

                    timer: 2000

                });

            });

        });

    </script>

</div>