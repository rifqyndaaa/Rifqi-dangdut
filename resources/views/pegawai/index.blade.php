<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f9f9f9;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
        }
        td:first-child {
            font-weight: bold;
            background: #f3f3f3;
            width: 40%;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Data Pegawai</h1>

    <table>
        <tr>
            <td>Nama</td>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>{{ $my_age }} tahun</td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td>
                <ul>
                    @foreach ($hobbies as $hobi)
                        <li>{{ $hobi }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>Tanggal Harus Wisuda</td>
            <td>{{ $tgl_harus_wisuda }}</td>
        </tr>
        <tr>
            <td>Sisa Hari Menuju Wisuda</td>
            <td>{{ $time_to_study_left }} hari</td>
        </tr>
        <tr>
            <td>Semester Saat Ini</td>
            <td>{{ $current_semester }} - <em>{{ $motivasi }}</em></td>
        </tr>
        <tr>
            <td>Cita-cita</td>
            <td>{{ $future_goal }}</td>
        </tr>
    </table>

</body>
</html>


