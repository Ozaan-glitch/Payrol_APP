<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 py-10">
    
    <div class="bg-white/80 backdrop-blur-lg shadow-2xl rounded-3xl p-8 w-full max-w-4xl">

        <h1 class="text-3xl font-bold text-gray-700 mb-6 text-center tracking-wide">
            ✨ Halaman Pegawai
        </h1>

        {{-- SUCCESS --}}
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-4">
                {{ session('message') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif      

        {{-- FORM --}}
        <form class="space-y-6 mb-10">

            {{-- USER --}}
            <div>
                <label class="text-sm text-gray-500">User</label>
                <select wire:model="user_id"
                    class="w-full px-4 py-3 mt-1 border rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400">
                    <option value="">--- Pilih User ---</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- POSITION --}}
            <div>
                <label class="text-sm text-gray-500">Position</label>
                <select wire:model="position_id"
                    class="w-full px-4 py-3 mt-1 border rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-400">
                    <option value="">--- Pilih Position ---</option>
                    @foreach ($positions as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- SALARY --}}
            <div>
                <label class="text-sm text-gray-500">Gaji</label>
                <input wire:model="salary" type="number"
                    class="w-full px-4 py-3 mt-1 border rounded-xl shadow-sm focus:ring-2 focus:ring-purple-400"
                    placeholder="Masukkan gaji...">
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">

                @if($editCheck)
                <button type="button"
                    wire:click="update"
                    class="w-full relative overflow-hidden bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white py-3 rounded-2xl font-semibold shadow-lg transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        ✨ Update Data
                    </span>

                    <span class="absolute inset-0 bg-white opacity-0 hover:opacity-10 transition"></span>
                </button>

                <button type="button"
                    wire:click="clear"
                    class="px-4 py-3 rounded-2xl bg-gray-500 text-white hover:bg-gray-600 transition">
                    Cancel
                </button>

                @else
                <button type="button"
                    wire:click="store"
                    class="w-full relative overflow-hidden bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white py-3 rounded-2xl font-semibold shadow-lg transition duration-300 hover:scale-[1.02] hover:shadow-2xl">

                    <span class="relative z-10 flex items-center justify-center gap-2">
                        🚀 Save Data
                    </span>

                    <span class="absolute inset-0 bg-white opacity-0 hover:opacity-10 transition"></span>
                </button>
                @endif

            </div>
        </form>

        {{-- TABLE --}}
        <div class="overflow-x-auto rounded-2xl shadow-lg">
            <table class="min-w-full text-sm text-gray-700">
                
                <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">User</th>
                        <th class="px-4 py-3 text-left">Position</th>
                        <th class="px-4 py-3 text-left">Salary</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y bg-white">
                    @foreach ($employees as $item)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $item->user->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $item->position->name ?? '-' }}</td>
                            <td class="px-4 py-3 font-semibold text-indigo-600">
                                Rp {{ number_format($item->salary) }}
                            </td>

                            <td class="px-4 py-3 text-center space-x-2">
                                <button 
                                    wire:click="edit({{ $item->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm shadow">
                                    Edit
                                </button>

                                <button 
                                    wire:click="destroy({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm shadow">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>