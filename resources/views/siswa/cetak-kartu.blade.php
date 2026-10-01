<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .content {
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
        }

        .badge {
            padding: 5px 10px;
            background-color: #e2e8f0;
            border-radius: 4px;
            font-weight: bold;
        }
        
        
        .badge-diterima { background-color: #d1fae5; color: #065f46; }
        .badge-ditolak { background-color: #fee2e2; color: #991b1b; }
        .badge-pending { background-color: #f3f4f6; color: #374151; }
    </style>
</head>

<body>
    <div class="header">
        <h2>KARTU BUKTI PENDAFTARAN</h2>
        <p>Sistem Penerimaan Murid Baru</p>
    </div>

    <div class="content">
        <table>
            <tr>
                <td width="30%"><strong>Nama Lengkap</strong></td>
                <td width="5%">:</td>

                <td>{{ $siswa->nama_lengkap ?? $siswa->name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>:</td>
                <td>{{ $user->email }}</td> 
            </tr>

            <tr>
                <td><strong>Status Kelulusan</strong></td>
                <td>:</td>
                <td>
                   
                    @if($siswa->status == 'diterima')
                        <span class="badge badge-diterima">LULUS / DITERIMA</span>
                    @elseif($siswa->status == 'ditolak')
                        <span class="badge badge-ditolak">TIDAK LULUS</span>
                    @else
                        <span class="badge badge-pending">MENUNGGU SELEKSI</span>
                    @endif
                </td>
            </tr>

            <tr>
                <td><strong>Tanggal Cetak</strong></td>
                <td>:</td>
                <td>{{ date('d-m-Y H:i') }}</td>
            </tr>

        </table>
    </div>
</body>

</html>