<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran PT Gunung Sembung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            margin-bottom: 20px;
        }

        .content p {
            margin: 5px 0;
        }

        .content .flex {
            display: flex;
            justify-content: space-between;
        }

        .content .flex div {
            width: 48%;
        }

        .content .flex div.right {
            text-align: right;
        }

        .content .border {
            border-top: 2px solid #e0e0e0;
            margin: 20px 0;
        }

        .content .items {
            margin-bottom: 20px;
        }

        .content .items table {
            width: 100%;
            border-collapse: collapse;
        }

        .content .items th, .content .items td {
            border: 1px solid #e0e0e0;
            padding: 10px;
            text-align: left;
        }

        .content .items th {
            background-color: #f44336;
            color: #fff;
        }

        .content .items td {
            background-color: #fdd;
        }

        .content .total {
            display: flex;
            justify-content: space-between;
            font-size: 1.2em;
            font-weight: bold;
        }

        .content .note {
            font-size: 0.9em;
            color: #555;
        }

        .footer {
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align: center; color: red; font-weight: bold;">
            <div style="float: left; margin-right: 10px; width: 60px;">
                <img src="{{ public_path('images/gsp.jpg') }}" alt="Logo" style="max-width: 100%;">
            </div>
            <div style="overflow: hidden;">
                <h2 style="margin: 0; font-size: 1.5rem;">BUS PARIWISATA<br>GUNUNG SEMBUNG PUTRA</h2>
                <p style="margin: 5px 0; font-size: 0.9rem;">Jl. Raya Cinunuk No. 126 A Telp. (022) 7830457, 7830463 Bandung</p>
            </div>
        </div>
        <div class="content">
            <div class="flex">
                <div>
                    <p><strong>No Kuitansi #:</strong> {{ $record->id_kuitansi }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                </div>

            </div>
            <div class="border"></div>
            <div class="flex">
                <div>
                    <p><strong>Nama Pemesan:</strong> {{ $record->booking->nama_pemesan }}</p>
                    <p><strong>Tujuan:</strong> {{ $record->booking->tujuan }}</p>
                </div>
            </div>
            <div class="border"></div>
            <div class="flex">
                <div>
                    <p><strong>Alamat Penjemputan:</strong> {{ $record->booking->alamat_penjemputan }}</p>
                    <p><strong>Tujuan:</strong> {{ $record->booking->tujuan }}</p>
                    <p><strong>Jam Berangkat:</strong> {{ $record->booking->jam_berangkat }}</p>
                    <p><strong>Tanggal Berangkat:</strong> {{ \Carbon\Carbon::parse($record->booking->tgl_berangkat)->translatedFormat('d F Y') }}</p>
                    <p><strong>Tanggal Kembali:</strong> {{ \Carbon\Carbon::parse($record->booking->tgl_kembali)->translatedFormat('d F Y') }}</p>

                </div>
            </div>
            <div class="border"></div>
            <div class="items">
                <table>
                    <tbody>
                        <tr>
                            <th>Booking ID</th>
                            <td>{{ $record->id_booking }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayar</th>
                            <td>{{ number_format($record->jml_bayar, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Ongkos Bus</th>
                            <td>{{ number_format($record->booking->ongkos_bus, 2) }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $record->booking->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex" style="justify-content: flex-end; text-align: right;">
                <div class="right">
                    <div class="total">
                        <div>Total</div>
                        <div>{{ number_format($record->jml_bayar, 2) }}</div>
                    </div>
                    
                    <div class="sisa-pembayaran">
                        <div>Sisa</div>
                        <div>{{ number_format($record->sisa, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
    <div class="note">
        <p><strong>Keterangan:</strong> {{ $record->booking->keterangan }}</p>
    </div>
    
        <div class="footer">
            <p>Terima kasih atas kepercayaan Anda kepada PT Gunung Sembung.</p>
            <p>Website: www.gunungsembung.com</p>
        </div>
    </div>
</body>

</html>