
<div class="relative overflow-hidden bg-white/10 backdrop-blur-2xl border border-white/10 rounded-[32px] shadow-[0_20px_80px_rgba(0,0,0,0.45)] p-8">
@extends('layouts.app')

@section('content')

    <!-- Glow -->
    <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-500/10 via-transparent to-cyan-400/10 pointer-events-none"></div>

    <!-- Header -->
    <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

        <div>
            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Attendance Management
            </h1>

            <p class="text-gray-400 mt-2 text-sm tracking-wide">
                Employee attendance data list
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">

            <!-- Search -->
            <div class="relative">

                <input 
                    type="text"
                    id="searchInput"
                    placeholder="Search employee..."
                    class="pl-12 pr-4 py-3 bg-white/10 border border-white/10 text-white placeholder-gray-400 rounded-2xl outline-none focus:ring-2 focus:ring-cyan-400 w-full sm:w-72 shadow-lg transition-all duration-300"
                >

                <span class="absolute left-4 top-3.5 text-gray-400">
                    🔍
                </span>

            </div>

            <!-- Total -->
            <div class="bg-gradient-to-r from-fuchsia-500 via-violet-500 to-cyan-400 text-white px-6 py-3 rounded-2xl shadow-[0_10px_30px_rgba(139,92,246,0.45)]">

                <h1 class="font-bold text-lg tracking-wide">
                    Total : {{ count($attendances) }}
                </h1>

            </div>

        </div>

    </div>

    <!-- Table -->
    <div class="relative z-10 overflow-x-auto rounded-[28px] border border-white/10 bg-white/5 backdrop-blur-xl">

        <table class="w-full text-sm text-left" id="attendanceTable">

            <thead class="bg-white/10 text-gray-300 uppercase text-xs tracking-widest">

                <tr>
                    <th class="px-6 py-5">No</th>
                    <th class="px-6 py-5">User</th>
                    <th class="px-6 py-5">Status</th>
                    <th class="px-6 py-5">Date</th>
                </tr>

            </thead>

            <tbody class="divide-y divide-white/10 text-white">

                @forelse ($attendances as $attendance)

                    <tr class="hover:bg-white/5 transition duration-300 table-row">

                        <td class="px-6 py-5 font-semibold text-gray-300">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 user-name">

                            <div class="flex items-center gap-4">

                                <img 
                                    src="https://i.pravatar.cc/150?img={{ $loop->iteration + 10 }}"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-cyan-400 shadow-[0_0_20px_rgba(34,211,238,0.4)]"
                                >

                                <div>
                                    <h1 class="font-semibold text-white text-base">
                                        {{ $attendance->user->name }}
                                    </h1>

                                    <p class="text-xs text-gray-400">
                                        Employee
                                    </p>
                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5">

                            @if($attendance->status == 'present')

                                <span class="bg-green-500/15 border border-green-400/20 text-green-300 px-4 py-2 rounded-full text-xs font-bold tracking-wide shadow-lg">
                                    ✅ Present
                                </span>

                            @elseif($attendance->status == 'sick')

                                <span class="bg-yellow-500/15 border border-yellow-400/20 text-yellow-300 px-4 py-2 rounded-full text-xs font-bold tracking-wide shadow-lg">
                                    🤒 Sick
                                </span>

                            @elseif($attendance->status == 'permit')

                                <span class="bg-cyan-500/15 border border-cyan-400/20 text-cyan-300 px-4 py-2 rounded-full text-xs font-bold tracking-wide shadow-lg">
                                    📄 Permit
                                </span>

                            @else

                                <span class="bg-red-500/15 border border-red-400/20 text-red-300 px-4 py-2 rounded-full text-xs font-bold tracking-wide shadow-lg">
                                    ❌ Absent
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-5 text-gray-300 font-medium">
                            {{ $attendance->created_at->format('d M Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-20">

                            <div class="flex flex-col items-center justify-center">

                                <div class="text-7xl mb-5">
                                    📅
                                </div>

                                <h1 class="text-3xl font-bold text-white">
                                    No Attendance Data
                                </h1>

                                <p class="text-gray-400 mt-3">
                                    Attendance data will appear here
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
<!-- Search Script -->
<script>

    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.table-row');

    searchInput.addEventListener('keyup', function() {

        const value = this.value.toLowerCase();

        rows.forEach(row => {

            const user = row.querySelector('.user-name').innerText.toLowerCase();

            if(user.includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    });

</script>

</div>


@endsection