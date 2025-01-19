<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Jumlah Pendaftaran siswa</title>
</head>

<body>
    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="padding: 10px; vertical-align: middle;">
                <img src="{{ public_path('storage'.$params->logo) }}" width="100" height="100" alt="Logo">
            </td>
            <td style="padding: 10px;">
                <h1 style="text-align: center">{{ $params->nama_sekolah }}</h1>

                <p style="text-align: center">{{ $params->alamat_sekolah }}</p>
            </td>
        </tr>
    </table>

    <h3 align="center">LAPORAN PENDAFTAR TAHUN {{ date('Y') }}</h3>
    <div>
        <table border="1" cellspacing="0" cellpadding="3">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nomor pendaftaran</td>
                    <td>Nama</td>
                    <td>Nisn</td>
                    <td>Alamat</td>
                    <td>Sekolah Asal</td>
                    <td>Jurusan Yang dipilih</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->no_pendaftaran }}</td>
                        <td>{{ $b->user->name }}</td>
                        <td>{{ $b->nisn }}</td>
                        <td>{{ $b->alamat }}</td>
                        <td>{{ $b->sekolah }}</td>
                        <td>{{ $b->jurusan->jurusan }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</body>

</html>
