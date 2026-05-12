<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Attendance as AttendanceModel;

class Attendance extends Component
{
    public function render()
    {
        $attendances = AttendanceModel::with('user')
            ->latest()
            ->get();

        return view('livewire.admin.attendance', [
            'attendances' => $attendances
        ]);
    }
}