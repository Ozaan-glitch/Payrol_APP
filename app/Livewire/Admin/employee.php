<?php

namespace App\Livewire\Admin;

use App\Models\Position;
use App\Models\User;
use App\Models\Employee as ModelsEmployee;
use Livewire\Component;

class Employee extends Component
{
    public $user_id;
    public $position_id;
    public $salary;
    public $editCheck = false;
    public $idEdit;

    public function render()
    {
        return view('livewire.admin.employee', [
            'users' => User::all(),
            'positions' => Position::all(),
            'employees' => ModelsEmployee::all(),
        ]);
    }

    // ================= CREATE =================
    public function store()
    {
        $validate = $this->validate([
            'user_id' => 'required',
            'position_id' => 'required',
            'salary' => 'required|numeric'
        ]);

        ModelsEmployee::create($validate);

        $this->resetForm();

        session()->flash('message', 'Data berhasil ditambahkan');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $employee = ModelsEmployee::find($id);

        if ($employee) {
            $employee->delete();
            session()->flash('message', 'Berhasil menghapus employee');
        } else {
            session()->flash('message', 'Data tidak ditemukan');
        }
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $employee = ModelsEmployee::find($id);

        if (!$employee) {
            session()->flash('message', 'Data tidak ditemukan');
            return;
        }

        $this->user_id = $employee->user_id;
        $this->position_id = $employee->position_id;
        $this->salary = $employee->salary;

        $this->idEdit = $employee->id;
        $this->editCheck = true;
    }

    // ================= UPDATE =================
    public function update()
    {
        $validate = $this->validate([
            'user_id' => 'required',
            'position_id' => 'required',
            'salary' => 'required|numeric'
        ]);

        $employee = ModelsEmployee::find($this->idEdit);

        if ($employee) {
            $employee->update($validate);
            session()->flash('message', 'Data berhasil diperbarui');
        } else {
            session()->flash('message', 'Data tidak ditemukan');
        }

        $this->resetForm();
    }

    // ================= CLEAR =================
    public function clear()
    {
        $this->resetForm();
    }

    // ================= RESET HELPER =================
    private function resetForm()
    {
        $this->reset([
            'user_id',
            'position_id',
            'salary',
            'idEdit',
            'editCheck'
        ]);
    }
}