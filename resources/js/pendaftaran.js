document.addEventListener("DOMContentLoaded", function () {

    document.getElementsByName("foto_diri")[0].addEventListener("change", function (event) {
        const reader = new FileReader();
        reader.onload = function () {
            const preview = document.getElementById('previewFoto');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    document.getElementById('tanggal_lahir').addEventListener('change', function () {
        const tanggalLahir = new Date(this.value);
        const today = new Date();

        if (!isNaN(tanggalLahir.getTime())) {
            let umur = today.getFullYear() - tanggalLahir.getFullYear();
            const m = today.getMonth() - tanggalLahir.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < tanggalLahir.getDate())) {
                umur--;
            }
            document.getElementById('umur').value = umur;
        }
    });

    async function loadProvinsi() {
        try {
            const response = await fetch('/api/provinsi');
            if (!response.ok) throw new Error('Gagal memuat data provinsi');
            const data = await response.json();

            const provinsiSelect = document.getElementById('provinsi');
            provinsiSelect.innerHTML = '<option value="">-- Pilih Provinsi --</option>';
            data.forEach(provinsi => {
                provinsiSelect.innerHTML += `<option value="${provinsi.id}">${provinsi.name}</option>`;
            });
        } catch (err) {
            console.error(err);
            alert('Tidak dapat memuat provinsi. Silakan coba lagi.');
        }
    }

    async function loadKabupaten(provinsiId) {
        try {
            const response = await fetch(`/api/kabupaten/${provinsiId}`);
            if (!response.ok) throw new Error('Gagal memuat data kabupaten');
            const data = await response.json();

            const kabupatenSelect = document.getElementById('kabupaten');
            kabupatenSelect.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
            data.forEach(kabupaten => {
                kabupatenSelect.innerHTML += `<option value="${kabupaten.name}">${kabupaten.name}</option>`;
            });
        } catch (err) {
            console.error(err);
            alert('Tidak dapat memuat kabupaten. Silakan coba lagi.');
        }
    }

    document.getElementById('provinsi').addEventListener('change', function () {
        const provinsiId = this.value;
        if (provinsiId) {
            loadKabupaten(provinsiId);
        } else {
            document.getElementById('kabupaten').innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
        }
    });

    loadProvinsi();

    const form = document.getElementById("formPendaftaran");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const requiredFields = [
            "nama", "tempat_lahir", "tanggal_lahir", "no_ktp",
            "tinggi_badan", "berat_badan", "no_telp", "email",
            "provinsi", "kabupaten", "alamat_lengkap", "tahun_lulus", "pengalaman"
        ];

        let emptyFields = [];

        requiredFields.forEach(id => {
            const field = document.getElementsByName(id)[0];
            if (field && !field.value.trim()) {
                emptyFields.push(id);
            }
        });

        const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
        if (!jenisKelamin) emptyFields.push("jenis_kelamin");

        const vaksin = document.getElementsByName("sertifikat_vaksin")[0];
        if (!vaksin.files.length) emptyFields.push("sertifikat_vaksin");

        const foto = document.getElementsByName("foto_diri")[0];
        if (!foto.files.length) emptyFields.push("foto_diri");

        if (emptyFields.length > 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Data belum lengkap!',
                text: 'Mohon lengkapi semua field yang wajib diisi sebelum mengirim formulir.',
                confirmButtonText: 'OK'
            });
        } else {
            Swal.fire({
                title: 'Kirim Formulir?',
                text: 'Pastikan semua data sudah benar.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });

    document.getElementById('no_ktp').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 16);
    });

    const successMeta = document.querySelector('meta[name="session-success"]');
    if (successMeta && successMeta.content) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: successMeta.content,
            confirmButtonText: 'OK'
        });
    }
});
