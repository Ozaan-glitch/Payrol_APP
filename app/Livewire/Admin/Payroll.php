<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Payroll as ModelsPayroll;

class Payroll extends Component
{
    public $editCheck = false;
    public $idEdit;
    public $employee_id;
    public $period;
    public $allowance;
    public $deduction;

    public function render()
    {
        $employees = Employee::all();
        $payrolls = ModelsPayroll::all();

        return view('livewire.admin.payroll', compact('payrolls', 'employees'));
    }

    public function store()
    {
        $this->validate([
            'employee_id' => 'required',
            'period' => 'required',
            'allowance' => 'required',
            'deduction' => 'required'
        ]);

        $employee = Employee::find($this->employee_id);

        ModelsPayroll::create([
            'employee_id' => $this->employee_id,
            'period' => $this->period,
            'allowance' => $this->allowance,
            'deduction' => $this->deduction,
            'net_salary' => ($employee->salary ?? 0) + $this->allowance - $this->deduction
        ]);

        session()->flash('message', 'Berhasil menambah payroll');
        $this->clear();
    }

    public function destroy($id)
    {
        $payroll = ModelsPayroll::find($id);

        if ($payroll) {
            $payroll->delete();
            session()->flash('message', 'Berhasil menghapus data');
        }
    }

    public function edit($id)
    {
        $payroll = ModelsPayroll::find($id);

        if (!$payroll) return;

        $this->idEdit = $payroll->id;
        $this->employee_id = $payroll->employee_id;
        $this->period = $payroll->period;
        $this->allowance = $payroll->allowance;
        $this->deduction = $payroll->deduction;
        $this->editCheck = true;
    }

    public function clear()
    {
        $this->idEdit = null;
        $this->employee_id = null;
        $this->period = '';
        $this->allowance = 0;
        $this->deduction = 0;
        $this->editCheck = false;
    }

    public function update()
    {
        $this->validate([
            'employee_id' => 'required',
            'period' => 'required',
            'allowance' => 'required',
            'deduction' => 'required',
        ]);

        $payroll = ModelsPayroll::find($this->idEdit);

        if (!$payroll) {
            session()->flash('error', 'Data tidak ditemukan');
            return;
        }

        $employee = Employee::find($this->employee_id);

        $payroll->update([
            'employee_id' => $this->employee_id,
            'period' => $this->period,
            'allowance' => $this->allowance,
            'deduction' => $this->deduction,
            'net_salary' => ($employee->salary ?? 0) + $this->allowance - $this->deduction
        ]);

        session()->flash('success', 'Data berhasil diupdate');
        $this->clear();
    }
}