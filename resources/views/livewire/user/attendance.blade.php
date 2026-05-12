<div>

    @livewireStyles

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Animate CSS -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800">

        <!-- Navbar -->
        <nav class="bg-white/10 backdrop-blur-lg border-b border-white/20 shadow-lg">

            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

                <div>

                    <h1 class="text-2xl font-bold text-white tracking-wide">
                        Payroll Attendance
                    </h1>

                    <p class="text-gray-300 text-sm">
                        Sistem Absensi Modern
                    </p>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-right">

                        <p class="text-sm text-gray-300">
                            Halo 👋
                        </p>

                        <h2 class="text-white font-bold text-lg">
                            {{ Auth::user()->name }}
                        </h2>

                    </div>

                    <!-- Profile -->
                    <img
                        src="https://i.pravatar.cc/150?img=12"
                        class="w-12 h-12 rounded-full border-2 border-blue-300 shadow-lg"
                    >

                    <!-- Logout -->
                    <a
                        href="{{ route('logout') }}"
                        class="bg-red-500 hover:bg-red-600 transition duration-300 text-white px-5 py-2 rounded-xl shadow-lg font-semibold"
                    >
                        Logout
                    </a>

                </div>

            </div>

        </nav>

        <!-- Content -->
        <div class="max-w-7xl mx-auto p-6">

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 mb-8">

                <div class="mb-6">

                    <h2 class="text-3xl font-bold text-gray-800">
                        Form Absensi
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Silahkan pilih status kehadiran hari ini.
                    </p>

                </div>

                <div class="flex flex-col md:flex-row gap-4">

                    <select
                        wire:model="status"
                        class="w-full border-2 border-gray-200 rounded-2xl px-5 py-4 text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium"
                    >

                        <option value="">
                            --- Pilih Status ---
                        </option>

                        <option value="present">
                            ✅ Hadir
                        </option>

                        <option value="absent">
                            ❌ Tidak Hadir
                        </option>

                        <option value="permit">
                            📄 Izin
                        </option>

                        <option value="sick">
                            🤒 Sakit
                        </option>

                    </select>

                    <button
                        wire:click="save"
                        class="bg-blue-600 hover:bg-blue-700 transition duration-300 text-white font-bold px-8 py-4 rounded-2xl shadow-xl"
                    >
                        Simpan
                    </button>

                </div>

            </div>

            <!-- Table -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                <div class="p-6 border-b bg-gray-50">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Data Absensi
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Daftar kehadiran seluruh user
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left">

                        <!-- Head -->
                        <thead class="bg-slate-900 text-white uppercase text-xs">

                            <tr>

                                <th class="p-5">#</th>
                                <th class="p-5">Nama</th>
                                <th class="p-5">Tanggal</th>
                                <th class="p-5">Status</th>
                                <th class="p-5 text-center">Aksi</th>

                            </tr>

                        </thead>

                        <!-- Body -->
                        <tbody>

                            @forelse($attendances as $item)

                                <tr class="border-b hover:bg-blue-50 transition duration-200">

                                    <!-- No -->
                                    <td class="p-5">
                                        {{ $loop->iteration }}
                                    </td>

                                    <!-- User -->
                                    <td class="p-5">

                                        <div class="flex items-center gap-3">

                                            <img
                                                src="https://i.pravatar.cc/150?img={{ $loop->iteration + 10 }}"
                                                class="w-11 h-11 rounded-full border-2 border-blue-200"
                                            >

                                            <div>

                                                <h1 class="font-semibold text-gray-700">
                                                    {{ $item->user->name ?? 'User' }}
                                                </h1>

                                                <p class="text-xs text-gray-400">
                                                    Employee
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- Date -->
                                    <td class="p-5 text-gray-600">
                                        {{ $item->date }}
                                    </td>

                                    <!-- Status -->
                                    <td class="p-5">

                                        @if($item->status == 'present')

                                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-bold">
                                                ✅ Hadir
                                            </span>

                                        @elseif($item->status == 'absent')

                                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs font-bold">
                                                ❌ Tidak Hadir
                                            </span>

                                        @elseif($item->status == 'permit')

                                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-xs font-bold">
                                                📄 Izin
                                            </span>

                                        @else

                                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-bold">
                                                🤒 Sakit
                                            </span>

                                        @endif

                                    </td>

                                    <!-- Delete -->
                                    <td class="p-5 text-center">

                                        <button
                                            wire:click="delete({{ $item->id }})"
                                            onclick="confirm('Yakin mau hapus data ini?') || event.stopImmediatePropagation()"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow-md transition duration-300"
                                        >
                                            Hapus
                                        </button>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center p-10 text-gray-500">

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

                background: '#ffffff',

                confirmButtonColor: '#2563eb',

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

                    showConfirmButton: false,

                    timer: 2000

                });

            });

        });

    </script>

</div>