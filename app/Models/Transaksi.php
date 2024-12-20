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

                // Panggil metode updateStatus dengan argumen yang benar
                $booking->updateStatus($transaksi->status);
            }
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
}