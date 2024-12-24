<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran PT Gunung Sembung</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
           
        }

        .container {
            width: 85%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
        }

        .text {
            margin-top: 8px;
            float: right;
            width: 80%;
            color: #e52929;
        }

        .image {
            float: left;
            width: 20%;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        h2,
        p {
            margin: 0;
            padding: 0;
        }

        .title {
            font-weight: bold;
            color: #e52929;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 0;
        }

        table.invoice {
            .num {
                text-transform: uppercase;
                font-size: 12px;
                margin-top: 12px;
            }

            tr,
            td {
                text-align: left;
            }

            tr {
                &.intro {
                    td {
                        &:nth-child(2) {
                            text-align: right;

                        }
                    }
                }
            }

            .text-right {
                padding-left: 135px;
                /* Tambahkan jarak dari kiri */

                padding-right: 0;
                /* Pastikan tidak ada padding dari kanan */
                margin: 0;
                /* Pastikan margin tidak menyebabkan pergeseran */
            }
        }


        .hr-custom {
            margin-top: 125px;
            margin-bottom: 5px;
            border: 0;
            border-top: 3px solid #e52929;
        }

        .hr-custom2 {
            margin-top: 8px;
            border: 0;
            border-top: 1px solid #e52929;
        }

        .footer {
            font-size: 0.8em;
            color: #777;
            margin-top: 30px;
            text-align: center
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .booking-table thead tr {
            background-color: #e52929;
            color: #ffffff;
            text-align: left;
        }

        .booking-table th,
        .booking-table td {
            padding: 10px;
            text-align: left;
        }

        .booking-table tbody tr:nth-child(odd) {
            background-color: #f5f5f5;
        }

        .booking-table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .summary-table td {
            padding: 10px;
            vertical-align: top;
        }

        .summary-table tr.total {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .summary-table .amount {
            text-align: right;
        }

        .keterangan {
            margin-top: 20px;
            /* Jarak dari elemen sebelumnya */
            font-size: 12px;
            /* Ukuran teks */
            color: #333;
            /* Warna teks */
        }

        .keterangan strong {
            font-weight: bold;
            /* Penebalan teks "Keterangan:" */
        }

        .status {
            text-transform: uppercase;
            font-weight: bold;
        }

        .web {
            text-align: center;
            /* Menengahkan teks secara horizontal */
            font-weight: bold;
            /* Menebalkan teks */
            color:#f2f2f2;
            /* Memberikan warna merah pada teks */
            background-color: #e52929;
            /* Warna latar belakang */
            padding: 10px;
            /* Memberikan ruang di dalam div */
            margin-top: 25px;
        }

        .web p {
            margin: 0;
            /* Menghapus margin default pada tag <p> */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="image">
                <img src="<?php echo public_path('images/gsp.png'); ?>" alt="Deskripsi Gambar">
            </div>
            <div class="text">
                <h2>BUS PARIWISATA<br>GUNUNG SEMBUNG PUTRA</h2>
                <p style="font-size: 13px">0851-8970-0998</p>
                <p style="font-size: 12px">Jl. Raya Cinunuk No. 126A, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40624
                </p>
            </div>
        </div>

        <hr class="hr-custom">
        <hr class="hr-custom2">
        <h1 class="title">KWITANSI <br>PEMBAYARAN</h1>
        <section class="row">
            <table class="invoice">
                <tr class="intro">
                    <td class="">
                        Hai,&nbsp;{{ $record->booking->nama_pemesan }}<br>
                        Terima kasih telah menggunakan layanan penyewaan bus kami.
                    </td>
                    <td class="text-right">
                        <span class="num">No. Kwitansi #{{ $record->id_kuitansi }}</span><br>
                        {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr class="status">
                    <td class="">
                        Status: &nbsp;{{ $record->booking->status }}
                    </td>
                </tr>
            </table>
        </section>

        <table class="booking-table">
            <thead>
                <tr>
                    <th>ID Pemesanan:</th>
                    <th>Alamat Penjemputan:</th>
                    <th>Tujuan:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $record->id_booking }}</td>
                    <td>{{ $record->booking->alamat_penjemputan }}</td>
                    <td>{{ $record->booking->tujuan }}</td>
                </tr>
            </tbody>
        </table>

        <table class="booking-table">
            <thead>
                <tr>
                    <th>Tanggal Berangkat:</th>
                    <th>Jam Berangkat:</th>
                    <th>Tanggal Kembali:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ \Carbon\Carbon::parse($record->booking->tgl_berangkat)->translatedFormat('d F Y') }}</td>
                    <td>{{ $record->booking->jam_berangkat }}</td>
                    <td> {{ \Carbon\Carbon::parse($record->booking->tgl_kembali)->translatedFormat('d F Y') }}</td>
                </tr>

            </tbody>
        </table>

        <table class="summary-table">
            <tr>
                <td><strong>Ongkos/bus</strong></td>
                <td class="amount">{{ number_format($record->booking->ongkos_bus, 2) }}</td>
            </tr>
            <tr class="total">
                <td><strong>Jumlah Total</strong></td>
                <td class="amount">{{ number_format($record->booking->jml_tagihan) }}</td>
            </tr>
            <tr>
                <td><strong>Dibayar</strong></td>
                <td class="amount">{{ number_format($record->jml_bayar, 2) }}</td>
            </tr>
            <tr class="total">
                <td><strong>Sisa</strong></td>
                <td class="amount">{{ number_format($record->sisa, 2) }}</td>
            </tr>
        </table>

        <div class="keterangan">
            <strong>Keterangan:</strong> <br>{{ $record->booking->keterangan }}
        </div>


        <div class="footer">
            <p>Terima kasih atas kepercayaan yang diberikan kepada PT Gunung Sembung Putra.</p>

        </div>

        <div class="web">
            <p>www.gunungsembungputra.com</p>
        </div>

</body>

</html>
