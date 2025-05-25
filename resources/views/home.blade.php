<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if (session('success'))
        <meta name="session-success" content="{{ e(session('success')) }}">
    @endif
    <title>Form Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-stone-100 pt-20">
    
    @include('navbar')

    <section class="w-full flex justify-center">
        <div class="max-w-4xl w-full mx-auto">
            <div class="relative z-10 mt-[-7rem] bg-gray-900 text-white shadow-lg p-6">
                <h2 class="text-3xl font-bold">
                    <span class="text-blue-400">Form</span> Pendaftaran Online
                </h2>
            </div>

            <div class="bg-stone-100 py-10 relative z-20">
                <div class="max-w-4xl mx-auto px-4">
                    <h2 class="text-4xl font-semibold text-gray-800 mb-2">Persyaratan Wajib!</h2>
                    <hr class="mb-4 border-gray-400">
                    <p class="text-lg text-gray-600 mb-4">
                        Pendaftar harus melampirkan sertifikat vaksinasi COVID-19 minimal dosis 1 (pertama).
                    </p>
                    <p class="text-sm text-gray-500">
                        Jika anda belum melakukan vaksinasi, daftar di
                        <a href="https://www.pedulilindungi.id/" class="text-blue-500 hover:underline" target="_blank">https://www.pedulilindungi.id/</a>
                    </p>
                    <div class="mt-6">
                        <a href="https://www.pedulilindungi.id/" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 px-6 rounded">Daftar Vaksin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="max-w-4xl mx-auto">
        <form id="formPendaftaran" action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-1">Sertifikat Vaksin</label>
            <hr class="mb-4 border-gray-300">
            <input type="file" name="sertifikat_vaksin" class="block w-full text-sm text-gray-600 border border-gray-300 rounded-md cursor-pointer bg-white" />
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-1">Foto Diri</label>
            <hr class="mb-4 border-gray-300">
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden mb-2 shadow">
                    <img id="previewFoto"
                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='h-20 w-20 text-gray-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A9.969 9.969 0 0112 15c2.21 0 4.245.717 5.879 1.928M15 10a3 3 0 11-6 0 3 3 0 016 0z' /%3E%3C/svg%3E"
                        alt="Foto Profil" class="object-cover w-full h-full" />
                </div>
                <input type="file" name="foto_diri" accept="image/*" onchange="previewImage(event)">
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-4">Data Umum</label>
            <hr class="mb-4 border-gray-300">
            <div class="space-y-6">
                <!-- Floating Input Group -->
                <div class="relative">
                    <input type="text" name="nama" id="nama" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="nama" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Nama</label>
                </div>
                <div>
                    <label class="block mb-1 text-lg font-medium">Jenis Kelamin</label>
                    <div class="flex gap-6 items-center">
                        <label class="flex items-center gap-2 text-lg">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-radio w-5 h-5" />
                            Laki-laki
                        </label>
                        <label class="flex items-center gap-2 text-lg">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-radio w-5 h-5" />
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="relative">
                    <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="tempat_lahir" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Tempat Lahir</label>
                </div>
                <div class="relative">
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="tanggal_lahir" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Tanggal Lahir</label>
                </div>
                <div class="relative">
                    <input type="number" name="umur" id="umur" placeholder=" " disabled class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 bg-gray-100 text-gray-500" />
                    <label for="umur" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Umur</label>
                </div>
                <div class="relative">
                    <input type="text" name="no_ktp" id="no_ktp" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="no_ktp" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">No KTP</label>
                </div>
                <div class="relative">
                    <input type="number" name="tinggi_badan" id="tinggi_badan" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="tinggi_badan" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Tinggi Badan (cm)</label>
                </div>
                <div class="relative">
                    <input type="number" name="berat_badan" id="berat_badan" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="berat_badan" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Berat Badan (kg)</label>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-4">Kontak</label>
            <hr class="mb-4 border-gray-300">
            <div class="space-y-6">
                <div class="relative">
                    <input type="text" name="no_telp" id="no_telp" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="no_telp" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">No Telepon</label>
                </div>
                <div class="relative">
                    <input type="email" name="email" id="email" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-6 pb-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <label for="email" class="absolute text-gray-500 text-sm left-3 top-2.5 transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-gray-500">Email</label>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-1">Alamat Domisili</label>
            <hr class="mb-4 border-gray-300">
            <div class="space-y-4">
                <div>
                    <label class="block mb-1">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="w-full border rounded px-3 py-2">
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Kabupaten/Kota</label>
                    <select id="kabupaten" name="kabupaten" class="w-full border rounded px-3 py-2">
                        <option value="">Pilih Kabupaten/Kota</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" rows="4" class="w-full border rounded px-3 py-2 resize-y"></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-1">Tahun Lulus</label>
            <hr class="mb-4 border-gray-300">
            <select name="tahun_lulus" class="w-full border rounded px-3 py-2">
                <option value="" disabled selected class="text-gray-400">Pilih Tahun</option>
                @for ($year = 2025; $year >= 2000; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <label class="block text-lg font-semibold mb-1">Pengalaman</label>
            <hr class="mb-4 border-gray-300">
            <div class="max-h-52 overflow-y-auto">
                <select name="pengalaman" class="w-full border rounded px-3 py-2">
                    <option value="">Pilih Pengalaman</option>
                    <option value="Casting">Casting</option>
                    <option value="Stamping">Stamping</option>
                    <option value="Decal">Decal</option>
                    <option value="Operator Produksi">Operator Produksi</option>
                    <option value="Molding">Molding</option>
                    <option value="Machining">Machining</option>
                    <option value="Assembling">Assembling</option>
                    <option value="Warehouse">Warehouse</option>
                    <option value="Quality Control">Quality Control</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold py-4 rounded-md transition duration-300">
                Submit
            </button>
        </div>

        <div class="mt-4 text-center text-sm text-gray-500">
            Formulir ini dibuat oleh <strong>PT Mardizu Sejahtera</strong>
        </div>

    </form>
    <br>
</br>

    @vite('resources/js/pendaftaran.js')


</body>
</html>
