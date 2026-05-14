<div class="min-h-screen bg-[#060816] relative overflow-hidden py-10 px-4">

    <!-- Background Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#7c3aed22,transparent_30%),radial-gradient(circle_at_bottom_right,#06b6d422,transparent_30%)]"></div>

    <div class="relative z-10 max-w-7xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-10">

            <div class="w-24 h-24 mx-auto rounded-[28px] bg-gradient-to-br from-fuchsia-500 via-violet-500 to-cyan-400 flex items-center justify-center text-4xl shadow-[0_10px_40px_rgba(168,85,247,0.55)] border border-white/20 mb-5">
                👤
            </div>

            <h1 class="text-5xl font-extrabold text-white tracking-tight">
                User Management
            </h1>

            <p class="text-gray-400 mt-3 tracking-wide">
                Manage system users with modern dashboard
            </p>

        </div>

        <!-- FORM -->
        <div class="flex justify-center">

            <div class="bg-white/10 backdrop-blur-2xl border border-white/10 shadow-[0_20px_80px_rgba(0,0,0,0.45)] rounded-[32px] p-8 w-full max-w-2xl">

                <form wire:submit.prevent="store" class="space-y-6">

                    <h2 class="text-2xl font-bold text-white text-center tracking-wide">
                        ✨ User Form
                    </h2>

                    <!-- ERROR -->
                    @if ($errors->any())

                        <div class="bg-red-500/15 border border-red-400/20 text-red-300 p-4 rounded-2xl backdrop-blur-lg shadow-lg">

                            @foreach ($errors->all() as $error)

                                <p class="text-sm">{{ $error }}</p>

                            @endforeach

                        </div>

                    @endif

                    <!-- SUCCESS -->
                    @if (session('message'))

                        <div class="bg-green-500/15 border border-green-400/20 text-green-300 p-4 rounded-2xl backdrop-blur-lg shadow-lg font-semibold">

                            {{ session('message') }}

                        </div>

                    @endif

                    <!-- NAME -->
                    <div>

                        <label class="block text-sm font-medium text-gray-300 mb-2 tracking-wide">
                            Name
                        </label>

                        <input type="text" wire:model="name" placeholder="Masukkan Nama"
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-400 shadow-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300">

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="block text-sm font-medium text-gray-300 mb-2 tracking-wide">
                            Email
                        </label>

                        <input type="email" wire:model="email" placeholder="Masukkan Email"
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-400 shadow-lg focus:outline-none focus:ring-2 focus:ring-violet-400 transition-all duration-300">

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block text-sm font-medium text-gray-300 mb-2 tracking-wide">
                            Password
                        </label>

                        <input type="password" wire:model="password" placeholder="Masukkan Password"
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-400 shadow-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-400 transition-all duration-300">

                    </div>

                    <!-- ROLE -->
                    <div>

                        <label class="block text-sm font-medium text-gray-300 mb-2 tracking-wide">
                            Role
                        </label>

                        <select wire:model='role'
                            class="w-full bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300">

                            <option value="" class="bg-[#111827]">
                                --- Pilih Role ---
                            </option>

                            <option value="admin" class="bg-[#111827]">
                                Admin
                            </option>

                            <option value="user" class="bg-[#111827]">
                                User
                            </option>

                        </select>

                    </div>

                    <!-- BUTTON -->
                    @if ($editCheck == false)

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-cyan-400 via-violet-500 to-fuchsia-500 text-white py-4 rounded-2xl font-bold shadow-[0_10px_30px_rgba(139,92,246,0.45)] hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)] transition-all duration-300">

                            🚀 Save User

                        </button>

                    @else

                        <button type="button"
                            wire:click="update({{ $idEdit }})"
                            class="w-full bg-gradient-to-r from-fuchsia-500 via-violet-500 to-cyan-400 text-white py-4 rounded-2xl font-bold shadow-[0_10px_30px_rgba(139,92,246,0.45)] hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)] transition-all duration-300">

                            ✨ Update User

                        </button>

                        <button type="button"
                            wire:click="clear"
                            class="w-full bg-white/10 border border-white/10 text-gray-300 py-4 rounded-2xl mt-3 hover:bg-white/20 transition shadow-lg">

                            Clear

                        </button>

                    @endif

                </form>

            </div>

        </div>

        <!-- SEARCH -->
        <div class="text-center mt-8">

            <input 
                type="text"
                wire:model.live="keyword"
                placeholder="🔍 Cari nama..."
                class="w-full md:w-1/3 bg-white/10 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-400 shadow-lg backdrop-blur-xl transition-all duration-300">

        </div>

        <!-- TABLE -->
        <div class="mt-8">

            <div class="bg-white/10 backdrop-blur-2xl border border-white/10 shadow-[0_20px_80px_rgba(0,0,0,0.45)] rounded-[32px] overflow-hidden">

                <table class="min-w-full text-sm text-gray-200">

                    <thead class="bg-white/10 text-gray-300 uppercase tracking-widest text-xs">

                        <tr>
                            <th class="px-5 py-4 text-left">#</th>
                            <th class="px-5 py-4 text-left">Username</th>
                            <th class="px-5 py-4 text-left">Email</th>
                            <th class="px-5 py-4 text-left">Role</th>
                            <th class="px-5 py-4 text-left">Action</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-white/10">

                        @foreach ($users as $item)

                            <tr class="hover:bg-white/5 transition duration-300">

                                <td class="px-5 py-4 text-gray-300">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-5 py-4 font-semibold text-white">
                                    {{ $item->name }}
                                </td>

                                <td class="px-5 py-4 text-gray-300">
                                    {{ $item->email }}
                                </td>

                                <td class="px-5 py-4">

                                    <span class="capitalize px-4 py-2 rounded-full text-xs font-bold shadow-lg
                                        {{ $item->role == 'admin' 
                                            ? 'bg-fuchsia-500/15 border border-fuchsia-400/20 text-fuchsia-300' 
                                            : 'bg-cyan-500/15 border border-cyan-400/20 text-cyan-300' }}">

                                        {{ $item->role }}

                                    </span>

                                </td>

                                <td class="px-5 py-4 space-x-2">

                                    <button
                                        wire:click="destroy({{ $item->id }})"
                                        class="bg-red-500/15 border border-red-400/20 hover:bg-red-500 text-red-300 hover:text-white px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

                                        Hapus

                                    </button>

                                    @if ($editCheck == false)

                                        <button
                                            wire:click="edit({{ $item->id }})"
                                            class="bg-cyan-500/15 border border-cyan-400/20 hover:bg-cyan-500 text-cyan-300 hover:text-white px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

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

</div>