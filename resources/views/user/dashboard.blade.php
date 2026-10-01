<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard User
        </h2>
    </x-slot>

    <div style="padding: 40px; background: #f3f4f6; min-height: 600px;">

        <div style="max-width: 1000px; margin: auto;">

            <div style="
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            ">

                <h2 style="font-size: 28px; font-weight: bold; margin-bottom: 10px;">
                    Selamat Datang, {{ auth()->user()->name }}!
                </h2>

                <p style="color: #6b7280; margin-bottom: 20px;">
                    Anda login sebagai pengguna.
                </p>

                <div style="
                    background: #dcfce7;
                    padding: 20px;
                    border-radius: 8px;
                    margin-bottom: 25px;
                ">

                    <p>
                        <strong>Email:</strong>
                        {{ auth()->user()->email }}
                    </p>

                    <p style="margin-top: 8px;">
                        <strong>Role:</strong>
                        <span style="
                            background: #16a34a;
                            color: white;
                            padding: 5px 12px;
                            border-radius: 20px;
                            font-size: 13px;
                        ">
                            USER
                        </span>
                    </p>

                </div>

                <a href="{{ route('mahasiswa.index') }}"
                   style="
                       display: inline-block;
                       background: #16a34a;
                       color: white;
                       padding: 12px 20px;
                       border-radius: 7px;
                       text-decoration: none;
                       font-weight: bold;
                   ">
                    Lihat Data Mahasiswa
                </a>

            </div>

        </div>

    </div>

</x-app-layout>