@extends('layouts.app')

@section('content')

<div class="bg-white rounded-3xl shadow-xl p-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Attendance Management
            </h1>

            <p class="text-gray-500 mt-2 text-sm">
                Employee attendance data list
            </p>
        </div>

        <div class="flex items-center gap-4">

            <!-- Search -->
            <div class="relative">

                <input 
                    type="text"
                    id="searchInput"
                    placeholder="Search employee..."
                    class="pl-12 pr-4 py-3 border border-gray-300 rounded-2xl outline-none focus:ring-2 focus:ring-blue-400 w-72"
                >

                <span class="absolute left-4 top-3.5 text-gray-400">
                    🔍
                </span>

            </div>

            <!-- Total -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-3 rounded-2xl shadow-md">
                <h1 class="font-bold text-lg">
                    Total : {{ count($attendances) }}
                </h1>
            </div>

        </div>

    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-3xl border border-gray-200">

        <table class="w-full text-sm text-left" id="attendanceTable">

            <!-- Head -->
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">

                <tr>
                    <th class="px-6 py-5">No</th>
                    <th class="px-6 py-5">User</th>
                    <th class="px-6 py-5">Status</th>
                    <th class="px-6 py-5">Date</th>
                </tr>

            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-gray-200 bg-white">

                @forelse ($attendances as $attendance)

                    <tr class="hover:bg-blue-50 transition duration-200 table-row">

                        <!-- Number -->
                        <td class="px-6 py-5 font-semibold text-gray-700">
                            {{ $loop->iteration }}
                        </td>

                        <!-- User -->
                        <td class="px-6 py-5 user-name">

                            <div class="flex items-center gap-4">

                                <!-- Profile -->
                                <img 
                                    src="https://i.pravatar.cc/150?img={{ $loop->iteration + 10 }}"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-blue-200 shadow-md"
                                >

                                <!-- Name -->
                                <div>
                                    <h1 class="font-semibold text-gray-800 text-base">
                                        {{ $attendance->user->name }}
                                    </h1>

                                    <p class="text-xs text-gray-400">
                                        Employee
                                    </p>
                                </div>

                            </div>

                        </td>

                        <!-- Status -->
                        <td class="px-6 py-5">

                            @if($attendance->status == 'present')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-bold">
                                    ✅ Present
                                </span>

                            @elseif($attendance->status == 'sick')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-xs font-bold">
                                    🤒 Sick
                                </span>

                            @elseif($attendance->status == 'permit')

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-bold">
                                    📄 Permit
                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs font-bold">
                                    ❌ Absent
                                </span>

                            @endif

                        </td>

                        <!-- Date -->
                        <td class="px-6 py-5 text-gray-600 font-medium">
                            {{ $attendance->created_at->format('d M Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-16">

                            <div class="flex flex-col items-center justify-center">

                                <div class="text-6xl mb-4">
                                    📅
                                </div>

                                <h1 class="text-2xl font-bold text-gray-700">
                                    No Attendance Data
                                </h1>

                                <p class="text-gray-400 mt-2">
                                    Attendance data will appear here
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

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

@endsection