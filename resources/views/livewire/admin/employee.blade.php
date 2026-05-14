<div class="min-h-screen flex items-center justify-center bg-[#060816] relative overflow-hidden py-10 px-4">

    <!-- Background Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#7c3aed22,transparent_30%),radial-gradient(circle_at_bottom_right,#06b6d422,transparent_30%)]"></div>

    <!-- Main Card -->
    <div class="relative z-10 bg-white/10 backdrop-blur-2xl border border-white/10 shadow-[0_20px_80px_rgba(0,0,0,0.45)] rounded-[32px] p-8 w-full max-w-5xl">

        <!-- Header -->
        <div class="mb-8 text-center">

            <div class="w-24 h-24 mx-auto rounded-[28px] bg-gradient-to-br from-fuchsia-500 via-violet-500 to-cyan-400 flex items-center justify-center text-4xl shadow-[0_10px_40px_rgba(168,85,247,0.55)] border border-white/20 mb-5">
                👨‍💼
            </div>

            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Employee Management
            </h1>

            <p class="text-gray-400 mt-2 tracking-wide">
                Manage employee data easily and modernly
            </p>

        </div>

        {{-- SUCCESS --}}
        @if (session()->has('message'))
            <div class="bg-green-500/15 border border-green-400/20 text-green-300 px-5 py-4 rounded-2xl mb-5 backdrop-blur-lg shadow-lg">
                {{ session('message') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-500/15 border border-red-400/20 text-red-300 px-5 py-4 rounded-2xl mb-5 backdrop-blur-lg shadow-lg">
                <ul class="list-disc pl-5 space-y-1">
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
                <label class="text-sm text-gray-300 tracking-wide">
                    User
                </label>

                <select wire:model="user_id"
                    class="w-full px-5 py-4 mt-2 bg-white/10 border border-white/10 rounded-2xl text-white shadow-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all duration-300">

                    <option value="" class="bg-[#111827]">
                        --- Pilih User ---
                    </option>

                    @foreach ($users as $item)
                        <option value="{{ $item->id }}" class="bg-[#111827]">
                            {{ $item->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- POSITION --}}
            <div>
                <label class="text-sm text-gray-300 tracking-wide">
                    Position
                </label>

                <select wire:model="position_id"
                    class="w-full px-5 py-4 mt-2 bg-white/10 border border-white/10 rounded-2xl text-white shadow-lg focus:ring-2 focus:ring-fuchsia-400 outline-none transition-all duration-300">

                    <option value="" class="bg-[#111827]">
                        --- Pilih Position ---
                    </option>

                    @foreach ($positions as $item)
                        <option value="{{ $item->id }}" class="bg-[#111827]">
                            {{ $item->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- SALARY --}}
            <div>
                <label class="text-sm text-gray-300 tracking-wide">
                    Salary
                </label>

                <input wire:model="salary" type="number"
                    class="w-full px-5 py-4 mt-2 bg-white/10 border border-white/10 rounded-2xl text-white placeholder-gray-400 shadow-lg focus:ring-2 focus:ring-violet-400 outline-none transition-all duration-300"
                    placeholder="Masukkan gaji...">
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">

                @if($editCheck)

                <button type="button"
                    wire:click="update"
                    class="w-full relative overflow-hidden bg-gradient-to-r from-fuchsia-500 via-violet-500 to-cyan-400 text-white py-4 rounded-2xl font-bold shadow-[0_10px_30px_rgba(139,92,246,0.45)] transition duration-300 hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)]">
                    
                    <span class="relative z-10 flex items-center justify-center gap-2 tracking-wide">
                        ✨ Update Data
                    </span>

                    <span class="absolute inset-0 bg-white opacity-0 hover:opacity-10 transition"></span>

                </button>

                <button type="button"
                    wire:click="clear"
                    class="px-6 py-4 rounded-2xl bg-white/10 border border-white/10 text-gray-300 hover:bg-white/20 transition shadow-lg">
                    Cancel
                </button>

                @else

                <button type="button"
                    wire:click="store"
                    class="w-full relative overflow-hidden bg-gradient-to-r from-cyan-400 via-violet-500 to-fuchsia-500 text-white py-4 rounded-2xl font-bold shadow-[0_10px_30px_rgba(139,92,246,0.45)] transition duration-300 hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)]">

                    <span class="relative z-10 flex items-center justify-center gap-2 tracking-wide">
                        🚀 Save Data
                    </span>

                    <span class="absolute inset-0 bg-white opacity-0 hover:opacity-10 transition"></span>

                </button>

                @endif

            </div>

        </form>

        {{-- TABLE --}}
        <div class="overflow-x-auto rounded-[28px] border border-white/10 bg-white/5 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.35)]">

            <table class="min-w-full text-sm text-gray-200">

                <thead class="bg-white/10 text-gray-300 uppercase tracking-widest text-xs">
                    <tr>
                        <th class="px-5 py-4 text-left">#</th>
                        <th class="px-5 py-4 text-left">User</th>
                        <th class="px-5 py-4 text-left">Position</th>
                        <th class="px-5 py-4 text-left">Salary</th>
                        <th class="px-5 py-4 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">

                    @foreach ($employees as $item)

                        <tr class="hover:bg-white/5 transition duration-300">

                            <td class="px-5 py-4 font-semibold text-gray-300">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $item->user->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $item->position->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4 font-bold text-cyan-300">
                                Rp {{ number_format($item->salary) }}
                            </td>

                            <td class="px-5 py-4 text-center space-x-2">

                                <button 
                                    wire:click="edit({{ $item->id }})"
                                    class="bg-cyan-500/15 border border-cyan-400/20 hover:bg-cyan-500 text-cyan-300 hover:text-white px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

                                    Edit

                                </button>

                                <button 
                                    wire:click="destroy({{ $item->id }})"
                                    class="bg-red-500/15 border border-red-400/20 hover:bg-red-500 text-red-300 hover:text-white px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

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