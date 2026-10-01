<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Mahasiswa
        </h2>
    </x-slot>

    <div style="padding: 40px; background: #f3f4f6; min-height: 600px;">

        <div style="max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 10px;">

            <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 25px;">
                Form Tambah Mahasiswa
            </h2>

            @if ($errors->any())
                <div style="background: #fee2e2; color: #991b1b; padding: 15px; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mahasiswa.store') }}" method="POST">

                @csrf

                <div style="margin-bottom: 20px;">
                    <label>NIM</label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim') }}"
                        placeholder="Masukkan NIM"
                        required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px;"
                    >
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Nama Mahasiswa</label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama mahasiswa"
                        required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px;"
                    >
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Program Studi</label>

                    <input
                        type="text"
                        name="program_studi"
                        value="{{ old('program_studi') }}"
                        placeholder="Masukkan program studi"
                        required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px;"
                    >
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px;"
                    >
                </div>

                <div style="margin-bottom: 25px;">
                    <label>Angkatan</label>

                    <input
                        type="number"
                        name="angkatan"
                        value="{{ old('angkatan') }}"
                        placeholder="Contoh: 2023"
                        required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px;"
                    >
                </div>

                <!-- TOMBOL SIMPAN -->
                <button
                    type="submit"
                    style="
                        background: #2563eb;
                        color: white;
                        border: none;
                        padding: 12px 25px;
                        border-radius: 6px;
                        font-weight: bold;
                        cursor: pointer;
                        margin-right: 10px;
                    "
                >
                    SIMPAN DATA
                </button>

                <!-- TOMBOL KEMBALI -->
                <a
                    href="{{ route('mahasiswa.index') }}"
                    style="
                        display: inline-block;
                        background: #6b7280;
                        color: white;
                        padding: 12px 25px;
                        border-radius: 6px;
                        text-decoration: none;
                        font-weight: bold;
                    "
                >
                    KEMBALI
                </a>

            </form>

        </div>

    </div>

</x-app-layout>