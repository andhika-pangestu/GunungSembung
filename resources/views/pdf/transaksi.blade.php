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
        <div class="header">
            <img src="https://themelize.me/wp-content/uploads/2024/10/cropped-logo-inline.webp" alt="Logo PT Gunung Sembung">
            <h1>Bukti Pembayaran</h1>
            <div class="right">
                <p><strong>PT Gunung Sembung</strong></p>
                <p>Alamat PT Gunung Sembung</p>
                <p>Email: info@gunungsembung.com</p>
                <p>Telepon: +62 123 4567</p>
            </div>
        </div>

        <div class="content">
            <div class="flex">
                <div>
                    <p><strong>Invoice #:</strong> {{ $record->id_kuitansi }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
                </div>

            </div>

            <div class="border"></div>
            


            <div class="flex">
                <div>
                    <p><strong>Nama Pemesan:</strong> {{ $record->booking->nama_pemesan }}</p>
                    <p><strong>Alamat Penjemputan:</strong> {{ $record->booking->alamat_penjemputan }}</p>
                    <p><strong>Tujuan:</strong> {{ $record->booking->tujuan }}</p>
                    <p><strong>Email:</strong> {{ $record->booking->email ?? 'pemesan@example.com' }}</p>
                    <p><strong>Telepon:</strong> {{ $record->booking->telepon ?? '+62 987 6543' }}</p>
                </div>
            </div>
            
            <div class="border"></div>
            <div class="flex">
                <div>
                    <p><strong>Tanggal Berangkat:</strong> {{ $record->booking->tgl_berangkat }}</p>
                    <p><strong>Jam Berangkat:</strong> {{ $record->booking->jam_berangkat }}</p>
                    <p><strong>Tujuan:</strong> {{ $record->booking->tujuan }}</p>
                    <p><strong>Email:</strong> {{ $record->booking->email ?? 'pemesan@example.com' }}</p>
                    <p><strong>Telepon:</strong> {{ $record->booking->telepon ?? '+62 987 6543' }}</p>
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
                            <th>Keterangan</th>
                            <td>{{ $record->booking->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>{{ $record->booking->tgl_kembali }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $record->booking->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="total">
                <div>Total</div>
                <div>{{ number_format($record->jml_bayar, 2) }}</div>
            </div>

            <div class="note">
                <p>Harap melakukan pembayaran sebelum {{ \Carbon\Carbon::now()->addMonth()->format('Y-m-d') }} ke rekening <strong>BE71 0961 2345 6769</strong> dengan mencantumkan nomor invoice.</p>
            </div>
        </div>

        <div class="footer">
            <p>Terima kasih atas kepercayaan Anda kepada PT Gunung Sembung.</p>
            <p>Email: info@gunungsembung.com | Website: www.gunungsembung.com</p>
        </div>
    </div>
</body>

</html>