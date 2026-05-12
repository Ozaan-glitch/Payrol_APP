<?php

use App\Models\Attendance;
use function Livewire\Volt\{state};

state([
    'attendances' => Attendance::with('user')->latest()->get()
]);

?>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-5">
        Attendance Table
    </h1>

    <table class="w-full border border-gray-300">

        <thead class="bg-gray-200">
            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">User</th>
                <th class="border p-3">Status</th>
                <th class="border p-3">Date</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($attendances as $attendance)

                <tr>

                    <td class="border p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-3">
                        {{ $attendance->user->name }}
                    </td>

                    <td class="border p-3">
                        {{ $attendance->status }}
                    </td>

                    <td class="border p-3">
                        {{ $attendance->created_at->format('d-m-Y') }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center p-4">
                        No attendance data
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>