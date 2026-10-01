<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="space-y-4">

                        <div>
                            <p class="text-sm text-gray-500">NIM</p>
                            <p class="font-semibold">
                                {{ $mahasiswa->nim }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Nama Mahasiswa</p>
                            <p class="font-semibold">
                                {{ $mahasiswa->nama }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Program Studi</p>
                            <p class="font-semibold">
                                {{ $mahasiswa->program_studi }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-semibold">
                                {{ $mahasiswa->email }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Angkatan</p>
                            <p class="font-semibold">
                                {{ $mahasiswa->angkatan }}
                            </p>
                        </div>

                    </div>

                    <div class="flex gap-3 mt-6">

                        <a href="{{ route('mahasiswa.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>

                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>