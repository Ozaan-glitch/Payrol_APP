<div class="min-h-screen bg-gray-100 py-10">
    <h1 class="text-3xl font-bold text-center mb-6">Halaman Pengguna</h1>

    <!-- FORM -->
    <div class="flex justify-center">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
            <form wire:submit.prevent="store" class="space-y-5">

                <h2 class="text-xl font-semibold text-gray-700 text-center">
                    Form Data
                </h2>

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="bg-red-100 p-3 rounded">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- SUCCESS -->
                @if (session('message'))
                    <div class="bg-green-100 p-3 rounded text-green-600 font-semibold">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Name
                    </label>
                    <input type="text" wire:model="name" placeholder="Masukkan Nama"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Email
                    </label>
                    <input type="email" wire:model="email" placeholder="Masukkan Email"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Password
                    </label>
                    <input type="password" wire:model="password" placeholder="Masukkan Password"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- ROLE (SUDAH DIPERBAIKI) -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2">Role</label>
                    <select wire:model='role' class="w-full border border-gray-300 rounded-lg px-3 py-2 
                        focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">--- Pilih Role ---</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>


                <!-- BUTTON -->
                @if ($editCheck == false)
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg">
                        Simpan
                    </button>
                @else
                    <button type="button"
                        wire:click="update({{ $idEdit }})"
                        class="w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded-lg">
                        Update
                    </button>

                    <button type="button"
                        wire:click="clear"
                        class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 rounded-lg mt-2">
                        Clear
                    </button>
                @endif

            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <input 
            type="text"
            wire:model.live="keyword"
            placeholder="Cari nama..."
            class="w-full md:w-1/3 border border-gray-300 rounded-lg px-4 py-2 
                focus:outline-none focus:ring-2 focus:ring-blue-400 
            shadow-sm"
        >
    </div>

    <!-- TABLE -->
    <div class="mt-5 px-6">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Username</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($users as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->email }}</td>
                            <td class="px-4 py-2">
                                <span class="capitalize px-2 py-1 rounded-full text-xs {{ $item->role == 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $item->role }}
                                </span>
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <button
                                    wire:click="destroy({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Hapus
                                </button>

                                @if ($editCheck == false)
                                    <button
                                        wire:click="edit({{ $item->id }})"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded">
                                        Edit
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>