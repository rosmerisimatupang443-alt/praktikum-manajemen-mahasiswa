<x-app-layout>

    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #1f2937;">
            Data Mahasiswa
        </h2>
    </x-slot>

    <div style="padding: 40px 20px; background-color: #f3f4f6; min-height: 500px;">

        <div style="max-width: 1200px; margin: 0 auto;">

            @if (session('success'))
                <div style="
                    background-color: #dcfce7;
                    color: #166534;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 20px;
                ">
                    {{ session('success') }}
                </div>
            @endif

            <div style="
                background-color: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            ">

                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 25px;
                ">

                    <div>
                        <h3 style="
                            font-size: 22px;
                            font-weight: bold;
                            margin: 0;
                        ">
                            Daftar Mahasiswa
                        </h3>

                        <p style="
                            color: #6b7280;
                            margin-top: 8px;
                            margin-bottom: 0;
                        ">
                            Data mahasiswa yang terdaftar dalam sistem.
                        </p>
                    </div>

                    {{-- Tombol Tambah hanya untuk Admin --}}
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('mahasiswa.create') }}"
                           style="
                               display: inline-block;
                               background-color: #2563eb;
                               color: white;
                               padding: 12px 20px;
                               border-radius: 8px;
                               text-decoration: none;
                               font-weight: bold;
                               font-size: 14px;
                           ">
                            + Tambah Mahasiswa
                        </a>
                    @endif

                </div>

                <div style="overflow-x: auto;">

                    <table style="
                        width: 100%;
                        border-collapse: collapse;
                    ">

                        <thead>
                            <tr style="background-color: #f3f4f6;">
                                <th style="border: 1px solid #d1d5db; padding: 12px;">No</th>
                                <th style="border: 1px solid #d1d5db; padding: 12px;">NIM</th>
                                <th style="border: 1px solid #d1d5db; padding: 12px;">Nama</th>
                                <th style="border: 1px solid #d1d5db; padding: 12px;">Program Studi</th>
                                <th style="border: 1px solid #d1d5db; padding: 12px;">Email</th>
                                <th style="border: 1px solid #d1d5db; padding: 12px;">Angkatan</th>
                                <th style="border: 1px solid #d1d5db; padding: 12px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($mahasiswas as $mahasiswa)

                                <tr>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $mahasiswa->nim }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $mahasiswa->nama }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $mahasiswa->program_studi }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $mahasiswa->email }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">
                                        {{ $mahasiswa->angkatan }}
                                    </td>

                                    <td style="border: 1px solid #d1d5db; padding: 12px;">

                                        {{-- Detail bisa diakses Admin dan User --}}
                                        <a href="{{ route('mahasiswa.show', $mahasiswa) }}"
                                           style="
                                               color: #2563eb;
                                               margin-right: 10px;
                                               text-decoration: none;
                                           ">
                                            Detail
                                        </a>

                                        {{-- Edit dan Hapus hanya untuk Admin --}}
                                        @if (auth()->user()->role === 'admin')

                                            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                                               style="
                                                   color: #d97706;
                                                   margin-right: 10px;
                                                   text-decoration: none;
                                               ">
                                                Edit
                                            </a>

                                            <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}"
                                                  method="POST"
                                                  style="display: inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        style="
                                                            border: none;
                                                            background: none;
                                                            color: #dc2626;
                                                            cursor: pointer;
                                                            font-size: 16px;
                                                        "
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>

                                            </form>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7"
                                        style="
                                            border: 1px solid #d1d5db;
                                            padding: 25px;
                                            text-align: center;
                                            color: #6b7280;
                                        ">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>