<div class="min-h-screen flex items-center justify-center bg-[#060816] relative overflow-hidden p-6">

    <!-- Background Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#7c3aed22,transparent_30%),radial-gradient(circle_at_bottom_right,#06b6d422,transparent_30%)]"></div>

    <div class="relative z-10 w-full max-w-5xl bg-white/10 backdrop-blur-2xl border border-white/10 rounded-[32px] shadow-[0_20px_80px_rgba(0,0,0,0.45)] p-8">

        <!-- Header -->
        <div class="text-center mb-8">

            <div class="w-24 h-24 mx-auto rounded-[28px] bg-gradient-to-br from-fuchsia-500 via-violet-500 to-cyan-400 flex items-center justify-center text-4xl shadow-[0_10px_40px_rgba(168,85,247,0.55)] border border-white/20 mb-5">
                📌
            </div>

            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Position Management
            </h1>

            <p class="text-gray-400 mt-2 tracking-wide">
                Manage company positions with modern dashboard
            </p>

        </div>

        {{-- ALERT --}}
        @if ($errors->any())

            <div class="bg-red-500/15 border border-red-400/20 text-red-300 p-4 rounded-2xl mb-5 backdrop-blur-lg shadow-lg">

                @foreach ($errors->all() as $item)

                    <div>{{ $item }}</div>

                @endforeach

            </div>

        @endif

        @if (session('message'))

            <div class="bg-green-500/15 border border-green-400/20 text-green-300 p-4 rounded-2xl mb-5 backdrop-blur-lg shadow-lg">
                {{ session('message') }}
            </div>

        @endif

        {{-- FORM --}}
        <form wire:submit.prevent='store' class="space-y-6 mb-8">

            <div class="relative">

                <input type="text" wire:model='name'
                    class="w-full px-5 py-4 bg-white/10 border border-white/10 rounded-2xl text-white placeholder-gray-400 shadow-lg focus:ring-2 focus:ring-cyan-400 outline-none transition-all duration-300"
                    placeholder="Enter position name...">

            </div>

            <div class="flex justify-end gap-3">

                @if (!$editCheck)

                    <button type="submit"
                        class="bg-gradient-to-r from-cyan-400 via-violet-500 to-fuchsia-500 text-white px-6 py-3 rounded-2xl font-bold shadow-[0_10px_30px_rgba(139,92,246,0.45)] hover:scale-105 hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)] transition-all duration-300">

                        🚀 Save

                    </button>

                @else

                    <button wire:click='update({{ $idEdit }})'
                        class="bg-gradient-to-r from-fuchsia-500 via-violet-500 to-cyan-400 text-white px-6 py-3 rounded-2xl font-bold shadow-[0_10px_30px_rgba(139,92,246,0.45)] hover:scale-105 hover:shadow-[0_15px_40px_rgba(6,182,212,0.45)] transition-all duration-300">

                        ✨ Update

                    </button>

                    <button wire:click='clear'
                        class="bg-white/10 border border-white/10 text-gray-300 px-6 py-3 rounded-2xl shadow-lg hover:bg-white/20 transition-all duration-300">

                        Clear

                    </button>

                @endif

            </div>

        </form>

        {{-- SEARCH --}}
        <div class="mb-6">

            <input type="text" wire:model.live='keyword'
                placeholder="🔍 Search position..."
                class="w-full px-5 py-4 bg-white/10 border border-white/10 rounded-2xl text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-400 outline-none shadow-lg transition-all duration-300">

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto rounded-[28px] border border-white/10 bg-white/5 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.35)]">

            <table class="min-w-full text-sm text-gray-200">

                <thead class="bg-white/10 text-gray-300 uppercase tracking-widest text-xs">

                    <tr>
                        <th class="px-5 py-4 text-left">#</th>
                        <th class="px-5 py-4 text-left">Name</th>
                        <th class="px-5 py-4 text-center">Action</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-white/10">

                    @foreach ($positions as $item)

                        <tr class="hover:bg-white/5 transition duration-300">

                            <td class="px-5 py-4 text-gray-300">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-white">
                                {{ $item->name }}
                            </td>

                            <td class="px-5 py-4 text-center space-x-2">

                                <button wire:click='destroy({{ $item->id }})'
                                    class="bg-red-500/15 border border-red-400/20 hover:bg-red-500 text-red-300 hover:text-white px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

                                    Hapus

                                </button>

                                @if (!$editCheck)

                                    <button wire:click='edit({{ $item->id }})'
                                        class="bg-cyan-500/15 border border-cyan-400/20 hover:bg-cyan-500 text-cyan-300 hover:text-white px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

                                        Edit

                                    </button>

                                @else

                                    <button wire:click='clear'
                                        class="bg-white/10 border border-white/10 hover:bg-white/20 text-gray-300 px-4 py-2 rounded-xl text-sm shadow-lg transition-all duration-300">

                                        Clear

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