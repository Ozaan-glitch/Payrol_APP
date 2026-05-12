<?php

namespace App\Livewire\Admin;

use App\Models\Position as ModelsPosition;
use Livewire\Component;

class Position extends Component
{

        public $name;
        public $editCheck = false;
        public $idEdit;
        public $keyword;

    public function render()
    {
        $positions = ModelsPosition::where('name', 'like', '%'.
        $this->keyword . '%')->get();
        return view('livewire.admin.position', compact
        ('positions'));
    }

    public function store(){
        $validate = $this->validate(
            [
            'name'=>'required'
            ]
        );

        ModelsPosition::create($validate);
        session()->flash('message', 'berhasil menambah data');
    }

    public function destroy($id){
        $position = ModelsPosition::find($id);
        $position->delete();
        session()->flash('message', 'berhasil menghapus data');
    }

    public function edit($id) {
        $position = ModelsPosition::find($id);
        $this->name = $position->name;
        $this->idEdit = $position->id;
        $this->editCheck = true;
    }

    public function clear() {
        
    }

    public function update($id) {
        $validate = $this->validate([
            'name'=>'required'
        ]);

        $position = ModelsPosition::find($id);
        $position->update($validate);
        session()->flash('message', 'berhasil update data');
        $this->name = '';
        $this->idEdit = '';
        $this->editCheck = false;
    }
}