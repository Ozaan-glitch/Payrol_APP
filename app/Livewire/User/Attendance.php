<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance as AttendanceModel;

class Attendance extends Component
{
    public $status = '';

    // Simpan Data
    public function save()
    {
        $this->validate([
            'status' => 'required|in:present,absent,permit,sick'
        ]);

        AttendanceModel::create([
            'user_id' => Auth::user()->id,
            'date' => now()->format('Y-m-d'),
            'status' => $this->status,
        ]);

        $this->reset('status');

        // SweetAlert Success
        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text' => 'Absensi berhasil disimpan!',
            'icon' => 'success'
        ]);
    }

    // Hapus Data
    public function delete($id)
    {
        $attendance = AttendanceModel::find($id);

        if ($attendance) {

            $attendance->delete();

            $this->dispatch('swal', [
                'title' => 'Berhasil!',
                'text' => 'Data berhasil dihapus!',
                'icon' => 'success'
            ]);
        }
    }

    // Render View
    public function render()
    {
        $attendances = AttendanceModel::latest()->get();

        return view('livewire.user.attendance', [
            'attendances' => $attendances
        ]);
    }
}