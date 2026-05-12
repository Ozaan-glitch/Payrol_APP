<?php

namespace App\Livewire\Admin;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;
    public $editCheck = false;
    public $idEdit;
    public $keyword;

    public function render()
    {
        $users = ModelsUser::where('name', 'like', '%'.
        $this->keyword . '%')->get();
        return view('livewire.admin.user', compact
        ('users'));
    }

    public function store() {
        $validate = $this->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required',
            'role' => 'required'
        ]);

        ModelsUser::create($validate);
        session()->flash('message', 'berhasil nambah');
    }

    public function destroy($id) {
        $user = ModelsUser::find($id);
        $user->delete();
        session()->flash('message', 'berhasil menghapus pengguna');
    }

    public function edit($id) {
        $position = ModelsUser::find($id);
        $this->name = $position->namespace;
        $this->email = $position->email;
        $this->password = $position->password;
        $this->idEdit = $position->id;
        $this->editCheck = true;
    }

    public function clear() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->editCheck = false;
        $this->idEdit = '';
    }

    public function update($id) {
        $validate = $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $position = ModelsUser::find($id);
        $position->update($validate);
        session()->flash('message', 'berhasil update data');
        $this->name = '';
        $this->idEdit = '';
        $this->editCheck = false;
    }
}