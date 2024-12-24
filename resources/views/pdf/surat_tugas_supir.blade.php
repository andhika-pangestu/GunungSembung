<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas Supir</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
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
            /* Warna merah */
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 0;
        }

        .content {
            padding: 3%;
        }


        .content table {
            width: 100%;
            border-collapse: collapse;
            /* Use separate borders to apply margin */
            border-spacing: 0 10px;
            /* Add space between rows */

        }

        .content th,
        td {
            padding: 10px;
            text-align: left;
            border-radius: 10px;
            /* Add border radius */

        }

        .content th {

            width: 35%;

        }

        .content tr {
            border-radius: 10px;
            /* Add border radius to row */
            overflow: hidden;
            /* Ensure radius is applied correctly */
            display: table;
            /* Ensure the row displays as a table-row */
            width: calc(100% - 20px);
            /* Adjust width to account for border-spacing */
            margin: 10px 0;
            /* Add margin to ensure spacing */
        }

        .content tr:nth-child(even) {
            background-color: #ffe6e6;
            /* Warna untuk baris genap */
        }

        .content tr:nth-child(odd) {
            background-color: #ffff;
            /* Warna untuk baris ganjil */
        }


        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            text-align: center;
        }

        .signature-table td {
            padding: 10px;
            
        }

        .signature-table .signature-space {
            height: 80px;/* Atur tinggi ruang tanda tangan sesuai kebutuhan */
            border-bottom: 1px solid #ccc;
            margin-bottom: 0;
        }

        /* Mengatur agar kolom tanda tangan memiliki lebar yang sama */
        .signature-table tr td {
            width: 50%;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.8rem;
            color: #777;
        }

        .hr-custom {
            margin-top: 115px;
            /* Atur jarak atas */
            margin-bottom: 5px;
            /* Atur jarak bawah */
            border: 0;
            border-top: 3px solid #e52929;
            /* Gaya garis hitam */
        }

        .hr-custom2 {
            margin-top: 8px;
            /* Atur jarak atas */
            border: 0;
            border-top: 1px solid #e52929;
            /* Gaya garis hitam */
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
        <!-- Garis hitam sebagai pembatas setelah alamat -->
        <hr class="hr-custom2">
        <h1 class="title">SURAT TUGAS</h1>
        <div class="content">
            <table>
                <tbody>
                    <tr>
                        <th>Nama Pengemudi</th>
                        <td><?php echo $record->nama_supir; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Polisi</th>
                        <td><?php echo $record->no_polisi; ?></td>
                    </tr>
                    <tr>
                        <th>Berangkat Tanggal</th>
                        <td><?php echo $record->tgl_berangkat; ?> <b>s/d</b> <?php echo $record->tgl_kembali; ?></td>
                    </tr>
                    <tr>
                        <th>Order dari</th>
                        <td><?php echo $record->nama_pemesan; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $record->alamat_penjemputan; ?></td>
                    </tr>
                    <tr>
                        <th>Tujuan</th>
                        <td><?php echo $record->tujuan; ?></td>
                    </tr>
                    <tr>
                        <th>Uang Kas & Komisi</th>
                        <td><?php echo $record->kas_komisi; ?></td>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: right;">
                Bandung, <?php echo (new DateTime($record->tgl_st))->format('d-m-Y'); ?>
            </div>
        </div>
        
        <table class="signature-table">
            <tr>
                <td>Administrasi</td>
                <td>Yang Menerima</td>
            </tr>
            <tr>
                <td>
                    <div class="signature-space"></div><br>(<?php echo $record->nama_admin; ?>)
                </td>
                <td>
                    <div class="signature-space"></div><br>(___________________)
                </td>
            </tr>
        </table>

        <div class="footer">Dokumen ini dibuat secara digital. <br> Harap disimpan dengan baik </div>
    </div>
</body>

</html>
