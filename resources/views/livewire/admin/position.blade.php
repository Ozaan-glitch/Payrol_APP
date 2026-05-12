<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-200 via-white to-blue-200 p-6">

    <div class="w-full max-w-4xl bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8 transition duration-500 hover:shadow-3xl">

        <h1 class="text-3xl font-bold text-center text-gray-700 mb-6 animate-pulse">
            ✨ Position Management
        </h1>

        {{-- ALERT --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 animate-bounce">
                @foreach ($errors->all() as $item)
                    <div>{{ $item }}</div>
                @endforeach
            </div>
        @endif

        @if (session('message'))
            <div class="bg-green-100 text-green-600 p-3 rounded-lg mb-4 animate-fade-in">
                {{ session('message') }}
            </div>
        @endif

        {{-- FORM --}}
        <form wire:submit.prevent='store' class="space-y-4 mb-8">

            <div class="relative group">
                <input type="text" wire:model='name'
                    class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition"
                    placeholder=" ">
                
                <label class="absolute left-4 top-3 text-gray-500 text-sm transition-all 
                    group-focus-within:-top-2 group-focus-within:text-xs group-focus-within:text-indigo-500
                    bg-white px-1">
                    Nama Position
                </label>
            </div>

            <div class="flex justify-end gap-3">
                @if (!$editCheck)
                    <button type="submit"
                        class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 rounded-xl shadow-md transition transform hover:scale-105">
                        Save
                    </button>
                @else
                    <button wire:click='update({{ $idEdit }})'
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-xl shadow-md transition transform hover:scale-105">
                        Update
                    </button>

                    <button wire:click='clear'
                        class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-xl shadow-md transition">
                        Clear
                    </button>
                @endif
            </div>
        </form>

        {{-- SEARCH --}}
        <div class="mb-4">
            <input type="text" wire:model.live='keyword'
                placeholder="🔍 Search..."
                class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none">
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto rounded-xl shadow-lg">
            <table class="min-w-full text-sm text-gray-700">

                <thead class="bg-indigo-500 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach ($positions as $item)
                        <tr class="hover:bg-indigo-50 transition duration-300 hover:scale-[1.01]">

                            <td class="px-4 py-3">{{ $loop->iteration }}</td>

                            <td class="px-4 py-3 font-medium">
                                {{ $item->name }}
                            </td>

                            <td class="px-4 py-3 text-center space-x-2">

                                <button wire:click='destroy({{ $item->id }})'
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition transform hover:scale-110">
                                    Hapus
                                </button>

                                @if (!$editCheck)
                                    <button wire:click='edit({{ $item->id }})'
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm transition transform hover:scale-110">
                                        Edit
                                    </button>
                                @else
                                    <button wire:click='clear'
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-lg text-sm transition">
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