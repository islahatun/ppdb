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
                <img src="{{ public_path('storage/'.$params->logo) }}" width="100" height="100" alt="Logo">
            </td>
            <td style="padding: 10px;">
                <h1 style="text-align: center">{{ $params->nama_sekolah }}</h1>

                <p style="text-align: center">{{ $params->alamat_sekolah }}</p>
            </td>
        </tr>
    </table>

    <h3 align="center">KARTU PENDAFTARAN</h3>
    <div>
       <div style="text-align: center;">
        <img src="{{ public_path('storage/'.$student->profil) }}" width="200" height="200" alt="Logo">
       </div>
<br><br>
        <table " cellspacing="0" cellpadding="3" widh="100%" >
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $student->user->name }}</td>
                </tr>
                <tr>
                    <td>Nisn</td>
                    <td>:</td>
                    <td>{{ $student->user->nisn }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $student->alamat }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>:</td>
                    <td>{{ $student->sekolah }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td>{{ $student->jurusan->jurusan }}</td>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>

        <p>
            <i>* Uang Pendaftaran {{ $params->uang_daftar }}</i>
        </p>
    </div>


</body>

</html>
