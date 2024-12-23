<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_kuitansi';

    protected $fillable = [
        'id_booking',
        'jml_bayar',
        'sisa',
        'status',
        // tambahkan atribut lain yang diperlukan
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($transaksi) {
            $booking = $transaksi->booking;

            if ($booking) {
                // Hitung ulang semua transaksi terkait
                $totalBayarSebelumnya = $booking->transaksi->where('id_kuitansi', '!=', $transaksi->id_kuitansi)->sum('jml_bayar');
                $remainingPayment = $booking->jml_tagihan - $totalBayarSebelumnya;

                // Pastikan jumlah bayar tidak melebihi sisa tagihan
                if ($transaksi->jml_bayar > $remainingPayment) {
                    $transaksi->jml_bayar = $remainingPayment;
                }

                $transaksi->sisa = max(0, $remainingPayment - $transaksi->jml_bayar);

                if ($transaksi->sisa == 0) {
                    $transaksi->status = 'lunas';
                } else {
                    $transaksi->status = 'dp';
                }
            }
        });

        static::saved(function ($transaksi) {
            $booking = $transaksi->booking;

            if ($booking) {
                // Hitung ulang semua transaksi terkait setelah transaksi disimpan
                $totalBayar = $booking->transaksi->sum('jml_bayar');
                $remainingPayment = $booking->jml_tagihan - $totalBayar;

                // Perbarui status booking berdasarkan total pembayaran
                if ($remainingPayment == 0) {
                    $booking->updateStatus('lunas');
                } else {
                    $booking->updateStatus('dp');
                }

                // Perbarui sisa untuk semua transaksi terkait
                foreach ($booking->transaksi as $trans) {
                    $trans->sisa = max(0, $remainingPayment - $trans->jml_bayar);
                    $trans->saveQuietly();
                }
            }
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
}