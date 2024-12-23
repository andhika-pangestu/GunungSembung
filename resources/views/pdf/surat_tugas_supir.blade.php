<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; box-sizing: border-box;">
    <div style="padding: 10px; max-width: 100%; width: 800px; margin: 0 auto; box-sizing: border-box;">
        <div style="text-align: center; color: red; font-weight: bold;">
            <div style="float: left; margin-right: 10px; width: 60px;">
                <img src="{{ public_path('images/gsp.jpg') }}" alt="Logo" style="max-width: 100%;">
            </div>
            <div style="overflow: hidden;">
                <h2 style="margin: 0; font-size: 1.5rem;">BUS PARIWISATA<br>GUNUNG SEMBUNG PUTRA</h2>
                <p style="margin: 5px 0; font-size: 0.9rem;">Jl. Raya Cinunuk No. 126 A Telp. (022) 7830457, 7830463 Bandung</p>
            </div>
        </div>
        <div style="clear: both; text-align: center; font-size: 1.2rem; font-weight: bold; text-decoration: underline; margin-top: 20px; margin-bottom: 20px;">
            SURAT TUGAS
        </div>
        <div style="margin-top: 20px; line-height: 1.8;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Nama Pengemudi:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">{{ $record->nama_supir }}</div>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Nomor Polisi:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">{{ $record->no_polisi }}</div>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Berangkat:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">Tgl. {{ $record->tgl_berangkat }} s/d  {{ $record->tgl_kembali }}</div>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Order dari:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">{{ $record->nama_pemesan }}</div>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Alamat:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">{{ $record->alamat_penjemputan }}</div>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Tujuan:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">{{ $record->tujuan }}</div>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 15px;">
                <label style="flex: 1 0 40%; font-weight: bold;">Uang Kas & Komisi:</label>
                <div style="flex: 2 0 55%; border-bottom: 1px dotted black;">{{ $record->kas_komisi }}</div>
            </div>
        </div>
        <!-- Bagian tanda tangan -->
        <table style="width: 100%; border: none;">
            <label style="flex: 1 0 40%; font-weight: bold;">Bandung, {{ \Carbon\Carbon::parse($record->tgl_st)->format('d/m/Y') }}</label>
            <tr>
                <td style="width: 50%; text-align: left;">Pengurus</td>
                <td style="width: 50%; text-align: left;">Yang Menerima</td>
            </tr>
            <tr>
                <td style="height: 200px;">({{ $record->nama_admin}})</td>
                <td style="height: 200px;">(___________________)</td>
            </tr>
        </table>

    </div>
</body>
</html>
